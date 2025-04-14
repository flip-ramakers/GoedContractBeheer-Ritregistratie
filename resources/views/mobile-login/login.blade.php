{{-- @extends('layouts.app!')

<body class="d-flex align-items-center min-vh-100 bg-light">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/Goedcontractbeheer.jpg') }}" alt="Logo" class="img-fluid"
                            height="77">
                    </div>
                    @if (!session()->has('success'))
                        <form method="POST" action="{{ route('chauffeur.clienten') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('labels.email') }}<span
                                        class="text-danger">{{ __('labels.star') }}</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder="{{ __('labels.voorbeeldmail') }}"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark btn-lg ">{{ __('labels.signin') }}</button>
                            </div>
                        </form>
                    @else
                        <p>{{ __('labels.email_message') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
     --}}


@extends('layouts.app!', ['title' => 'Login'])
@section('content')
    <div class="h-screen bg-gray-50 flex items-center justify-center">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-8 space-y-4">
            @if (!session()->has('success'))
                <h1 class="text-xl font-semibold">Login</h1>
                <form action="{{ route('login') }}" method="post" class="space-y-4">
                    @csrf
                    <div class="space-y-1">
                        <label for="email" class="block">Email</label>
                        <input type="email" name="email" id="email"
                            class="block w-full border-gray-400 rounded-md px-4 py-2" />
                        @error('email')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="rounded-md px-4 py-2 bg-indigo-600 text-white">Login</button>
                </form>
            @else
                <p>Please click the link sent to your email to finish logging in.</p>
            @endif
        </div>
    </div>
@endsection


{{-- @extends('layouts.app!', ['title' => 'Home'])

@section('content')
    <div class="h-screen bg-gray-50 flex items-center justify-center">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-8 space-y-4 text-center">
            @php $user = auth()->guard('chauffeur')->user(); @endphp
            <h1 class="text-2xl font-bold">
                Welcome, {{ $user?->email ?? 'Guest' }}
            </h1>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="mt-4 rounded-md px-4 py-2 bg-red-600 text-white">Logout</button>
            </form>
        </div>
    </div>
@endsection --}}
