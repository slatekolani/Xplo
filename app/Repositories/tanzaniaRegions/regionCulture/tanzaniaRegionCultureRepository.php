<?php

namespace App\Repositories\tanzaniaRegions\regionCulture;

use App\Models\tanzaniaRegions\regionCulture\tanzaniaRegionCulture;
use App\Repositories\BaseRepository;

//use Your Model

/**
 * Class tanzaniaRegionCultureRepository.
 */
class tanzaniaRegionCultureRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return tanzaniaRegionCulture::class;
    }
    public function storeTanzaniaRegionCulture($input)
    {
        $tanzaniaRegionCulture=new tanzaniaRegionCulture();
        $tanzaniaRegionCulture->culture_name=$input['culture_name'];
        $tanzaniaRegionCulture->basic_information=$input['basic_information'];
        $tanzaniaRegionCulture->traditional_language=$input['traditional_language'];
        $tanzaniaRegionCulture->traditional_dance=$input['traditional_dance'];
        $tanzaniaRegionCulture->traditional_dance_description=$input['traditional_dance_description'];
        $tanzaniaRegionCulture->traditional_food=$input['traditional_food'];
        $tanzaniaRegionCulture->traditional_food_description=$input['traditional_food_description'];
        $tanzaniaRegionCulture->culture_history=$input['culture_history'];
        $tanzaniaRegionCulture->cultural_video=$input['cultural_video'];
        $tanzaniaRegionCulture->tanzania_region_id=$input['tanzania_region_id'];
        if($input['culture_image'] && is_array($input['culture_image']))
        {
            $imagePaths=[];
            foreach($input['culture_image'] as $image)
            {
                $extension=$image->getClientOriginalExtension();
                $filename=time().'_'.uniqid().'.'.$extension;
                $image->move('public/cultureImage',$filename);
                $imagePaths[]='/cultureImage/'.$filename;
            }
            $tanzaniaRegionCulture->culture_image=implode(',',$imagePaths);
        }
        if($input['traditional_food_image'])
        {
            $file=$input['traditional_food_image'];
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/traditionFoodImage',$filename);
            $tanzaniaRegionCulture->traditional_food_image=$filename;
        }
        $tanzaniaRegionCulture->save();
        $tanzaniaRegionCulture->saveTanzaniaRegionCultureCharacteristics($input,$tanzaniaRegionCulture);
    }
    public function updateTanzaniaRegionCultureCharacteristics($input,$tanzaniaRegionCultureUuid,$request)
    {
        $tanzaniaRegionCulture=tanzaniaRegionCulture::query()->where('uuid',$tanzaniaRegionCultureUuid)->first();
        $tanzaniaRegionCulture->culture_name=$input['culture_name'];
        $tanzaniaRegionCulture->basic_information=$input['basic_information'];
        $tanzaniaRegionCulture->traditional_language=$input['traditional_language'];
        $tanzaniaRegionCulture->traditional_dance=$input['traditional_dance'];
        $tanzaniaRegionCulture->traditional_dance_description=$input['traditional_dance_description'];
        $tanzaniaRegionCulture->traditional_food=$input['traditional_food'];
        $tanzaniaRegionCulture->traditional_food_description=$input['traditional_food_description'];
        $tanzaniaRegionCulture->culture_history=$input['culture_history'];
        $tanzaniaRegionCulture->cultural_video=$input['cultural_video'];
        $tanzaniaRegionCulture->tanzania_region_id=$input['tanzania_region_id'];
        $input=$request->all();
        if($request->hasFile('culture_image') && is_array($input['culture_image']))
        {
            $imagePaths=[];
            foreach($input['culture_image'] as $image)
            {
                $extension=$image->getClientOriginalExtension();
                $filename=time().'_'.uniqid().'.'.$extension;
                $image->move('public/cultureImage',$filename);
                $imagePaths[]='/cultureImage/'.$filename;
            }
            $tanzaniaRegionCulture->culture_image=implode(',',$imagePaths);
        }
        if($request->hasFile('traditional_food_image') && $input['traditional_food_image'] !==null)
        {
            $file=$input['traditional_food_image'];
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/traditionFoodImage',$filename);
            $tanzaniaRegionCulture->traditional_food_image=$filename;
        }
        $tanzaniaRegionCulture->save();
        $tanzaniaRegionCulture->updateTanzaniaRegionCultureCharacteristics($input,$tanzaniaRegionCulture);
    }
}
