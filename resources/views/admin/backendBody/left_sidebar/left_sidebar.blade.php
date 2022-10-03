<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{ route('dashboard') }}">
                <svg
                    class="brand-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="xMidYMid"
                    width="30"
                    height="33"
                    viewBox="0 0 30 33"
                >
                    <g fill="none" fill-rule="evenodd">
                        <path
                            class="logo-fill-blue"
                            fill="#7DBCFF"
                            d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                        />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg>
                <span class="brand-name">SMS</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">

                <li  class="has-sub active expand" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                       aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Brand&Category</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse show"  id="dashboard"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li  class="active" >
                                <a class="sidenav-item-link" href="{{ route('all_brands') }}">
                                    <span class="nav-text">All Brands</span>
                                </a>
                            </li>

                            <li>
                                <a class="sidenav-item-link" href="{{ route('all_category') }}">
                                    <span class="nav-text">All Category's</span>
{{--                                    <span class="badge badge-success">new</span>--}}
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ route('multi_pictures')}}">
                                    <span class="nav-text">MultiPictures</span>
                                    <span class="badge badge-success">new</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </li>


                <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages"
                       aria-expanded="false" aria-controls="pages">
                        <i class="mdi mdi-image-filter-none"></i>
                        <span class="nav-text">User Profile</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="pages"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li >
                                <a class="sidenav-item-link" href="{{ route('profile.show') }}">
                                    <span class="nav-text">Profile</span>
                                </a>
                            </li>
                            <li >
                                <a href="{{ route('user.logout') }}">Sign In</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</aside>
