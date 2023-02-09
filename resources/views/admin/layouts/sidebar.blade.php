<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light border-end sidebar collapse">
    <div class="position-sticky py-2 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item ">
                <a class="nav-link link-dark" href="{{ route('admin.dashboard') }}">
                    <i class="bi-speedometer text-danger me-1"></i> @lang('app.dashboard')
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link link-dark" href="{{ route('admin.attributes.index') }}">
                    <i class="bi-palette-fill text-danger me-1"></i> @lang('app.attributes')
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link link-dark" href="{{ route('admin.actors.index') }}">
                    <i class="bi-person-circle text-danger me-1"></i> @lang('app.actors')
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link link-dark" href="{{ route('admin.categories.index') }}">
                    <i class="bi-grid-fill text-danger me-1"></i> @lang('app.categories')
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link link-dark" href="{{ route('admin.customers.index') }}">
                    <i class="bi-people-fill text-danger me-1"></i> @lang('app.customers')
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link link-dark" href="{{ route('admin.directors.index') }}">
                    <i class="bi-person-square text-danger me-1"></i> @lang('app.directors')
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link link-dark" href="{{ route('admin.seasons.index') }}">
                    <i class="bi-film text-danger me-1"></i> @lang('app.seasons')
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link link-dark" href="{{ route('admin.users.index') }}">
                    <i class="bi-people-fill text-danger me-1"></i> @lang('app.users')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-dark" href="{{ route('admin.verifications.index') }}">
                    <i class="bi-shield-fill-check text-danger me-1"></i> @lang('app.verifications')
                </a>
            </li>
        </ul>
    </div>
</nav>