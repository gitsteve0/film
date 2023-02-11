@extends('admin.layouts.app')
@section('title')
    @lang('app.seasons')
@endsection
@section('content')
    <div  class="container-xl py-4">
        <div  class="row g-4 mb-4">
            <div class="col-4">
                @include('client.app.video')
            </div>
            <div class="col-5">
                <div class="fs-4 fw-semibold">
                    <i>{{$season->name}}</i>
                </div>
                <div class="fs-5 fw-semibold">
                    <span class="text-secondary">@lang('app.language') :</span> {{$season->language->name_tm}}
                </div>
                <div class="fs-5 fw-semibold">
                    <span class="text-secondary">@lang('app.genre') :</span> {{$season->genre->name_tm}}
                </div>
                <div class="fs-5 fw-semibold">
                    <span class="text-secondary">@lang('app.country') :</span> {{$season->country->name_tm}}
                </div>
            </div>
            <div class="col">
                episodes
            </div>
        </div>
    </div>

@endsection

<div class="col-6 col-sm-4 col-lg-3">
    <a href="#" class="text-decoration-none text-dark">
        <div class="d-flex border bg-light rounded">
            <div class="col">
                <img src="{{ asset('img/seasons/season.jpg') }}" alt="{{ $season->name }}" class="img-fluid rounded">
            </div>
            <div class="col p-1 ps-2 py-2">
                <div class="fs-6 fw-semibold">
                    <i>{{$season->name}}</i> {{$season->age->name_tm}}  {{'(' . $season->year . ')'}}
                </div>
                <div class="small fw-semibold py-2">
                    <i class="bi-translate"></i>
                    {{$season->language->name_tm}}
                </div>
                <div class="text-success fw-semibold py-1">
                    <i class="bi-camera-reels"></i>
                    {{$season->episodes_count}}
                </div>
            </div>
        </div>
    </a>
</div>