<?php

namespace App\Repositories\news;

use App\Models\news\news;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class newsRepository.
 */
class newsRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return news::class;
    }

    public function storeNews(array $input)
    {
        $news= new news();
        $news->news_title=$input['news_title'];
        $news->news_description=$input['news_description'];
        if ($input['news_image'])
        {
            $file=$input['news_image'];
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/newsImage/',$filename);
            $news->news_image=$filename;
        }
        $news->save();
    }
    public function updateNews(array $input, $newsId)
    {
        $news=news::query()->where('uuid',$newsId)->first();
        $news->news_title=$input['news_title'];
        $news->news_description=$input['news_description'];
        if($input['news_image'])
        {
            $file=$input['news_image'];
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/newsImage/',$filename);
            $news->news_image=$filename;
        }
        $news->save();
    }
}
