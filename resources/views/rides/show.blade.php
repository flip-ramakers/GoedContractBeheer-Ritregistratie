@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('rides.index') }}" class="btn btn-outline-dark">
            {{ __('labels.back') }}
        </a>
        <h1 class="h4 text-dark mb-0">{{ __('labels.ride') }} {{ __('labels.details') }}</h1>
    </div>

    <div class="card shadow-sm border-0 bg-light">
        <div class="card-header bg-dark text-white">
            {{ __('labels.ride') }} #{{ $ride->id }}
        </div>
        <div class="card-body text-dark">
            <div class="mb-3">
                <span class="fw-semibold">{{ __('labels.client') }}:</span> {{ $ride->client->name }}
            </div>
            <div class="mb-3">
                <span class="fw-semibold">{{ __('labels.daycare') }}:</span> {{ $ride->daycare->name ?? 'Geen dagbesteding' }}
            </div>
            <div class="mb-3">
                <span class="fw-semibold">{{ __('labels.status') }}:</span> {{ __('labels.' . $ride->status) }}
            </div>
            <div class="mb-3">
                <span class="fw-semibold">{{ __('labels.remarks') }}:</span> {{ !empty($ride->remarks) ? $ride->remarks : 'Geen opmerkingen' }}
            </div>
            <div class="mb-3">
                <span class="fw-semibold">{{ __('labels.start_time') }}:</span> {{ $ride->start }}
            </div>
            <div>
                <span class="fw-semibold">{{ __('labels.end_time') }}:</span> {{ $ride->end ?? 'Not ended' }}
            </div>
        </div>
    </div>
</div>
@endsection