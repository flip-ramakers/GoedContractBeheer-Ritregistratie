<div class="bg-dark">
    <div
        class="container d-flex flex-wrap align-items-center bg-dark  justify-content-center justify-content-lg-start header">
        <img class="mb-2" src="{{ asset('images/Goedcontractbeheer.jpg') }}" alt="" width="160">
        </a>

        <ul class="nav  ms-3 col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('chauffeurs.index') }}"
                    class="nav-link text-white px-2">{{ __('labels.chauffeurs') }}</a></li>
            <li><a href="{{ route('clients.index') }}" class="nav-link text-white px-2">{{ __('labels.clients') }}</a>
            </li>
            <li><a href="{{ route('daycares.index') }}" class="nav-link text-white px-2">{{ __('labels.daycares') }}</a>
            </li>
            <li><a href="{{ route('admins.index') }}" class="nav-link text-white px-2">{{ __('labels.admins') }}</a>
            </li>
            <li><a href="{{ route('rides.index') }}"class="nav-link text-white px-2">{{ __('labels.rides') }}</a>
            </li>
        </ul>

        <div class="text-end">
            <form action="{{ route('logoutadmin') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">{{ __('labels.signout') }}</button>
            </form>
        </div>
    </div>
</div>
