@extends('layouts.main', ['title' => __("Attraction categories"), 'header' => __('Attraction categories')])
@include('includes.validate_assets')
@section('content')

    <div class="row">
        <div class="col-md-12" >
            <div class="pull-left" style="margin-bottom: 10px" >
                <a class ='btn btn-primary btn-sm'  href="{{route('touristicAttractionCategory.edit',$touristicAttractionCategory->uuid)}}">Edit information</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover table-responsive-md">
                            <tr>
                                <th>Attraction category</th>
                                <td>{{$touristicAttractionCategory->attraction_category}}</td>
                            </tr>
                            <tr>
                                <th>Attraction category description</th>
                                <td>{{$touristicAttractionCategory->attraction_category_description}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


