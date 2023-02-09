@extends('admin.layouts.app')
@section('title')
    @lang('app.verifications')
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="h4 mb-0">
            <a class="nav-link link-dark" href="{{ route('admin.verifications.index') }}">
                @lang('app.verifications')
            </a>
        </div>
        <div>
            @include('admin.verification.filter')
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Phone</th>
                <th scope="col">Code</th>
                <th scope="col">Status</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>
                        <i class="bi-telephone-fill text-success"></i>
                        <a href="tel:+993{{ $obj->phone }}" class="text-decoration-none">
                            +993 {{ $obj->phone }}
                        </a>
                    </td>
                    <td>{{ $obj->code }}</td>
                    <td><span class="badge text-bg-{{ $obj->statusColor() }}">{{ $obj->status() }}</span></td>
                    <td>{{ $obj->created_at }}</td>
                    <td>{{ $obj->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection