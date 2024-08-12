<?php

namespace App\Models\TouristicAttractions\category;

use App\Models\BaseModel\BaseModel;
use App\Models\TouristicAttractions\touristicAttractions;
use Illuminate\Database\Eloquent\Model;

class touristicAttractionCategory extends BaseModel
{
    protected $table='touristic_attraction_category';
    protected $guarded=['uuid'];

    public function getButtonActionLabelAttribute()
    {
        $btn='<a href="'.route('touristicAttractionCategory.view',$this->uuid).'" class="btn btn-success btn-sm">View</a>';
        $btn=$btn.'<a href="'.route('touristicAttractionCategory.edit',$this->uuid).'" class="btn btn-primary btn-sm">Edit</a>';
        $btn=$btn.'<a href="'.route('touristicAttractionCategory.delete',$this->uuid).'" class="btn btn-danger btn-sm">Delete</a>';
        return $btn;
    }
}
