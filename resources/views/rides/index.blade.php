@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4" style="margin-top:25px;">
        <h2 class="mb-0">{{ __('labels.rides') }}</h2>
        <form action="{{ route('admin.rides.export') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-info">{{ __('labels.export') }}</button>
        </form>
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
                    <td>
                        {{ $ride->client->name }}<br />
                        {!! nl2br(e($ride->client->address)) !!}
                    </td>
                    <td>
                        {{ $ride->daycare->name ?? '-' }}<br />
                        {!! nl2br(e($ride->daycare->address)) !!}
                    </td>
                    <td>{{ __('labels.' . $ride->status) }}</td>
                    <td>{{ $ride->start?->format('d-m-Y H:i') }}</td>
                    <td>{{ $ride->end?->format('d-m-Y H:i') }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.rides.show', ['ride' => $ride->id]) }}" class="btn btn-dark me-2">{{ __('labels.view') }}</a>
                            <form action="{{ route('admin.rides.destroy', $ride->id) }}" method="POST" onsubmit="return confirm('{{ __('labels.ride_delete_request') }} #{{ $ride->id }}?');">
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
