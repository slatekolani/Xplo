<?php

namespace App\Http\Controllers\tanzaniaRegions\regionCulture;

use App\Http\Controllers\Controller;
use App\Models\tanzaniaRegions\regionCulture\cultureCharacteristics\tanzaniaRegionCultureCharacteristic;
use App\Models\tanzaniaRegions\regionCulture\tanzaniaRegionCulture;
use App\Models\tanzaniaRegions\tanzaniaRegions;
use App\Repositories\tanzaniaRegions\regionCulture\cultureCharacteristics\tanzaniaRegionCultureCharacteristicRepository;
use App\Repositories\tanzaniaRegions\regionCulture\tanzaniaRegionCultureRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class tanzaniaRegionCultureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tanzaniaRegionUuid)
    {
        $tanzaniaRegion=tanzaniaRegions::query()->where('uuid',$tanzaniaRegionUuid)->first();
        return view('AboutTanzania.tanzaniaRegions.cultures.index')
            ->with('tanzaniaRegion',$tanzaniaRegion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cultureCreate($tanzaniaRegionUuid)
    {
        $tanzaniaRegion=tanzaniaRegions::query()->where('uuid',$tanzaniaRegionUuid)->first();
        return view('AboutTanzania.tanzaniaRegions.cultures.create')
            ->with('tanzaniaRegion',$tanzaniaRegion);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'culture_name'=>'required|string',
            'basic_information'=>'required|string|max:300',
            'traditional_language'=>'required|string',
            'traditional_dance'=>'required|string',
            'traditional_dance_description'=>'required|string|max:100',
            'traditional_food'=>'required|string',
            'traditional_food_description'=>'required|string|max:100',
            'culture_history'=>'required|string|max:500',
            'cultural_video'=>'required|string|max:1000',
            'culture_image.*'=>'required|mimes:jpg,png,jpeg|max:5120|dimensions:max_length:2000,max_width:2000',
            'traditional_food_image'=>'required|mimes:jpg,png,jpeg|max:2048|dimensions:max_length:2000,max_width:2000',
        ]);
        if ($validator->fails())
        {
          return back()->withInput()->withErrors($validator);
        }
        $input=$request->all();
        $tanzaniaRegion=tanzaniaRegions::query()->first();
        $tanzaniaRegionCultureRepo=new tanzaniaRegionCultureRepository();
        $tanzaniaRegionCulture=$tanzaniaRegionCultureRepo->storeTanzaniaRegionCulture($input);
        return redirect()->route('regionCulture.index',$tanzaniaRegion->uuid)->with('tanzaniaRegionCulture',$tanzaniaRegionCulture)->withFlashSuccess('Culture was added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($regionCultureUuid)
    {
        $regionCulture=tanzaniaRegionCulture::query()->where('uuid',$regionCultureUuid)->first();
        $regionCultureCharacteristics=tanzaniaRegionCultureCharacteristic::query()->where('tanzania_region_culture_id',$regionCulture->id)->get();
        return view('AboutTanzania.tanzaniaRegions.cultures.view')
            ->with('regionCultureCharacteristics',$regionCultureCharacteristics)
            ->with('regionCulture',$regionCulture);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($regionCultureUuid)
    {
        $regionCulture=tanzaniaRegionCulture::query()->where('uuid',$regionCultureUuid)->first();
        $regionCultureCharacteristics=tanzaniaRegionCultureCharacteristic::query()->where('tanzania_region_culture_id',$regionCulture->id)->get();
        return view('AboutTanzania.tanzaniaRegions.cultures.edit')
            ->with('regionCultureCharacteristics',$regionCultureCharacteristics)
            ->with('regionCulture',$regionCulture);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $regionCultureUuid)
    {
        $validator=Validator::make($request->all(),
            [
                'culture_name'=>'required|string',
                'basic_information'=>'required|string|max:300',
                'traditional_language'=>'required|string',
                'traditional_dance'=>'required|string',
                'traditional_dance_description'=>'required|string|max:100',
                'traditional_food'=>'required|string',
                'traditional_food_description'=>'required|string|max:100',
                'culture_history'=>'required|string|max:500',
                'cultural_video'=>'required|string|max:1000',
                'culture_image.*'=>'nullable|mimes:jpg,png,jpeg|max:5120|dimensions:max_length:2000,max_width:2000',
                'traditional_food_image'=>'nullable|mimes:jpg,png,jpeg|max:2048|dimensions:max_length:2000,max_width:2000',
            ]);
        if ($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        $input=$request->all();
        $regionCultureRepo=new tanzaniaRegionCultureRepository();
        $regionCulture=$regionCultureRepo->updateTanzaniaRegionCultureCharacteristics($input,$regionCultureUuid,$request);
        return back()->with('regionCulture',$regionCulture)->withFlashSuccess('Culture updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($regionCultureUuid)
    {
        $regionCulture=tanzaniaRegionCulture::query()->where('uuid',$regionCultureUuid)->first();
        $regionCulture->delete();
        return back()->withFlashSuccess('Region culture was deleted successfully');
    }
    public function deleteCharacteristic($regionCultureCharacteristicUuid)
    {
        $regionCultureCharacteristic=tanzaniaRegionCultureCharacteristic::query()->where('uuid',$regionCultureCharacteristicUuid)->first();
        $regionCultureCharacteristic->delete();
        return back()->with('regionCultureCharacteristic',$regionCultureCharacteristic)->withFlashSuccess('Characteristic deleted successfully');
    }
    public function getRegionCultures($tanzaniaRegionUuid)
    {
        $tanzaniaRegion=tanzaniaRegions::query()->where('uuid',$tanzaniaRegionUuid)->first();
        $regionCulture=tanzaniaRegionCulture::query()->where('tanzania_region_id',$tanzaniaRegion->id)->orderBy('culture_name')->get();
        return DataTables::of($regionCulture)
            ->addIndexColumn()
            ->addColumn('culture_name',function ($regionCulture){
                return $regionCulture->culture_name;
            })
            ->addColumn('basic_information',function ($regionCulture){
                return $regionCulture->basic_information;
            })
            ->addColumn('traditional_language',function ($regionCulture){
                return $regionCulture->traditional_language;
            })
            ->addColumn('traditional_dance',function ($regionCulture){
                return $regionCulture->traditional_dance;
            })
            ->addColumn('traditional_food',function ($regionCulture){
                return $regionCulture->traditional_food;
            })
            ->addColumn('actions',function ($regionCulture)
            {
                return $regionCulture->buttonActionLabel;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
