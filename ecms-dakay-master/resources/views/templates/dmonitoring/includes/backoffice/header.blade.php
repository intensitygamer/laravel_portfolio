<header>
    <a href="{{ route('admin.home') }}" class="logo">
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
                    <div class="icon"><img src="{{ asset('img/tmp/user4.png') }}" alt="Admin"></div>
                    <div class="details"><strong class="text-danger">Wilson</strong><p>The best Dashboard design I have seen ever.</p></div>
                </li>
                <li>
                    <div class="icon"><img src="{{ asset('img/tmp/user6.png') }}" alt="Admin"></div>
                    <div class="details"><strong class="text-success">John Smith</strong><p>Jhonny sent you a message.</p></div>
                </li>
                <li>
                    <div class="icon"><img src="{{ asset('img/tmp/user11.png') }}" alt="Admin"></div>
                    <div class="details"><strong class="text-info">Justin Mezzell</strong><p>Stella, Added you as a Friend.</p></div>
                </li>
                <li class="dropdown-footer">See all the notifications</li>
            </ul>
        </li>
        <li class="list-box hidden-xs dropdown">
            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-archive"></i>
            </a>
            <span class="info-label red-bg">3</span>
            <ul class="dropdown-menu stats-widget clearfix">
                <li>
                    <h5 class="text-success">$37895</h5>
                    <p>Revenue <span class="text-success">+2%</span></p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            <span class="sr-only">40% Complete (success)</span>
                        </div>
                    </div>
                </li>
                <li>
                    <h5 class="text-warning">47,892</h5>
                    <p>Downloads <span class="text-warning">+39%</span></p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            <span class="sr-only">40% Complete (warning)</span>
                        </div>
                    </div>
                </li>
                <li>
                    <h5 class="text-danger">28214</h5>
                    <p>Uploads <span class="text-danger">-7%</span></p>
                    <div class="progress"><div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            <span class="sr-only">40% Complete (danger)</span>
                        </div>
                    </div>
                </li>
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
                    <a href="profile.html">Edit Profile</a>
                    <a href="forgot-pwd.html">Change Password</a>
                    <a href="styled-inputs.html">Settings</a>
                    <a href="{{ route('admin.logout') }}">Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</header>