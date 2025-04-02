@extends('layouts.app!')

@section('content')
    <div class="container mt-5">
        <h2>{{ __('labels.clients') }}</h2>
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
