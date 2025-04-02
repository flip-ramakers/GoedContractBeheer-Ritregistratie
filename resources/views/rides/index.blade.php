@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4" style="margin-top:25px;">
        <h2 class="mb-0">{{ __('labels.rides') }}</h2>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>{{ __('labels.rides') }}</th>
                <th>{{ __('labels.client') }}</th>
                <th>{{ __('labels.daycare') }}</th>
                <th>{{ __('labels.status') }}</th>
                <th>{{ __('labels.start_time') }}</th>
                <th>{{__('labels.end_time')}}</th>
                <th>{{ __('labels.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rides as $ride)
                <tr>
                    <td>{{ $ride->id }}</td>
                    <td>{{ $ride->client->name }}</td>
                    <td>{{ $ride->daycare->name ?? '-' }}</td>
                    <td>{{ __('labels.' . $ride->status) }}</td>
                    <td>{{ $ride->start }}</td>
                    <td>{{ $ride->end }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('rides.show', ['ride' => $ride->id]) }}" class="btn btn-dark me-2">{{ __('labels.view') }}</a>
                            <form action="{{ route('rides.destroy', $ride->id) }}" method="POST" onsubmit="return confirm('{{ __('labels.ride_delete_request') }} #{{ $ride->id }}?');">
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