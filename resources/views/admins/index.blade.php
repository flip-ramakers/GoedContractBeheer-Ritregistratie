@include('layouts.guest')

@include('layouts.header')

<body>

    <div class="d-flex justify-content-between align-items-center  mb-4" style="margin-top:25px;">
        <h2 class="mb-0">Admin Rooster</h2>
        <button type="button" class="btn btn-dark">
            <a href="{{ route('admins.create') }}" class="text-white text-decoration-none">Admin toevoegen</a>
        </button>
    </div>



    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>{{ __('labels.name') }}</th>
                <th>{{ __('labels.email') }}</th>
                <th><button></button></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admins.edit', ['admin' => $admin->id]) }}"
                                class="btn btn-warning me-2">Bewerk Admin</a>
                            <a href="{{ route('admins.destroy', ['admin' => $admin->id]) }}"
                                class="btn btn-danger">Verwijder Admin</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>
