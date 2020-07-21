@extends('templates.dmonitoring.master')
@section('title', 'Create Users')

@php
    // refactor magic numbers
    $dateHelper = new \App\Helpers\DateHelper;
@endphp

@section('main')
    <div class="main-container-wrapper">
        @include('templates.dmonitoring.includes.page-title', ['page_title' => 'Edit User - '.$model->username])
        <div class="main-container">
            {!! Form::model($model, [ 'method' => 'POST', 'url' => ['manage/user/'.$model->username], 'class' => 'form-horizontal edit-form form' ]) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default panel-ecms">
                        <div class="panel-heading">Change Information</div>
                        <div class="panel-body">
                            {{ Form::bsInput('text', 'first_name', $model->first_name, 'First Name') }}
                            {{ Form::bsInput('text', 'last_name', $model->last_name, 'Last Name') }}
                            {{ Form::bsDatePicker('dob', $dateHelper->human_date($model->dob, true), 'Date of birth') }}
                            {{ Form::bsSelect('gender', $model->gender, 'Gender', \App\Helpers\InputHelper::user_gender()) }}
                            {{ Form::bsInput('text', 'contact_number', $model->contact_number, 'Contact Number') }}
                            {{ Form::bsInput('text', 'designation', $model->designation, 'Designation') }}
                            {{ Form::bsInput('text', 'address', $model->address, 'Address') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default panel-ecms">
                        <div class="panel-heading">Change Account Credentials</div>
                        <div class="panel-body">
                            {{ Form::bsInput('text', 'username', $model->username, 'Username',['disabled']) }}
                            {{ Form::bsInput('email', 'email', $model->email, 'Email Address') }}
                        </div>
                    </div>
                    <div class="panel panel-default panel-ecms margin-top-20">
                        <div class="panel-heading">Change Password</div>
                        <div class="panel-body">
                            {{ Form::bsInput('password', 'password', old('password'), 'Change Password') }}
                            {{ Form::bsInput('password', 'password_confirmation', old('password_confirmation'), 'Confirm Password') }}
                        </div>
                    </div>
                    <div class="panel panel-default panel-ecms margin-top-20">
                        <div class="panel-heading">Change Status or Roles</div>
                        <div class="panel-body">
                            {{ Form::bsSelect('roles', $current_role, 'Roles', $roles) }}
                            {{ Form::bsSelect('status', old('status'), 'Status', $user_status) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success text-uppercase">Edit Account <i class="fa fa-paper-plane"></i></button>
                        <a href="{{ url('manage/users') }}" class="btn btn-default text-uppercase">Cancel <i class="fa fa-close"></i></a>
                    </div>
                </div>
            </div>

            {{ Form::close() }}

            {{--@foreach (\App\Helpers\InputHelper::permission_groups() as $group => $permissions_group)--}}
                {{--<table class="table table-bordered">--}}
                    {{--<tr class="active">--}}
                        {{--<th colspan="2">{{ strtoupper($group) }}</th>--}}
                    {{--</tr>--}}
                    {{--@foreach($permissions_group as $permission)--}}
                        {{--<tr>--}}
                            {{--<td width="1%"><input id="{{ $permission['id'] }}" type="checkbox" name="permissions[{{ $permission['id'] }}]" {{ in_array($permission['id'], $permissions) ? 'checked' : '' }} /></td>--}}
                            {{--<td><label for="{{ $permission['id'] }}">{{ $permission['desc'] }}</label></td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                {{--</table>--}}
            {{--@endforeach--}}

        </div>
    </div>
@endsection

