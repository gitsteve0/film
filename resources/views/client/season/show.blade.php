@extends('client.layouts.app')
@section('title')
    @lang('app.seasons')
@endsection
@section('content')
    <div  class="container-xl py-5 mt-5 text-light">
        <div  class="d-flex mb-4">
            <div class="col-7">
                @include('client.app.video')
                <div class="py-3">
                    <div class="fw-semibold pb-3 d-flex align-items-center">
                        <i class="fs-2 pe-3">{{$season->name}}</i>
                        <div class="text-center bg-secondary col-1 fs-5 rounded-3 h-25 mt-2 mx-3">{{$season->age->name_tm}}</div>
                        <div class="text-center col-1 fs-4 h-25 mt-2 mx-4 d-flex"><i class="bi-star-fill text-warning pe-2"></i>{{$season->rating}}</div>
                        <div class="text-center col-1 fs-4 h-25 mt-2 mx-3">{{$season->year}}</div>
                    </div>
                    <div class="d-flex justify-content-between pt-4">
                        <div class="col-6 border-bottom pb-3">
                            {{$season->description}}
                        </div>
                        <div class="col-5">
                            <div class="fs-5 fw-semibold py-1">
                                <span class="text-secondary">Dili :</span> {{$season->language->name_tm}}
                            </div>
                            <div class="fs-5 fw-semibold py-1">
                                <span class="text-secondary">Žanry :</span> {{$season->genre->name_tm}}
                            </div>
                            <div class="fs-5 fw-semibold py-1">
                                <span class="text-secondary">Ýurdy :</span> {{$season->country->name_tm}}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
@endsection