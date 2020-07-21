@php
    // refactor magic numbers
    $permission = (new \Permission);
    $equipment_list = \App\Helpers\InputHelper::equipment_list();
    $location_list = \App\Helpers\InputHelper::location_list();
    $operator_list = \App\Helpers\InputHelper::operator_list();
    $oils = \App\Helpers\InputHelper::lubricant_type_of_oil_list();
@endphp

{{ Form::open(['class'=>'lubricant-use-form form form-horizontal']) }}
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    {{ Form::bsInput('text', 'transaction_no', $transaction, 'Transaction ID', ['readonly']) }}
                </div>
                <div class="col-md-6">
                    {{ Form::bsDatePicker('transaction_date', old('transaction_date'), 'Date') }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {{ Form::bsSelect('equipment', old('equipment'), 'Equipment', $equipment_list) }}
                </div>
                <div class="col-md-6">
                    {{ Form::bsSelect('operator', old('operator'), 'Operator', $operator_list) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {{ Form::bsInput('text', 'project', old('project'), 'Project Name') }}
                </div>
                <div class="col-md-6">
                    {{ Form::bsSelect('location', old('location'), 'Location', $location_list) }}
                </div>
            </div>
            {{ Form::bsTextarea('remarks', old('remarks'), 'Remarks', ['rows'=>5]) }}
            {{ Form::bsRadio('type_of_oil_id','','Type of Lube', $oils) }}
            <!-- this intended for error output on radio button-->
            <div class="error-class-for-radio-button"><span id="type_of_oil_id"></span></div>

            {{ Form::bsInput('text', 'out', old('out'), 'Lube Usage') }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button type="submit" class="btn btn-success text-uppercase">Submit <i class="fa fa-paper-plane"></i></button>
            </div>
        </div>
    </div>
{{ Form::close() }}


<script>
    CodeJquery(function () {

        $('.lubricant-use-form').submit(function (event) {
            event.preventDefault();

            sendAjax('axios', {
                url: '{{ url('lubricant/store/use') }}',
                type: 'post',
                data: $(this).serialize(),
                element: $(this)
            });

        });

        createDatePicker('dateInline', { tag: '#transaction_date', format: 'MMMM DD, YYYY', default_date: '{{ Carbon\Carbon::now()  }}' });

    });
</script>