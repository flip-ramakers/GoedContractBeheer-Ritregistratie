<div class="bg-dark">
    <div
        class="container d-flex flex-wrap align-items-center bg-dark  justify-content-center justify-content-lg-start header">
        <img class="mb-2" src="{{ asset('images/Goedcontractbeheer.jpg') }}" alt="" width="160">
        </a>

        <ul class="nav  ms-3 col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('chauffeurs.index') }}" class="nav-link text-white px-2">Chauffeurs</a></li>
            <li><a href="#" class="nav-link text-white px-2">Cliënten</a></li>
            <li><a href="#" class="nav-link text-white px-2">Dagbestedingen</a></li>
            <li><a href="{{ route('admins.index') }}" class="nav-link text-white px-2">Admins</a></li>
        </ul>

        <div class="text-end">
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
        
    </div>
</div>
