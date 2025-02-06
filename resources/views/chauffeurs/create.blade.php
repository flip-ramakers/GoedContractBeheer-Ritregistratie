@include('layouts.app')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<main class="w-100 m-auto">
    <div class="container justify-content-center">
        <a href="{{ route('chauffeurs.index') }}" class="btn btn-dark mb-4 mt-4 me-2 py-2">{{ __('labels.back') }}</a>
        <form method="POST" action="{{ route('chauffeurs.store') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">{{ __('labels.chauffeurs') }} {{ __('labels.create') }}</h1>

            <div class="mb-3">
                <label for="Name">{{ __('labels.name') }}<span class="text-danger">*</span></label>
                <input type="text" class="form-control w-100" name="name" id="Name" placeholder="Piet de Vries" required>
            </div>

            <div class="mb-3">
                <label for="Email">{{ __('labels.email') }}<span class="text-danger">*</span></label>
                <input type="email" class="form-control w-100" name="email" id="Email" placeholder="{{ __('labels.email') }}" required>
            </div>

            <div class="mb-3">
                <label>{{ __('labels.daycares') }}</label>
                @foreach ($daycares as $daycare)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="daycares[]" value="{{ $daycare->id }}" id="daycare-{{ $daycare->id }}">
                        <label class="form-check-label" for="daycare-{{ $daycare->id }}">
                            {{ $daycare->name }} ({{ $daycare->city }})
                        </label>
                    </div>
                @endforeach
            </div>

            <button class="btn btn-success mb-4 mt-4 me-2 py-2" type="submit">{{ __('labels.save') }}</button>
        </form>
    </div>
</main>
