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

        <ul class="list-inline mt-5">
            <li class="list-inline-item"><a href="{{ route('chauffeurs.index') }}"class="btn btn-dark">{{ __('labels.back') }}</a>
                <li class="list-inline-item"><h1 class="h3 mb-3 ">{{ __('labels.chauffeurs') }} {{ __('labels.edit') }}</h1>
        </ul>

        <form method="POST" action="{{ route('chauffeurs.update', $chauffeur->id) }}">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="Name">{{ __('labels.name') }}<span class="text-danger">{{__('labels.star')}}</span></label>
                <input type="text" class="form-control w-100" name="name" id="Name"
                    value="{{ old('name', $chauffeur->name) }}" placeholder="Piet de Vries" required>
            </div>
            <div class="mb-3">
                <label for="Email">{{ __('labels.email') }}<span class="text-danger">{{__('labels.star')}}</span></label>
                <input type="email" class="form-control w-100" name="email" id="Email"
                    value="{{ old('email', $chauffeur->email) }}" placeholder="{{ __('labels.email') }}" required>
            </div>

            <div class="mb-3">
                <label>{{ __('labels.daycares') }}</label>
                @foreach ($daycares as $daycare)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="daycares[]" value="{{ $daycare->id }}"
                            id="daycare-{{ $daycare->id }}"
                            {{ $chauffeur->daycares->contains($daycare->id) ? 'checked' : '' }}>
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
