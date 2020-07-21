@extends('templates.dmonitoring.master')
@section('title', 'Manage Sub Contractors')

@php
    $permission = (new \Permission);
    $dateHelper = new \App\Helpers\DateHelper;
@endphp

@section('main')
    <div class="main-container-wrapper">
        @include('templates.dmonitoring.includes.page-title', ['page_title' => 'Manage Sub Contractors'])
        <div class="main-container">

            @include('templates.dmonitoring.includes.subcontractor-submenu')

            <div class="row no-margin margin-bottom-20">
                <div class="col-md-12 filter-wrapper">
                    <div class="col-md-10">
                        <div class="row">
                            {!! Form::open(['method'=>'get', 'class' => 'form-horizontal', 'name' => 'subcontractorsfilter-form']) !!}
                            <div class="col-md-4">
                                {{ Form::bsInput('search', 'q', old('q'), 'Search', ['placeholder' => 'Sub Contractor Name, Address, Contact #, Website']) }}
                            </div>
                            <div class="col-md-4">
                                <a href="{{ url('manage/subcontractors') }}" class="btn btn-warning margin-top-20">Reset</a>
                                {{ Form::submit('Filter', ['class' => 'btn btn-primary btn-filter display-block margin-top-20']) }}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                @if($permission->can_manage_subcontractor_create())
                                    <button type="button" data-url="{{ url('manage/subcontractor') }}" data-title="Add Sub Contractor" onclick="CreateModal(this, '#add-subcontractor', 'appendViewModal'); return false;" class="btn btn-primary-ecms"><i class="fa fa-plus-circle"></i> Add Sub Contractor</button>
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
                         "name",
                         "address",
                         "contact #1",
                         "contact #2",
                         "website",
                         "date created / updated",
                         "action"
                     ])}}
                    <tbody>
                    @if(count($subcontractors) < 1)
                        <tr>
                            <td colspan="12" class="table-no-records">- No records -</td>
                        </tr>
                    @endif
                    @foreach ($subcontractors->items() as $key => $subcontractor)
                        <tr>
                            <td>{{ $subcontractor['id'] }}</td>
                            <td>{{ $subcontractor['name'] }}</td>
                            <td>{{ $subcontractor['address'] }}</td>
                            <td>{{ $subcontractor['contact_1'] }}</td>
                            <td>{{ $subcontractor['contact_2'] }}</td>
                            <td>{{ $subcontractor['website'] }}</td>
                            <td>{{ $dateHelper->human_date($subcontractor['created_at']) }}</td>
                            <td>
                                @if($permission->can_manage_subcontractor_update())
                                    <button type="button" data-url="{{ url('manage/subcontractor/'.$subcontractor['id']) }}" data-title="Edit Sub Contractor" onclick="CreateModal(this, '#edit-subcontractor', 'appendViewModal'); return false;" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                                @endif
                                @if($permission->can_manage_subcontractor_delete())
                                    <button type="button" data-url="{{ url('manage/subcontractor/'.$subcontractor['id']) }}" data-title="Delete Sub Contractor Confirmation" data-name="{{ $subcontractor['name'] }}" onclick="CreateModal(this, '#delete-subcontractor', 'confirmModal', { mod: 'delete' }); return false;" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{  $subcontractors->setPath(request()->getPathInfo())->appends(\Request::all())->render() }}
        </div>
    </div>
@endsection
