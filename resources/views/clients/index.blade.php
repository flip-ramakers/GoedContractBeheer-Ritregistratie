@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4" style="margin-top:25px;">
        <h2 class="mb-0">{{ __('labels.clients') }}</h2>
        <a href="{{ route('clients.create') }}" class="btn btn-success">{{ __('labels.create') }}</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>{{ __('labels.name') }}</th>
                <th>{{ __('labels.street_addres') }}</th>
                <th>{{ __('labels.postal_code') }}</th>
                <th>{{ __('labels.city') }}</th>
                <th>{{ __('labels.telephone') }}</th>
                <th>{{ __('labels.daycares') }}</th>
                <th>{{ __('labels.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->street_address }}</td>
                    <td>{{ $client->postal_code }}</td>
                    <td>{{ $client->city }}</td>
                    <td>{{ $client->telephone }}</td>
                    <td>
                        @foreach ($client->daycares as $daycare)
                        <span>{{ $daycare->name }} ({{ $daycare->city }})</span><br>
                        @endforeach
                    </td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('clients.edit', ['client' => $client->id]) }}" class="btn btn-dark me-2">{{ __('labels.edit') }}</a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
                                  onsubmit="return confirm('{{ __('labels.client_delete_request') }} {{ $client->name }}?');">
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
