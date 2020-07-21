@if($alignment == 'horizontal')

    <div class="daterange--wrapper">
        <div class="form-group {{ ($errors->has($from['name']) && $errors->has($to['name'])) ? 'has-error' : '' }}">
            <label for="{{ $from['name'] }}" class="col-sm-4 control-label">
                {{ ucwords($label) }}
                @if($required)
                    <span class="red">*</span>
                @endif
            </label>
            <div class="col-sm-8 no-row-padding no-row-margin">
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has($from['name']) ? 'has-error' : '' }}">
                        <div class="input-group date" id="{{ $from['name'] }}_wrapper">
                            {!!  Form::text($from['name'], $from['value'], array_merge(['class'=>'form-control', 'id' => $from['name']], $from['attributes'])) !!}
                            <span class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has($to['name']) ? 'has-error' : '' }}">
                        <div class="input-group date" id="{{ $to['name'] }}_wrapper">
                            {!!  Form::text($to['name'], $to['value'], array_merge(['class'=>'form-control', 'id' => $to['name']], $to['attributes'])) !!}
                            <span class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@else

    <div class="daterange--wrapper row">
        <div class="form-group no-margin-left-right {{ ($errors->has($from['name']) && $errors->has($to['name'])) ? 'has-error' : '' }}">
            <div class="col-sm-12">
                <div class="col-sm-6 no-padding-left">
                    <label for="{{ $from['name'] }}" class="control-label">
                        {{ ucwords($from['label']) }}
                    </label>
                    <div class="{{ $errors->has($from['name']) ? 'has-error' : '' }}">
                        <div class="input-group date" id="{{ $from['name'] }}_wrapper">
                            {!!  Form::text($from['name'], $from['value'], array_merge(['class'=>'form-control', 'id' => $from['name']], $from['attributes'])) !!}
                            <span class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 no-padding">
                    <label for="{{ $to['name'] }}" class="control-label">
                        {{ ucwords($to['label']) }}
                    </label>
                    <div class="{{ $errors->has($to['name']) ? 'has-error' : '' }}">
                        <div class="input-group date" id="{{ $to['name'] }}_wrapper">
                            {!!  Form::text($to['name'], $to['value'], array_merge(['class'=>'form-control', 'id' => $to['name']], $to['attributes'])) !!}
                            <span class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif

@push('scripts')
<script type="text/javascript">
    CodeJquery(function(){
        var format = "{{ !empty($from['format']) ? $from['format'] : 'MMMM DD, YYYY' }}"
        createDatePicker('dateRange', { from: '#{{ $from['name'] }}', to: '#{{ $to['name'] }}', format: format })
    })
</script>
@endpush