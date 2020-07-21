@php
    // refactor magic numbers
    $permission = (new \Permission);
    $equipment_list = \App\Helpers\InputHelper::equipment_list();
    $subcontractor_list = \App\Helpers\InputHelper::subcontractor_list();
@endphp

{{ Form::open(['class'=>'subcontractor-work-create form form-horizontal']) }}
    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-6">
                    {{ Form::bsInput('text', 'transaction_no', $transaction, 'Transaction ID', ['readonly']) }}
                    {{ Form::bsDatePicker('transaction_date', old('transaction_date'), 'Date') }}
                    {{ Form::bsSelect('subcontractor', old('subcontractor'), 'Sub Contractor', $subcontractor_list) }}                               
 

                    {{ Form::bsSelect('equipment', old('equipment'), 'Equipment', $equipment_list) }}

                    
                </div>
                <div class="col-md-6 text-area-uniform-height">
                    {{ Form::bsInput('text', 'project', old('project'), 'Project Name') }}
                    {{ Form::bsTextarea('scope_of_work', old('scope_of_work'), 'Scope of Work') }}
                    {{ Form::bsInput('text', 'contract_amount', old('contract_amount'), 'Contract Amount') }}
                    {{ Form::bsInput('text', 'total_current_paid_amount', old('total_current_paid_amount'), 'Amount to Pay') }}
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button type="submit" class="btn btn-success text-uppercase">Submit<i class="fa fa-paper-plane"></i></button>
            </div>
        </div>
    </div>
{{ Form::close() }}



<script>
    CodeJquery(function () {

 
        $('.subcontractor-work-create').submit(function (event) {
            event.preventDefault();

            sendAjax('axios', {
                url: '{{ url('subcontractor/work/store') }}',
                type: 'post',
                data: $(this).serialize(),
                element: $(this)
            });

        });

        createDatePicker('dateInline', { tag: '#transaction_date, #project_start_date', format: 'MMMM DD, YYYY', default_date: '{{ Carbon\Carbon::now()  }}' });
    });
</script>