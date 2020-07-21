@extends('templates.dmonitoring.master')
@section('title', 'Manage Locations')

@php
    $permission = (new \Permission);
    $dateHelper = new \App\Helpers\DateHelper;
@endphp

@section('main')
    <div class="main-container-wrapper">
        @include('templates.dmonitoring.includes.page-title', ['page_title' => 'Manage Locations'])
        <div class="main-container">

            @include('templates.dmonitoring.includes.equipment-submenu')

            <div class="row no-margin margin-bottom-20">
                <div class="col-md-12 filter-wrapper">
                    <div class="col-md-10">
                        <div class="row">
                            {!! Form::open(['method'=>'get', 'class' => 'form-horizontal', 'name' => 'locationsfilter-form']) !!}
                            <div class="col-md-4">
                                {{ Form::bsInput('search', 'q', old('q'), 'Search', ['placeholder' => 'Location Name']) }}
                            </div>
                            <div class="col-md-4">
                                <a href="{{ url('manage/locations') }}" class="btn btn-warning margin-top-20">Reset</a>
                                {{ Form::submit('Filter', ['class' => 'btn btn-primary btn-filter display-block margin-top-20']) }}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-12 text-right">
                            @if($permission->can_manage_location_create())
                                <button type="button" data-url="{{ url('manage/location') }}" data-title="Add Location" onclick="CreateModal(this, '#add-location', 'appendViewModal'); return false;" class="btn btn-primary-ecms"><i class="fa fa-plus-circle"></i> Add Location</button>
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
                         "date",
                         "address",
                         "contact person",
                         "phone no",
                         "action"
                     ])}}
                    <tbody>
                    @if(count($locations) < 1)
                        <tr>
                            <td colspan="12" class="table-no-records">- No records -</td>
                        </tr>
                    @endif
                    @foreach ($locations->items() as $key => $location)
                        <tr>
                            <td>{{ $location['id']}}</td>
                            <td>{{ $location['name'] }}</td>
                            <td>{{ $dateHelper->human_date($location['location_date']) }}</td>
                            <td>{{ $location['address'] }}</td>
                            <td>{{ $location['contact_person'] }}</td>
                            <td>{{ $location['phone_no'] }}</td>
                            <td>
                            @if($permission->can_manage_location_update())
                                <button type="button" data-url="{{ url('manage/location/'.$location['id']) }}" data-title="Edit Location" onclick="CreateModal(this, '#edit-location', 'appendViewModal'); return false;" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                            @endif
                            @if($permission->can_manage_location_delete())
                                <button type="button" data-url="{{ url('manage/location/'.$location['id'].'/destroy') }}" data-title="Delete Location Confirmation" data-name="{{ $location['name'] }}" onclick="CreateModal(this, '#delete-location', 'confirmModal', { mod: 'delete' }); return false;" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{  $locations->setPath(request()->getPathInfo())->appends(\Request::all())->render() }}
        </div>
    </div>
@endsection
