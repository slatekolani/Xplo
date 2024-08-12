<?php


Route::group([

    'namespace' => 'TourOperator\TourOperatorPackages\LocalTourPackages\localTourPackageBooking',

], function () {

    Route::group(['prefix' => 'localTourPackageBooking', 'as' => 'localTourPackageBooking.'], function () {
        Route::post('/store', 'localTourPackageBookingController@store')->name('store');
    });


});
