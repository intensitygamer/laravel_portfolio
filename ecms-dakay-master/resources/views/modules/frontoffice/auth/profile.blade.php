@extends('templates.dmonitoring.master')
@section('title', 'My Profile Detais')

@php
    // refactor magic numbers
    $dateHelper = new \App\Helpers\DateHelper;
@endphp

@section('main')
    <div class="main-container-wrapper">
        @include('templates.dmonitoring.includes.page-title', ['page_title' => 'My Profile'])
        <div class="main-container">
            {!! Form::model($model, [ 'method' => 'POST', 'url' => ['self/profile'], 'class' => 'form-horizontal edit-form form' ]) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default panel-ecms">
                        <div class="panel-heading">Profile Details</div>
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
                        <div class="panel-heading">Account Credentials</div>
                        <div class="panel-body">
                            {{ Form::bsInput('text', 'username', $model->username, 'Username', ['disabled']) }}
                            {{ Form::bsInput('email', 'email', $model->email, 'Email Address') }}
                        </div>
                    </div>
                    <div class="panel panel-default panel-ecms margin-top-20">
                        <div class="panel-heading">Account Status</div>
                        <div class="panel-body">
                            {{ Form::bsInput('text', 'role', $view['current_role'], 'Current Role', ['disabled']) }}
                            {{ Form::bsInput('text', 'status', $view['status'], 'Status', ['disabled']) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left">
                        <button type="submit" class="btn btn-success text-uppercase">Update Profile <i class="fa fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>

            {{ Form::close() }}

        </div>
    </div>
@endsection