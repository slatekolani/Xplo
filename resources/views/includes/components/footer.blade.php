@guest
    <div id="bottomNavigation">
        <h4>Find your safari fast with <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">Use Trouble Monkey</button></h4>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h4 style="text-align: center">Trouble monkey needs your travel specification to find you one..</h4>

                <form type="get" action="{{route('localTourPackage.filterLocalTourPackages')}}" style="padding: 20px 20px 20px 20px">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Destination</label>
                            <select id="attraction_selected" name="attraction_selected" class="form-control" required>
                                @forelse($touristicAttractions as $attraction)
                                    <option value="{{$attraction->id}}">{{$attraction->attraction_name}}</option>
                                @empty
                                @endforelse
                            </select>
                            {!! $errors->first('attraction_selected', '<span class="badge badge-danger">:message</span>') !!}

                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Month</label>
                            <select id="month" name="month" class="form-control" required>
                                @for ($i = 1; $i <= 12; $i++)
                                    @php
                                        $monthName = date("F", mktime(0, 0, 0, $i, 1));
                                    @endphp
                                    <option value="{{ $i }}">{{ $monthName }}</option>
                                @endfor
                            </select>
                            {!! $errors->first('month', '<span class="badge badge-danger">:message</span>') !!}

                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Quality of Safari</label>
                            <select id="safari_quality" name="safari_quality" class="form-control" required>
                                @forelse($tourTypes as $tourType)
                                    <option value="{{$tourType->id}}">{{$tourType->tour_type_name}}</option>
                                @empty
                                @endforelse
                            </select>
                            {!! $errors->first('attraction_selected', '<span class="badge badge-danger">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">What kind of tour do you prefer?</label>
                            <select id="tourPackageType" name="tourPackageType" class="form-control" required>
                                @forelse($tourPackageTypes as $tourPackageType)
                                    <option value="{{$tourPackageType->id}}">{{$tourPackageType->tour_package_type_name}}</option>
                                @empty
                                @endforelse
                            </select>
                            {!! $errors->first('tourPackageType', '<span class="badge badge-danger">:message</span>') !!}
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Which event have you targeted?</label>
                            <select id="event" name="event" class="form-control" required>
                                @forelse($events as $event)
                                    <option value="{{$event->id}}">{{$event->event_name}}</option>
                                @empty
                                @endforelse
                            </select>
                            {!! $errors->first('event', '<span class="badge badge-danger">:message</span>') !!}
                        </div>
                    </div>
                    <div style="padding: 10px 10px 10px 10px">
                        <button class="btn btn-primary btn-sm" type="submit">Check</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endguest
@auth
<div class="row content-body" >
    <div class="col-md-12">
        <footer id="footer">
            <div class="footer-copyright">
                <div class="container py-2">
                    <div class="row py-4">
                        <div class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                            <p style="color:white">© Copyright {{ \Carbon\Carbon::now()->format('Y') }}. All Rights Reserved.</p>
                        </div>
                        <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                            <p style="color: white">Developed  By <a href="https://www.eetechnologiestz.com" style="color:white" target="_blank">Expedition & Exploration Innovations</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
@endauth


<section class="call-to-action call-to-action-grey pb-4">
    <div class="container container-with-sidebar">
        <div class="row">
            <div class="col-xl-12 p-0">
                <div class="call-to-action-content ml-4 pt-xl-5 pb-4">
                    <h2 class="mb-2">Create a life time voyage memory today with <strong><a href="{{route('touristicGame.allTouristicGames')}}">Safari Board Games!</a></strong></h2>
                </div>
            </div>
{{--            <div class="col-xl-3">--}}
{{--                <div class="call-to-action-btn float-right-xl center mt-1 pt-1 mt-xl-5 pt-xl-4">--}}
{{--                    <a href="https://themeforest.net/item/porto-admin-responsive-html5-template/8539472" target="_blank" class="btn btn-primary btn-lg mb-3" style="margin-top: -50px"><i class="fas fa-cark mr-1"></i> SHOP BOARD GAMES NOW - $20</a>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</section>
