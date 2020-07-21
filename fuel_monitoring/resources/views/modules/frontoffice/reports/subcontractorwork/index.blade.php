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
    
    foreach ($subcontractorworks->items() as $subcontractorwork):

        $subcontractorwork_payments[$subcontractorwork['id']] = (new \App\Models\SubContractorWorkPayments)->where('subcontractorwork_id', $subcontractorwork['id'])->get()->toArray();

        $subcontractorwork_payments[$subcontractorwork['id']]['previous_total_paid_amount'] = 0;

        $subcontractorwork_payments[$subcontractorwork['id']]['current_paid_amount'] = 0;

        $total_paid_amt = 0;

        // make and stores array of payments per subconwork

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

@endphp

@section('main')


@push('styles')

                        
              <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
              <link rel="stylesheet" href="/resources/demos/style.css">
              <style>
              .custom-combobox {
                position: relative;
                display: inline-block;
              }
              .custom-combobox-toggle {
                position: absolute;
                top: 0;
                bottom: 0;
                margin-left: -1px;
                padding: 0;
              }
              .custom-combobox-input {
                margin: 0;
                padding: 5px 10px;
              }

              .ui-autocomplete{

                max-height: 600px;
                overflow-y: auto;   /* prevent horizontal scrollbar */
                overflow-x: hidden; /* add padding to account for vertical scrollbar */
                z-index:1000 !important;
              }

              </style>


@endpush

<style type="text/css">

    #scroll-bar-area{

                        width: 930px;
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
        @include('templates.dmonitoring.includes.page-title', ['page_title' => 'Sub Contractor Work', 'url_back' => 'subcontractor/work'])
        <div class="main-container">

            @include('templates.dmonitoring.includes.subcontractor-submenu')

            <div class="row no-margin margin-bottom-20">
                <div class="col-md-12 filter-wrapper">
                    <div class="col-md-6">
                        {!! Form::open(['method'=>'get', 'class' => 'form-horizontal', 'name' => 'subcontractorwork-filter-form']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::bsInput('text', 'q', request('q'), 'Search', ['placeholder' => 'Transaction ID or Project Name']) }}
                                {{ Form::bsSelect('subcontractor', request('subcontractor'), 'Sub Contractor', $subcontractor_list, ['placeholder' => 'All Sub Contractor']) }}
                            </div>
                            <div class="col-md-6 no-padding">
                                {{ Form::bsDateRangePicker(
                                   ['name' => 'date_from', 'value' => request('date_from'), 'label' => 'From Date', 'attributes' => ['id'=>'date_from'] ],
                                   ['name' => 'date_to', 'value' => request('date_to'), 'label' => 'To Date','attributes' => ['id'=>'date_to'] ]
                               ) }}
                               
                               <div class="ui-widget">

                                {{ Form::bsSelect('equipment', request('equipment'), 'Equipment', $equipment_list, ['placeholder' => 'All Equipment']) }}
                                
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('subcontractor/work') }}" class="btn btn-warning margin-bottom-10">Reset</a>
                                {{ Form::submit('Filter', ['class' => 'btn btn-primary btn-filter margin-bottom-10']) }}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="button" data-url="{{ url('subcontractor/work/create') }}" data-title="Create Work" onclick="CreateModal(this, '#create-work', 'appendViewModal', { modal_size: 'md-custom' }); return false;" class="btn btn-success"><i class="fa fa-table"></i> Create Work</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div id = "scroll-bar-area">

                    <div id = "scroll-bar">
                        
                    </div>

            </div>
              
            <div class="table-responsive margin-bottom-20">
                <table class="table table-striped table-bordered table-hover table-ecms">
                    <thead>

                    <tr class="default-header">

                         <th rowspan="2">Transaction ID</th>

                         <th rowspan="2">Project Start Date</th>
                         
                         <th rowspan="2"> Sub Contractor  </th>

                         <th rowspan="2"> Project Name </th>
                         
                         <th rowspan="2" > Equipment </th>

                         <th rowspan="2"> Scope of Work </th>

                         <th rowspan="2"> Contract Amount </th>
                         
                         
                         <th colspan="2">
                                   
                                   Previous Paid Accomplishment
                        </th>

                        <th colspan="2">

                                       Present Accomplishment

                        </th>

                        <th colspan="2"> Total Paid </th>

                        <th rowspan="2"> Amount Due</th>
                        
                        <th rowspan="2"> Warranty Expiry Data</th>
                        
                        <th rowspan="2"> Remarks</th>
                        
                        <th rowspan="2"></th>
          
                    </tr>

                    <tr>
                                   
                                    <th> % </th>
                                    <th> Amount </th>
                                    <th>%</th>
                                    <th> Amount </th>
                                    <th>%</th>
                                    <th> Amount </th>
                    </thead>

                    </tr>

                    <tbody>
                    @if(count($subcontractorworks) < 1)
                        <tr>
                            <td colspan="26" class="table-no-records">- No records -</td>
                        </tr>
                    @endif
                    @foreach ($subcontractorworks->items() as $subcontractorwork)
                    
                    @php 

                        $subcon_payments_info = $subcontractorwork_payments[$subcontractorwork['id']];

 
                        //$total_previous_paid_amount = $subcontractorwork_payments[$subcontractorwork['id']]['previous_total_paid_amount']- $total_previous_paid_amount;

                        //$present_paid_amount = $subcontractorwork_payments[$subcontractorwork['id']]['current_paid_amount'];

                        $present_paid_amount= $subcontractorwork_payments[$subcontractorwork['id']]['current_paid_amount'];
 
                        $total_paid_amt = $subcon_payments_info['total_paid_amt'];

                        $total_previous_paid_amount = $total_paid_amt - $present_paid_amount;

                        $amount_due_left = $subcontractorwork['contract_amount'] - $total_paid_amt; 

                    @endphp

                     

                        <tr>
                            <td>{{ $subcontractorwork['transaction_no'] }}</td>

                            <td>{{ $dateHelper->transaction_date($subcontractorwork['transaction_date']) }}</td>

                            <td>{{ $subcontractorwork['subcontractor'] }}</td>

                            <td>{{ $subcontractorwork['project'] }}</td>

                            <td>{{ $subcontractorwork['equipment'] }}</td>

                            <td>{{ $subcontractorwork['scope_of_work'] }}</td>

                            <td align="right">{{ $numFormat->number_format_by_currency('PHP',$subcontractorwork['contract_amount']) }}</td>

                            <td align=right class="alert alert-success" >{{ $inputHelper::calculate_percentage($subcontractorwork['contract_amount'], $total_previous_paid_amount) }}%</td>

                            <td align=right class="alert alert-success">{{ $numFormat->number_format_by_currency('PHP', $total_previous_paid_amount) }}</td>

                            <td align=right class="alert alert-warning" >{{ $inputHelper::calculate_percentage($subcontractorwork['contract_amount'], $present_paid_amount) }}%</td>

                            <td align=right class="alert alert-warning">{{ $numFormat->number_format_by_currency('PHP', $present_paid_amount) }}</td>

                            <td align=right class="alert alert-info">{{ $inputHelper::calculate_percentage($subcontractorwork['contract_amount'], $total_paid_amt) }}%</td>

                            <td align=right class="alert alert-info">{{ $numFormat->number_format_by_currency('PHP', $total_paid_amt) }}</td>

                            <td align=right>{{ $numFormat->number_format_by_currency('PHP', $amount_due_left) }}</td>
                            
                            <td>{{ $subcontractorwork['warranty'] }}</td>

                            <td></td>
                            <td>

                                <a href="#" data-url="{{ url('subcontractor/work/edit/'.$subcontractorwork['id']) }}" data-title="{{ $subcontractorwork['project'] }} #{{ $subcontractorwork['transaction_no'] }}" onclick="CreateModal(this, '#edit-subcontractor-work', 'appendViewModal', { modal_size: 'md-custom' }); return false;"><i class="fa fa-pencil"></i></a>
                                
                                <a href = "{{ url('manage/subcontractor/work/'.$subcontractorwork['id'].'/destroy') }}">
                                    
                                <i class="fa fa-trash"></i>

                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{  $subcontractorworks->setPath(request()->getPathInfo())->appends(\Request::all())->render() }}

        </div>
    </div>
 
    @push('scripts')

        <script type="text/javascript" src = "{{ asset('js/list-subconwork.js') }}"></script>

         <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script type="text/javascript" src = "{{ asset('js/combobox.js') }}"></script>


    @endpush

@endsection                                        