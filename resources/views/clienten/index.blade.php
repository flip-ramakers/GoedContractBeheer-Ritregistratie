@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center  mb-4" style="margin-top:25px;">
        <h2 class="mb-0">{{ __('labels.clienten') }}</h2>
        <a href="{{ route('clienten.create') }}" class="btn btn-success">{{ __('labels.create') }}</a>
    </div>
@endsection
