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
    <div class="container justify-content-center">
        <a href="{{ route('admins.index') }}" class="btn btn-dark mb-4 mt-4 me-2 py-2">{{ __('labels.back') }}</a>
        <form method="POST" action="{{ route('admins.update', $admin->id) }}">
            @csrf
            @method('PUT')
            <h1 class="h3 mb-3 fw-normal">{{ __('labels.edit') }} {{ __('labels.admin') }}</h1>
            <div class="mb-3">
                <label for="floatingName">{{ __('labels.name') }}</label><span
                    class="text-danger">{{ __('labels.star') }}</span>
                <input type="text" class="form-control" name="name" id="Name" placeholder="Naam invullen"
                    value="{{ old('name', $admin->name) }}">
            </div>
            <div class="mb-3">
                <label for="floatingInput">{{ __('labels.email') }}</label><span
                    class="text-danger">{{ __('labels.star') }}</span>
                <input type="email" class="form-control w-100" name="email" id="Email"
                    placeholder="Bijv. admin@example.com" value="{{ old('email', $admin->email) }}">
            </div>
            <button class="btn btn-success mb-4 mt-4 me-2 py-2" type="submit">{{ __('labels.save') }}</button>
        </form>
    </div>
</main>
