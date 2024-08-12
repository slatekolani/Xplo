<?php

namespace App\Repositories\tanzaniaRegions\regionCulture\cultureCharacteristics;

use App\Models\tanzaniaRegions\regionCulture\cultureCharacteristics\tanzaniaRegionCultureCharacteristic;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class tanzaniaRegionCultureCharacteristicRepository.
 */
class tanzaniaRegionCultureCharacteristicRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return tanzaniaRegionCultureCharacteristic::class;
    }
    public function saveTanzaniaRegionCultureCharacteristics($input,$tanzaniaRegionCulture)
    {
        foreach($input as $key =>$value)
        {
            if(str_contains($key,'characteristic_description')!==false)
            {
                $key_id=substr($key,26);
                $tanzaniaRegionCultureCharacteristicsArray=[
                    'characteristic_title'=>$input['characteristic_title'.$key_id],
                    'characteristic_description'=>$input['characteristic_description'.$key_id],
                    'tanzania_region_culture_id'=>$tanzaniaRegionCulture->id,
                ];
                $tanzaniaRegionCultureCharacteristic=new tanzaniaRegionCultureCharacteristic();
                $tanzaniaRegionCultureCharacteristic->characteristic_title=$tanzaniaRegionCultureCharacteristicsArray['characteristic_title'];
                $tanzaniaRegionCultureCharacteristic->characteristic_description=$tanzaniaRegionCultureCharacteristicsArray['characteristic_description'];
                $tanzaniaRegionCultureCharacteristic->tanzania_region_culture_id=$tanzaniaRegionCultureCharacteristicsArray['tanzania_region_culture_id'];
                $tanzaniaRegionCultureCharacteristic->save();
            }
        }
    }
    public function updateTanzaniaRegionCultureCharacteristic($input,$tanzaniaRegionCulture)
    {
        foreach ($input as $key=>$value) {
            if (str_contains($key,'characteristic_description')!==false)
            {
                $key_id=substr($key,26);
                $tanzaniaRegionCultureCharacteristicsArray=[
                    'characteristic_title'=>$input['characteristic_title'.$key_id],
                    'characteristic_description'=>$input['characteristic_description'.$key_id],
                    'tanzania_region_culture_id'=>$tanzaniaRegionCulture->id,
                ];
                $tanzaniaRegionCultureCharacteristic=tanzaniaRegionCultureCharacteristic::query()->where('tanzania_region_culture_id',$tanzaniaRegionCulture->id)->where('id',$key_id)->first();
                if ($tanzaniaRegionCultureCharacteristic)
                {
                    $tanzaniaRegionCultureCharacteristic->characteristic_title=$input['characteristic_title'.$key_id];
                    $tanzaniaRegionCultureCharacteristic->characteristic_description=$input['characteristic_description'.$key_id];
                    $tanzaniaRegionCultureCharacteristic->save();
                }
                else
                {
                    $tanzaniaRegionCultureCharacteristic=new tanzaniaRegionCultureCharacteristic();
                    $tanzaniaRegionCultureCharacteristic->characteristic_title=$tanzaniaRegionCultureCharacteristicsArray['characteristic_title'];
                    $tanzaniaRegionCultureCharacteristic->characteristic_description=$tanzaniaRegionCultureCharacteristicsArray['characteristic_description'];
                    $tanzaniaRegionCultureCharacteristic->tanzania_region_culture_id=$tanzaniaRegionCultureCharacteristicsArray['tanzania_region_culture_id'];
                    $tanzaniaRegionCultureCharacteristic->save();
                }
            }
        }
    }
}
