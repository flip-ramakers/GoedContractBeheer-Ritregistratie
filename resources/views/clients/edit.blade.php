@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('clients.update', $client->id) }}">
        <ul class="list-inline mt-5">
            <li class="list-inline-item"><a href="{{ route('clients.index') }}" class="btn btn-dark">{{ __('labels.back') }}</a></li>
            <li class="list-inline-item">
                <h2 class="mb-4">{{ __('labels.edit') }} {{ __('labels.clients') }}</h2>
            </li>
        </ul>

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">{{ __('labels.name') }}<span class="text-danger">{{ __('labels.star') }}</span></label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $client->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="street_address">{{ __('labels.street_addres') }}<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="street_address" id="street_address" value="{{ old('street_address', $client->street_address) }}" required>
        </div>

        <div class="mb-3">
            <label for="postal_code">{{ __('labels.postal_code') }}<span class="text-danger">{{ __('labels.star') }}</span></label>
            <input type="text" class="form-control" name="postal_code" id="postal_code" value="{{ old('postal_code', $client->postal_code) }}" required>
        </div>

        <div class="mb-3">
            <label for="city">{{ __('labels.city') }}<span class="text-danger">{{ __('labels.star') }}</span></label>
            <input type="text" class="form-control" name="city" id="city" value="{{ old('city', $client->city) }}" required>
        </div>

        <div class="mb-3">
            <label for="telephone">{{ __('labels.telephone') }}<span class="text-danger">{{ __('labels.star') }}</span></label>
            <input type="text" class="form-control" name="telephone" id="telephone" value="{{ old('telephone', $client->telephone) }}" required>
        </div>

        <div class="mb-3">
            <label>{{ __('labels.daycares') }}</label>
            @foreach ($daycares as $daycare)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="daycares[]" value="{{ $daycare->id }}" id="daycare-{{ $daycare->id }}" 
                    @if(in_array($daycare->id, $client->daycares->pluck('id')->toArray())) checked @endif>
                    <label class="form-check-label" for="daycare-{{ $daycare->id }}">
                        {{ $daycare->name }} ({{ $daycare->city }})
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">{{ __('labels.edit') }}</button>
    </form>

@endsection
