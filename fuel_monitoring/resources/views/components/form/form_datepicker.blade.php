@if($alignment == 'horizontal')

    <div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
        <label for="{{ $name }}" class="col-sm-4 control-label">
            {{ ucwords($label) }}
            @if($required)
                <span class="red">*</span>
            @endif
        </label>

        <div class="col-sm-8">
            <div class="input-group date" id="{{ $name }}_wrapper">
                {{  Form::text($name, $value, array_merge(['class'=>'form-control', 'id' => $name], $attributes))  }}
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>
    </div>

@else

    <div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
        <div class="col-md-12">
            <label for="{{ $name }}" class="control-label">
                {{ ucwords($label) }}
                @if($required)
                    <span class="red">*</span>
                @endif
            </label>
            <div class="input-group date" id="{{ $name }}_wrapper">
                {{  Form::text($name, $value, array_merge(['class'=>'form-control', 'id' => $name], $attributes))  }}
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
            @if ($errors->has($name))
                <span class="help-block">{{ $errors->first($name) }}</span>
            @endif
        </div>
    </div>

@endif


@push('scripts')
<script type="text/javascript">
    CodeJquery(function(){
        var format = "{{ !empty($name['format']) ? $name['format'] : 'MMMM DD, YYYY' }}"
        createDatePicker('dateInline', { tag: '#{{ $name }}', format: format });
    })
</script>
@endpush

