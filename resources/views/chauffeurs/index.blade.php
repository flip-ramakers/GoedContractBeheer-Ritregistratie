@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4" style="margin-top:25px;">
    <h2 class="mb-0">Chauffeurs</h2>
    <a href="{{ route('chauffeurs.create') }}" class="btn btn-success">Toevoegen</a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>{{ __('labels.name') }}</th>
            <th>{{ __('labels.email') }}</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($chauffeurs as $chauffeur)
            <tr>
                <td>{{ $chauffeur->name }}</td>
                <td>{{ $chauffeur->email }}</td>
                <td>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('chauffeurs.edit', $chauffeur->id) }}" class="btn btn-dark me-2">Bewerk</a>
                        <form action="{{ route('chauffeurs.destroy', $chauffeur->id) }}" method="POST"
                            onsubmit="return confirm('Weet je zeker dat je deze chauffeur wilt verwijderen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Verwijder</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
