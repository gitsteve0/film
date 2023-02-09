<form action="{{ route('admin.customers.index') }}" class="row align-items-center g-2" role="search">
    <div class="col">
        <input class="form-control form-control-sm" type="search" name="q" placeholder="Alex @6123..">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-dark btn-sm"><i class="bi-search"></i></button>
    </div>
</form>