<?php


Route::group([

    'namespace' => 'TourOperator\TourOperatorPackages\LocalTourPackages\LocalTourPackageBooking\touristReviews',

], function () {

    Route::group(['prefix' => 'localTouristReview', 'as' => 'localTouristReview.'], function () {
        Route::get('/create/{localTourBookingUuid}', 'localTouristReviewController@create')->name('review');
        Route::post('/store', 'localTouristReviewController@store')->name('store');
        Route::get('/allLocalTouristReviews/{tourOperatorUuid}', 'localTouristReviewController@allLocalTouristReviews')->name('allLocalTouristReviews');
    });


});
