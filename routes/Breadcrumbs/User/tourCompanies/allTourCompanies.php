<?php

use App\Models\TourOperator\reservations\tourOperatorReservation;
use App\Models\TourOperator\tourOperator;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;


Breadcrumbs::register('tourOperator.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('Tour Companies'), route('tourOperator.index'));
});
Breadcrumbs::register('tourOperator.show', function ($breadcrumbs,$tourCompanyUuid) {
    $breadcrumbs->parent('tourOperator.index',$tourCompanyUuid);
    $breadcrumbs->push(trans('View Tour Company'), route('tourOperator.show',$tourCompanyUuid));
});
Breadcrumbs::register('tourOperator.edit', function ($breadcrumbs,$tourCompanyUuid) {
    $breadcrumbs->parent('tourOperator.show',$tourCompanyUuid);
    $breadcrumbs->push(trans('Edit Tour Company'), route('tourOperator.edit',$tourCompanyUuid));
});
Breadcrumbs::register('tourOperatorReservation.index', function ($breadcrumbs,$tourCompanyUuid) {
    $breadcrumbs->parent('tourOperator.index');
    $breadcrumbs->push(trans('Reservations'), route('tourOperatorReservation.index',$tourCompanyUuid));
});
Breadcrumbs::register('tourOperatorReservation.show', function ($breadcrumbs, $tourCompanyUuid, $reservationUuid) {
    // Fetch the tour company based on the UUID
    $tourCompany = tourOperator::query()->where('uuid', $tourCompanyUuid)->first();

    // Fetch the specific reservation based on the reservation UUID and tour_operator_id
    $tourOperatorReservation = tourOperatorReservation::query()
        ->where('uuid', $reservationUuid)
        ->where('tour_operator_id', $tourCompany->id)
        ->first();

    // Parent breadcrumb: List of reservations for the tour operator
    $breadcrumbs->parent('tourOperatorReservation.index', $tourCompanyUuid);

    // Breadcrumb for showing the specific reservation
    $breadcrumbs->push(trans('View Reservation'), route('tourOperatorReservation.show', [$tourCompanyUuid, $reservationUuid]));
});



