<a href="" class="navbar-brand p-0">
    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
    <!-- <img src="img/logo.png" alt="Logo"> -->
</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="fa fa-bars"></span>
</button>
<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto py-0 pe-4">
        <a href="{{ route('index.view') }}" class="nav-item nav-link {{ request()->routeIs('index.view') ? 'active':''  }}">Home</a>
        <a href="{{ route('index.about') }}" class="nav-item nav-link {{ request()->routeIs('index.about') ? 'active':''  }}">About</a>
        <a href="{{ route('index.service') }}" class="nav-item nav-link {{ request()->routeIs('index.service') ? 'active':''  }}">Service</a>
        <a href="{{ route('index.menu') }}" class="nav-item nav-link {{ request()->routeIs('index.menu') ? 'active':''  }}">Menu</a>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('index.booking','index.team','index.testimonials' ) ? 'active':''  }}"
            data-bs-toggle="dropdown">Pages</a>
            <div class="dropdown-menu m-0">
                <a href="{{ route('index.booking') }}" class="dropdown-item {{ request()->routeIs('index.booking') ? 'active':''  }}">Booking</a>
                <a href="{{ route('index.team') }}" class="dropdown-item {{ request()->routeIs('index.team') ? 'active':''  }}">Our Team</a>
                <a href="{{ route('index.testimonials') }}" class="dropdown-item {{ request()->routeIs('index.testimonials') ? 'active':''  }}">Testimonial</a>
            </div>
        </div>
        <a href="{{ route('index.contact') }}" class="nav-item nav-link {{ request()->routeIs('index.contact') ? 'active':''  }}">Contact</a>
    </div>
    <a href="{{ route('index.booking') }}" class="btn btn-primary py-2 px-4">Book A Table</a>
</div>