@include('layouts.app')

<style>
    html,
    body {
        height: 100%;
    }

    .form-signin {
        max-width: 330px;
        padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<main class="form-signin w-100 m-auto">
    <a href="{{ route('admins.index') }}" class="btn btn-dark mb-4 mt-4 me-2 w-100 py-2">Terug</a>

    <form method="POST" action="{{ route('admins.store') }}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Maak een nieuwe Admin</h1>

        <div class="form-floating">
            <input type="text" class="form-control" name="name" id="Name" placeholder="Piet de Vries"
                required>
            <label for="Name">{{ __('labels.name') }}</label>
        </div>

        <div class="form-floating">
            <input type="email" class="form-control" name="email" id="Email"
                placeholder="{{ __('labels.email') }}" required>
            <label for="Email">{{ __('labels.email') }}</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="Password"
                placeholder="{{ __('labels.password') }}" required>
            <label for="Password">{{ __('labels.password') }}</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" name="password_confirmation" id="PasswordConfirm"
                placeholder="Bevestig wachtwoord" required>
            <label for="PasswordConfirm">Bevestig wachtwoord</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">{{ __('labels.save') }}</button>
    </form>
</main>
