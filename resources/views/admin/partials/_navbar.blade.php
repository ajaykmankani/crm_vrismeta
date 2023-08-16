<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
            <a class="navbar-brand brand-logo-mini" href="index.html">{{ env('APP_NAME') }}</a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-sort-variant"></span>
            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
            {{-- <li class="nav-item dropdown me-1">
                <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
                    id="messageDropdown" href="#" data-bs-toggle="dropdown">
                    <i class="mdi mdi-message-text mx-0"></i>
                    <span class="count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                    <a class="dropdown-item">
                        <div class="item-thumbnail">
                            <img src="{{ asset('admin/images/faces/face4.jpg') }}" alt="image" class="profile-pic">
                        </div>
                        <div class="item-content flex-grow">
                            <h6 class="ellipsis font-weight-normal">David Grey
                            </h6>
                            <p class="font-weight-light small-text text-muted mb-0">
                                The meeting is cancelled
                            </p>
                        </div>
                    </a>
                    <a class="dropdown-item">
                        <div class="item-thumbnail">
                            <img src="{{ asset('admin/images/faces/face2.jpg') }}" alt="image" class="profile-pic">
                        </div>
                        <div class="item-content flex-grow">
                            <h6 class="ellipsis font-weight-normal">Tim Cook
                            </h6>
                            <p class="font-weight-light small-text text-muted mb-0">
                                New product launch
                            </p>
                        </div>
                    </a>
                    <a class="dropdown-item">
                        <div class="item-thumbnail">
                            <img src="{{ asset('admin/images/faces/face3.jpg') }}" alt="image" class="profile-pic">
                        </div>
                        <div class="item-content flex-grow">
                            <h6 class="ellipsis font-weight-normal"> Johnson
                            </h6>
                            <p class="font-weight-light small-text text-muted mb-0">
                                Upcoming board meeting
                            </p>
                        </div>
                    </a>
                </div>
            </li> --}}
            {{-- <li class="nav-item dropdown me-4">{{ Request::getClientIp() }}</li> --}}
            <li class="nav-item dropdown me-4">
                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown"
                    id="notificationDropdown" href="#" data-bs-toggle="dropdown">

                    <i class="mdi mdi-bell mx-0"></i>

                    @if (auth()->user()->unreadNotifications->isNotEmpty())
                        <span class="count"></span>
                    @endif
                </a>

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                    @if (auth()->user()->unreadNotifications->isNotEmpty())
                        @foreach (auth()->user()->unreadNotifications as $notification)
                            <a class="dropdown-item" href="{{ $notification->markAsRead() }}">
                                <div class="item-thumbnail">
                                    <div class="item-icon bg-success">
                                        <i class="mdi mdi-information mx-0"></i>
                                    </div>
                                </div>
                                <div class="item-content">
                                    <h6 class="font-weight-normal">{{ $notification->data['action'] }}</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        {{ $notification->data['user_name'] }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="dropdown-item">
                            <div class="item-content">
                                <h6 class="font-weight-normal">No Notification</h6>
                            </div>
                        </div>
                    @endif

                </div>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    <i class="bi bi-person-fill"></i>
                    <span class="nav-profile-name">{{ ucfirst(Auth::user()->name) }}</span>
                    <span class="nav-profile-name">(@foreach (Auth::user()->getRoleNames() as $role_name)
                            {{ ucfirst($role_name) }}
                        @endforeach)</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    @can('edit.settings')
                        <a class="dropdown-item" href="{{ route('settings') }}">
                            <i class="mdi mdi-settings text-primary"></i>
                            Settings
                        </a>
                    @endcan
                    <a class="dropdown-item">
                        <i class="mdi mdi-logout text-primary"></i>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-outline-* btn-sm" value="Logout">
                        </form>
                    </a>
                </div>
            </li>
        </ul>
   <ul class="navbar-nav mr-lg-4 w-100">
    <li class="nav-item nav-search d-none d-lg-block w-100">
        <div>
            {{-- <input type="search" class="form-control" id="tableSearch" placeholder="Search now" aria-label="search" aria-describedby="search" style="background-color:#fff"> --}}
        <livewire:search-bar />
        </div>
    </li>
</ul>



        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
