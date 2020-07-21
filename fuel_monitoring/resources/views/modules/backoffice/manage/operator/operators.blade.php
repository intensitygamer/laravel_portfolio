@extends('templates.dmonitoring.master')
@section('title', 'Manage Operators')

@php
    $permission = (new \Permission);
    $dateHelper = new \App\Helpers\DateHelper;
@endphp

@section('main')
    <div class="main-container-wrapper">
        @include('templates.dmonitoring.includes.page-title', ['page_title' => 'Manage Operators'])
        <div class="main-container">

            @include('templates.dmonitoring.includes.equipment-submenu')

            <div class="row no-margin margin-bottom-20">
                <div class="col-md-12 filter-wrapper">
                    <div class="col-md-10">
                        <div class="row">
                            {!! Form::open(['method'=>'get', 'class' => 'form-horizontal', 'name' => 'operatorsfilter-form']) !!}
                            <div class="col-md-4">
                                {{ Form::bsInput('search', 'q', old('q'), 'Search', ['placeholder' => 'Full Name, License No']) }}
                            </div>
                            <div class="col-md-4">
                                <a href="{{ url('manage/operators') }}" class="btn btn-warning margin-top-20">Reset</a>
                                {{ Form::submit('Filter', ['class' => 'btn btn-primary btn-filter display-block margin-top-20']) }}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                @if($permission->can_manage_operator_create())
                                    <button type="button" data-url="{{ url('manage/operator') }}" data-title="Add Operator" onclick="CreateModal(this, '#add-operator', 'appendViewModal'); return false;" class="btn btn-primary-ecms"><i class="fa fa-plus-circle"></i> Add Operator</button>
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
                         "operator",
                         "date",
                         "license no.",
                         "address",
                         "phone no",
                         "action"
                     ])}}
                    <tbody>
                    @if(count($operators) < 1)
                        <tr>
                            <td colspan="12" class="table-no-records">- No records -</td>
                        </tr>
                    @endif
                    @foreach ($operators->items() as $key => $operator)
                        <tr>
                            <td>{{ $operator['id'] }}</td>
                            <td>{{ $operator['name'] }}</td>
                            <td>{{ $dateHelper->human_date($operator['operator_date']) }}</td>
                            <td>{{ $operator['license_no'] }}</td>
                            <td>{{ $operator['address'] }}</td>
                            <td>{{ $operator['phone_no'] }}</td>
                            <td>
                                @if($permission->can_manage_operator_update())
                                    <button type="button" data-url="{{ url('manage/operator/'.$operator['id']) }}" data-title="Edit Operator" onclick="CreateModal(this, '#edit-operator', 'appendViewModal'); return false;" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                                @endif
                                @if($permission->can_manage_operator_delete())
                                    <button type="button" data-url="{{ url('manage/operator/'.$operator['id'].'/destroy') }}" data-title="Delete Operator Confirmation" data-name="{{ $operator['name'] }}" onclick="CreateModal(this, '#delete-operator', 'confirmModal', { mod: 'delete' }); return false;" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{  $operators->setPath(request()->getPathInfo())->appends(\Request::all())->render() }}
        </div>
    </div>
@endsection
