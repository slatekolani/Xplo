<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push(trans('label.home'), route('home'));
});


includeRouteFiles(__DIR__.'/Breadcrumbs/');
