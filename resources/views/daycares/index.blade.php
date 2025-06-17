@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4" style="margin-top:25px;">
        <h2 class="mb-0">{{ __('labels.daycares') }}</h2>
        <a href="{{ route('daycares.create') }}" class="btn btn-success">{{ __('labels.create') }}</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>{{ __('labels.name') }}</th>
                <th>{{ __('labels.street_address') }}</th>
                <th>{{ __('labels.postal_code') }}</th>
                <th>{{ __('labels.city') }}</th>
                <th>{{ __('labels.telephone') }}</th>
                <th>{{ __('labels.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daycares as $daycare)
                <tr>
                    <td>{{ $daycare->name }}</td>
                    <td>{{ $daycare->street_address }}</td>
                    <td>{{ $daycare->postal_code }}</td>
                    <td>{{ $daycare->city }}</td>
                    <td>{{ $daycare->telephone }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('daycares.edit', ['daycare' => $daycare->id]) }}" class="btn btn-dark me-2">{{ __('labels.edit') }}</a>
                            <form action="{{ route('daycares.destroy', $daycare->id) }}" method="POST"
                                onsubmit="return confirm('{{ __('labels.daycare_delete_request') }} {{ $daycare->name }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('labels.delete') }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
