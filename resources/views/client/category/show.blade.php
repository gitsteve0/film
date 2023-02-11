@extends('client.layouts.app')
@section('title')
    {{ $category->getName() }} - @lang('app.app-name')
@endsection
@section('content')
    <div class="container-xl mt-5 pt-5">
        <div class="fs-4 fw-semibold mb-3">
            <a href="{{ route('admin.seasons.index') }}" class="text-decoration-none text-black">@lang('app.seasons')</a> - {{ $category->getName() }}
        </div>
        <div class="row g-3 mb-3">
            @foreach($seasons as $season)
                <div class="col-6 col-sm-4 col-lg-2 mb-2 p-3">
                    <a href="{{ route('season', $season->code) }}">
                        <img src="{{ asset('img/seasons/season.jpg') }}" alt="{{ $season->name }}" class="img-fluid rounded-4 p-2">
                    </a>
                </div>
            @endforeach
        </div>
        {{ $seasons->links() }}
    </div>
@endsection