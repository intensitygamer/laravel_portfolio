<header>
    <a href="{{ route('users.home') }}" class="logo">
        <img src="{{ asset('img/dakay-logo.png') }}" />
    </a>
    <div class="system-name hidden-xs">equipment &amp; consumables monitoring system</div>
    <ul id="header-actions" class="clearfix">
        <li class="list-box hidden-xs dropdown hide">
            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-warning"></i>
            </a>
            <span class="info-label blue-bg">5</span>
            <ul class="dropdown-menu imp-notify clearfix">
                <li class="dropdown-header">You have 3 notifications</li>
                <li>
                    <div class="icon"><img src="{{ asset('img/tmp/tmp.png') }}" alt="Admin"></div>
                    <div class="details"><strong class="text-danger">Wilson</strong><p>Added 100 stock fuel</p></div>
                </li>
                <li>
                    <div class="icon"><img src="{{ asset('img/tmp/tmp.png') }}" alt="Admin"></div>
                    <div class="details"><strong class="text-success">John Smith</strong><p>Added 100 stock fuel</p></div>
                </li>
                <li>
                    <div class="icon"><img src="{{ asset('img/tmp/tmp.png') }}" alt="Admin"></div>
                    <div class="details"><strong class="text-info">Justin Mezzell</strong><p>Use 200 fuel</p></div>
                </li>
                <li>
                    <div class="icon"><img src="{{ asset('img/tmp/tmp.png') }}" alt="Admin"></div>
                    <div class="details"><strong class="text-info">Justin Mezzell</strong><p>Added 100 stock fuel</p></div>
                </li>
                <li>
                    <div class="icon"><img src="{{ asset('img/tmp/tmp.png') }}" alt="Admin"></div>
                    <div class="details"><strong class="text-info">Justin Mezzell</strong><p>Added 100 stock fuel</p></div>
                </li>
                <li class="dropdown-footer">See all the notifications</li>
            </ul>
        </li>
        <li class="list-box user-admin dropdown">
            <div class="admin-details">
                <div class="name">{{ Auth::user()->username }}</div>
                <div class="designation">{{ Auth::user()->designation }}</div>
            </div>
            <a id="drop4" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user-circle"></i>
            </a>
            <ul class="dropdown-menu sm clearfix">
                <li class="dropdown-content">
                    <a href="#"><i class="fa fa-warning"></i>Secure your password<br><span>Always update your password.</span></a>
                    <a href="{{ route('users.self.profile') }}">Edit Profile</a>
                    <a href="{{ route('users.self.change_password') }}">Change Password</a>
                    <a href="{{ route('user.logout') }}">Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</header>