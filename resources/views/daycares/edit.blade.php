@extends('layouts.app')

@section('content')


    {{-- <div class="d-flex justify-content-between align-items-center mb-4" style="margin-top:25px;"></div> --}}

    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form method="POST" action="{{ route('daycares.update', $daycare->id) }}">
        <ul class="list-group list-group-horizontal list-group-flush">
            <li class="list-group-item"><a href="{{ route('daycares.index') }}" class="btn btn-dark">{{ __('labels.back') }}</a></li>
            <li class="list-group-item"><h2 class="mb-4">{{ __('labels.edit') }} {{ __('labels.daycares') }}</h2></li>
        </ul>
        @csrf
        @method('PUT') 

        <div class="mb-3">
            <label for="name">{{ __('labels.name') }}<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" id="name"
                value="{{ old('name', $daycare->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="street_address">{{ __('labels.street_address') }}<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="street_address" id="street_address"
                value="{{ old('street_address', $daycare->street_address) }}" required>
        </div>

        <div class="mb-3">
            <label for="postal_code">{{ __('labels.postal_code') }}<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="postal_code" id="postal_code"
                value="{{ old('postal_code', $daycare->postal_code) }}" required>
        </div>

        <div class="mb-3">
            <label for="city">{{ __('labels.city') }}<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="city" id="city"
                value="{{ old('city', $daycare->city) }}" required>
        </div>

        <div class="mb-3">
            <label for="telephone">{{ __('labels.telephone') }}<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="telephone" id="telephone"
                value="{{ old('telephone', $daycare->telephone) }}" required>
        </div>

        <button type="submit" class="btn btn-success">{{ __('labels.edit') }}</button>
    </form>
@endsection
