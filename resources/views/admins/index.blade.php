@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center  mb-4" style="margin-top:25px;">
        <h2 class="mb-0">{{ __('labels.admins') }}</h2>
        <a href="{{ route('admins.create') }}" class="btn btn-success">Toevoegen</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>{{ __('labels.name') }}</th>
                <th>{{ __('labels.email') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admins.edit', ['admin' => $admin->id]) }}" class="btn btn-dark me-2">{{__('labels.edit')}}</a>
                            <form action="{{ route('admins.destroy', $admin->id) }}" method="POST"
                                onsubmit="return confirm('{{__('labels.admin_delete_request')}} {{ $admin->name }}');">
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
