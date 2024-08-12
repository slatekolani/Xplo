<?php

namespace App\Repositories\Admin\TourTypes;

use App\Models\TourTypes\tourTypes;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class tourTypesRepository.
 */
class tourTypesRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return tourTypes::class;
    }
    public function storeTourType(array $input)
    {
        $tourType=new tourTypes();
        $tourType->tour_type_name=$input['tour_type_name'];
        $tourType->save();
    }
    public function updateTourType(array $input, $tourType)
    {
        $tour_type=tourTypes::query()->where('uuid',$tourType)->first();
        $tour_type->tour_type_name=$input['tour_type_name'];
        $tour_type->save();

    }
}
