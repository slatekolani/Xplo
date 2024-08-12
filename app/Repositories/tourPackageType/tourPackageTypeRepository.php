<?php

namespace App\Repositories\tourPackageType;

use App\Models\tourPackageType\tourPackageType;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class tourPackageTypeRepository.
 */
class tourPackageTypeRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return tourPackageType::class;
    }
    public function storeTourPackageType(array $input)
    {
        $tourPackageType=new tourPackageType();
        $tourPackageType->tour_package_type_name=$input['tour_package_type_name'];
        $tourPackageType->tour_package_type_description=$input['tour_package_type_description'];
        $tourPackageType->save();
    }

    public function updateTourPackageType(array $input, $tourPackageTypeId)
    {
        $tourPackageType=tourPackageType::query()->where('uuid',$tourPackageTypeId)->first();
        $tourPackageType->tour_package_type_name=$input['tour_package_type_name'];
        $tourPackageType->tour_package_type_description=$input['tour_package_type_description'];
        $tourPackageType->save();
    }
}
