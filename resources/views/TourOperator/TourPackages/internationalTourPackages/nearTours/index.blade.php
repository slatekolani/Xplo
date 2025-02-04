@extends('layouts.main', ['title' => trans('Near International Tours'), 'header' => trans('Near International Tours')])

@include('includes.datatable_assets')
@push('after-styles')
    {{ Html::style(url('vendor/sweetalert/sweetalert.css')) }}
    <style>

    </style>
@endpush

@section('content')
    <div class="row" style="padding-top: 13px">

        <div class="col-md-4">
            <div class="list-group">
                <ul class="list-unstyled">
                    <a href="{{route('tourPackages.companyInternationalTourPackagesIndex',$tourOperator->uuid)}}"
                       class="list-group-item list-group-item-action">
                        <h5 class="list-group-item-heading"><i
                                class="fas fa-clipboard"></i> {{ __('All Posted packages') }} ~
                            <badge class="badge badge-primary badge-lg"
                                   style="font-size:15px">{{$tourOperator->TotalInternationalTourPackagesPostedLabel}}</badge>
                        </h5>
                        <p class="list-group-item-text"></p>
                    </a>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="list-group">
                <ul class="list-unstyled">
                    <a href="{{route('tourPackages.recentInternationalPostedTourPackagesIndex',$tourOperator->uuid)}}"
                       class="list-group-item list-group-item-action">
                        <h5 class="list-group-item-heading"><i
                                class="fas fa-clipboard"></i> {{ __('Recent Posted packages') }} ~
                            <badge class="badge badge-primary badge-lg"
                                   style="font-size:15px">{{$tourOperator->TotalRecentInternationalTourPackagesPostedLabel}}</badge>
                        </h5>
                        <p class="list-group-item-text"></p>
                    </a>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="list-group">
                <ul class="list-unstyled">
                    <a href="{{route('tourPackages.verifiedInternationalTourPackagesIndex',$tourOperator->uuid)}}"
                       class="list-group-item list-group-item-action">
                        <h5 class="list-group-item-heading"><i
                                class="fas fa-clipboard"></i> {{ __('Verified Packages') }} ~
                            <badge class="badge badge-primary badge-lg"
                                   style="font-size:15px">{{$tourOperator->TotalVerifiedInternationalTourPackagesPostedLabel}}</badge>
                        </h5>
                        <p class="list-group-item-text"></p>
                    </a>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="list-group">
                <ul class="list-unstyled">
                    <a href="{{route('tourPackages.unverifiedInternationalTourPackagesIndex',$tourOperator->uuid)}}"
                       class="list-group-item list-group-item-action">
                        <h5 class="list-group-item-heading"><i
                                class="fas fa-clipboard"></i> {{ __('Unverified Packages') }} ~
                            <badge class="badge badge-primary badge-lg"
                                   style="font-size:15px">{{$tourOperator->TotalUnVerifiedInternationalTourPackagesPostedLabel}}</badge>
                        </h5>
                        <p class="list-group-item-text"></p>
                    </a>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="list-group">
                <ul class="list-unstyled">
                    <a href="{{route('tourPackages.nearInternationalToursToBeConductedIndex',$tourOperator->uuid)}}"
                       class="list-group-item list-group-item-action">
                        <h5 class="list-group-item-heading"><i class="fas fa-clipboard"></i> {{ __('Near Tours') }} ~
                            <badge class="badge badge-info badge-lg"
                                   style="font-size:15px">{{$tourOperator->TotalInternationalNearToursLabel}}</badge>
                        </h5>
                        <p class="list-group-item-text"></p>
                    </a>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="list-group">
                <ul class="list-unstyled">
                    <a href="{{route('tourPackages.expiredInternationalTourPackagesIndex',$tourOperator->uuid)}}"
                       class="list-group-item list-group-item-action">
                        <h5 class="list-group-item-heading"><i
                                class="fas fa-clipboard"></i> {{ __('Expired Packages') }} ~
                            <badge class="badge badge-danger badge-lg"
                                   style="font-size:15px">{{$tourOperator->TotalInternationalExpiredTourPackagesLabel}}</badge>
                        </h5>
                        <p class="list-group-item-text"></p>
                    </a>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="list-group">
                <ul class="list-unstyled">
                    <a href="{{route('tourPackages.deletedInternationalTourPackagesIndex',$tourOperator->uuid)}}"
                       class="list-group-item list-group-item-action">
                        <h5 class="list-group-item-heading"><i
                                class="fas fa-clipboard"></i> {{ __('Deleted Tour Packages') }} ~
                            <badge class="badge badge-danger badge-lg"
                                   style="font-size:15px">{{$tourOperator->TotalInternationalDeletedTourPackagesLabel}}</badge>
                        </h5>
                        <p class="list-group-item-text"></p>
                    </a>
                </ul>
            </div>
        </div>

    </div>
    <div class="row" style="overflow-x: scroll">
        <div class="col-md-12">
            <div class="pull-left" style="margin-bottom: 10px">
                <a class="btn btn-primary btn-sm" style="font-size: 15px" href="{{route('tourPackages.create',$tourOperator->uuid)}}">Create tour Package &blacktriangleright;</a>
            </div>
            <section class="card card-primary mb-4" style="width:180%;background-color:rgba(255,255,255,0.85)">
                <div class="card-actions">
                    {{--Action Links--}}

                </div>
                @include('TourOperator.TourPackages.internationalTourPackages.nearTours.get_near_international_tours_to_be_conducted')
            </section>
        </div>
    </div>

@endsection

@push('after-scripts')
    {{ Html::script(url('vendor/sweetalert/sweetalert.min.js')) }}
@endpush
