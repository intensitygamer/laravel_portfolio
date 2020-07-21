@extends('templates.dmonitoring.print')
@section('title', 'Sub Contractor Monitoring')

@php
    // refactor magic numbers
    $permission = (new \Permission);
    $dateHelper = new \App\Helpers\DateHelper;
    $numFormat = new \App\Helpers\NumberFormatHelper;
    $inputHelper = new \App\Helpers\InputHelper;
    $equipment_list = \App\Helpers\InputHelper::equipment_list();
    $subcontractor_list = \App\Helpers\InputHelper::subcontractor_list();

    if(count($subcontractorworks) >= 1):

        foreach ($subcontractorworks['subcontractor'] as $subcontractorwork):

            $subcontractorwork_payments[$subcontractorwork['id']] = (new \App\Models\SubContractorWorkPayments)->where('subcontractorwork_id', $subcontractorwork['id'])->get()->toArray();

            $subcontractorwork_payments[$subcontractorwork['id']]['previous_total_paid_amount'] = 0;

            $subcontractorwork_payments[$subcontractorwork['id']]['current_paid_amount'] = 0;

            $total_paid_amt = 0;

            foreach($subcontractorwork_payments[$subcontractorwork['id']] as $subcon_payment_info):

                // Checks if subcon payment is not within this week.

                    $subcontractorwork_payments[$subcontractorwork['id']]['previous_total_paid_amount'] += $subcon_payment_info['current_paid_amount'];

                 if(isset($subcon_payment_info['current_paid_amount']) && !empty($subcon_payment_info['current_paid_amount']))

                    $subcontractorwork_payments[$subcontractorwork['id']]['current_paid_amount'] = $subcon_payment_info['current_paid_amount'];
 

                    $total_paid_amt += $subcon_payment_info['current_paid_amount'];

            endforeach;

              
             $subcontractorwork_payments[$subcontractorwork['id']]['previous_total_paid_amount'] = $total_paid_amt - $subcontractorwork_payments[$subcontractorwork['id']]['current_paid_amount'] ;
            
             $subcontractorwork_payments[$subcontractorwork['id']]['total_paid_amt'] = $total_paid_amt;


        endforeach;
    
    endif;



@endphp

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/print-page.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/print.css') }}" type="text/css" media="print" />

@endpush

@section('main')

@push('styles')

    <style type="text/css">

        .table-fields th{

            text-align: center;
        
        }

        .size-custom{
            font-size: 13px;
        }    

    </style>

@endpush

    <div class="main-container-wrapper">
        <div class="main-container">
            @php 
                $inner_divider = 15;
                $row_count_top = 0;
                $subcontractor_count = count($subcontractorworks['subcontractor']);
                
                $divider = 15;
                
                $inner_divider = 0;
                $outer_divider = 5;
                $displayed_subcontractor = 0;

                $start_display = 0;
                $end_display = 15;


            //* @if($subcontractor_count <= $divider)
                        
 
             @if(1)

                <div class="table-responsive margin-bottom-20">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>PROJECT: sad</th>
                                    <th colspan="2"></th>
                                    <th colspan="6" rowspan="3" class="vertical-align-middle">
                                        <div class="wraptable-image">
                                            <img src="{{ asset('img/dakay-logo.png') }}" class="pull-left" />
                                            <span class="align-text-in-image"><strong>Sub Contractor Accomplishment Report</strong></span>
                                        </div>
                                    </th>
                                    <th class="text-center" colspan="2">PERIOD COVERING</th>
                                </tr>
                                <tr>
                                    <th>SUBCON:</th>
                                    <th colspan="2">
                                        @if(!empty(Request::get('date_from')))
                                            @if(!empty($subcontractorworks['subcontractor']))
                                                {{ $subcontractorworks['subcontractor'][0]['subcontractor'] }}
                                            @endif
                                        @endif
                                    </th>

                                    <th rowspan="2" class="vertical-align-top">FROM <br />
                                        @if(!empty(Request::get('date_from')))
                                            {{ $dateHelper->transaction_date(Request::get('date_from')) }}
                                        @endif
                                    </th>

                                    <th rowspan="2" class="vertical-align-top">TO <br />
                                        @if(!empty(Request::get('date_to')))
                                            {{ $dateHelper->transaction_date(Request::get('date_to')) }}
                                        @endif
                                    </th>
                                </tr>
                                <tr class="bottom-header">
                                    <th>CONTACT NO:</th>
                                    <th colspan="2"></th>
                                </tr>

                                <tr class="table-fields">
                                   <th rowspan="2">Equipment</th>
                                   <th rowspan="2">Project Name</th>
                                   <th rowspan="2">Scope of Work</th>
                                   <th rowspan="2">Contract Amount</th>
                                   <th colspan="2">
                                   Previous Paid Accomplishment


                                    </th>

                                    <th colspan="2">

                                       Present Accomplishment

                                    </th>

                                    <th colspan="2">

                                       Total Paid

                                    </th>

                                <th rowspan="2">Amount Due</th>
                                   
                                   <th rowspan="2">Warranty Expiry Data</th>

                                   <th rowspan="2">Remarks</th>
                                    
                                </tr>

                                <tr class="table-fields" 
                                >
                                   
                                    <th> % </th>
                                    <th> Amount </th>
                                    <th>%</th>
                                    <th> Amount </th>
                                    <th>%</th>
                                    <th> Amount </th>
                                    
                                </tr>
                                

                                </thead>
                                <tbody>
                                @php $total = 0 @endphp
                                @if(count($subcontractorworks['subcontractor']) < 1)
                                    <tr>
                                        <td colspan="26" class="table-no-records">- No records -</td>
                                    </tr>
                                    @else

                                    @php
                                        $count = 0;
                                        $row_count = $displayed_subcontractor;
                                        $ii_inner_divider = $inner_divider + 1;
                                        $ii_outer_divider = $outer_divider + 1;




                                    foreach ($subcontractorworks['subcontractor'] as $subcontractorwork):
                             


                                        $subcon_payments_info = $subcontractorwork_payments[$subcontractorwork['id']];


                                        $total_previous_paid_amount = $subcon_payments_info['previous_total_paid_amount'];


                                        //$present_paid_amount = end($subcon_payments_info['current_paid_amount']);

                                        $total_paid_amt = $subcon_payments_info['total_paid_amt'];

                                        $present_paid_amount = $subcontractorwork_payments[$subcontractorwork['id']]['current_paid_amount'];


                                        $total_previous_paid_amount = $total_paid_amt - $present_paid_amount;

                                        $amount_due_left = $subcontractorwork['contract_amount'] - $total_paid_amt;

                                        //$subcon_payments_info = $subcontractorwork_payments[$subcontractorwork['id']];


                                        //$total_previous_paid_amount = $subcon_payments_info['previous_total_paid_amount'];

 
                                        //$present_paid_amount = $subcon_payments_info[0]['current_paid_amount'];

                                        //$total_paid_amt = $subcon_payments_info['total_paid_amt'];

                                        //$total_paid_amt = $total_previous_paid_amount + $present_paid_amount;

                                        //$subcontractorwork_payments[$subcontractorwork['id']]['current_paid_amount']

                                        $amount_due_left = $subcontractorwork['contract_amount'] - $total_paid_amt; 

                                    @endphp

                                     <!--if($count >= $start_display && $count <  $end_display) -->
 
                                      @if(1)
                                            <tr>
                                                <!-- <td>{{ $subcontractorwork['transaction_no'] }}</td> -->
                                                <td>{{ $subcontractorwork['equipment'] }}</td>
                                                <td>{{ $subcontractorwork['project'] }}</td>
                                                <td>{{ $subcontractorwork['scope_of_work'] }}</td>
                                                <td align=right>{{ $numFormat->number_format_by_currency('PHP',$subcontractorwork['contract_amount']) }}</td>
                                                <td align=right class="alert alert-success">{{ $inputHelper::calculate_percentage($subcontractorwork['contract_amount'], $total_previous_paid_amount) }}%</td>
                                                <td align=right  class="alert alert-success">{{ $numFormat->number_format_by_currency('PHP', $total_previous_paid_amount) }}</td>
                                                <td align=right class="alert alert-warning">{{ $inputHelper::calculate_percentage($subcontractorwork['contract_amount'], $present_paid_amount) }}%</td>
                                                <td align=right class="alert alert-warning">{{ $numFormat->number_format_by_currency('PHP', $present_paid_amount) }}</td>
                                                <td align=right class="alert alert-info">{{ $inputHelper::calculate_percentage($subcontractorwork['contract_amount'], $total_paid_amt) }}%</td><td align=right class="alert alert-info">{{ $numFormat->number_format_by_currency('PHP', $total_paid_amt) }}</td>

                                                <td>{{ $subcontractorwork['warranty'] }}</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @php
                                               $total += $present_paid_amount;
                                            @endphp

                                        @endif

                                        @php
                                            //* $count = bcadd($count, 1);
                                            //* $inner_divider = bcadd($inner_divider, 1);
                                            //*$outer_divider = bcadd($outer_divider, 1);
                                        
                                        endforeach;

                                        @endphp

                                @endif

                                <tr>
                                        <td colspan="6" class="text-right"><h4><strong>Total</strong></h4></td>
                                        <td colspan="5" class="text-left"><h4><strong>{{ $numFormat->number_format_by_currency('PHP', $total) }}</strong></h4></td>
                                </tr>

                                </tbody>
                                <!-- 
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-right"><h4><strong>Total</strong></h4></td>
                                        <td colspan="4" class="text-left"><h4><strong>{{ $numFormat->number_format_by_currency('PHP', $total) }}</strong></h4></td>
                                    </tr>
                                </tfoot>
 -->
                            </table>
                        </div>

                        <div class="row" style="margin-top: 50px;">
                            <div class="col-md-6">
                                <div class="row footer-checker">
                                    <div class="col-md-4">
                                        <div class="title text-right size-custom" style="font-size: 13px;">
                                            Checked By:
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="name size-custom" style="min-height: 49px; font-size: 13px;">
                                        
                                        </div>
                                        <div class="position size-custom" >Designated Personel</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row footer-checker">
                                    <div class="col-md-3">
                                        <div class="title text-right size-custom" style= "font-size: 13px;">
                                            Approved By:
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="name size-custom" style="min-height: 49px; font-size: 13px;">
                                            Petrious Dakay
                                        </div>
                                        {{--<div class="position">Project Personnel</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>

            @else

                @for ($i = 1; $i <= $subcontractor_count; $i++)
                    @if($i % $divider === 0)


                        <div class="table-responsive margin-bottom-20">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>PROJECT:</th>       
                                    <th colspan="2"></th>
                                    <th colspan="6" rowspan="3" class="vertical-align-middle">
                                        <div class="wraptable-image">
                                            <img src="{{ asset('img/dakay-logo.png') }}" class="pull-left" />
                                            <span class="align-text-in-image"><strong>Sub Contractor Accomplishment Report</strong></span>
                                        </div>
                                    </th>
                                    <th class="text-center" colspan="2">PERIOD COVERING</th>
                                </tr>
                                <tr>
                                    <th>SUBCON:</th>
                                    <th colspan="2">
                                        @if(!empty(Request::get('date_from')))
                                            @if(!empty($subcontractorworks['subcontractor']))
                                                {{ $subcontractorworks['subcontractor'][0]['subcontractor'] }}
                                            @endif
                                        @endif
                                    </th>

                                    <th rowspan="2" class="vertical-align-top">FROM <br />
                                        @if(!empty(Request::get('date_from')))
                                            {{ $dateHelper->transaction_date(Request::get('date_from')) }}
                                        @endif
                                    </th>

                                    <th rowspan="2" class="vertical-align-top">TO <br />
                                        @if(!empty(Request::get('date_to')))
                                            {{ $dateHelper->transaction_date(Request::get('date_to')) }}
                                        @endif
                                    </th>
                                </tr>
                                <tr class="bottom-header">
                                    <th>CONTACT NO:</th>
                                    <th colspan="2"></th>
                                </tr>
                                <tr>
                                    <!-- <th>Transaction ID</th> -->
                                    <th>Equipment</th>
                                    <th>Scope of Work</th>
                                    <th>Contract Amount</th>
                                    <th>Accomplishment</th>
                                    <th>Previous Paid Amount</th>
                                    <th>Total Paid Amount</th>
                                    <th>Amount Due</th>
                                    <th>Warranty Expiry Data</th>
                                    <th>Remarks</th>
                                </tr>

                                </thead>
                                <tbody>
                                @php $total = 0 @endphp
                                @if(count($subcontractorworks['subcontractor']) < 1)
                                    <tr>
                                        <td colspan="26" class="table-no-records">- No records -</td>
                                    </tr>
                                @else

                                    @php
                                        $count = 0;
                                        $row_count = $displayed_subcontractor;
                                        $ii_inner_divider = $inner_divider + 1;
                                        $ii_outer_divider = $outer_divider + 1;
                                    @endphp

                                    @foreach ($subcontractorworks['subcontractor'] as $subcontractorwork)
                                        @if($count >= $start_display && $count <  $end_display)
                                            <tr>
                                                <!-- <td>{{ $subcontractorwork['transaction_no'] }}</td> -->
                                                <td>{{ $subcontractorwork['equipment'] }}</td>
                                                <td>{{ $subcontractorwork['scope_of_work'] }}</td>
                                                <td>{{ $subcontractorwork['contract_amount'] }}</td>
                                                <td>{{ $inputHelper::calculate_percentage($subcontractorwork['contract_amount'], $present_paid_amount) }}%</td>
                                                <td>{{ $numFormat->number_format_by_currency('PHP', $present_paid_amount) }}</td>
                                                <td>{{ $numFormat->number_format_by_currency('PHP', $present_paid_amount) }}</td>
                                                <td>{{ $subcontractorwork['warranty'] }}</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @php
                                               $total += $subcontractorwork['total_current_paid_amount']; 
                                                bcadd($displayed_subcontractor, 1);
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

                                @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-right"><h4><strong>Total</strong></h4></td>
                                        <td colspan="4" class="text-left"><h4><strong>{{ $numFormat->number_format_by_currency('PHP', $total) }}</strong></h4></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row footer-checker">
                                    <div class="col-md-4">
                                        <div class="title text-right" style="font-size: 13px;">
                                            Checked By:
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="name" style="min-height: 49px; font-size: 13px;">
                                        
                                        </div>
                                        <div class="position" style="font-size: 13px;">Designated Personel</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row footer-checker">
                                    <div class="col-md-3">
                                        <div class="title text-right" style="font-size: 13px;">
                                            Approved By:
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="name" style="font-size: 13px;">
                                            Petrious Dakay
                                        </div>
                                        {{--<div class="position">Project Personnel</div>--}}
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
    </div>

@endsection