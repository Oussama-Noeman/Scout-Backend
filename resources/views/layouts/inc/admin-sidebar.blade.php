<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{Request::is('admin/dashboard')?'active':''}}" href="{{route('dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link {{Request::is('admin/playlists')?'collapse active':'collapsed'}} {{Request::is('admin/playlists/create')?'collapse active':'collapsed'}} " href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    playlist
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{Request::is('admin/playlists')?'show':''}} {{Request::is('admin/playlists/create')?'show':''}}" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{Request::is('admin/playlists')?'active':''}}" href="{{url('admin/playlists')}}">All playlists</a>
                        <a class="nav-link {{Request::is('admin/playlists/create')?'active':''}}" href="{{url('admin/playlists/create')}}">New playlist</a>
                    </nav>
                </div>
                <a class="nav-link {{Request::is('admin/videos')?'collapse active':'collapsed'}} {{Request::is('admin/videos/create')?'collapse active':'collapsed'}} " href="#" data-bs-toggle="collapse" data-bs-target="#collapsevideos" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Video
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{Request::is('admin/videos')?'show':''}} {{Request::is('admin/videos/create')?'show':''}}" id="collapsevideos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{Request::is('admin/videos')?'active':''}}" href="{{url('admin/videos')}}">All videos</a>
                        <a class="nav-link {{Request::is('admin/videos/create')?'active':''}}" href="{{url('admin/videos/create')}}">New Video</a>
                    </nav>
                </div>
                <a class="nav-link {{Request::is('admin/books')?'collapse active':'collapsed'}} {{Request::is('admin/books/create')?'collapse active':'collapsed'}} " href="#" data-bs-toggle="collapse" data-bs-target="#collapsebooks" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Book
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{Request::is('admin/books')?'show':''}} {{Request::is('admin/books/create')?'show':''}}" id="collapsebooks" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{Request::is('admin/books')?'active':''}}" href="{{url('admin/books')}}">All books</a>
                        <a class="nav-link {{Request::is('admin/books/create')?'active':''}}" href="{{url('admin/books/create')}}">New Book</a>
                    </nav>
                </div>
                <a class="nav-link {{Request::is('admin/users')?'active':''}}" href="{{url('admin/users')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Users
                </a>
            
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>