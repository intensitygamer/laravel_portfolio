@extends('templates.dmonitoring.master')
@section('title', 'Create Users')

@section('main')
    <div class="main-container-wrapper">
        @include('templates.dmonitoring.includes.page-title', ['page_title' => 'Create Users'])
        <div class="main-container">

            {{ Form::open(['url' => 'manage/user', 'class'=>'user-form form form-horizontal']) }}
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default panel-ecms">
                        <div class="panel-heading">Account Information</div>
                        <div class="panel-body">
                            {{ Form::bsInput('text', 'first_name', old('first_name'), 'First Name') }}
                            {{ Form::bsInput('text', 'last_name', old('last_name'), 'Last Name') }}
                            {{ Form::bsDatePicker('dob', old('dob'), 'Date of birth') }}
                            {{ Form::bsSelect('gender', old('gender'), 'Gender', \App\Helpers\InputHelper::user_gender()) }}
                            {{ Form::bsInput('text', 'contact_number', old('contact_number'), 'Contact Number') }}
                            {{ Form::bsInput('text', 'designation', old('designation'), 'Designation') }}
                            {{ Form::bsInput('text', 'address', old('address'), 'Address') }}
                            {{ Form::bsSelect('status', old('status'), 'Status', \App\Helpers\InputHelper::user_status()) }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default panel-ecms">
                        <div class="panel-heading">Account Credentials</div>
                        <div class="panel-body">
                            {{ Form::bsInput('text', 'username', old('username'), 'Username') }}
                            {{ Form::bsInput('email', 'email', old('email'), 'Email Address') }}
                            {{ Form::bsInput('password', 'password', old('password'), 'Password') }}
                            {{ Form::bsInput('password', 'password_confirmation', old('password_confirmation'), 'Confirm Password') }}
                        </div>
                    </div>
                    <div class="panel panel-default panel-ecms margin-top-20">
                        <div class="panel-heading">Account Roles</div>
                        <div class="panel-body">
                            {{ Form::bsSelect('roles', old('roles'), 'Roles', \App\Helpers\InputHelper::user_roles()) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success text-uppercase">Submit <i class="fa fa-paper-plane"></i></button>
                        <a href="{{ url('manage/users') }}" class="btn btn-default text-uppercase">Cancel <i class="fa fa-close"></i></a>
                    </div>
                </div>
            </div>
            {{ Form::close() }}

            {{--<div class="panel panel-default panel-ecms">--}}
                {{--<div class="panel-heading">Permissions</div>--}}
                {{--<div class="panel-body">--}}
                    {{--@foreach (\App\Helpers\InputHelper::permission_groups() as $group => $permissions)--}}
                        {{--<table class="table table-bordered">--}}
                            {{--<tr class="active">--}}
                                {{--<th colspan="2">{{ strtoupper($group) }}</th>--}}
                            {{--</tr>--}}
                            {{--@foreach($permissions as $permission)--}}
                                {{--<tr>--}}
                                    {{--<td width="1%"><input id="{{ $permission['id'] }}" type="checkbox" name="permissions[{{ $permission['id'] }}]" /></td>--}}
                                    {{--<td><label for="{{ $permission['id'] }}">{{ $permission['desc'] }}</label></td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                        {{--</table>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}

        </div>
    </div>
@endsection

