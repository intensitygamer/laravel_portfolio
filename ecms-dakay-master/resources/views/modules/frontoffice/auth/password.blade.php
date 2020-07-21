@extends('templates.dmonitoring.master')
@section('title', 'Change Password')

@section('main')
    <div class="main-container-wrapper">
        @include('templates.dmonitoring.includes.page-title', ['page_title' => 'Change Password'])
        <div class="main-container">
            {!! Form::model($model, [ 'method' => 'POST', 'url' => ['self/password'], 'class' => 'form-horizontal edit-form form' ]) !!}

            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default panel-ecms margin-top-20">
                        <div class="panel-heading">Change Password</div>
                        <div class="panel-body">
                            {{ Form::bsInput('password', 'old_password', old('password_old'), 'Old Password') }}
                            {{ Form::bsInput('password', 'password', old('password'), 'New Password') }}
                            {{ Form::bsInput('password', 'password_confirmation', old('password_confirmation'), 'Confirm New Password') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left">
                        <button type="submit" class="btn btn-success text-uppercase">Change Password <i class="fa fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection