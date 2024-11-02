@extends('layouts.main', ['title' => __("Failed recommendation"), 'header' => __("Failed Recommendation")])

@push('after-styles')
    {{ Html::style(url('vendor/select2/css/select2.min.css')) }}
    <style>

    </style>
@endpush

@section('content')
    @guest

        <div class="card" style="padding-top: 30px">
            <div class="card-body">
                <div class="row" style="padding-top: 5px">
                    <div class="col-md-12">
                        <form class="search-bar" type="get" action="{{route('localTourPackage.search')}}" style="padding-top: 20px;position: relative">
                            <div class="input-group">
                                <div class="form-outline">
                                    <input type="search" id="form1" name="search" class="form-control"
                                           style="width: 400px;" placeholder="Search place you want to explore"/>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search" style="width: 40px"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <br>
                <div class="alert alert-danger d-flex align-items-center" role="alert" style="border-radius: 8px;">
                    <h5 class="mb-0">Whoops! We Failed recommending the package you searched:</h5>                            
                     <div class="ml-3">
                        @forelse($searchedLocalTourPackage as $localPackage)
                            <span class="badge badge-warning badge-lg">{{ $localPackage }}</span>
                        @empty
                            <span class="text-muted">No packages found.</span>
                        @endforelse
                    </div>
                </div>
                <p class="alert alert-danger d-flex align-items-center" role="alert" style="border-radius: 8px;" style="padding-left: 20px;border-left: 2px solid gold"> We are sorry, but it seems that neither the safari package you're looking for nor a tour operator operating in that attraction is available on our platform. However, we can assist you in finding a suitable tour operator. Please don't hesitate to contact us via WhatsApp or email. We highly prioritize your privacy and assure you that your contact information will not be shared with any third parties. For more details, please review our comprehensive terms and conditions, which explain how we handle your data </p>

            </div>
        </div>
    @endguest
@endsection
