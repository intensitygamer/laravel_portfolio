@extends('templates.dmonitoring.master')
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

        foreach ($subcontractorworks->items() as $subcontractorwork):

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

@section('main')


@push('styles')

    <style type="text/css">

        .table-fields th{

            text-align: center;
        
        }

    </style>

@endpush

    <div class="main-container-wrapper">
        @include('templates.dmonitoring.includes.page-title', ['page_title' => 'Sub Contractor Work', 'url_back' => 'subcontractor/work'])
        <div class="main-container">

            @include('templates.dmonitoring.includes.subcontractor-submenu')

            <div class="row no-margin margin-bottom-20">
                <div class="col-md-12 filter-wrapper">
                    <div class="col-md-7">
                        {!! Form::open(['method'=>'get', 'class' => 'form-horizontal', 'name' => 'subcontractorwork-filter-form']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::bsDateRangePicker(
                                   ['name' => 'date_from', 'value' => request('date_from'), 'label' => 'From Date', 'attributes' => ['id'=>'date_from'] ],
                                   ['name' => 'date_to', 'value' => request('date_to'), 'label' => 'To Date','attributes' => ['id'=>'date_to'] ]
                               ) }}
                                {{ Form::bsSelect('subcontractor', request('subcontractor'), 'Sub Contractor', $subcontractor_list, ['placeholder' => 'Select Sub Contractor']) }}
                            </div>
                            <div class="col-md-6 no-padding">
                                <a href="{{ url('subcontractor/work/audit') }}" style="margin-top:95px;" class="btn btn-warning margin-bottom-10">Reset</a>
                                {{ Form::submit('Search and Audit', ['class' => 'btn btn-primary btn-filter', 'style'=>'margin-top:85px;']) }}
                            </div>
                        </div>
                     </div>
                        
                        {!! Form::close() !!}

                        {!! Form::open(['method'=>'get', 'class' => 'form-horizontal', 'name' => 'subcontractorwork-filter-form']) !!}

                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-12 text-right">

                                 
<!--                                 <i class="fa fa-print"></i> PRINT
 -->

                                <a href="#" data-url="{{ url('manage/pe/work-audit/print') }}" data-title="Print Date Selection" onclick="CreateModal(this, '#print-modal', 'appendViewModal'); return false;" class="btn btn-warning">
                                    <!-- <i class="fa fa-file-excel-o"></i> EXPORT | --> <i class="fa fa-print"></i> PRINT</a>
                            </div>
                        </div>

                    </div>
                        
                        {!! Form::close() !!}

                </div>
            </div>

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
                        <th colspan="2"></th>
                        <th rowspan="2" class="vertical-align-top">FROM</th>
                        <th rowspan="2" class="vertical-align-top">TO</th>
                    </tr>
                    <tr class="bottom-header">
                        <th>CONTACT NO:</th>
                        <th colspan="2"></th>
                    </tr>
                    <tr class="table-fields">
                        <th  rowspan="2">Transaction ID</th>
                         <th rowspan="2">Equipment</th>
                         <th rowspan="2">Project Name</th>
                                   <th rowspan="2" >Scope of Work</th>
                                   <th rowspan="2" >Contract Amount</th>
                                   <th colspan="2" >
                                   Previous Paid Accomplishment


                                    </th>

                                    <th colspan="2" >

                                       Present Accomplishment

                                    </th>

                                    <th colspan="2" >

                                       Total Paid

                                    </th>

                                    <th rowspan="2" >Amount Due</th>
                                   <th rowspan="2" >Warranty Expiry Data</th>
                                   <th rowspan="2" >Amount Due Left</th>
                                   <th rowspan="2" >Remarks</th>
                                    
                    </tr>

                    <tr class="table-fields">
                                   
                                    <th > % </th>
                                    <th > Amount </th>
                                    <th >%</th>
                                    <th > Amount </th>
                                    <th >%</th>
                                    <th > Amount </th>
                    </thead>

                    <tbody>
                    @if(count($subcontractorworks) < 1)
                        <tr>
                            <td colspan="26" class="table-no-records">- No records -</td>
                        </tr>
                    @else
                        @foreach ($subcontractorworks->items() as $subcontractorwork)

                          
                    @php 

                        $subcon_payments_info = $subcontractorwork_payments[$subcontractorwork['id']];


                        $total_previous_paid_amount = $subcon_payments_info['previous_total_paid_amount'];


                        $total_paid_amt = $subcon_payments_info['total_paid_amt'];

                        $present_paid_amount = $subcontractorwork_payments[$subcontractorwork['id']]['current_paid_amount'];

                        $total_previous_paid_amount = $total_paid_amt - $present_paid_amount;

                        $amount_due_left = $subcontractorwork['contract_amount'] - $total_paid_amt;


                        //$present_paid_amount = $subcon_payments_info[0]['current_paid_amount'];

                        //$total_paid_amt = $subcon_payments_info['total_paid_amt'];

                        //$total_paid_amt = $total_previous_paid_amount + $present_paid_amount;

                        //$subcontractorwork_payments[$subcontractorwork['id']]['current_paid_amount']

                        //$amount_due_left = $subcontractorwork['contract_amount'] - $total_paid_amt; 

                    @endphp

                            <tr>
                                <td>{{ $subcontractorwork['transaction_no'] }}</td> 

                                <td>{{ $subcontractorwork['equipment'] }}</td>
                                <td>{{ $subcontractorwork['project'] }}</td>
                                                <td>{{ $subcontractorwork['scope_of_work'] }}</td>
                                                <td align=right>{{ $numFormat->number_format_by_currency('PHP',$subcontractorwork['contract_amount']) }}</td>
                                                <td align=right class="alert alert-success">{{ $inputHelper::calculate_percentage($subcontractorwork['contract_amount'], $total_previous_paid_amount) }}%</td>
                                                <td align=right class="alert alert-success">{{ $numFormat->number_format_by_currency('PHP', $total_previous_paid_amount) }}</td>
                                                <td align=right class="alert alert-warning">{{ $inputHelper::calculate_percentage($subcontractorwork['contract_amount'], $present_paid_amount) }}%</td>
                                                <td align=right class="alert alert-warning">{{ $numFormat->number_format_by_currency('PHP', $present_paid_amount) }}</td>
                                                <td align=right class="alert alert-info">{{ $inputHelper::calculate_percentage($subcontractorwork['contract_amount'], $total_paid_amt) }}%</td><td align=right class="alert alert-info">{{ $numFormat->number_format_by_currency('PHP', $total_paid_amt) }}</td>

                                                <td align=right>{{ $numFormat->number_format_by_currency('PHP', $amount_due_left) }}</td>
                                                <td>{{ $subcontractorwork['warranty'] }}</td>
                                                <td></td>
                                                <td></td>
                             </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            @if(count($subcontractorworks) > 1)
                {{  $subcontractorworks->setPath(request()->getPathInfo())->appends(\Request::all())->render() }}
            @endif

        </div>
    </div>
@endsection