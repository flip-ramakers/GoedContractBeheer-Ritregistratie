@extends('layouts.app')
@section('content')
<div class="container">
    <ul class="list-inline mt-5">
        <li class="list-inline-item"><a href="{{ route('rides.index') }}" class="btn btn-dark">{{ __('labels.back') }}</a>
        <li class="list-inline-item"><h1 class="h3 mb-3 ">{{ __('labels.ride') }} {{ __('labels.details') }}</h1>
    </ul>
    <div class="card">
        <div class="card-header">{{ __('labels.ride') }} #{{ $ride->id }}</div>
        <div class="card-body">
            <p><strong>{{__('labels.client')}}:</strong> {{ $ride->client->name }}</p>
            <p><strong>{{__('labels.daycare')}}:</strong> {{ $ride->daycare->name ?? 'Geen dagbesteding' }}</p>
            <p><strong>{{__('labels.status')}}:</strong> {{ __('labels.' . $ride->status) }}</p>
            <p><strong>{{__('labels.remarks')}}:</strong> {{ !empty($ride->remarks) ? $ride->remarks : 'Geen opmerkingen' }}</p>
            <p><strong>{{__('labels.start_time')}}:</strong> {{ $ride->start }}</p>
            <p><strong>{{__('labels.end_time')}}:</strong> {{ $ride->end ?? 'Not ended' }}</p>
        </div>
    </div>
</div>
@endsection