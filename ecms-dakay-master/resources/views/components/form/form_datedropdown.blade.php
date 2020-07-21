@php
    $years = \App\Helpers\DateHelper::years();
    $numberMonths = \App\Helpers\DateHelper::months();
    $textMonths = \App\Helpers\DateHelper::monthsText();
    $dates = \App\Helpers\DateHelper::dates();

    $months = [];
    if(isset($mode) && $mode == 'number'){
        $months = $numberMonths;
    } else {
        $months = $textMonths;
    }
@endphp

@if($alignment == 'horizontal')
    <div class="no-row-margin form-group {{ $errors->has($name) ? 'has-error' : '' }}">
        <label for="{{ $name }}" class="col-sm-4 control-label">
            {{ ucwords($label) }}
            @if($required)
                <span class="red">*</span>
            @endif
        </label>

        <div class="col-sm-8">
            <div class="col-xs-4 col-md-4">
                {{ Form::bsSelect($name.'_month', old($name.'_month'), '', $months, ['onchange' => 'changeMonth(this);', 'required'], [], 'vertical') }}
            </div>
            <div class="align-center col-xs-1 col-md-1 no-row-padding">
                <div style="font-size: 25px; padding: 5px;">/</div>
            </div>
            <div class="col-xs-3 col-md-3">
                {{ Form::bsSelect($name.'_date', old($name.'_date'), '', $dates, ['required'], [], 'vertical') }}
            </div>
            <div class="align-center col-xs-1 col-md-1 no-row-padding">
                <div style="font-size: 25px; padding: 5px;">/</div>
            </div>
            <div class="col-xs-3 col-md-3">
                {{ Form::bsSelect($name.'_year', old($name.'_year'), '', $years, ['onchange' => 'isLeap(this);', 'required'], [], 'vertical') }}
            </div>

            @if ($errors->has($name))
                <span class="help-block">{{ $errors->first($name) }}</span>
            @endif
        </div>
    </div>
@else
    <div class="no-row-margin form-group {{ $errors->has($name) ? 'has-error' : '' }}">
        <div class="col-sm-12">
            <div class="col-xs-4 col-md-4">
                {{ Form::bsSelect($name.'_month', old($name.'_month'), '', ['onchange' => 'changeMonth(this);', 'required'], [], 'vertical') }}
            </div>
            <div class="align-center col-xs-1 col-md-1 no-row-padding">
                <div style="font-size: 25px; padding: 5px;">/</div>
            </div>
            <div class="col-xs-3 col-md-3">
                {{ Form::bsSelect($name.'_date', old($name.'_date'), '', $dates, ['required'], [], 'vertical') }}
            </div>
            <div class="align-center col-xs-1 col-md-1 no-row-padding">
                <div style="font-size: 25px; padding: 5px;">/</div>
            </div>
            <div class="col-xs-3 col-md-3">
                {{ Form::bsSelect($name.'_year', old($name.'_year'), '', $years, ['onchange' => 'isLeap(this);', 'required'], [], 'vertical') }}
            </div>

            @if ($errors->has($name))
                <span class="help-block">{{ $errors->first($name) }}</span>
            @endif
        </div>
    </div>
@endif

@push('scripts')
<script>
    var dateSelector = 'select[name={{$name.'_date'}}]';
    var monthSelector = 'select[name={{$name.'_month'}}]';
    var yearSelector = 'select[name={{$name.'_year'}}]';

    function changeMonth(event) {
        $(dateSelector).val(1);

        switch (parseInt($(event).val())) {
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                //31 days
                adjustDates('block', 'block', 'block');
                break;
            case 2:
                //28 days
                adjustDates('none', 'none', 'none');
                isLeap($(yearSelector));
                break;
            case 4:
            case 6:
            case 9:
            case 11:
                //30 days
                adjustDates('block', 'block', 'none');
                break;
        }
    }

    function adjustDates(date29, date30, date31) {
        $(dateSelector).children().last().prev().prev().css('display', date29);
        $(dateSelector).children().last().prev().css('display', date30);
        $(dateSelector).children().last().css('display', date31);
    }

    function isLeap(event) {
        if (parseInt($(monthSelector).val()) == 2) {
            $(dateSelector).val(1);

            if ((parseInt($(event).val()) % 4) == 0) {
                $(dateSelector).children().last().prev().prev().css('display', 'block');
            } else {
                $(dateSelector).children().last().prev().prev().css('display', 'none');
            }
        }
    }
</script>
@endpush