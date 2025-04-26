<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    {{-- <a href="index.html"><img src="/Admin/assets/images/logo/logo.png" alt="Logo" srcset=""></a> --}}
                    <a href="index.html"><i class="fa-solid fa-utensils me-3"></i>Restoran</a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item">
                    <a href="{{ route('dashboard') }}" class="sidebar-link nav-link {{ request()->routeIs('dashboard')? "active":"" }}">
                        <i class="bi bi-grid-fill" style="{{ request()->routeIs('dashboard')? "color:#fff":"" }}"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('index.view') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>HomePage</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-tools"></i>
                        <span>Services</span>
                    </a>
                    <ul class="submenu  {{ request()->routeIs('service.add', 'service.view', 'service.edit','service.show') ? 'd-block':'' }}">
                        <li class="submenu-item ">
                            <a href="{{ route('service.add') }}" class="nav-link {{ request()->routeIs('service.add')? "active":"" }}">Add</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('service.view') }}" class="nav-link {{ request()->routeIs('service.view', 'service.edit')? "active":"" }}">View</a>
                        </li>  
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-tags"></i>
                        <span>Tags</span>
                    </a>
                    <ul class="submenu  {{ request()->routeIs('tag.add', 'tag.view', 'tag.edit') ? 'd-block':'' }}">
                        <li class="submenu-item ">
                            <a href="{{ route('tag.add') }}" class="nav-link {{ request()->routeIs('tag.add')? "active":"" }}">Add</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('tag.view') }}" class="nav-link {{ request()->routeIs('tag.view', 'tag.edit')? "active":"" }}">View</a>
                        </li>  
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        {{-- <i class="bi bi-collection-fill"></i> --}}
                        {{-- <i class="bi bi-table"></i> --}}
                        <i class="bi bi-emoji-smile"></i>
                        <span>Food Categories</span>
                    </a>
                    <ul class="submenu  {{ request()->routeIs('category.add', 'category.view', 'category.edit') ? 'd-block':'' }}">
                        <li class="submenu-item ">
                            <a href="{{ route('category.add') }}" class="nav-link {{ request()->routeIs('category.add')? "active":"" }}">Add</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('category.view') }}" class="nav-link {{ request()->routeIs('category.view', 'category.edit')? "active":"" }}">View</a>
                        </li>  
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Food Items</span>
                    </a>
                    <ul class="submenu {{ request()->routeIs('item.add', 'item.view', 'item.edit')  ? 'd-block':''}}">
                        <li class="submenu-item ">
                            <a href="{{ route('item.add') }}" class="nav-link {{ request()->routeIs('item.add')? "active":"" }}">Add</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('item.view') }}" class="nav-link {{ request()->routeIs('item.view', 'item.edit')? "active":"" }}">View</a>
                        </li>  
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-calendar"></i>
                        <span>Bookings</span>
                    </a>
                    <ul class="submenu {{ request()->routeIs('booking.view')  ? 'd-block':''}}">
                        <li class="submenu-item ">
                            <a href="{{ route('booking.view') }}" class="nav-link {{ request()->routeIs('booking.view')? "active":"" }}">View</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-people"></i>
                        <span>Team Members</span>
                    </a>
                    <ul class="submenu {{ request()->routeIs('member.add', 'member.view', 'member.edit')  ? 'd-block':''}}">
                        <li class="submenu-item ">
                            <a href="{{ route('member.add') }}" class="nav-link {{ request()->routeIs('member.add')? "active":"" }}">Add</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('member.view') }}" class="nav-link {{ request()->routeIs('member.view', 'member.edit')? "active":"" }}">View</a>
                        </li>  
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-chat"></i>
                        <span>Testimonials</span>
                    </a>
                    <ul class="submenu {{ request()->routeIs('testimonial.add', 'testimonial.view')  ? 'd-block':''}}">
                        <li class="submenu-item ">
                            <a href="{{ route('testimonial.add') }}" class="nav-link {{ request()->routeIs('testimonial.add')? "active":"" }}">Add</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('testimonial.view') }}" class="nav-link {{ request()->routeIs('testimonial.view')? "active":"" }}">View</a>
                        </li>  
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-gear"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="submenu {{ request()->routeIs('about.index','contact.view','contact.show')  ? 'd-block':''}}">
                        <li class="submenu-item ">
                            <a href="{{ route('about.index') }}" class="nav-link {{ request()->routeIs('about.index')? "active":"" }}">
                                About
                            </a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('contact.view') }}" class="nav-link {{ request()->routeIs('contact.view','contact.show')? "active":"" }}">
                                Contact
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>