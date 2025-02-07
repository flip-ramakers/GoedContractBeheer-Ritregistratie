@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4" style="margin-top:25px;">
        <h2 class="mb-0">{{ __('labels.chauffeurs') }}</h2>
        <a href="{{ route('chauffeurs.create') }}" class="btn btn-success">{{ __('labels.create') }}</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>{{ __('labels.name') }}</th>
                <th>{{ __('labels.email') }}</th>
                <th>{{ __('labels.daycares') }}</th>
                <th>{{ __('labels.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chauffeurs as $chauffeur)
                <tr>
                    <td>{{ $chauffeur->name }}</td>
                    <td>{{ $chauffeur->email }}</td>
                    <td>
                        @if ($chauffeur->daycares->isNotEmpty())
                            {{ $chauffeur->daycares->pluck('name')->implode(', ') }}
                        @else
                            <em>{{ __('labels.linked_daycares') }}</em>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('chauffeurs.edit', $chauffeur->id) }}"
                                class="btn btn-dark me-2">{{ __('labels.edit') }}</a>
                            <form action="{{ route('chauffeurs.destroy', $chauffeur->id) }}" method="POST"
                                onsubmit="return confirm('Weet je zeker dat je deze chauffeur wilt verwijderen?');">
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
