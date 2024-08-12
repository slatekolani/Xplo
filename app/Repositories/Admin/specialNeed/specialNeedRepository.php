<?php

namespace App\Repositories\Admin\specialNeed;

use App\Models\specialNeed\specialNeed;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class specialNeedRepository.
 */
class specialNeedRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return specialNeed::class;
    }
    public function storeSpecialNeed(array $input)
    {
        $specialNeed=new specialNeed();
        $specialNeed->special_need_name=$input['special_need_name'];
        $specialNeed->save();
    }
    public function updateSpecialNeed(array $input, $specialNeed)
    {
        $special_need=specialNeed::query()->where('uuid',$specialNeed)->first();
        $special_need->special_need_name=$input['special_need_name'];
        $special_need->save();
    }
}
