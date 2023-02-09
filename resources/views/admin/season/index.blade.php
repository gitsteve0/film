@extends('admin.layouts.app')
@section('title')
    @lang('app.seasons')
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="h4 mb-3">
            @lang('app.seasons')
        </div>
        <div>
            @include('admin.season.filter')
        </div>
    </div>
    <div class="row g-3 mt-1">
        @foreach($seasons as $season)
            @include('admin.season.season')
        @endforeach
        {{ $seasons->links() }}
    </div>
@endsection
