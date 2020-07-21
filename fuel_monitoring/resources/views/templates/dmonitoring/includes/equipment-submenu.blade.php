<div class="sub-menu--pages">
    <ul class="nav nav-tabs">
        <li class="{{ HTML::setActive('manage/equipments*') }}">
            <a href="{{ route('users.manage.equipments') }}">Equipment Listing</a>
        </li>
        <li class="{{ HTML::setActive('manage/equipment/audit/item') }}"><a href="{{ url('manage/equipment/audit/item') }}">Audit Equipment</a></li>
        @if($permission->can_manage_operator_list())
            <li class="{{ HTML::setActive('manage/operators*') }}"><a href="{{ route('users.manage.operators') }}">Operator Management</a></li>
        @endif
        @if($permission->can_manage_location_list())
            <li class="{{ HTML::setActive('manage/locations*') }}"><a href="{{ route('users.manage.locations') }}">Location Management</a></li>
        @endif

        <li class="{{ HTML::setActive('manage/project*') }}"><a href="{{ route('users.manage.projects') }}">Project Management</a></li>
    </ul>
</div>