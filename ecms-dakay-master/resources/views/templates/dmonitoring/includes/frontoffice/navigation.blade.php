@php
    $permission = (new \Permission);
@endphp
<nav class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-navbar" aria-expanded="false"><span class="sr-only">Toggle navigation</span> <span class="fa fa-navicon"></span></button>
    </div>
    <div class="collapse navbar-collapse" id="collapse-navbar">
        <ul class="nav navbar-nav">
            <li class="{{ HTML::setActive('/').HTML::setActive('dashboard') }}">
                <a href="{{ route('users.dashboard') }}"><i class="fa fa-paper-plane hidden-xs"></i>Dashboard</a>
            </li>
            <li class="{{ HTML::setActive('stock') }}">
                <a href="{{ route('users.reports.stock.index') }}"><i class="fa fa-bar-chart hidden-xs"></i>Stock Charts</a>
            </li>
            <li class="{{ HTML::setActive('fuel') }}">
                <a href="{{ route('users.reports.fuel.index') }}"><i class="fa fa-fire hidden-xs"></i>Fuel Monitoring</a>
            </li>
            <li class="{{ HTML::setActive('lubricant') }}">
                <a href="{{ route('users.reports.lubricant.index') }}"><i class="fa fa-filter hidden-xs"></i>Lubricant Monitoring</a>
            </li>
            <li class="{{ HTML::setActive('subcontractor/work*') }} {{ HTML::setActive('manage/subcontractor*') }}">
                <a href="{{ route('users.reports.subcontractorwork.index') }}"><i class="fa fa-truck hidden-xs"></i>Sub Contractor</a>
            </li>
            @if($permission->can_manage_equipment_list())
                <li class="{{ HTML::setActive('manage/equipments*') }} {{ HTML::setActive('manage/operators*') }} {{ HTML::setActive('manage/locations*') }} {{ HTML::setActive('manage/equipment/audit/item') }}">
                    <a href="{{ route('users.manage.equipments') }}"><i class="fa fa-gears hidden-xs"></i>Equipments</a>
                </li>
            @endif

            @if($permission->can_manage_users_list())
                <li class="{{ HTML::setActive('manage/user*') }}">
                    <a href="{{ route('users.manage.users') }}"><i class="fa fa-user-circle hidden-xs"></i> User Management</a>
                </li>
            @endif

            @if($permission->can_view_managements())
                <li class="dropdown hide"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-ravelry hidden-xs"></i> Settings <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if($permission->can_manage_location_list())
                            <li><a href="{{ route('users.manage.locations') }}">Location Mangement</a></li>
                        @endif
                        @if($permission->can_manage_operator_list())
                            <li><a href="{{ route('users.manage.operators') }}">Operator Mangement</a></li>
                        @endif
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</nav>