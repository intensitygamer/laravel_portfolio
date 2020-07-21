@php
    // refactor magic numbers
    $permission = (new \Permission);
    $oils = \App\Helpers\InputHelper::lubricant_type_of_oil_list();
@endphp

{{ Form::open(['class'=>'lubricant-stock-form form form-horizontal']) }}
    <div class="row">
        <div class="col-md-12">
            {{ Form::bsInput('text', 'transaction_no', $transaction, 'Transaction ID', ['readonly']) }}
            {{ Form::bsDatePicker('transaction_date', old('transaction_date'), 'Date') }}
            {{ Form::bsRadio('type_of_oil_id', old('type_of_oil_id'),'Type of Lube', $oils) }}
            <!-- this intended for error output on radio button-->
            <div class="error-class-for-radio-button"><span id="type_of_oil_id"></span></div>

            {{ Form::bsInput('text', 'in', old('in'), 'Lube to Stock') }}
            {{ Form::bsInput('text', 'vendor', old('vendor'), 'Vendor') }}
            {{ Form::bsInput('text', 'reference_no', old('reference_no'), 'Reference No') }}
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

        $('.lubricant-stock-form').submit(function (event) {
            event.preventDefault();

            sendAjax('axios', {
                url: '{{ url('lubricant/store/stock') }}',
                type: 'post',
                data: $(this).serialize(),
                element: $(this)
            });

        });

        createDatePicker('dateInline', { tag: '#transaction_date', format: 'MMMM DD, YYYY', default_date: '{{ Carbon\Carbon::now()  }}' });

    });
</script>