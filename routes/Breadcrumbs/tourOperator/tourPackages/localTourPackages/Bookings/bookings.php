<?php

use App\Models\TourOperator\tourOperator;
use App\Models\TourOperator\TourPackages\LocalTourPackages\localTourPackages;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;


Breadcrumbs::register('localTourBooking.index', function ($breadcrumbs,$localTourPackageUuid) {
    $localTourPackage=localTourPackages::query()->where('uuid',$localTourPackageUuid)->first();
    $tourOperator=tourOperator::query()->where('id',$localTourPackage->tour_operator_id)->first();
    $breadcrumbs->parent('localTourPackages.index',$tourOperator->uuid);
    $breadcrumbs->push(trans('Tour Bookings'), route('localTourBooking.index',$localTourPackageUuid));
});

Breadcrumbs::register('localTourBooking.approvedLocalBookingsIndex', function ($breadcrumbs,$localTourPackageUuid) {
    $localTourPackage=localTourPackages::query()->where('uuid',$localTourPackageUuid)->first();
    $tourOperator=tourOperator::query()->where('id',$localTourPackage->tour_operator_id)->first();
    $breadcrumbs->parent('localTourPackages.index',$tourOperator->uuid);
    $breadcrumbs->push(trans('Approved Tour Bookings'), route('localTourBooking.approvedLocalBookingsIndex',$localTourPackageUuid));
});

Breadcrumbs::register('localTourBooking.unapprovedLocalBookingIndex', function ($breadcrumbs,$localTourPackageUuid) {
    $localTourPackage=localTourPackages::query()->where('uuid',$localTourPackageUuid)->first();
    $tourOperator=tourOperator::query()->where('id',$localTourPackage->tour_operator_id)->first();
    $breadcrumbs->parent('localTourPackages.index',$tourOperator->uuid);
    $breadcrumbs->push(trans('Unapproved Tour Bookings'), route('localTourBooking.unapprovedLocalBookingIndex',$localTourPackageUuid));
});

Breadcrumbs::register('localTourBooking.deletedLocalBookingIndex', function ($breadcrumbs,$localTourPackageUuid) {
    $localTourPackage=localTourPackages::query()->where('uuid',$localTourPackageUuid)->first();
    $tourOperator=tourOperator::query()->where('id',$localTourPackage->tour_operator_id)->first();
    $breadcrumbs->parent('localTourPackages.index',$tourOperator->uuid);
    $breadcrumbs->push(trans('Deleted Tour Bookings'), route('localTourBooking.deletedLocalBookingIndex',$localTourPackageUuid));
});
