<form action="{{ route('admin.seasons.index') }}" class="row align-items-center g-2" role="search" id="seasonFilter">
    <div class="col-auto">
        <input class="form-control form-control-sm" type="search" name="q" placeholder="{{ @trans('app.search') }}">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-dark btn-sm"><i class="bi-search"></i></button>
    </div>
    <div class="col-auto">
        <a href="{{ route('admin.seasons.index') }}" class="btn btn-sm btn-outline-danger">@lang('app.clear')</a>
    </div>
    <div class="col-auto">
        <a href="{{ route('admin.seasons.create') }}" class="btn btn-danger btn-sm">
            <i class="bi-plus-lg"></i> @lang('app.add')
        </a>
    </div>
</form>
