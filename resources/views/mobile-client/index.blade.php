@extends('layouts.app!')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">{{ __('labels.clients') }}</h2>
            <a href="{{ route('logout') }}" class="btn btn-danger rounded-4"
                onclick="return confirm('Weet je zeker dat je wilt uitloggen?')"> Logout</a>
        </div>

        <div class="row row-cols-2 row-cols-md-2 g-4">
            @foreach ($clients as $client)
                <div class="col col-6">
                    <form action="{{ route('chauffeur.clienten.show') }}" method="POST">
                        @csrf
                        <input type="hidden" name="client_id" value="{{ $client->id }}">
                        <div class="card shadow-sm rounded-4">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $client->name }}</h5>
                                <p class="card-text">{{ $client->street_address }}</p>
                                <p class="card-text">{{ $client->postal_code }}<br>{{ $client->city }}</p>
                                <p class="card-text">{{ $client->telephone }}</p>
                                <button type="submit" class="btn btn-primary rounded-4">Selecteer</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
