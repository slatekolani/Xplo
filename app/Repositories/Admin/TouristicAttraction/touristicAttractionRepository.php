<?php

namespace App\Repositories\Admin\TouristicAttraction;

use App\Models\TouristicAttractions\touristicAttractions;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class touristicAttractionRepository.
 */
class touristicAttractionRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return touristicAttractions::class;
    }
    public function storeTouristicAttractions(array $input)
    {
        $touristicAttraction=new touristicAttractions();
        $touristicAttraction->attraction_name=$input['attraction_name'];
        $touristicAttraction->attraction_description=$input['attraction_description'];
        $touristicAttraction->attraction_region=$input['attraction_region'];
        $touristicAttraction->attraction_category=$input['attraction_category'];
        $touristicAttraction->best_time_of_visit=$input['best_time_of_visit'];
        $touristicAttraction->basic_information=$input['basic_information'];
        $touristicAttraction->attraction_details=$input['attraction_details'];
        $touristicAttraction->governing_body=$input['governing_body'];
        $touristicAttraction->website_link=$input['website_link'];
        $touristicAttraction->attraction_map=$input['attraction_map'];
        if ($input['attraction_image'] && is_array($input['attraction_image'])) {
            $imagePaths = [];

            foreach ($input['attraction_image'] as $image) {
                $extension = $image->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $image->move('public/touristAttraction/', $filename);
                $imagePaths[] = '/touristAttraction/' . $filename;
            }
            $touristicAttraction->attraction_image = implode(',', $imagePaths);
        }
        $touristicAttraction->save();
        $touristicAttraction->saveTouristicAttractionVisitAdvices($input,$touristicAttraction);
        $touristicAttraction->saveTouristicAttractionVisitReasons($input,$touristicAttraction);
    }
    public function updateTouristicAttraction(array $input, $touristicAttraction,$request)
    {
        $touristicAttraction=touristicAttractions::query()->where('uuid',$touristicAttraction)->first();
        $touristicAttraction->attraction_name=$input['attraction_name'];
        $touristicAttraction->attraction_description=$input['attraction_description'];
        $touristicAttraction->attraction_region=$input['attraction_region'];
        $touristicAttraction->attraction_category=$input['attraction_category'];
        $touristicAttraction->best_time_of_visit=$input['best_time_of_visit'];
        $touristicAttraction->basic_information=$input['basic_information'];
        $touristicAttraction->attraction_details=$input['attraction_details'];
        $touristicAttraction->governing_body=$input['governing_body'];
        $touristicAttraction->website_link=$input['website_link'];
        $touristicAttraction->attraction_map=$input['attraction_map'];
        $input=$request->all();
        if ($request->hasFile('attraction_image') && is_array($input['attraction_image']))
        {
            $imagePaths=[];
            foreach($input['attraction_image'] as $image)
            {
                $extension=$image->getClientOriginalExtension();
                $filename=time().'_'.uniqid().'.'.$extension;
                $image->move('public/touristAttraction/', $filename);
                $imagePaths[]='/touristAttraction/'.$filename;
            }
            $touristicAttraction->attraction_image=implode(',',$imagePaths);
        }
        $touristicAttraction->save();
        $touristicAttraction->updateTouristicAttractionVisitAdvices($input,$touristicAttraction);
        $touristicAttraction->updateTouristicAttractionVisitReasons($input,$touristicAttraction);
    }
}
