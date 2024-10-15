<style>
    .scrollable-dropdown {
        max-height: 300px;
        /* Adjust height as needed */
        overflow-y: auto;
        padding: 0;
        margin: 0;
    }

    /* Optional: Adjust the list style inside the dropdown */
    .scrollable-dropdown li {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    /* Ensure dropdown is styled properly */
    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #fff;
        padding: 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Show dropdown on hover */
    .dropdown:hover .dropdown-menu {
        display: block;
    }
</style>
<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="{{ route('news.index') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 class="sitename">{{ $title }}</h1>
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('news.index') }}" class="active">Home</a></li>
                <li><a href="{{ route('dash.about') }}">About Us</a></li>
                {{-- <li><a href="single-post.html">Single Post</a></li> --}}
                <li class="dropdown"><a href="#"><span>Categories</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul class="dropdown-menu">
                        <div class="scrollable-dropdown">
                            @if ($categories)
                                @foreach ($categories as $category)
                                    <li><a
                                            href="{{ route('news.categories.show', $category) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            @endif

                        </div>

                    </ul>
                </li>
                {{-- <li><a href="contact.html">Contact</a></li> --}}
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <div class="header-social-links">
            {{-- <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>  --}}
            <a href="mailto: info@new-news-summary.com" class="email"><i class="bi bi-envelope"></i></a>
        </div>

    </div>
</header>
