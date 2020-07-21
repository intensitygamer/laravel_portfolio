@extends('templates.dmonitoring.master')
@section('title', 'Lubricant Monitoring')

@php
    // refactor magic numbers
    $permission = (new \Permission);
    $dateHelper = new \App\Helpers\DateHelper;
    $monitorHelper = new \App\Helpers\MonitorHelper;
    $equipment_list = \App\Helpers\InputHelper::equipment_list();
    $location_list = \App\Helpers\InputHelper::location_list();
    $type_of_oil_list = \App\Helpers\InputHelper::lubricant_type_of_oil_list();

    $total_engine_oil_stock = 0;
    $total_hydraulic_oil_stock = 0;
    $total_gear_oil_stock = 0;
    $total_telluse_oil_stock = 0;
    $total_engine_oil_use = 0;
    $total_hydraulic_oil_use = 0;
    $total_gear_oil_use = 0;
    $total_telluse_oil_use = 0;
@endphp

@section('main')
    <div class="main-container-wrapper">
        @include('templates.dmonitoring.includes.page-title', ['page_title' => 'Lubricant Monitoring'])
        <div class="main-container">
            <div class="row no-margin margin-bottom-20">
                <div class="col-md-12 filter-wrapper">
                    <div class="col-md-6">
                        {!! Form::open(['method'=>'get', 'class' => 'form-horizontal', 'name' => 'lubricantfilter-form']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::bsInput('text', 'transaction', request('transaction'), 'Transaction', ['placeholder' => 'Transaction ID']) }}
                                {{ Form::bsSelect('location', request('location'), 'Location', $location_list, ['placeholder' => 'All Location']) }}
                                {{ Form::bsSelect('oil', request('oil'), 'Type of Oil', $type_of_oil_list, ['placeholder' => 'All Oil']) }}
                            </div>
                            <div class="col-md-6 no-padding">
                                {{ Form::bsDateRangePicker(
                                   ['name' => 'date_from', 'value' => request('date_from'), 'label' => 'From Date', 'attributes' => ['id'=>'date_from'] ],
                                   ['name' => 'date_to', 'value' => request('date_to'), 'label' => 'To Date','attributes' => ['id'=>'date_to'] ]
                               ) }}
                                {{ Form::bsSelect('equipment', request('equipment'), 'Equipment', $equipment_list, ['placeholder' => 'All Equipment']) }}
                                {{ Form::bsSelect('inout', request('inout'), 'IN/OUT', ['in'=>'IN','out'=>'OUT'], ['placeholder' => 'All IN/OUT']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('lubricant') }}" class="btn btn-warning margin-bottom-10">Reset</a>
                                {{ Form::submit('Filter', ['class' => 'btn btn-primary btn-filter display-block margin-bottom-10']) }}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="button" data-url="{{ url('lubricant/use') }}" data-title="Use Lube" onclick="CreateModal(this, '#use-lube', 'appendViewModal'); return false;" class="btn btn-success"><i class="fa fa-cube"></i> Use Lube</button>
                                <button type="button" data-url="{{ url('lubricant/stock') }}" data-title="Stock Lube" onclick="CreateModal(this, '#stock-lube', 'appendViewModal'); return false;" class="btn btn-danger"><i class="fa fa-cubes"></i> Stock Lube</button>

                                <a href="#" data-url="{{ url('manage/pe/lubricant/print') }}" data-title="Print Date Selection" onclick="CreateModal(this, '#print-modal', 'appendViewModal'); return false;" class="btn btn-warning">
                                    <!-- <i class="fa fa-file-excel-o"></i> EXPORT | --> <i class="fa fa-print"></i> PRINT</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="table-responsive margin-bottom-20">
                <table class="table table-striped table-bordered table-hover table-ecms">
                    <thead>
                    <tr class="top-header">
                        <th colspan="9">Transaction Information</th>
                        <th colspan="4">Engine Oil (15W40)</th>
                        <th colspan="4">Hydraulic Oil (AW100)</th>
                        <th colspan="4">Gear Oil</th>
                        <th colspan="4">Telluse</th>
                        <th></th>
                    </tr>
                    <tr class="default-header">
                        <th rowspan="2">Transaction ID</th>
                        <th rowspan="2">Date</th>
                        <th rowspan="2">Vendor</th>
                        <th rowspan="2">Reference No.</th>
                        <th rowspan="2">Location</th>
                        <th rowspan="2">Equipment</th>
                        <th rowspan="2">Operator</th>
                        <th rowspan="2">Project</th>
                        <th rowspan="2">Remarks</th>

                        <th colspan="2">Qty in Liters</th>
                        <th rowspan="2">Total Consumption <br/>per Unit</th>
                        <th rowspan="2">Balance</th>

                        <th colspan="2">Qty in Liters</th>
                        <th rowspan="2">Total Consumption <br/>per Unit</th>
                        <th rowspan="2">Balance</th>

                        <th colspan="2">Qty in Liters</th>
                        <th rowspan="2">Total Consumption <br/>per Unit</th>
                        <th rowspan="2">Balance</th>

                        <th colspan="2">Qty in Liters</th>
                        <th rowspan="2">Total Consumption <br/>per Unit</th>
                        <th rowspan="2">Balance</th>

                        <th rowspan="2"></th>
                    </tr>
                    <tr class="bottom-header">
                        <!--Engine Oil -->
                        <th>IN</th>
                        <th>OUT</th>

                        <!--Hydraulic Oil -->
                        <th>IN</th>
                        <th>OUT</th>

                        <!--Gear Oil -->
                        <th>IN</th>
                        <th>OUT</th>

                        <!--Tellus Oil -->
                        <th>IN</th>
                        <th>OUT</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($lubricants) < 1)
                        <tr>
                            <td colspan="27" class="table-no-records">- No records -</td>
                        </tr>
                    @endif
                    @foreach ($lubricants->items() as $lubricant)
                        <tr>
                            <td>{{ $lubricant['transaction_no'] }}</td>
                            <td>{{ $dateHelper->transaction_date($lubricant['transaction_date']) }}</td>
                            <td>{{ $lubricant['vendor'] }}</td>
                            <td>{{ $lubricant['reference_no'] }}</td>
                            <td>{{ $lubricant['location'] }}</td>
                            <td>{{ $lubricant['equipment'] }}</td>
                            <td>{{ $lubricant['operator'] }}</td>
                            <td>{{ $lubricant['project'] }}</td>
                            <td>{{ $lubricant['remarks'] }}</td>

                            @if($lubricant['type_of_oil_id'] == 1)
                                <td>{{ $lubricant['in'] }}</td>
                                <td>{{ $lubricant['out'] }}</td>
                                <td>{{ $lubricant['total_consumption_per_unit'] }}</td>
                                <td>{{ $lubricant['balance'] }}</td>
                                @php
                                    $total_engine_oil_stock = bcadd($total_engine_oil_stock, $lubricant['in'], 3);
                                    $total_engine_oil_use = bcadd($total_engine_oil_use, $lubricant['out'], 3);
                                @endphp
                            @else
                                @for($i=0; $i < 4; $i++)
                                    <td></td>
                                @endfor
                            @endif

                            @if($lubricant['type_of_oil_id'] == 2)
                                <td>{{ $lubricant['in'] }}</td>
                                <td>{{ $lubricant['out'] }}</td>
                                <td>{{ $lubricant['total_consumption_per_unit'] }}</td>
                                <td>{{ $lubricant['balance'] }}</td>
                                @php
                                    $total_hydraulic_oil_stock = bcadd($total_hydraulic_oil_stock, $lubricant['in'], 3);
                                    $total_hydraulic_oil_use = bcadd($total_hydraulic_oil_use, $lubricant['out'], 3);
                                @endphp
                            @else
                                @for($i=0; $i < 4; $i++)
                                    <td></td>
                                @endfor
                            @endif

                            @if($lubricant['type_of_oil_id'] == 3)
                                <td>{{ $lubricant['in'] }}</td>
                                <td>{{ $lubricant['out'] }}</td>
                                <td>{{ $lubricant['total_consumption_per_unit'] }}</td>
                                <td>{{ $lubricant['balance'] }}</td>
                                @php
                                    $total_gear_oil_stock = bcadd($total_gear_oil_stock, $lubricant['in'], 3);
                                    $total_gear_oil_use = bcadd($total_gear_oil_use, $lubricant['out'], 3);
                                @endphp
                            @else
                                @for($i=0; $i < 4; $i++)
                                    <td></td>
                                @endfor
                            @endif

                            @if($lubricant['type_of_oil_id'] == 4)
                                <td>{{ $lubricant['in'] }}</td>
                                <td>{{ $lubricant['out'] }}</td>
                                <td>{{ $lubricant['total_consumption_per_unit'] }}</td>
                                <td>{{ $lubricant['balance'] }}</td>
                                @php
                                    $total_telluse_oil_use = bcadd($total_telluse_oil_use, $lubricant['out'], 3);
                                    $total_telluse_oil_stock = bcadd($total_telluse_oil_stock, $lubricant['in'], 3);
                                @endphp
                            @else
                                @for($i=0; $i < 4; $i++)
                                    <td></td>
                                @endfor
                            @endif

                            <td>
                                <a href="#" data-url="{{ url('lubricant/edit/'.$lubricant['id'].'/'.$lubricant['type']) }}" data-title="Edit - {{ $lubricant['transaction_no'] }}" onclick="CreateModal(this, '#edit-lubricant', 'appendViewModal'); return false;"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="total-stock lubricant">
                        <td colspan="12" class="text-right">Total Engine Oil stock:</td>
                        <td>{{ $total_engine_oil_stock }}</td>

                        <td colspan="3" class="text-right">Total Hydraulic Oil stock:</td>
                        <td>{{ $total_hydraulic_oil_stock }}</td>

                        <td colspan="3" class="text-right">Total Gear Oil stock:</td>
                        <td>{{ $total_gear_oil_stock }}</td>

                        <td colspan="3" class="text-right">Total Telluse stock:</td>
                        <td>{{ $total_telluse_oil_stock }}</td>

                        <td></td>
                    </tr>
                    <tr class="total-consumption lubricant">
                        <td colspan="12" class="text-right">Total Engine Oil consume:</td>
                        <td>{{ $total_engine_oil_use }}</td>

                        <td colspan="3" class="text-right">Total Hydraulic Oil consume:</td>
                        <td>{{ $total_hydraulic_oil_use }}</td>

                        <td colspan="3" class="text-right">Total Gear Oil consume:</td>
                        <td>{{ $total_gear_oil_use }}</td>

                        <td colspan="3" class="text-right">Total Telluse consume:</td>
                        <td>{{ $total_telluse_oil_use }}</td>

                        <td></td>

                    </tr>

                    <tr class="total-stock lubricant">
                        <td colspan="12" class="text-right">Overall Engine Oil stock:</td>
                        <td>{{ $monitorHelper->get_total_engine_stock() }}</td>

                        <td colspan="3" class="text-right">Overall Hydraulic Oil stock:</td>
                        <td>{{ $monitorHelper->get_total_hydraulic_stock() }}</td>

                        <td colspan="3" class="text-right">Overall Gear Oil stock:</td>
                        <td>{{ $monitorHelper->get_total_gear_stock() }}</td>

                        <td colspan="3" class="text-right">Overall Telluse stock:</td>
                        <td>{{ $monitorHelper->get_total_telluse_stock() }}</td>

                        <td></td>
                    </tr>
                    <tr class="total-consumption lubricant">
                        <td colspan="12" class="text-right">Overall Engine Oil consume:</td>
                        <td>{{ $monitorHelper->get_total_engine_use() }}</td>

                        <td colspan="3" class="text-right">Overall Hydraulic Oil consume:</td>
                        <td>{{ $monitorHelper->get_total_hydraulic_use() }}</td>

                        <td colspan="3" class="text-right">Overall Gear Oil consume:</td>
                        <td>{{ $monitorHelper->get_total_gear_use() }}</td>

                        <td colspan="3" class="text-right">Overall Telluse consume:</td>
                        <td>{{ $monitorHelper->get_total_telluse_use() }}</td>

                        <td></td>

                    </tr>
                    </tfoot>
                </table>
            </div>
            {{  $lubricants->setPath(request()->getPathInfo())->appends(\Request::all())->render() }}

            <div class="row hide">
                <div class="col-md-6">
                    <div class="row footer-checker">
                        <div class="col-md-4">
                            <div class="title text-right">
                                Prepared By:
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="name">John Doe</div>
                            <div class="position">Designated Personel</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row footer-checker">
                        <div class="col-md-3">
                            <div class="title text-right">
                                Noted By:
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="name">Eric Matti</div>
                            <div class="position">Project Personnel</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection