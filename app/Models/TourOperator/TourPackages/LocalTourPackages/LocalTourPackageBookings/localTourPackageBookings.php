<?php

namespace App\Models\TourOperator\TourPackages\LocalTourPackages\LocalTourPackageBookings;

use App\Models\BaseModel\BaseModel;
use App\Models\specialNeed\specialNeed;
use App\Models\TourOperator\reservations\tourOperatorReservation;
use App\Models\TourOperator\tourOperator;
use App\Models\TourOperator\TourPackages\LocalTourPackages\LocalTourPackageBookings\localTouristReviews\localTouristReviews;
use App\Models\TourOperator\TourPackages\LocalTourPackages\LocalTourPackageCollectionStops\localTourPackageCollectionStops;
use App\Models\TourOperator\TourPackages\LocalTourPackages\localTourPackages;
use Illuminate\Database\Eloquent\SoftDeletes;

class localTourPackageBookings extends BaseModel
{
    use SoftDeletes;
    protected $table='local_tour_package_booking';
    protected $guarded=['uuid'];

    public function tourOperator()
    {
        return $this->belongsTo(tourOperator::class);
    }
    public function collectionStop()
    {
        return $this->belongsTo(localTourPackageCollectionStops::class,'collection_station');
    }
    public function localTourPackages()
    {
        return $this->belongsTo(localTourPackages::class,'local_tour_package_id');
    }
    public function localTouristReviews()
    {
        return $this->hasMany(localTouristReviews::class);
    }
    public function tourOperatorReservation()
    {
        return $this->belongsTo(tourOperatorReservation::class,'reservation_id');
    }
    public function specialNeed()
    {
        return $this->belongsTo(specialNeed::class,'special_attention');
    }
    public function getBookingStatusLabelAttribute()
    {
        $status=$this->status;
        switch ($status)
        {
            case 0:
                return '<span class="badge badge-danger badge-pill">Unapproved</span>';
                break;
            case 1:
                return '<span class="badge badge-success badge-pill">Approved</span>';
                break;
        }
    }
    public function getDeletedLocalBookingStatusLabelAttribute()
    {
        return '<span class="badge badge-danger">Deleted</span>';
    }

    public function getLocalBookingButtonActionLabelAttribute()
    {
       return "<select name='action' class='action_select'>
                    <option value=''>Select</option>
                    <option data-route='".route('localTourBooking.view',$this->uuid)."' value='2'>View</option>
                    <option data-route='".route('localTourBooking.edit',$this->uuid)."' value='2'>Edit</option>
                    <option data-route='".route('localTourBooking.previewInvoice',$this->uuid)."' value='2'>Invoice</option>
                    <option value='2'>Payment details</option>
                    <option data-route='".route('localTouristReview.index',$this->uuid)."' value='2'>Reviews</option>
                    <option data-route='".route('localTourBooking.delete',$this->uuid)."' value='1'>Delete</option>
               </select>";
    }
    public function getDeletedLocalBookingButtonActionLabelAttribute()
    {
        return "<select name='action' class='action_select'>
                    <option value=''>Select</option>
                    <option data-route='".route('localTourBooking.viewDeleted',$this->uuid)."' value='3'>View</option>
                    <option value='3'>Payment details</option>
                    <option data-route='".route('localTourBooking.restore',$this->uuid)."' value='2'>Restore</option>
                    <option data-route='".route('localTourBooking.forceDelete',$this->uuid)."' value='1'>Delete permanently</option>
               </select>";
    }
    public function getTourPriceLabelAttribute()
    {
        $localTourPackageBooking=localTourPackageBookings::find($this->id);
        $localTourPackageId=$localTourPackageBooking->local_tour_package_id;
        $localTourPackage=localTourPackages::query()->where('id',$localTourPackageId)->first();

//        Total price of each category of people
        $adultForeignerTourPrice= $localTourPackage->trip_price_adult_foreigner;
        $childForeignerTourPrice= $localTourPackage->trip_price_child_foreigner;
        $childLocalTourPrice= $localTourPackage->trip_price_child_tanzanian;
        $adultLocalTourPrice= $localTourPackage->trip_price_adult_tanzanian;

//        Total number of travellers by categories of people
        $totalForeignerChildren=$localTourPackageBooking->total_number_foreigner_child;
        $totalForeignerAdults=$localTourPackageBooking->total_number_foreigner_adult;
        $totalLocalAdults=$localTourPackageBooking->total_number_local_adult;
        $totalLocalChildren=$localTourPackageBooking->total_number_local_child;
        $collectingStationPrice=$localTourPackageBooking->collectionStop->collection_stop_price;
//        Breakdown of prices to be paid by each group
        $adultForeignersTourPrice=($adultForeignerTourPrice * $totalForeignerAdults) + ($collectingStationPrice * $totalForeignerAdults);
        $adultLocalsTourPrice=($adultLocalTourPrice * $totalLocalAdults) + ($collectingStationPrice * $totalLocalAdults);
        $childrenForeignersTourPrice=($childForeignerTourPrice * $totalForeignerChildren) + ($collectingStationPrice * $totalForeignerChildren);
        $childrenLocalsTourPrice=($childLocalTourPrice* $totalLocalChildren) + ($collectingStationPrice * $totalLocalChildren);

//        Amount to be paid in the specific booking
        $localTourPrice= ($adultLocalsTourPrice + $adultForeignersTourPrice + $childrenForeignersTourPrice + $childrenLocalsTourPrice);
        return $localTourPrice;
    }
    public function getTotalTouristsLabelAttribute()
    {
        $localTourPackageBooking=localTourPackageBookings::find($this->id);
        $totalForeignerChildren=$localTourPackageBooking->total_number_foreigner_child;
        $totalForeignerAdults=$localTourPackageBooking->total_number_foreigner_adult;
        $totalLocalAdults=$localTourPackageBooking->total_number_local_adult;
        $totalLocalChildren=$localTourPackageBooking->total_number_local_child;

        $totalTouristsBooked=($totalForeignerChildren + $totalForeignerAdults + $totalLocalAdults + $totalLocalChildren);
        return $totalTouristsBooked;
    }


    public function getTourPriceForDeletedBookingLabelAttribute()
    {
        $localTourPackageBooking=localTourPackageBookings::onlyTrashed()->find($this->id);
        $localTourPackageBookingId=$localTourPackageBooking->local_tour_package_id;
        $localTourPackage=localTourPackages::query()->where('id',$localTourPackageBookingId)->first();

//        Total price of each category of people
        $adultForeignerTourPrice= $localTourPackage->trip_price_adult_foreigner;
        $childForeignerTourPrice= $localTourPackage->trip_price_child_foreigner;
        $childLocalTourPrice= $localTourPackage->trip_price_child_tanzanian;
        $adultLocalTourPrice= $localTourPackage->trip_price_adult_tanzanian;

//        Total number of travellers by categories of people
        $totalForeignerChildren=$localTourPackageBooking->total_number_foreigner_child;
        $totalForeignerAdults=$localTourPackageBooking->total_number_foreigner_adult;
        $totalLocalAdults=$localTourPackageBooking->total_number_local_adult;
        $totalLocalChildren=$localTourPackageBooking->total_number_local_child;
        $collectingStationPrice=$localTourPackageBooking->collectionStop->collection_stop_price;
//        Breakdown of prices to be paid by each group
        $adultForeignersTourPrice=($adultForeignerTourPrice * $totalForeignerAdults) + ($collectingStationPrice * $totalForeignerAdults);
        $adultLocalsTourPrice=($adultLocalTourPrice * $totalLocalAdults) + ($collectingStationPrice * $totalLocalAdults);
        $childrenForeignersTourPrice=($childForeignerTourPrice * $totalForeignerChildren) + ($collectingStationPrice * $totalForeignerChildren);
        $childrenLocalsTourPrice=($childLocalTourPrice* $totalLocalChildren) + ($collectingStationPrice * $totalLocalChildren);


//        Amount to be paid in the specific booking
        $localTourPrice= ($adultLocalsTourPrice + $adultForeignersTourPrice + $childrenForeignersTourPrice + $childrenLocalsTourPrice);
        return $localTourPrice;
    }

    public function getDeletedTotalTouristsLabelAttribute()
    {
        $localTourPackageBooking=localTourPackageBookings::onlyTrashed()->find($this->id);
        $totalForeignerChildren=$localTourPackageBooking->total_number_foreigner_child;
        $totalForeignerAdults=$localTourPackageBooking->total_number_foreigner_adult;
        $totalLocalAdults=$localTourPackageBooking->total_number_local_adult;
        $totalLocalChildren=$localTourPackageBooking->total_number_local_child;

        $totalTouristsBooked=($totalForeignerChildren + $totalForeignerAdults + $totalLocalAdults + $totalLocalChildren);
        return $totalTouristsBooked;
    }

    public function getCheckedNumberOfLocalReviewsPerBookingLabelAttribute()
    {
        $localTourBooking=localTourPackageBookings::find($this->id);
        $localTouristReviews=localTouristReviews::query()->where('local_tour_booking_id',$localTourBooking->id)->count();
        return $localTouristReviews;
    }
    public function getTotalLocalTouristReviewsLabelAttribute()
    {
       $localTouristBookings=localTourPackageBookings::find($this->id);
       $localTouristReviews=localTouristReviews::query()->where('local_tour_booking_id',$localTouristBookings->id)->count();
       return $localTouristReviews;
    }
    public function getTotalApprovedLocalTouristReviewsLabelAttribute()
    {
        $localTouristBookings=localTourPackageBookings::find($this->id);
        $localTouristReviews=localTouristReviews::query()->where('local_tour_booking_id',$localTouristBookings->id)->where('status','=',1)->count();
        return $localTouristReviews;
    }
    public function getTotalUnApprovedLocalTouristReviewsLabelAttribute()
    {
        $localTouristBookings=localTourPackageBookings::find($this->id);
        $localTouristReviews=localTouristReviews::query()->where('local_tour_booking_id',$localTouristBookings->id)->where('status','=',0)->count();
        return $localTouristReviews;
    }
    public function getTotalDeletedLocalTouristReviewsLabelAttribute()
    {
        $localTouristBookings=localTourPackageBookings::find($this->id);
        $localTouristReviews=localTouristReviews::onlyTrashed()->where('local_tour_booking_id',$localTouristBookings->id)->count();
        return $localTouristReviews;
    }
}
