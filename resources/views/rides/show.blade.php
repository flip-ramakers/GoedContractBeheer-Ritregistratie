@extends('layouts.app')
@section('content')
<div class="container">
    <ul class="list-inline mt-5">
        <li class="list-inline-item">
            <a href="{{ route('rides.index') }}" class="btn btn-dark mt-3">{{ __('labels.back') }}</a>
        </li>
        <li class="list-inline-item">
            <h1 class="mb-4">{{ __('labels.ride') }} {{ __('labels.details') }}</h1>
        </li>
    </ul>

    <div class="card">
        <div class="card-header">{{ __('labels.ride') }} #{{ $ride->id }}</div>
        <div class="card-body">
            <p><strong>Cliënt:</strong> {{ $ride->client->name }}</p>
            <p><strong>Dagbesteding:</strong> {{ $ride->daycare->name ?? 'Geen dagbesteding' }}</p>
            <p><strong>Status:</strong> {{ $ride->status }}</p>
            <p><strong>Opmerkingen:</strong> {{ !empty($ride->remarks) ? $ride->remarks : 'Geen opmerkingen' }}</p>
            <p><strong>Start Tijd:</strong> {{ $ride->start }}</p>
            <p><strong>Eind Tijd:</strong> {{ $ride->end ?? 'Not ended' }}</p>
        </div>
    </div>
</div>
@endsection