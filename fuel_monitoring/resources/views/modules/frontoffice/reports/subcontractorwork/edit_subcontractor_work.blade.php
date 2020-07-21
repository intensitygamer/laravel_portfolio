@php
    // refactor magic numbers
    $permission = (new \Permission);
    $dateHelper = new \App\Helpers\DateHelper;
    $numFormat = new \App\Helpers\NumberFormatHelper;
    $inputHelper = new \App\Helpers\InputHelper;
    $equipment_list = \App\Helpers\InputHelper::equipment_list();
    $subcontractor_list = \App\Helpers\InputHelper::subcontractor_list();
    @endphp 

<div class="row">

{{ Form::open(['class'=>'subcontractor-work-edit-form form form-horizontal']) }}

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                {{ Form::bsInput('text', 'transaction_no', $subcontractorwork['transaction_no'], 'Transaction ID', ['readonly']) }}
                {{ Form::bsSelect('subcontractor', $subcontractorwork['subcontractor_id'], 'Sub Contractor', $subcontractor_list) }}

                {{ Form::bsInput('text', 'project', $subcontractorwork['project'], 'Project Name') }}
                {{ Form::bsDatePicker('project_start_date', $dateHelper->human_date($subcontractorwork['project_start_date'], true), 'Project Start Date') }}
                {{ Form::bsInput('text', 'contract_amount', $subcontractorwork['contract_amount'], 'Contract Amount') }}
            </div>
            <div class="col-md-6 text-area-uniform-height">
                {{ Form::bsDatePicker('transaction_date', $dateHelper->human_date($subcontractorwork['transaction_date'], true), 'Date') }}
                {{ Form::bsSelect('equipment', $subcontractorwork['equipment_id'], 'Equipment', $equipment_list) }}

                {{ Form::bsTextarea('scope_of_work', $subcontractorwork['scope_of_work'], 'Scope of Work') }}
            </div>

            <div class="pull-right">

                <button type="submit" class="btn btn-success text-uppercase"> Update Info <i class="fa fa-edit"></i></button>
                
                <br><br>

            </div>
        </div>

        </div>
        
{{ Form::close() }}

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-ecms">
                        <thead>
                        <tr class="default-header">
                            <th>#</th>
                            <th>Date</th>
                            <th>Current Paid</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @php

                            $total_current_paid_amt = 0;

                        @endphp

                        @if(count($subcontractorwork['breakdown_payment']) < 1)
                            <tr>
                                <td colspan="26" class="table-no-records">- No payments made yet -</td>
                            </tr>
                        @endif

                        @foreach ($subcontractorwork['breakdown_payment'] as $k => $payment)

                        @php
                            $total_current_paid_amt += $payment['current_paid_amount'];

                        @endphp
                        

                            <tr>
                                <td>{{ $k + 1 }}</td>
                       
                                <td>{{ $dateHelper->transaction_date($payment['date_payment']) }}

                                    <input type="date" name="" value="{{ $payment['date_payment'] }}" style="visibility: hidden;">

                                </td>

                                

                                <td align= right>
                                    <span id="cur_amt_display_{{ $payment['id'] }}"> 

                                        {{ $numFormat->number_format_by_currency('PHP', $payment['current_paid_amount']) }}
                                        
                                    </span>


                                    <span id="edit_cur_amt_{{ $payment['id'] }}" class = "cur_paid_amt_input">
                                    
                                {{ Form::open(['class'=>'subcontractor-work-edit-form form form-horizontal']) }}

                                        <input 
                                        type="text" 
                                        name="current_paid_amount"
                                        value="{{ $payment['current_paid_amount'] }}">

                                        <input 
                                        type="hidden" 
                                        name="subcon_payment_id"
                                        value = "{{ $payment['id'] }}"
                                        >

                                        <button type="submit"
                                        class="btn btn-success" 
                                         name="">   Update

                                         </button>

                                {{ Form::close() }}

                                    </span>

                                </td>


                                <td> <button class = "btn btn-success edit-payment" value = "{{ $payment['id'] }}"
                                ><i class="fa fa-edit"> </i> </button></td>

                            </tr>

                        @endforeach

                            <tfooter>

                                <tr> 
                                    <td> 
                                    <td> 
                                    <td align=right> Total: {{ number_format($total_current_paid_amt, 2) }} 
                                    <td>

                            </tfooter>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


@php

     $total_accomplishment = $inputHelper::calculate_percentage($subcontractorwork['contract_amount'], $total_current_paid_amt);

@endphp

        <div class="col-md-12">

            <div class="form-group ">

                <div class="col-md-12">

                        <label for="warranty" class="control-label input-group-label">
                            Accomplishment
                        </label>

                    <div class="form-input-group">
                            <label for="warranty" class="control-label input-group-label text-success font-size-19">
                                {{ $total_accomplishment }}%
                            </label>
                    </div>

                </div>

            </div>
        </div>
            
        <div class="col-md-12">

            <div class="row">

            @if($total_accomplishment == 100)

                {{ Form::bsInput('text', 'warranty', $subcontractorwork['warranty'], 'Warranty Expiry Date') }}

            @endif

            </div>

        </div>

    @if($total_accomplishment != 100)

        {{ Form::open(['class'=>'subcontractor-work-edit-form form form-horizontal']) }}


        <div class="row">

            <div class="col-md-12">


                <div class="col-md-12">
 
                     {{ Form::bsDatePicker('date_payment', old('date_payment'), 'Date Payment') }}

 
                </div>

                <div class="col-md-12">

                    {{ Form::bsInput('text', 'amount_to_pay', old('amount_to_pay'), 'Amount to Pay') }}

                </div>

 
            </div>
 
            <div class="col-md-12">

                    <button type="submit" class="btn btn-success text-uppercase">Add Payment <i class="fa fa-paper-plane"></i></button>

            </div>

             
            {{ Form::close() }}

        </div>

    @endif

    </div>
</div>

<script>
    CodeJquery(function () {
 
        $('.subcontractor-work-edit-form').submit(function (event) {
            event.preventDefault();

            sendAjax('axios', {
                url: '{{ url('subcontractor/work/edit/'.$subcontractorwork['id']) }}',
                type: 'post',
                data: $(this).serialize(),
                element: $(this)
            });

        });

        createDatePicker('dateInline', { tag: '#transaction_date, #project_start_date', format: 'MMMM DD, YYYY', default_date: '{{ Carbon\Carbon::now()  }}' });

        $(".cur_paid_amt_input").hide();

        $(".edit-payment").click(function(){

             $("#edit_cur_amt_" + $(this).attr('value')).show();
             $("#cur_amt_display_" + $(this).attr('value')).hide();

         });

        
        $('.subcontractor-work-payment-edit-form').submit(function (event){

            event.preventDefault();

            sendAjax('axios', {
                url: '{{ url('subcontractor/work/edit/') }}',
                type: 'post',
                data: $(this).serialize(),
                element: $(this)
            });

        });

        createDatePicker('dateInline', { tag: '#date_payment', format: 'MMMM DD, YYYY', default_date: '{{ Carbon\Carbon::now()  }}' });

    });

</script>