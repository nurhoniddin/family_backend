<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/images/logo.png') }}" style="width:189px" class="logo-icon" alt="logo icon">
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header"></li>
        <li>
            <a href="{{ route('home') }}">
                <i class="zmdi zmdi-view-dashboard"></i> <span class="text-uppercase">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('category.index') }}">
                <i class="fa fa-list"></i> <span class="text-uppercase">Kategoriyalar -
                     @php
                         echo \App\Models\Category::all()->count();
                     @endphp
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('posts.index') }}">
                <i class="fa fa-list"></i> <span class="text-uppercase">Yangiliklar -
                     @php
                         echo \App\Models\Post::all()->count();
                     @endphp
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('tags.index') }}">
                <i class="fa fa-list"></i> <span class="text-uppercase">Teglar -
                     @php
                         echo \App\Models\Tag::all()->count();
                     @endphp
                </span>
            </a>
        </li>

        <li>
            <a href="{{ route('question.index') }}">
                <i class="fa fa-question"></i> <span class="text-uppercase">Savollar -
                     @php
                         echo \App\Models\Question::all()->count();
                     @endphp
                </span>
            </a>
        </li>

        <li>
            <a href="{{ route('contact.index') }}">
                <i class="fa fa-envelope "></i> <span class="text-uppercase">Murojatlar -
                     @php
                         echo \App\Models\Contact::all()->count();
                     @endphp
                </span>
            </a>
        </li>
    </ul>

</div>
<!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="javascript:void();">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">

            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                    <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle"
                                                    alt="user avatar"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item user-details">
                        <a href="javaScript:void();">
                            <div class="media">
                                <div class="avatar"><img class="align-self-start mr-3"
                                                         src="https://via.placeholder.com/110x110" alt="user avatar">
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-2 user-title">{{ Auth::user()->name ?? null }}</h6>
                                    <p class="user-subtitle">{{ Auth::user()->email ?? null }}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success bg-transparient">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
