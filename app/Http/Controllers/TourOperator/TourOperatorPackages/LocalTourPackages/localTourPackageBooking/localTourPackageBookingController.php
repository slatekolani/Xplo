<?php

namespace App\Http\Controllers\TourOperator\TourOperatorPackages\LocalTourPackages\localTourPackageBooking;

use App\Http\Controllers\Controller;
use App\Models\BaseModel\Traits\BookingSmsTrait;
use App\Models\specialNeed\specialNeed;
use App\Models\TourOperator\reservations\tourOperatorReservation;
use App\Models\TourOperator\tourOperator;
use App\Models\TourOperator\TourPackages\LocalTourPackages\LocalTourPackageBookings\localTourPackageBookings;
use App\Models\TourOperator\TourPackages\LocalTourPackages\LocalTourPackageCollectionStops\localTourPackageCollectionStops;
use App\Models\TourOperator\TourPackages\LocalTourPackages\localTourPackages;
use App\Repositories\TourOperatorPackages\LocalTourPackages\localTourPackageBooking\localTourPackageBookingRepository;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class localTourPackageBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($localTourPackageUuid)
    {
        $localTourPackage=localTourPackages::query()->where('uuid',$localTourPackageUuid)->first();
        return view('TourOperator.TourPackages.localTourPackages.bookings.index')->with('localTourPackage',$localTourPackage);
    }
    public function approvedLocalBookingsIndex($localTourPackageUuid)
    {
        $localTourPackage=localTourPackages::query()->where('uuid',$localTourPackageUuid)->first();
        return view('TourOperator.TourPackages.localTourPackages.bookings.approvedBookings.index')
            ->with('localTourPackage',$localTourPackage);
    }
    public function unapprovedLocalBookingIndex($localTourPackageUuid)
    {
        $localTourPackage=localTourPackages::query()->where('uuid',$localTourPackageUuid)->first();
        return view('TourOperator.TourPackages.localTourPackages.bookings.unapprovedBookings.index')
            ->with('localTourPackage',$localTourPackage);
    }
    public function deletedLocalBookingIndex($localTourPackageUuid)
    {
        $localTourPackage=localTourPackages::query()->where('uuid',$localTourPackageUuid)->first();
        return view('TourOperator.TourPackages.localTourPackages.bookings.deletedBookings.index')
            ->with('localTourPackage',$localTourPackage);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reference_number='REF - '.strtoupper(uniqid());
        $validator=Validator::make($request->all(),
        [
            'tourist_name' => 'required|string|max:255',
            'phone_number' => 'required|regex:/^[0-9]{10}$/',
            'email_address' => 'required|email',
            'total_number_foreigner_child' => 'required|numeric|max:999',
            'total_number_local_child' => 'required|numeric|max:999',
            'total_number_foreigner_adult' => 'required|numeric|max:999',
            'total_number_local_adult' => 'required|numeric|max:999',
            'collection_station' => 'required',
            'special_attention' => 'nullable',
            'reservation_id' => 'nullable',
            'message' => 'required|string|max:100',
            'total_free_of_charge_children'=>'required|numeric',
            'tour_operator_id' => 'required|numeric',
            'local_tour_package_id' => 'required|numeric',
        ]);

        if ($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $input=$request->all();
        $localtourPackageBooking=new localTourPackages();
        $localTourPackageBookingRepo=new localTourPackageBookingRepository();
        $localTourPackageBooking=$localTourPackageBookingRepo->storeLocalTourBooking($input,$reference_number);
        return back()->with('localTourPackageBooking',$localTourPackageBooking)->withFlashSuccess('Your request has been submitted. Please relax while waiting for the best response from the tour operator');
    }
    public function previewInvoice($localTourPackageBookingUuid)
    {
        $localTourPackageBooking=localTourPackageBookings::query()->where('uuid',$localTourPackageBookingUuid)->first();
        $localTourPackageReservationIds=DB::table('local_package_reservation')->where('local_tour_package_id',$localTourPackageBooking->localTourPackages->id)->pluck('tour_operator_reservation_id');
        $localTourPackageReservations=tourOperatorReservation::query()->whereIn('id',$localTourPackageReservationIds)->get();
        return view('TourOperator.TourPackages.localTourPackages.paymentDetails.invoices.preview')
            ->with('localTourPackageBooking',$localTourPackageBooking)
            ->with('localTourPackageReservations',$localTourPackageReservations);
    }
    public function printInvoice($localTourPackageBookingUuid)
    {
        $localTourPackageBooking = localTourPackageBookings::query()->where('uuid', $localTourPackageBookingUuid)->first();
        $localTourPackageReservationIds = DB::table('local_package_reservation')->where('local_tour_package_id', $localTourPackageBooking->localTourPackages->id)->pluck('tour_operator_reservation_id');
        $localTourPackageReservations = tourOperatorReservation::query()->whereIn('id', $localTourPackageReservationIds)->get();

        if (!$localTourPackageBooking) {
            abort(404);
        }

        // Instantiate mPDF
        $mpdf = new Mpdf([
            'tempDir' => sys_get_temp_dir(), // Set temporary directory
            'default_font' => 'lato', // Set default font
        ]);

        // Render HTML content
        $html = view('TourOperator.TourPackages.localTourPackages.paymentDetails.invoices.printable', [
            'localTourPackageBooking' => $localTourPackageBooking,
            'localTourPackageReservations' => $localTourPackageReservations
        ])->render();

        // Load HTML content into mPDF
        $mpdf->WriteHTML($html);

        // Output the PDF
        $mpdf->Output('Local Tour Invoice.pdf', 'I');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($localTourBookingUuid)
    {
        $localTourBooking=localTourPackageBookings::query()->where('uuid',$localTourBookingUuid)->first();
        return view('TourOperator.TourPackages.localTourPackages.bookings.view')
            ->with('localTourBooking',$localTourBooking);
    }
    public function viewDeleted($localTourBookingUuid)
    {
        $localTourBooking=localTourPackageBookings::onlyTrashed()->where('uuid',$localTourBookingUuid)->first();
        return view('TourOperator.TourPackages.localTourPackages.bookings.deletedBookings.view')
            ->with('localTourBooking',$localTourBooking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($localTourPackageBookingUuid)
    {
        $localTourPackageBooking=localTourPackageBookings::query()->with('localTourPackages')->where('uuid',$localTourPackageBookingUuid)->first();
        $localTourCollectionStations=localTourPackageCollectionStops::query()->where('local_tour_package_id',$localTourPackageBooking->local_tour_package_id)->get();
        $safariAreaPreferenceReservationsIds=DB::table('reservation_attractions')->where('touristic_attraction_id',$localTourPackageBooking->localTourpackages->touristicAttraction->id)->pluck('tour_operator_reservation_id');
        $safariAreaPreferenceReservations=tourOperatorReservation::query()->whereIn('id',$safariAreaPreferenceReservationsIds)->get();
        $localTourPackageSupportedSpecialNeedIds=DB::table('local_package_special_need')->where('local_tour_package_id',$localTourPackageBooking->localTourPackages->id)->pluck('special_need_id');
        $localTourPackageSupportedSpecialNeeds=specialNeed::query()->whereIn('id',$localTourPackageSupportedSpecialNeedIds)->pluck('special_need_name');
        return view('TourOperator.TourPackages.localTourPackages.bookings.edit')
            ->with('safariAreaPreferenceReservations',$safariAreaPreferenceReservations)
            ->with('localTourCollectionStations',$localTourCollectionStations)
            ->with('localTourPackageSupportedSpecialNeeds',$localTourPackageSupportedSpecialNeeds)
            ->with('localTourPackageBooking',$localTourPackageBooking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $localTourBookingUuid)
    {
        $validator=Validator::make($request->all(),
            [
                'tourist_name' => 'required|string|max:255',
                'phone_number' => 'required|regex:/^[0-9]{10}$/',
                'email_address' => 'required|email',
                'total_number_foreigner_child' => 'required|numeric|max:999',
                'total_number_local_child' => 'required|numeric|max:999',
                'total_number_foreigner_adult' => 'required|numeric|max:999',
                'total_number_local_adult' => 'required|numeric|max:999',
                'collection_station' => 'required',
                'special_attention' => 'nullable',
                'reservation_id' => 'nullable',
                'message' => 'required|string|max:100',
                'tour_operator_id' => 'required|numeric',
                'discount'=>'required|numeric',
                'total_free_of_charge_children'=>'required|numeric',
                'local_tour_package_id' => 'required|numeric',
            ]);

        if ($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $input=$request->except('reference_number');
        $localTourPackageBookingRepo=new localTourPackageBookingRepository();
        $localTourPackageBooking=$localTourPackageBookingRepo->updatelocalTourBooking($input,$localTourBookingUuid);
        return back()->with('localTourBooking',$localTourPackageBooking)->withFlashSuccess('Local tour booking was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($localTourBookingUuid)
    {
        $localTourBooking=localTourPackageBookings::query()->where('uuid',$localTourBookingUuid)->first();
        $localTourBooking->delete();
        return back()->withFlashSuccess('The local tour booking was deleted successfully. You can restore it when needed from the deleted bookings section');
    }

    public function restore($localTourBookingUuid)
    {
        $deletedLocalTourBooking=localTourPackageBookings::onlyTrashed()->where('uuid',$localTourBookingUuid)->first();
        $deletedLocalTourBooking->restore();
        return back()->withFlashSuccess('The local tour booking was restored successfully');
    }
    public function forceDelete($localTourBookingUuid)
    {
        $deletedLocalTourBooking=localTourPackageBookings::onlyTrashed()->where('uuid',$localTourBookingUuid)->first();
        $deletedLocalTourBooking->forceDelete();
        return back()->withFlashSuccess('The local tour booking was deleted permanently');
    }
    public function approveOrUnApproveBooking(Request $request)
    {
        $booking=localTourPackageBookings::find($request->id);
        $status=$booking->status;
        switch ($status)
        {
            case 0:
                $booking->status=1;
                break;
            case 1:
                $booking->status=0;
                break;
        }
        $booking->save();
        return response()->json(['success'=>true]);
    }

    public function getLocalTourBookings($localTourPackageId)
    {
        $localTourPackageBooking=localTourPackageBookings::query()->where('local_tour_package_id',$localTourPackageId)->orderBy('id','DESC')->get();
        return DataTables::of($localTourPackageBooking)
            ->addColumn('booking_date_and_time',function ($localTourPackageBooking)
            {
                return (date('jS M Y H:i a',strtotime($localTourPackageBooking->created_at)));
            })
            ->addColumn('tourist_name',function ($localTourPackageBooking)
            {
                return $localTourPackageBooking->tourist_name;
            })
            ->addColumn('phone_number',function ($localTourPackageBooking)
            {
                return $localTourPackageBooking->phone_number;
            })
            ->addColumn('email_address',function ($localTourPackageBooking)
            {
                return $localTourPackageBooking->email_address;
            })
            ->addColumn('collection_station',function ($localTourPackageBooking)
            {
                return localTourPackageCollectionStops::find($localTourPackageBooking->collection_station)->collection_stop_name;
            })
            ->addColumn('total_tourists',function ($localTourPackageBooking)
            {
                return $localTourPackageBooking->totalTouristsLabel;
            })
            ->addColumn('tour_price',function ($localTourPackageBooking){
                return (number_format($localTourPackageBooking->tourPriceLabel));
            })
            ->addColumn('approve_or_un_approve_booking',function($localTourPackageBooking){
                $btn='<label class="switch{{$localTourPackageBooking->status}}">
                          <input type="checkbox">
                          <span class="slider round"></span>
                        </label>';
                return $btn;
            })
            ->addColumn('booking_status',function($localTourPackageBooking){
                return $localTourPackageBooking->bookingStatusLabel;
            })
            ->addColumn('actions',function ($localTourPackageBooking){
                return $localTourPackageBooking->localBookingButtonActionLabel;
            })
            ->rawColumns(['tour_price','booking_status','actions','approve_or_un_approve_booking'])
            ->make(true);
    }
    public function getApprovedLocalTourBookings($localTourPackageId)
    {
        $approvedLocalTourBookings=localTourPackageBookings::query()->where('local_tour_package_id',$localTourPackageId)->where('status','=',1)->orderBy('id','DESC')->get();
        return DataTables::of($approvedLocalTourBookings)
            ->addColumn('booking_date_and_time',function ($approvedLocalTourBookings)
            {
                return (date('jS M Y H:i a',strtotime($approvedLocalTourBookings->created_at)));
            })
            ->addColumn('tourist_name',function ($approvedLocalTourBookings)
            {
                return $approvedLocalTourBookings->tourist_name;
            })
            ->addColumn('phone_number',function ($approvedLocalTourBookings)
            {
                return $approvedLocalTourBookings->phone_number;
            })
            ->addColumn('email_address',function ($approvedLocalTourBookings)
            {
                return $approvedLocalTourBookings->email_address;
            })
            ->addColumn('collection_station',function ($approvedLocalTourBookings)
            {
                return localTourPackageCollectionStops::find($approvedLocalTourBookings->collection_station)->collection_stop_name;
            })
            ->addColumn('total_tourists',function ($approvedLocalTourBookings)
            {
                return $approvedLocalTourBookings->totalTouristsLabel;
            })
            ->addColumn('tour_price',function ($approvedLocalTourBookings){
                return (number_format($approvedLocalTourBookings->tourPriceLabel));
            })
            ->addColumn('approve_or_un_approve_booking',function($approvedLocalTourBookings){
                $btn='<label class="switch{{$approvedLocalTourBookings->status}}">
                          <input type="checkbox">
                          <span class="slider round"></span>
                        </label>';
                return $btn;
            })
            ->addColumn('booking_status',function($approvedLocalTourBookings){
                return $approvedLocalTourBookings->bookingStatusLabel;
            })
            ->addColumn('actions',function ($approvedLocalTourBookings){
                return $approvedLocalTourBookings->localBookingButtonActionLabel;
            })
            ->rawColumns(['tour_price','booking_status','actions','approve_or_un_approve_booking'])
            ->make(true);
    }
    public function getUnapprovedLocalTourBookings($localTourPackageId)
    {
        $unapprovedLocalTourBookings=localTourPackageBookings::query()->where('local_tour_package_id',$localTourPackageId)->where('status','=',0)->orderBy('id','DESC')->get();
        return DataTables::of($unapprovedLocalTourBookings)
            ->addColumn('booking_date_and_time',function ($unapprovedLocalTourBookings)
            {
                return (date('jS M Y H:i a',strtotime($unapprovedLocalTourBookings->created_at)));
            })
            ->addColumn('tourist_name',function ($unapprovedLocalTourBookings)
            {
                return $unapprovedLocalTourBookings->tourist_name;
            })
            ->addColumn('phone_number',function ($unapprovedLocalTourBookings)
            {
                return $unapprovedLocalTourBookings->phone_number;
            })
            ->addColumn('email_address',function ($unapprovedLocalTourBookings)
            {
                return $unapprovedLocalTourBookings->email_address;
            })
            ->addColumn('collection_station',function ($unapprovedLocalTourBookings)
            {
                return localTourPackageCollectionStops::find($unapprovedLocalTourBookings->collection_station)->collection_stop_name;
            })
            ->addColumn('total_tourists',function ($unapprovedLocalTourBookings)
            {
                return $unapprovedLocalTourBookings->totalTouristsLabel;
            })
            ->addColumn('tour_price',function ($unapprovedLocalTourBookings){
                return (number_format($unapprovedLocalTourBookings->tourPriceLabel));
            })
            ->addColumn('approve_or_un_approve_booking',function($unapprovedLocalTourBookings){
                $btn='<label class="switch{{$unapprovedLocalTourBookings->status}}">
                          <input type="checkbox">
                          <span class="slider round"></span>
                        </label>';
                return $btn;
            })
            ->addColumn('booking_status',function($unapprovedLocalTourBookings){
                return $unapprovedLocalTourBookings->bookingStatusLabel;
            })
            ->addColumn('actions',function ($unapprovedLocalTourBookings){
                return $unapprovedLocalTourBookings->localBookingButtonActionLabel;
            })
            ->rawColumns(['tour_price','booking_status','actions','approve_or_un_approve_booking'])
            ->make(true);
    }
    public function getDeletedLocalTourBookings($localTourPackageId)
    {
        $deletedLocalTourBookings=localTourPackageBookings::onlyTrashed()->where('local_tour_package_id',$localTourPackageId)->orderBy('id','DESC')->get();
        return DataTables::of($deletedLocalTourBookings)
            ->addColumn('booking_date_and_time',function ($deletedLocalTourBookings)
            {
                return (date('jS M Y H:i a',strtotime($deletedLocalTourBookings->created_at)));
            })
            ->addColumn('tourist_name',function ($deletedLocalTourBookings)
            {
                return $deletedLocalTourBookings->tourist_name;
            })
            ->addColumn('phone_number',function ($deletedLocalTourBookings)
            {
                return $deletedLocalTourBookings->phone_number;
            })
            ->addColumn('email_address',function ($deletedLocalTourBookings)
            {
                return $deletedLocalTourBookings->email_address;
            })
            ->addColumn('collection_station',function ($deletedLocalTourBookings)
            {
                return localTourPackageCollectionStops::find($deletedLocalTourBookings->collection_station)->collection_stop_name;
            })
            ->addColumn('total_tourists',function ($deletedLocalTourBookings)
            {
                return $deletedLocalTourBookings->DeletedTotalTouristsLabel;
            })
            ->addColumn('tour_price',function ($deletedLocalTourBookings){
                return (number_format($deletedLocalTourBookings->TourPriceForDeletedBookingLabel));
            })

            ->addColumn('booking_status',function($deletedLocalTourBookings){
                return $deletedLocalTourBookings->deletedLocalBookingStatusLabel;
            })
            ->addColumn('actions',function ($deletedLocalTourBookings){
                return $deletedLocalTourBookings->deletedLocalBookingButtonActionLabel;
            })
            ->rawColumns(['tour_price','booking_status','actions'])
            ->make(true);
    }
}
