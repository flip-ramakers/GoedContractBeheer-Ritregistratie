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
        
        <form method="POST" action="{{ route('admins.store') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal"> <a href="{{ route('admins.index') }}" class="btn btn-dark mb-4 mt-4 me-2 py-2"> {{ __('labels.back') }}</a>{{ __('labels.admin') }} {{ __('labels.create') }}</h1>
            <div class="mb-3">
                <label for="Name">{{ __('labels.name') }}<span
                        class="text-danger">{{ __('labels.star') }}</span></label>
                <input type="text" class="form-control w-100" name="name" id="Name"
                    placeholder="Piet de Vries" required>
            </div>
            <div class="mb-3">
                <label for="Email">{{ __('labels.email') }}<span
                        class="text-danger">{{ __('labels.star') }}</span></label>
                <input type="email" class="form-control w-100" name="email" id="Email"
                    placeholder="{{ __('labels.email') }}" required>
            </div>
            <div class="mb-3">
                <label for="Password">{{ __('labels.password') }}<span
                        class="text-danger">{{ __('labels.star') }}</span></label>
                <input type="password" class="form-control w-100" name="password" id="Password"
                    placeholder="{{ __('labels.password') }}" required>
            </div>
            <button class="btn btn-success mb-4 mt-4 me-2 py-2" type="submit">{{ __('labels.save') }}</button>
        </form>
    </div>
</main>
