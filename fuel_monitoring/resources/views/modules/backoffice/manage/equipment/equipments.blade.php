@extends('templates.dmonitoring.master')
@section('title', 'Manage Equipments')

@php
    $permission = (new \Permission);
    $dateHelper = new \App\Helpers\DateHelper;
    $numFormat = new \App\Helpers\NumberFormatHelper;
@endphp

@section('main')

<style type="text/css">

    #scroll-bar-area{

                        width: 1050px;
                        overflow-x: scroll;
                        overflow-y: hidden;

    }

    #scroll-bar{
                        
                        height: 20px;
                        width: 1750px;

    }    

    .table-responsive{
            
        width: 100%;
        overflow: scroll;
    }

</style>


    <div class="main-container-wrapper">
        @include('templates.dmonitoring.includes.page-title', ['page_title' => 'Manage Equipments'])
        <div class="main-container">

            @include('templates.dmonitoring.includes.equipment-submenu')

            <div class="row no-margin margin-bottom-20">
                <div class="col-md-12 filter-wrapper">
                    <div class="col-md-6">

                        {!! Form::open(['method'=>'get', 'class' => 'form-horizontal', 'name' => 'equipmentsfilter-form']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::bsInput('text', 'make', request('make'), 'Make', ['placeholder' => 'Enter Make']) }}
                                {{ Form::bsInput('text', 'type', request('type'), 'Type', ['placeholder' => 'Enter Type']) }}
                                {{ Form::bsInput('text', 'code', request('code'), 'Code', ['placeholder' => 'Enter Code']) }}

                            </div>
                            <div class="col-md-6 no-padding">
                                {{ Form::bsInput('text', 'model', request('model'), 'Model', ['placeholder' => 'Enter Model']) }}
                                {{ Form::bsSelect('hauling', request('hauling'), 'Hauling', ['yes'=>'Yes', 'no'=>'No'], ['placeholder' => 'All Equipment']) }}
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
                                    <button type="button" data-url="{{ url('manage/equipment') }}" data-title="Add Equipment" onclick="CreateModal(this, '#add-equipment', 'appendViewModal', { modal_size: 'md-custom' }); return false;" class="btn btn-primary-ecms"><i class="fa fa-plus-circle"></i> Add Equipment</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id = "scroll-bar-area">

                    <div id = "scroll-bar">
                        
                    </div>

            </div>
              
            <div class="table-responsive">

                <table class="table table-striped table-bordered table-hover table-ecms">
                    {{HTML::tableHeader([
                         "#",
                         "code",
                         "make",
                         "model",
                         "type",
                         "for hauling",
                         "status",

                         "location",
                         "millage",
                         "no. of hours",
                         "t. fuel consumed",
                         "t. engine Oil consumed",
                         "t. hydraulic Oil consumed",
                         "t. gear Oil consumed",
                         "t. telluse oil consumed",
                         "no. of repairs",
                         "total repair cost",

                         "action"
                     ])}}
                    <tbody>
                    @if(count($equipments) < 1)
                        <tr>
                            <td colspan="12" class="table-no-records">- No records -</td>
                        </tr>
                    @endif
                    @foreach ($equipments->items() as $key => $equipment)
                        <tr>
                            <td>{{ $equipment['id'] }}</td>
                            <td>{{ $equipment['equipment_code'] }}</td>
                            <td>{{ $equipment['equipment_make'] }}</td>
                            <td>{{ $equipment['equipment_model'] }}</td>
                            <td>{{ $equipment['equipment_type'] }}</td>
                            <td>{{ ucwords($equipment['for_hauling']) }}</td>
                            <td>{{ ucwords($equipment['status']) }}</td>

                            <td>{{ $equipment['no_of_hours'] }}</td>
                            <td>{{ $equipment['millage'] }}</td>
                            <td>{{ $equipment['no_of_hours'] }}</td>

                            <td>{{ $equipment['total_fuel_oil'] }}</td>
                            <td>{{ $equipment['total_engine_oil'] }}</td>
                            <td>{{ $equipment['total_hydraulic_oil'] }}</td>
                            <td>{{ $equipment['total_gear_oil'] }}</td>
                            <td>{{ $equipment['total_telluse_oil'] }}</td>

                            <td>{{ $equipment['no_of_repairs'] }}</td>
                            <td>{{ $numFormat->number_format_by_currency('PHP', $equipment['total_repair_cost']) }}</td>

                            <td>
                                @if($permission->can_manage_equipment_update())
                                    <button type="button" data-url="{{ url('manage/equipment/'.$equipment['id']) }}" data-title="Edit - {{ $equipment['equipment_code'] }}" onclick="CreateModal(this, '#edit-equipment', 'appendViewModal', { modal_size: 'md-custom' }); return false;" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Details</button>
                                @endif
                                @if($permission->can_manage_equipment_delete())
                                    <button type="button" data-url="{{ url('manage/equipment/'.$equipment['id'].'/destroy') }}" data-title="Delete Equipment Confirmation" data-name="{{ $equipment['equipment_code'] }}" onclick="CreateModal(this, '#delete-equipment', 'confirmModal', { mod: 'delete' }); return false;" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{  $equipments->setPath(request()->getPathInfo())->appends(\Request::all())->render() }}
        </div>
    </div>

    @push('scripts')

        <script type="text/javascript" src = "{{ asset('js/table-list-scroll.js') }}"></script>
        
    @endpush

@endsection