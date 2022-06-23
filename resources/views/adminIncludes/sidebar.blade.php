<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar"><span
                            class="hamburger-box">                                    <span
                                class="hamburger-inner"></span>                                </span></button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav"><span class="hamburger-box">                                <span
                            class="hamburger-inner"></span>                            </span></button>
        </div>
    </div>
    <div class="app-header__menu"><span>                        <button type="button"
                                                                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">                            <span
                        class="btn-icon-wrapper">                                <i class="fa fa-ellipsis-v fa-w-6"></i>                            </span>                        </button>                    </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu</li>
                <li><a href="{{route('dashboard')}}"> <i class="metismenu-icon pe-7s-map"></i> Dashboard </a></li>
                <li><a href="{{route('countries')}}"> <i class="metismenu-icon pe-7s-map"></i> Countries </a></li>
                <li><a href="{{route('usersList')}}"> <i class="metismenu-icon pe-7s-users"></i> Users List </a></li>

                <li><a href="{{route('partnersList')}}"> <i class="metismenu-icon pe-7s-users"></i> Partners List </a>
                </li>
                <li><a href="{{ route('pendingpropertyList') }}"> <i class="metismenu-icon pe-7s-map"></i>Pending Properties</a></li>
                <li><a href="{{ route('rejectPropertyList') }}"> <i class="metismenu-icon pe-7s-map"></i>Rejected Properties</a></li>

                <li><a href="{{route('propertyList')}}"> <i class="metismenu-icon pe-7s-map"></i> Properties List </a>
                </li>
                <li><a href="{{route('site.content.create')}}"> <i class="metismenu-icon pe-7s-map"></i> Add Site
                        Content </a></li>
                <li><a href="{{ route('site.Seo.create') }}"> <i class="metismenu-icon pe-7s-map"></i> Add Site SEO </a>
                </li>
                <li><a href="{{ route('admin') }}"> <i class="metismenu-icon pe-7s-map"></i> Add Admins </a></li>
                <li><a href="{{ route('villa') }}"> <i class="metismenu-icon pe-7s-map"></i> Add Accommodations </a></li>
                <li><a href="{{ route('property.type') }}"> <i class="metismenu-icon pe-7s-map"></i> Add Accommodations Type</a></li>

            </ul>
        </div>
    </div>
</div>