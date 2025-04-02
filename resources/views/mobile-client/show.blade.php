@extends('layouts.app!')

@section('content')
    <div class="container mt-5">

        @if (!isset($selectedClient))
            <form class="d-grid gap-2" action="{{ route('chauffeur.clienten') }}" method="POST" id="clientForm">
                @csrf
                <div class="mb-3">
                    <label for="client" class="form-label">{{ __('labels.client') }}</label>
                    <select id="client" name="client_id" class="form-select" onchange="submitForm()">
                        <option value=""selected>{{ __('labels.back') }}</option>

                        <option value="{{ $client->id }}" selected>{{ $client->name }}</option>
                    </select>
                </div>
            </form>

            <script>
                function submitForm() {
                    let form = document.getElementById('clientForm');
                    form.method = 'POST';
                    form.submit();
                }
            </script>
        @else
            <p><strong></strong> {{ $selectedClient->name }}</p>
        @endif

        @php
            $clientAddress = $client;
            $daycareAddress = $daycares;
            $clientFullAddress = $clientAddress
                ? urlencode("{$clientAddress->street_address}, {$clientAddress->postal_code}, {$clientAddress->city}")
                : '';
        @endphp

        <div class="mb-3">
            <label class="form-label"><strong>{{ __('labels.from') }}</strong></label>
            {{-- <p>{{ $clientAddress->name }}</p> --}}
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

        @php
            $latestRide = \App\Models\Ride::where('client_id', $client->id)->latest()->first();
            $isSteppedIn = $latestRide && $latestRide->status === 'steppedin';
            $isNotSteppedIn = $latestRide && $latestRide->status === 'notsteppedin';
            $remarks = $latestRide && is_null($latestRide->end) ? $latestRide->remarks : '';
        @endphp

        <form action="{{ route('rides.store') }}" method="POST">
            @csrf
            <input type="hidden" name="client_id" value="{{ $client->id }}">

            @if (isset($daycare))
                <input type="hidden" name="daycare_id" value="{{ $daycare->id }}">
            @endif

            <div class="mb-3">
                <label for="remark" class="form-label">{{ __('labels.remarks') }}</label>
                <textarea id="remarks" name="remarks" class="form-control" rows="4">{{ $remarks }}</textarea>
            </div>

            <div class="d-grid gap-2">
                @if ($isSteppedIn)
                    <button type="submit" class="btn btn-danger" name="status" value="steppedout">
                        {{ __('labels.exit') }}
                    </button>
                @else
                    <button type="submit" class="btn btn-success" name="status" value="steppedin">
                        {{ __('labels.entry') }}
                    </button>
                    <button type="submit" class="btn btn-warning" name="status" value="notsteppedin">
                        {{ __('labels.notsteppedin') }}
                    </button>
                @endif
            </div>
        </form>
    </div>
@endsection
