<?php

namespace App\Repositories\TourOperatorPackages\LocalTourPackages\localTourPackageBooking\localTouristReviews;

use App\Models\TourOperator\TourPackages\LocalTourPackages\LocalTourPackageBookings\localTouristReviews\localTouristReviews;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class localTouristReviewRepository.
 */
class localTouristReviewRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return localTouristReviews::class;
    }

    public function storeLocalTouristReview($input)
    {
        $localTouristReview=new localTouristReviews();
        $localTouristReview->review_message=$input['review_message'];
        $localTouristReview->tour_operator_id=$input['tour_operator_id'];
        $localTouristReview->local_tour_package_id=$input['local_tour_package_id'];
        $localTouristReview->local_tour_booking_id=$input['local_tour_booking_id'];
        $localTouristReview->save();
    }
}
