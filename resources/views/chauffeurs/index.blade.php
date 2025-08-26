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
                            <button type="button" class="btn btn-primary me-2" onclick="loginAsChauffeur({{ $chauffeur->id }})">
                                {{ __('labels.login_as_chauffeur') }}
                            </button>
                            <form action="{{ route('chauffeurs.destroy', $chauffeur->id) }}" method="POST"
                                onsubmit="return confirm('{{ __('labels.chauffeur_delete_request') }} {{ $chauffeur->name }}?');">
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

    <script>
        function loginAsChauffeur(chauffeurId) {
            // Toon loading state
            const button = event.target;
            const originalText = button.innerHTML;
            button.innerHTML = '{{ __("labels.loading") }}...';
            button.disabled = true;

            // Maak AJAX request
            fetch(`/admin/chauffeurs/${chauffeurId}/login`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Open nieuw venster met login URL
                    window.open(data.login_url, '_blank', 'width=800,height=600');
                } else {
                    alert('{{ __("labels.error_occurred") }}');
                }
            })
            .catch(error => {
                alert('{{ __("labels.error_occurred") }}');
            })
            .finally(() => {
                // Herstel button state
                button.innerHTML = originalText;
                button.disabled = false;
            });
        }
    </script>
@endsection
