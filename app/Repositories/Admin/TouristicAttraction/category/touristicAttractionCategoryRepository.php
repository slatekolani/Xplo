<?php

namespace App\Repositories\Admin\TouristicAttraction\category;

use App\Models\TouristicAttractions\category\touristicAttractionCategory;
use App\Repositories\BaseRepository;

//use Your Model

/**
 * Class touristicAttractionCategoryRepository.
 */
class touristicAttractionCategoryRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return touristicAttractionCategory::class;
    }
    public function storeTouristicAttractionCategory($input)
    {
        $touristicAttractionCategory=new touristicAttractionCategory();
        $touristicAttractionCategory->attraction_category=$input['attraction_category'];
        $touristicAttractionCategory->attraction_category_description=$input['attraction_category_description'];
        $touristicAttractionCategory->save();
    }
    public function updateTouristicAttractionCategory($input,$attractionCategoryUuid)
    {
        $touristicAttractionCategory=touristicAttractionCategory::query()->where('uuid',$attractionCategoryUuid)->first();
        $touristicAttractionCategory->attraction_category=$input['attraction_category'];
        $touristicAttractionCategory->attraction_category_description=$input['attraction_category_description'];
        $touristicAttractionCategory->save();
    }
}
