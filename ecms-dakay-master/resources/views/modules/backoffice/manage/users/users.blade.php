@extends('templates.dmonitoring.master')
@section('title', 'Manage Users')

@php
    // refactor magic numbers
    $permission = (new \Permission);
    $roles = \App\Helpers\InputHelper::user_roles_id_key();
    $status = \App\Helpers\InputHelper::user_status();
@endphp

@section('main')
    <div class="main-container-wrapper">
       @include('templates.dmonitoring.includes.page-title', ['page_title' => 'Manage Users'])
        <div class="main-container">

            <div class="row no-margin margin-bottom-20">
                <div class="col-md-12 filter-wrapper">
                    <div class="col-md-10">
                        <div class="row">
                            {!! Form::open(['method'=>'get', 'class' => 'form-horizontal', 'name' => 'userfilter-form']) !!}
                                <div class="col-md-4">
                                    {{ Form::bsInput('search', 'q', old('q'), 'Search', ['placeholder' => 'Name, Email, Username']) }}
                                    {{ Form::bsSelect('role', old('role'), 'Roles', $roles, ['placeholder' => 'All roles']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::bsSelect('status', old('status'), 'Status', $status, ['placeholder' => 'All status']) }}
                                    <a href="{{ url('manage/users') }}" class="btn btn-warning margin-top-20">Reset</a>
                                    {{ Form::submit('Filter', ['class' => 'btn btn-primary btn-filter display-block margin-top-20']) }}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                @if($permission->can_manage_users_create())
                                    <a href="{{ url('manage/user') }}" class="btn btn-primary-ecms"><i class="fa fa-plus-circle"></i> Create User</a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-ecms">
                    {{HTML::tableHeader([
                         "#",
                         "full name",
                         "username",
                         "email",
                         "contact",
                         "roles",
                         "created date",
                         "last login",
                         "status",
                         "action"
                     ])}}
                    <tbody>
                    @if(count($users) < 1)
                        <tr>
                            <td colspan="12" class="table-no-records">- No records -</td>
                        </tr>
                    @endif
                    @foreach ($users->items() as $key => $user)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['username'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['contact_number'] }}</td>
                            <td>{{ implode(', ', $user['roles']) }}</td>
                            <td>{{ $user['created_at'] }}</td>
                            <td>{{ $user['last_login'] }}</td>
                            <td>{{ $user['status_text'] }}</td>
                            <td>
                                @if($permission->can_manage_users_update())
                                    <a class="btn-primary btn" href="{{ url('manage/user/'.$user['username']) }}"><i class="fa fa-edit"></i>  Edit</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{  $users->setPath(request()->getPathInfo())->appends(\Request::all())->render() }}
        </div>
    </div>
@endsection
