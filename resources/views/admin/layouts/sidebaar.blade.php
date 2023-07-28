<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion" style="background-color: #F88634 !important">
        <div class="sb-sidenav-menu mx-auto">
            <div class="nav">
                <div class="sb-sidenav-menu-heading text-light">NAVIGATION</div>
                <a class="nav-link active" href="{{ route('user.index') }}" >
                    <div class="sb-nav-link-icon text-light">
                        <i class="fas fa-user"></i>
                        <span class="px-1">
                            User
                        </span>
                    </div>
                </a>
                <a class="nav-link" href="{{ route('event.index') }}">
                    <div class="sb-nav-link-icon  text-light">
                        <i class="fa fa-calendar"></i>
                        <span class="px-1">
                            Events
                        </span>
                    </div>
                </a>
                <a class="nav-link" href="{{ route('event-categories.index') }}">
                    <div class="sb-nav-link-icon  text-light">
                        <i class="fas fa-bullseye"></i>
                        <span class="px-1">
                            Event Category
                        </span>
                    </div>
                </a>
                <a class="nav-link" href="{{ route('organizer.index') }}">
                    <div class="sb-nav-link-icon  text-light">
                        <i class="fas fa-palette"></i>
                        <span class="px-1">
                            Organizer
                        </span>
                    </div>
                </a>
                <a class="nav-link" href="{{ route('sponser.index') }}">
                    <div class="sb-nav-link-icon  text-light">
                        <i class="fas fa-palette"></i>
                        <span class="px-1">
                            Sponser
                        </span>
                    </div>
                </a>
                <a class="nav-link" href="{{ route('venue.index') }}">
                    <div class="sb-nav-link-icon  text-light">
                        <i class="fas fa-tools"></i>
                        <span class="px-1">
                            Venue
                        </span>
                    </div>
                </a>
                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon  text-light">
                        <i class="fas fa-folder"></i>
                        <span class="px-1">
                            Event Order Application
                        </span>
                    </div>
                </a>
                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon  text-light">
                        <i class="fas fa-book"></i>
                        <span class="px-1">
                            Tickets
                        </span>
                    </div>
                </a>
                <a class="nav-link" href="{{ route('role.index') }}">
                    <div class="sb-nav-link-icon  text-light">
                        <i class="fas fa-flag"></i>
                        <span class="px-1">
                            Role
                        </span>
                    </div>
                </a>
                <a class="nav-link" href="{{ route('banner.index') }}">
                    <div class="sb-nav-link-icon  text-light">
                        <i class="fas fa-comment"></i>
                        <span class="px-1">
                            Banner
                        </span>
                    </div>
                </a>
                <a class="nav-link" href="{{ route('countries.index') }}">
                    <div class="sb-nav-link-icon  text-light">
                        <i class="fas fa-comment"></i>
                        <span class="px-1">
                            Country
                        </span>
                    </div>
                </a>
                <a class="nav-link" href="{{ route('cities.index') }}">
                    <div class="sb-nav-link-icon  text-light">
                        <i class="fas fa-comment"></i>
                        <span class="px-1">
                            City
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </nav>
</div>
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        var currentUrl = window.location.href;
        $(".nav-link").each(function() {
            if ($(this).attr('href') == currentUrl) {
                $(".nav-link").removeClass("active");
                $(".nav-link").css("background-color", "");
                $(this).addClass("active");
                $(this).css("background-color", "white").addClass('rounded shadow ');
                $(this).find("span").css("color", "#F88634");
                $(this).find("i").css("color", "#F88634");
            } else {
                $(this).removeClass("active");
                $(this).css("background-color", "");
                $(this).find("span").css("color", "");
                $(this).find("i").css("color", "");
            }
        });
    });
</script>


