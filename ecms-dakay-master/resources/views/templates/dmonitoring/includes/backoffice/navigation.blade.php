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
                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-paper-plane hidden-xs"></i>Dashboard</a>
            </li>
            <li class="{{ HTML::setActive('stock') }}">
                <a href="{{ route('admin.stock.index') }}"><i class="fa fa-bar-chart hidden-xs"></i>Stock Monitoring</a>
            </li>
            <li class="{{ HTML::setActive('fuel') }}">
                <a href="{{ route('admin.fuel.index') }}"><i class="fa fa-fire hidden-xs"></i>Fuel Monitoring</a>
            </li>
            <li class="{{ HTML::setActive('lubricant') }}">
                <a href="{{ route('admin.lubricant.index') }}"><i class="fa fa-filter hidden-xs"></i>Lubricant Monitoring</a>
            </li>
            <li class="{{ HTML::setActive('sub-contractor') }}">
                <a href="{{ route('admin.subcontractor.index') }}"><i class="fa fa-truck hidden-xs"></i>Sub Contractor Monitoring</a>
            </li>
            <li class="{{ HTML::setActive('equipment-analytics') }}">
                <a href="{{ route('admin.equipment-analytics.index') }}"><i class="fa fa-gears hidden-xs"></i>Equipment Analytics</a>
            </li>

            @if($permission->can_view_managements())
                <li class="dropdown {{ HTML::setActive('manage/*') }}"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-ravelry hidden-xs"></i> Managements <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        @if($permission->can_manage_users_list())
                            <li><a href="{{ route('admin.manage.users') }}">User Mangement</a></li>
                        @endif
                        @if($permission->can_manage_location_list())
                            <li><a href="{{ route('admin.manage.locations') }}">Location Mangement</a></li>
                        @endif
                        @if($permission->can_manage_operator_list())
                            <li><a href="{{ route('admin.manage.operators') }}">Operator Mangement</a></li>
                        @endif
                        @if($permission->can_manage_equipment_list())
                            <li><a href="{{ route('admin.manage.equipments') }}">Equipment Mangement</a></li>
                        @endif
                    </ul>
                </li>
            @endif

        </ul>
    </div>
</nav>