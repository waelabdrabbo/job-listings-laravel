<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img src="{{asset('images/logo.svg')}}" width="40px" alt="">
        </a>

        <ul class="nav nav-pills">
            @auth
            <li class="navbar-text"><span class="me-3">Welcome {{auth()->user()->name}}</span></li>
            <li class="nav-item"><a href="/listings/create" class="nav-link active" aria-current="page">Post a Job</a></li>
            <li class="nav-item"><a href="/listings/manage" class="nav-link">Manage Jobs <i class="bi bi-gear"></i></a></li>
            <form method="POST" action="/logout">
            @csrf
            <button class="btn btn-link text-decoration-none" type="submit">Logout <i class="bi bi-box-arrow-right"></i></button>
            </form>
            </li>
            @else
            <li class="nav-item"><a href="/register" class="nav-link">Register</a></li>
            <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
            @endauth
        </ul>
    </header>
</div>