<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Goed Contract Beheer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <main class="d-flex align-items-center justify-content-center vh-100 w-100 m-auto">
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <img class="mb-4" src="{{ asset('images/Goedcontractbeheer.jpg') }}" alt="" width=""
                height="77">
            <div>
                <label for="">{{ __('labels.email') }}<span
                        class="text-danger">{{ __('labels.star') }}</span></label>
                <div class="">
                    <input type="email" class="form-control mb-3 @error('email') is-invalid @enderror" name="email"
                        id="floatingInput" placeholder="{{ __('labels.voorbeeldmail') }}" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <label for="">{{ __('labels.password') }}<span
                        class="text-danger">{{ __('labels.star') }}</span></label>
                <div class="">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        id="" placeholder="{{ __('labels.password') }}">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <button class="btn btn-dark w-100 mt-3 py-2" type="submit">{{ __('labels.signin') }}</button>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
