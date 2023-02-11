@extends('admin.layouts.app')
@section('title')
    {{ $category->getName() }} - @lang('app.app-name')
@endsection
@section('content')
    <div class="container-xl">
        <div class="fs-4 fw-semibold mb-3">
            <a href="{{ route('admin.seasons.index') }}" class="text-decoration-none text-black">@lang('app.seasons')</a> - {{ $category->getName() }}
        </div>
        <div class="row g-3 my-1 mb-3">
            @foreach($seasons as $season)
                    @include('admin.season.season')
            @endforeach
        </div>
        {{ $seasons->links() }}
    </div>
@endsection