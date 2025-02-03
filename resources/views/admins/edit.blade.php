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
<main class="form-signin w-100 m-auto">
    <a href="{{ route('admins.index') }}" class="btn btn-dark mb-4 mt-4 me-2 w-100 py-2">Terug</a>

    <form method="POST" action="{{ route('admins.update', $admin->id) }}">
        @csrf
        @method('PUT')
        <h1 class="h3 mb-3 fw-normal">Bewerk Admin</h1>

        <div class="form-floating">
            <input type="text" class="form-control" name="name" id="Name" placeholder="Naam invullen"
                value="{{ old('name', $admin->name) }}">
            <label for="floatingName">{{ __('labels.name') }}</label>
        </div>

        <div class="form-floating">
            <input type="email" class="form-control" name="email" id="Email"
                placeholder="Bijv. admin@example.com" value="{{ old('email', $admin->email) }}">
            <label for="floatingInput">{{ __('labels.email') }}</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="Password"
                placeholder="Nieuw wachtwoord (optioneel)">
            <label for="floatingPassword">{{ __('labels.password') }}</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">{{ __('labels.save') }}</button>
    </form>
</main>
