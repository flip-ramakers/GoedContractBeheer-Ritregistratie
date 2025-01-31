@include('layouts.guest')

@include('layouts.header')

<main class="form-signin w-100 m-auto">
    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <img class="mb-4" src="{{ asset('images/Goedcontractbeheer.jpg') }}" alt="" width=""
            height="77">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    </form>
</main>