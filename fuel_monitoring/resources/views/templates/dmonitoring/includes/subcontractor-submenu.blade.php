<div class="sub-menu--pages">
    <ul class="nav nav-tabs">
        <li class="{{ HTML::setActive('subcontractor/work') }}">
            <a href="{{ url('subcontractor/work') }}">Work Listing</a>
        </li>
        <li class="{{ HTML::setActive('subcontractor/work/audit') }}"><a href="{{ url('subcontractor/work/audit') }}">Audit Sub Contractor</a></li>
        @if($permission->can_manage_subcontractor_list())
            <li class="{{ HTML::setActive('manage/subcontractor*') }}"><a href="{{ url('/manage/subcontractors') }}">Sub Contractor Management</a></li>
        @endif
    </ul>
</div>