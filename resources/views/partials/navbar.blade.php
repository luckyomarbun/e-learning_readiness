<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container">
        <a class="navbar-brand" href="/">Scholarship Acceptance Application</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "scholarship acceptance" ? 'active' : '') }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "about" ? 'active' : '') }}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "posts" ? 'active' : '') }}" href="/posts">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "categories" ? 'active' : '') }}" href="/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "test" ? 'active' : '') }}" href="/test">Test</a>
                </li>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Master
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="/candidate">
                                    <i class="bi bi-layout-text-sidebar-reverse"></i> Candidate
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/criteria">
                                    <i class="bi bi-layout-text-sidebar-reverse"></i> Criteria
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/value-weight">
                                    <i class="bi bi-layout-text-sidebar-reverse"></i> Value Weight
                                </a>
                            </li>
                            <li><hr class="dropdown-divider">
                            </li>
                            <!-- <li><a class="dropdown-item" href="#"> Logout</a></li> -->
                        </ul>
                    </li>
                </ul>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome back, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard">
                            <i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                        <li><hr class="dropdown-divider">
                        </li>
                        <li>
                           <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right"></i> Logout</button>
                           </form> 
                        </li>
                        <!-- <li><a class="dropdown-item" href="#"> Logout</a></li> -->
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "login" ? 'active' : '') }}" href="/login">
                        <i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>