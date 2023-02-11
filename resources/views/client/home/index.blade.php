@extends('client.layouts.app')
@section('title')
    @lang('app.app-name')
@endsection
@section('content')
    <div class="bg-img">
        <div class="container-xxl py-4">
            <div class="py-10">
                <div class="text-white display-2 fw-semibold py-10 ps-3"><i>Sherlock Holmes</i></div>
            </div>
            <div class="row py-1">
                <div class="text-light fs-4 pb-3">Täze filmler</div>
                @foreach($seasons as $season)
                    <div class="col-6 col-sm-4 col-lg-2 mb-5">
                        <a href="{{ route('season', $season->code) }}">
                            <img src="{{ asset('img/seasons/season.jpg') }}" alt="{{ $season->name }}" class="img-fluid rounded-4 p-2">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row py-1">
                <div class="text-light fs-4 pb-2">Dowamyny seret</div>
                @foreach($seasons as $season)
                    <div class="col-6 col-sm-4 col-lg-2 mb-5">
                        <a href="{{ route('season', $season->code) }}">
                            <img src="{{ asset('img/seasons/season.jpg') }}" alt="{{ $season->name }}" class="img-fluid rounded">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row py-1">
                <div class="text-light fs-4 pb-3">Saýlananlar</div>
                @foreach($seasons as $season)
                    <div class="col-6 col-sm-4 col-lg-2 mb-5">
                        <a href="{{ route('season', $season->code) }}">
                            <img src="{{ asset('img/seasons/season.jpg') }}" alt="{{ $season->name }}" class="img-fluid rounded">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row py-1">
                <div class="text-light fs-4 pb-3">Baýrakly filmler</div>
                @foreach($seasons as $season)
                    <div class="col-6 col-sm-4 col-lg-2 mb-5">
                        <a href="{{ route('season', $season->code) }}">
                            <img src="{{ asset('img/seasons/season.jpg') }}" alt="{{ $season->name }}" class="img-fluid rounded">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row py-1">
                <div class="text-light fs-4 pb-3">Türk seriallar</div>
                @foreach($seasons as $season)
                    <div class="col-6 col-sm-4 col-lg-2 mb-5">
                        <a href="{{ route('season', $season->code) }}">
                            <img src="{{ asset('img/seasons/season.jpg') }}" alt="{{ $season->name }}" class="img-fluid rounded">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection