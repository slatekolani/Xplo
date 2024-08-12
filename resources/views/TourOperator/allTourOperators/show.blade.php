@extends('layouts.main', ['title' => __("All Tour Operators In Tanzania"), 'header' => __('All Tour Operators In Tanzania')])
@include('includes.validate_assets')
@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Tanzania Tour Operators</h3>
                        @forelse($tourOperators as $tourOperator)
                            <div class="card h-100 border-primary card-with-gradient">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img
                                            src="{{ asset('public/CompaniesTeamImage/' . $tourOperator->company_team_image) }}"
                                            alt="Team Image"
                                            style="width: 100%; object-fit: cover; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6); margin-top: 50px;"
                                            loading="lazy">
                                    </div>

                                    <div class="col-md-6" style="margin-top: 20px">
                                        <div style="display: flex">
                                            <img src="{{ asset('public/TourOperatorsLogos/' . $tourOperator->company_logo) }}"
                                                 alt="Company Logo"
                                                 style="height: 70px; width: 70px; border-radius:50%;object-fit: cover;" loading="lazy">
                                            <h3 style="font-family: 'Lobster', cursive; font-size: 25px;">{{$tourOperator->company_name}}</h3>
                                        </div>
                                        <p>"{{$tourOperator->about_company}}"</p>
                                        <p><b>Year established</b>: {{date('jS M Y',strtotime($tourOperator->established_date))}}</p>
                                        <p><b>Years of experience</b>: {{$tourOperator->TourCompanyYearsOfExperienceLabel}} years</p>
                                        <p><b>Total employees</b>: {{$tourOperator->total_employees}} employees</p>

                                        <div style="display: flex">

                                            <p><b>Country</b>:
                                                <a href="{{route('Tanzania.show',$nation->uuid)}}">
                                                    <img
                                                        src="{{ asset('public/nationFlags/' . $tourOperator->nation->nation_flag)}}"
                                                        alt="Tanzania flag"
                                                        style="height: 20px; width: 20px; border-radius:50%;object-fit: cover;" loading="lazy">
                                                    {{$tourOperator->nation->nation_name}} &rightsquigarrow;
                                                </a>
                                            </p>
                                        </div>
                                        <p><b>Regions of Operation</b>:
                                            @forelse($tourOperator->TourOperatorRegionsOfOperationLabel as $region)
                                                <a href="{{route('tanzaniaRegion.publicView',$region['uuid'])}}" class="region-link" data-toggle="tooltip" data-placement="top"
                                                   data-attraction-id="{{ $region['name'] }}" style="color: dodgerblue"
                                                   title="{{ $region['description'] }}">{{ $region['name'] }}</a>,
                                            @empty
                                            @endforelse
                                        </p>

                                        <p><b>Insurances</b>:
                                            @forelse($tourOperator->TourOperatorTourInsuranceTypesLabel as $insurance)
                                                <a class="region_link" data-toggle="tooltip" data-placement="top"
                                                   data-attraction-id="{{$insurance['name']}}" style="color: dodgerblue"
                                                   title="{{ $insurance['description'] }}">{{ $insurance['name'] }}</a>,
                                            @empty
                                            @endforelse
                                        </p>

                                        <p>
                                            <b>Safari preferences</b>:
                                            @forelse($tourOperator->TourOperatorSafariPreferencesLabel as $safari)

                                                <a href="{{route('touristicAttraction.show',$safari['uuid'])}}" class="safari_link" data-toggle="tooltip" data-placement="top"
                                                   data-attraction-id="{{$safari['name']}}" style="color: dodgerblue"
                                                   title="{{$safari['description']}}">{{$safari['name']}}</a>,
                                            @empty

                                            @endforelse
                                        </p>
                                        <p>
                                            <b>Time range for support</b>:
                                            {{$tourOperator->support_time_range}}
                                        </p>
                                        <div class="text-center mt-3">
                                            <a href="#" class="btn btn-primary btn-sm" onclick="openTourCompanyWebsite('{{$tourOperator->website_url}}')">
                                                Preview website <span class="ml-1">&blacktriangleright;</span>
                                            </a>
                                        </div>
                                        <div class="d-flex justify-content-center" style="padding: 10px 10px 10px 10px">
                                            <div class="text-center">
                                                <a href="{{ route('tourOperator.publicView', $tourOperator->uuid) }}" class="btn btn-primary btn-sm">Packages posted &blacktriangleright;</a>
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ route('customTourBookings.create', $tourOperator->uuid) }}" class="btn btn-primary btn-sm" style="margin-left: 10px">Request custom tour &blacktriangleright;</a>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{$tourOperator->instagram_url}}" target="_blank"><img width="30" height="30" src="https://img.icons8.com/color/48/instagram-new--v1.png" alt="instagram-new--v1"/></a>
                                            <a href="{{$tourOperator->whatsapp_url}}" target="_blank"><img width="30" height="30" src="https://img.icons8.com/color/48/whatsapp--v1.png" alt="whatsapp--v1"/></a>
                                            <a href=mailto:"{{$tourOperator->email_address}}" target="_black"> <img width="30" height="30" src="https://img.icons8.com/fluency/48/email-open.png" alt="email-open"/></a>
                                            <a href="{{$tourOperator->gps_url}}" target="_blank"><img width="30" height="30" src="https://img.icons8.com/color/48/google-maps-new.png" alt="google-maps-new"/></a>
                                            <a href="{{$tourOperator->website_url}}" target="_blank"><img width="30" height="30" src="https://img.icons8.com/fluency/48/domain.png" alt="domain"/></a>
                                            <a href=tel:"{{$tourOperator->phone_number}}"><img width="30" height="30" src="https://img.icons8.com/color/48/phone.png" alt="phone"/></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="tourCompanyWebsiteModal" tabindex="-1" role="dialog" aria-labelledby="websiteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <iframe id="websiteIframe" width="100%" height="600" frameborder="0"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No available tour operators are currently operating around the region. However, if you plan to travel to this area, we will do our best to recommend one for you. Please reach out to us via WhatsApp or email. We value your privacy and assure you that we will not share your information with any third-party software or elsewhere</p>
                        @endforelse
                    </div>
                    <div class="pagination">
                        {{$tourOperators->links()}}
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('after-scripts')
    <script>
        function openTourCompanyWebsite(url) {
            document.getElementById('websiteIframe').src = url;
            $('#tourCompanyWebsiteModal').modal('show');
        }
    </script>
@endpush



