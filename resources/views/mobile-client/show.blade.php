@extends('layouts.app!')

@section('content')
    <div class="container mt-5">

        {{-- <form action="{{ route('mobile-client.show', ['client' => request('client_id', $client->id)]) }}" method="GET">
        <div class="mb-3">
            <label class="form-label">{{ __('labels.client') }}</label>
            <div class="btn-group" role="group" aria-label="{{ __('labels.client') }}">
                @foreach ($clients as $c)
                    <a href="{{ route('mobile-client.show', ['client' => $c->id]) }}" class="btn btn-outline-primary {{ $c->id == request('client_id', $client->id) ? 'active' : '' }}">
                        {{ $c->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </form> --}}
        <form class="d-grid gap-2" action="{{ route('chauffeur.clienten') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-dark">{{ __('labels.back') }}</button>
        </form>


        @php
            $clientAddress = $client;
            $daycareAddress = $daycares;
            $clientFullAddress = $clientAddress
                ? urlencode("{$clientAddress->street_address}, {$clientAddress->postal_code}, {$clientAddress->city}")
                : '';
        @endphp

        <div class="mb-3">
            <label class="form-label"><strong>{{ __('labels.from') }}</strong></label>
            <p>{{ $clientAddress->name }}</p>
            <p><a href="https://www.google.com/maps/search/?api=1&query={{ $clientFullAddress }}"
                    target="_blank">{{ $clientAddress->street_address }}, {{ $clientAddress->postal_code }}
                    {{ $clientAddress->city }}</a></p>
            <p><a href="tel:{{ $clientAddress->telephone }}">{{ $clientAddress->telephone }}</a></p>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>{{ __('labels.to') }}</strong></label>

            @if ($daycares->isEmpty())
                <p>{{ __('labels.no_daycare_assigned') }}</p>
            @else
                @foreach ($daycares as $daycare)
                    <p>{{ $daycare->name }}</p>
                    <p><a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($daycare->street_address . ', ' . $daycare->postal_code . ', ' . $daycare->city) }}"
                            target="_blank">
                            {{ $daycare->street_address }}, {{ $daycare->postal_code }} {{ $daycare->city }}
                        </a></p>
                    <p><a href="tel:{{ $daycare->telephone }}">{{ $daycare->telephone }}</a></p>
                @endforeach
            @endif
        </div>

        <div class="mb-3">
            <label for="remarks" class="form-label">{{ __('labels.comments') }}</label>
            <textarea id="remarks" name="remarks" class="form-control" rows="4"></textarea>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success">{{ __('labels.steppedin') }}</button>
            <button type="button" class="btn btn-warning">{{ __('labels.notsteppedin') }}</button>
        </div>
        </form>
    </div>
@endsection
