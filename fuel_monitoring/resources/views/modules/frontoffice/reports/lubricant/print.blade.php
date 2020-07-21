@extends('templates.dmonitoring.print')
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
    $total_engine_oil_use = 0;
    $total_hydraulic_oil_stock = 0;
    $total_hydraulic_oil_use = 0;
    $total_gear_oil_stock = 0;
    $total_gear_oil_use = 0;
    $total_telluse_oil_stock = 0;
    $total_telluse_oil_use = 0;
@endphp

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/print-page.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/print.css') }}" type="text/css" media="print" />
    <style type="text/css">
        @media print {
            @page {
                size: 18in 8.5in;
            }
        }
    </style>
@endpush

@section('main')
    <div class="main-container-wrapper">

        @php 
                $inner_divider = 15;
                $row_count_top = 0;
                $lubricants_count = count($lubricants);
                
                $divider = 15;
                
                $inner_divider = 0;
                $outer_divider = 5;
                $displayed_lubricant = 0;

                $start_display = 0;
                $end_display = 15;

        @endphp
        
         @if($lubricants_count <= $divider)

                 <div class="table-responsive margin-bottom-20 margin-top-20">
                            <table class="table table-striped table-bordered table-hover table-ecms">
                                <thead>
                                <tr class="top-header">
                                    <th colspan="9">Transaction Information</th>
                                    <th colspan="4">Engine Oil (15W40)</th>
                                    <th colspan="4">Hydraulic Oil (AW100)</th>
                                    <th colspan="4">Gear Oil</th>
                                    <th colspan="4">Telluse</th>
                                </tr>
                                <tr class="default-header">
                                    <!-- <th rowspan="2">Transaction ID</th> -->
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
                                        <td colspan="23" class="table-no-records">- No records -</td>
                                    </tr>
                                @endif

                                 @php
                                    $count = 0;
                                    $row_count = $displayed_lubricant;
                                    $ii_inner_divider = $inner_divider + 1;
                                    $ii_outer_divider = $outer_divider + 1;
                                @endphp

                                @foreach ($lubricants as $lubricant)
                                    @if($count >= $start_display && $count <  $end_display)
                                        <tr>
                                            <!-- <td>{{ $lubricant['transaction_no'] }}</td> -->
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
                                        </tr>
                                            @php
                                                
                                                $displayed_lubricant = bcadd($displayed_lubricant, 1);
                                            @endphp

                                        @endif

                                        @php
                                            $count = bcadd($count, 1);
                                            $inner_divider = bcadd($inner_divider, 1);
                                            $outer_divider = bcadd($outer_divider, 1);
                                        @endphp

                                    @endforeach
                                    
                                    @php
                                        $start_display = bcadd($start_display, 15);
                                        $end_display = bcadd($end_display, 15 );
                                    @endphp
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
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row footer-checker">
                                    <div class="col-md-4">
                                        <div class="title text-right">
                                            Checked By:
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="name">&nbsp;</div>
                                        <div class="position">Designated Personel</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row footer-checker">
                                    <div class="col-md-3">
                                        <div class="title text-right">
                                            Approved By:
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="name">
                                            Petrious Dakay
                                        </div>
                                        <!-- <div class="position">Project Personnel</div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

            @else

                @for ($i = 1; $i <= $lubricants_count; $i++)
                    @if($i % $divider === 0)

                        <div class="table-responsive margin-bottom-20 margin-top-20">
                            <table class="table table-striped table-bordered table-hover table-ecms">
                                <thead>
                                <tr class="top-header">
                                    <th colspan="9">Transaction Information</th>
                                    <th colspan="4">Engine Oil (15W40)</th>
                                    <th colspan="4">Hydraulic Oil (AW100)</th>
                                    <th colspan="4">Gear Oil</th>
                                    <th colspan="4">Telluse</th>
                                </tr>
                                <tr class="default-header">
                                    <!-- <th rowspan="2">Transaction ID</th> -->
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
                                        <td colspan="23" class="table-no-records">- No records -</td>
                                    </tr>
                                @endif

                                 @php
                                    $count = 0;
                                    $row_count = $displayed_lubricant;
                                    $ii_inner_divider = $inner_divider + 1;
                                    $ii_outer_divider = $outer_divider + 1;
                                @endphp

                                @foreach ($lubricants as $lubricant)
                                    @if($count >= $start_display && $count <  $end_display)
                                        <tr>
                                            <!-- <td>{{ $lubricant['transaction_no'] }}</td> -->
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
                                        </tr>
                                            @php
                                                
                                                $displayed_lubricant = bcadd($displayed_lubricant, 1);
                                            @endphp

                                        @endif

                                        @php
                                            $count = bcadd($count, 1);
                                            $inner_divider = bcadd($inner_divider, 1);
                                            $outer_divider = bcadd($outer_divider, 1);
                                        @endphp

                                    @endforeach
                                    
                                    @php
                                        $start_display = bcadd($start_display, 15);
                                        $end_display = bcadd($end_display, 15 );
                                    @endphp
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
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row footer-checker">
                                    <div class="col-md-4">
                                        <div class="title text-right">
                                            Checked By:
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="name">&nbsp;</div>
                                        <div class="position">Designated Personel</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row footer-checker">
                                    <div class="col-md-3">
                                        <div class="title text-right">
                                            Approved By:
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="name">
                                            Petrious Dakay
                                        </div>
                                        <!-- <div class="position">Project Personnel</div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor

            @endif


        <div class="row">
            <div class="col-md-12">
                <a onClick="window.print()" class="hanging-print btn hidden-print">Print</a>
            </div>
        </div>
    </div>
@endsection