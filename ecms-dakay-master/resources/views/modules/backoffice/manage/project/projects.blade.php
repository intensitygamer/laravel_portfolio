@extends('templates.dmonitoring.master')
@section('title', 'Manage Projects')

@php
    $permission = (new \Permission);
    $dateHelper = new \App\Helpers\DateHelper;
    $numFormat = new \App\Helpers\NumberFormatHelper;
    $location_list = \App\Helpers\InputHelper::location_list();
@endphp

@section('main')
    <div class="main-container-wrapper">
        @include('templates.dmonitoring.includes.page-title', ['page_title' => 'Manage Projects'])
        <div class="main-container">

            @include('templates.dmonitoring.includes.equipment-submenu')

            <div class="row no-margin margin-bottom-20">
                <div class="col-md-12 filter-wrapper">
                    <div class="col-md-6">

                        {!! Form::open(['method'=>'get', 'class' => 'form-horizontal', 'name' => 'equipmentsfilter-form']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::bsInput('text', 'name', request('name'), 'Project', ['placeholder' => 'Project Name']) }}
                               <!--  {{ Form::bsInput('text', 'type', request('type'), 'Type', ['placeholder' => 'Enter Type']) }}
                                {{ Form::bsInput('text', 'code', request('code'), 'Code', ['placeholder' => 'Enter Code']) }} -->

                            </div>
                            <div class="col-md-6 no-padding">
                                <!-- {{ Form::bsInput('text', 'model', request('model'), 'Model', ['placeholder' => 'Enter Model']) }}
                                {{ Form::bsSelect('hauling', request('hauling'), 'Hauling', ['yes'=>'Yes', 'no'=>'No'], ['placeholder' => 'All Equipment']) }} -->
                                {{ Form::bsSelect('location', request('location'), 'Location', $location_list, ['placeholder' => 'Select Location',  'class'=> 'form-control location-hidden-filter' ] ) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('manage/equipments') }}" class="btn btn-warning margin-bottom-10">Reset</a>
                                {{ Form::submit('Filter', ['class' => 'btn btn-primary btn-filter margin-bottom-10']) }}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                @if($permission->can_manage_equipment_create())
                                    <button type="button" data-url="{{ url('manage/project') }}" data-title="Add Project" onclick="CreateModal(this, '#add-project', 'appendViewModal', { modal_size: 'md-custom' }); return false;" class="btn btn-primary-ecms"><i class="fa fa-plus-circle"></i> Add Project</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-ecms">
                    {{HTML::tableHeader([
                         
                         "Name",
                         "Location",
                         "Action"
                     ])}}
                    <tbody>
                    @if(count($projects) < 1)
                        <tr>
                            <td colspan="12" class="table-no-records">- No records -</td>
                        </tr>
                    @endif
                    @foreach ($projects->items() as $key => $project)
                        <tr>
                            <!-- <td>{{ $project['id'] }}</td> -->
                            <td>{{ $project['name'] }}</td>
                            <td>{{ $project['location']['name'] }}</td>
                        

                            <td>
                                @if($permission->can_manage_equipment_update())
                                    <button type="button" data-url="{{ url('manage/project/'.$project['id']) }}" data-title="Edit - {{ $project['id'] }}" onclick="CreateModal(this, '#edit-equipment', 'appendViewModal', { modal_size: 'md-custom' }); return false;" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Details</button>
                                @endif


                                @if($permission->can_manage_equipment_delete())
                                    <button type="button" data-url="{{ url('manage/project/'.$project['id'].'/destroy') }}" data-title="Delete Equipment Confirmation" onclick="CreateModal(this, '#delete-equipment', 'confirmModal', { mod: 'delete' }); return false;" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{  $projects->setPath(request()->getPathInfo())->appends(\Request::all())->render() }}
        </div>
    </div>
@endsection