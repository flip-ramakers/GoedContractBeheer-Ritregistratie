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

<main class=" w-100 m-auto">
    <div class="container justify-content-center ">
        <form method="POST" action="{{ route('daycares.store') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal"> <a href="{{ route('daycares.index') }}"
                    class="btn btn-dark mb-4 mt-4 me-2 py-2"> {{ __('labels.back') }}</a>{{ __('labels.daycares') }}
                {{ __('labels.create') }}</h1>
            <div class="mb-3">
                <label for="Name">{{ __('labels.name') }}<span
                        class="text-danger">{{ __('labels.star') }}</span></label>
                <input type="text" class="form-control w-100" name="name" id="Name"
                    placeholder="{{ __('labels.voorbeelddagbesteding') }}" required>
            </div>
            <div class="mb-3">
                <label for="street_address">{{ __('labels.street_address') }}<span
                        class="text-danger">{{ __('labels.star') }}</span></label>
                <input type="text" class="form-control w-100" name="street_address" id="street_address"
                    placeholder="{{ __('labels.voorbeeldstraat') }}" required>
            </div>
            <div class="mb-3">
                <label for="postal_code">{{ __('labels.postal_code') }}<span
                        class="text-danger">{{ __('labels.star') }}</span></label>
                <input type="text" class="form-control w-100" name="postal_code" id="postal_code"
                    placeholder="{{ __('labels.voorbeeldpostcode') }}" required>
            </div>
            <div class="mb-3">
                <label for="city">{{ __('labels.city') }}<span
                        class="text-danger">{{ __('labels.star') }}</span></label>
                <input type="text" class="form-control w-100" name="city" id="city"
                    placeholder="{{ __('labels.voorbeeldstad') }}" required>
            </div>
            <div class="mb-3">
                <label for="telephone">{{ __('labels.telephone') }}<span
                        class="text-danger">{{ __('labels.star') }}</span></label>
                <input type="text" class="form-control w-100" name="telephone" id="telephone"
                    placeholder="{{ __('labels.voorbeeldtelefoonnummer') }}" required>
            </div>
            <button class="btn btn-success mb-4 mt-4 me-2 py-2" type="submit">{{ __('labels.save') }}</button>
        </form>
    </div>
</main>
