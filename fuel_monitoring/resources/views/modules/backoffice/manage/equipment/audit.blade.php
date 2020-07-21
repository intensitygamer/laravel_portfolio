@extends('templates.dmonitoring.master')
@section('title', 'Manage Equipments')

@php
    $permission = (new \Permission);
    $dateHelper = new \App\Helpers\DateHelper;
    $numFormat = new \App\Helpers\NumberFormatHelper;
    $equipment_list = \App\Helpers\InputHelper::equipment_list();
@endphp

@section('main')
    <div class="main-container-wrapper">
        @include('templates.dmonitoring.includes.page-title', ['page_title' => 'Audit Equipment'])
        <div class="main-container">

            @include('templates.dmonitoring.includes.equipment-submenu')

            <div class="row no-margin margin-bottom-20">
                <div class="col-md-12 filter-wrapper">
                    <div class="col-md-6">

                        {!! Form::open(['method'=>'get', 'class' => 'form-horizontal', 'name' => 'equipmentsfilter-form']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::bsSelect('equipment', request('equipment'), 'Equipment', $equipment_list, ['placeholder' => 'Select Equipment']) }}
                            </div>
                            <div class="col-md-6 no-padding">
                                <a href="{{ url('manage/equipment/audit/item') }}" style="margin-top:22px;" class="btn btn-warning">Reset</a>
                                {{ Form::submit('Search and Audit', ['class' => 'btn btn-primary btn-filter', 'style' => 'margin-top:22px!important;']) }}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

            @if(isset($equipment) && $equipment)
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-5">
                        <div class="box-of-photos">
                            <h2 class="photo-title">{{ $equipment['equipment_code'] }} Photos</h2>
                            @if(empty($equipment['equipment_images']))
                                <div class="no-photos">No photo uploaded</div>
                            @else
                                <ul class="row first">
                                    @foreach($equipment['equipment_images'] as $image)
                                        <li>
                                            <img alt="{{ $image['file_name'] }}"  src="{{ asset('uploads/use/'.$image['file_url']) }}">
                                            <div class="text">{{ $image['file_name'] }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="panel panel-default">
                            <div class="panel-heading"><strong>Equipment Details</strong></div>
                            <div class="panel-body">
                                <div class="row equipment-row">
                                    <div class="col-md-6 no-padding-left">

                                        {{ Form::bsInput('text', '', $equipment['equipment_code'], 'Equipment Code', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', '', $dateHelper->human_date($equipment['equipment_date']), 'Date Acquired', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', '', $equipment['equipment_description'], 'Description', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', '', $equipment['equipment_make'], 'Make', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', '', $equipment['equipment_model'], 'Model', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', '', $equipment['equipment_type'], 'Type', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', '', $equipment['capacity'], 'Capacity', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', '', $equipment['for_hauling'], 'For Hauling', ['disabled'], 'horizontal') }}

                                    </div>
                                    <div class="col-md-6 no-padding-right">

                                        {{ Form::bsInput('text', 'engine_displacement', $equipment['engine_displacement'], 'Displacement', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', 'engine_code', $equipment['engine_code'], 'Engine Code', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', 'engine_no', $equipment['engine_no'], 'Engine No.', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', 'chassis_no', $equipment['chassis_no'], 'Chassis No.', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', 'body_no', $equipment['body_no'], 'Body No.', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', 'color', $equipment['color'], 'Color', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', 'fuel', $equipment['fuel'], 'Fuel', ['disabled'], 'horizontal') }}

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading"><strong>Equipment Analytics</strong></div>
                            <div class="panel-body">
                                <div class="row equipment-row">
                                    <div class="col-md-6 no-padding-left">
                                        {{ Form::bsInput('text', '', ucwords($equipment['status']), 'Equipment Status', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', '', $equipment['latest_location'], 'Location', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', '', $equipment['millage'], 'Total Millage', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', '', $equipment['no_of_hours'], 'No. of Hours', ['disabled'], 'horizontal') }}
                                    </div>
                                    <div class="col-md-6 no-padding-right">
                                        {{ Form::bsInput('text', '', $equipment['total_fuel_oil'], 'T. Fuel', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', '', $equipment['total_engine_oil'], 'T. Engine Oil', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', '', $equipment['total_hydraulic_oil'], 'T. Hydraulic Oil', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', '', $equipment['total_gear_oil'], 'T. Gear Oil', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', '', $equipment['total_telluse_oil'], 'T. Telluse', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', 'f-bold f-red', $equipment['no_of_repairs'], 'No. of Repair', ['disabled'], 'horizontal') }}
                                        {{ Form::bsInput('text', 'f-bold f-yellow', $equipment['total_repair_cost'], 'T. Repair Cost', ['disabled'], 'horizontal' ) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                #app-vue > div.container-fluid > div > div > div.main-container > div:nth-child(3) > div > div.col-md-7 > div:nth-child(2) > div.panel-body > div > div.col-md-6.no-padding-right > div:nth-child(6) > label{
                    font-weight: bold;
                    color:#ffb400;
                }
                #app-vue > div.container-fluid > div > div > div.main-container > div:nth-child(3) > div > div.col-md-7 > div:nth-child(2) > div.panel-body > div > div.col-md-6.no-padding-right > div:nth-child(7) > label{
                        font-weight: bold;
                        color:#990000;
                }
            </style>

            <div class="row no-margin margin-bottom-20">
                <div class="col-md-12 filter-wrapper">
                    <div class="col-md-8">

                        {!! Form::open(['method'=>'get', 'class' => 'form-horizontal chart-equipment-form']) !!}
                        <div class="row">
                            <div class="col-md-8">
                                {{ Form::bsDateRangePicker(
                                   ['name' => 'date_from', 'value' => request('date_from'), 'label' => 'From Date', 'attributes' => ['id'=>'date_from'] ],
                                   ['name' => 'date_to', 'value' => request('date_to'), 'label' => 'To Date','attributes' => ['id'=>'date_to'] ]
                               ) }}
                            </div>
                            <div class="col-md-4 no-padding">
                                {{ Form::input('hidden','equipment_id', $equipment['id']) }}
                                {{ Form::submit('Submit', ['class' => 'btn btn-primary btn-filter', 'style'=>'margin-top:22px;']) }}
                                <a href="#" class="btn btn-primary btn-filter one-year-chart" style="margin-top:22px;">Show One Year</a>
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Consumption</strong></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                            <ul class="list-group chart-consumption-colors">
                                <li class="list-group-item color-fuel">Fuel Consume</li>
                                <li class="list-group-item color-engine">Engine Oil</li>
                                <li class="list-group-item color-hydraulic">Hydraulic Oil</li>
                                <li class="list-group-item color-gear">Gear Oil</li>
                                <li class="list-group-item color-telluse">Telluse Oil</li>
                            </ul>
                        </div>
                        <div class="col-md-10">
                            <canvas id="consumption-chart" style="width:100%; height:250px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="panel panel-default">
                <div class="panel-heading"><strong>Repair Details</strong></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                           <div class="repairs--text">
                               <div>No. of Repairs</div>
                               <span id="no_of_repair_count">0</span>
                            </div>
                            <div class="repairs--text">
                                <div>Repair Cost</div>
                                <span id="total_repair_cost">0</span>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <canvas id="repairs-chart" style="width:100%; height:250px;"></canvas>
                        </div>
                    </div>
                </div>
            </div> -->
            @endif

        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/gallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/chartjs.js') }}"></script>
    <script type="text/javascript">
        CodeJquery(function(){

            /**
             * loads gallery
             */
            CreateGallery('bootstrap-gallery',{ tag: 'ul.first'});

            /**
             * get data charts from filter
             */
            $('.chart-equipment-form').submit(function(e){
                e.preventDefault();

                axios.post('/manage/equipment/audit/search/chart', $(this).serialize())

                    .then(function (response) {
                        var data = response.data.data;

                        chartConsume(data);
                        chartSubcontactor(data);

                        CreateNoty({type:response.data.status, text: response.data.message})
                    })
                    .catch(function (error) {

                        CreateNoty({type:'error', text: error.response.data.message})
                    });

            });

            $('.one-year-chart').click(function(e){
                e.preventDefault();

                axios.post('/manage/equipment/audit/search/chart', { date_from: '{{ \Carbon\Carbon::now()->subYear() }}', date_to: '{{ \Carbon\Carbon::now() }}', equipment_id: '{{ (isset($equipment['id']) && $equipment['id'] ? $equipment['id'] : '') }}'})

                    .then(function (response) {
                        var data = response.data.data;

                        chartConsume(data);
                        chartSubcontactor(data);

                        CreateNoty({type:response.data.status, text: response.data.message})
                    })
                    .catch(function (error, response) {

                        CreateNoty({type:'error', text: error.response.data.message})
                    });

            });

            function chartConsume(data){
                CreateChart('multi-bar', {
                    selector: 'consumption-chart',
                    data: {
                        labels: data.engine.labels,
                        datasets: [
                            {
                                label: "Fuel",
                                backgroundColor: "#990000",
                                data: data.fuel.datasets
                            },

                            {
                                label: "Engine Oil",
                                backgroundColor: "#1e1499",
                                data: data.engine.datasets
                            },

                            {
                                label: "Hydraulic Oil",
                                backgroundColor: "#289922",
                                data: data.hydraulic.datasets
                            },

                            {
                                label: "Gear Oil",
                                backgroundColor: "#99337c",
                                data: data.gear.datasets
                            },

                            {
                                label: "Telluse Oil",
                                backgroundColor: "#389996",
                                data: data.telluse.datasets
                            },
                        ]
                    }
                });
            }

            function chartSubcontactor(data){
                $('#no_of_repair_count').html(data.subcontractorwork.total_of_number_of_repair);
                $('#total_repair_cost').html(data.subcontractorwork.total_contract_amount);

                CreateChart('line', {
                    selector: 'repairs-chart',
                    data: {
                        labels: data.subcontractorwork.labels,
                        datasets: [
                            {
                                label: "No of Repairs",
                                backgroundColor: "#990000",
                                data: data.subcontractorwork.datasets
                            }
                        ]
                    },
                    themes: {
                        background: 'rgba(255,180,0,0.5)',
                        pointBackground: '#ce9100',
                        pointHoverBorder: '#e8bb51',
                        pointHoverBackground: '#ffffff',
                    }
                });
            }
        })
    </script>
@endpush