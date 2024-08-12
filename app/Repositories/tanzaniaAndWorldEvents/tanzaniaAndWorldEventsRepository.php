<?php

namespace App\Repositories\tanzaniaAndWorldEvents;

use App\Models\tanzaniaAndWorldEvents\tanzaniaAndWorldEvents;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class tanzaniaAndWorldEventsRepository.
 */
class tanzaniaAndWorldEventsRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return tanzaniaAndWorldEvents::class;
    }

    public function storeEvent($input)
    {
        $event=new tanzaniaAndWorldEvents();
        $event->event_name=$input['event_name'];
        $event->event_description=$input['event_description'];
        $event->event_date=$input['event_date'];
        $event->save();
    }
    public function updateEvent($input,$eventId)
    {
        $event=tanzaniaAndWorldEvents::query()->where('uuid',$eventId)->first();
        $event->event_name=$input['event_name'];
        $event->event_description=$input['event_description'];
        $event->event_date=$input['event_date'];
        $event->save();
    }
}
