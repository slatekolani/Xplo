<?php

namespace App\Models\tanzaniaRegions\regionCulture;

use App\Models\BaseModel\BaseModel;
use App\Models\tanzaniaRegions\regionCulture\cultureCharacteristics\tanzaniaRegionCultureCharacteristic;
use App\Models\tanzaniaRegions\tanzaniaRegions;
use App\Repositories\tanzaniaRegions\regionCulture\cultureCharacteristics\tanzaniaRegionCultureCharacteristicRepository;
use Illuminate\Database\Eloquent\Model;

class tanzaniaRegionCulture extends BaseModel
{
    protected $table='tanzania_region_culture';
    protected $guarded=['uuid'];

    public function tanzaniaRegion()
    {
        return $this->belongsTo(tanzaniaRegions::class);
    }
    public function tanzaniaRegionCultureCharacteristic()
    {
        return $this->hasMany(tanzaniaRegionCultureCharacteristic::class);
    }

    public function saveTanzaniaRegionCultureCharacteristics($input,$tanzaniaRegionCulture)
    {
        $tanzaniaRegionCultureCharacteristicsRepo=new tanzaniaRegionCultureCharacteristicRepository();
        $tanzaniaRegionCultureCharacteristics=$tanzaniaRegionCultureCharacteristicsRepo->saveTanzaniaRegionCultureCharacteristics($input,$tanzaniaRegionCulture);
        return back()->with('tanzaniaRegionCultureCharacteristics',$tanzaniaRegionCultureCharacteristics);
    }
    public function updateTanzaniaRegionCultureCharacteristics($input,$tanzaniaRegionCulture)
    {
        $tanzaniaRegionCultureCharacteristicsRepo=new tanzaniaRegionCultureCharacteristicRepository();
        $tanzaniaRegionCultureCharacteristics=$tanzaniaRegionCultureCharacteristicsRepo->updateTanzaniaRegionCultureCharacteristic($input,$tanzaniaRegionCulture);
        return back()->with('tanzaniaRegionCultureCharacteristics',$tanzaniaRegionCultureCharacteristics);
    }
    public function getButtonActionLabelAttribute()
    {
        $btn='<a href="'.route('regionCulture.view',$this->uuid).'" class="btn btn-success btn-sm">View</a>';
        $btn=$btn.'<a href="'.route('regionCulture.edit',$this->uuid).'" class="btn btn-primary btn-sm">Edit</a>';
        $btn=$btn.'<a href="'.route('regionCulture.delete',$this->uuid).'" class="btn btn-danger btn-sm">Delete</a>';
        return $btn;
    }
}
