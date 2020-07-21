@if($alignment == 'horizontal')

    <div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
        <label for="{{ $name }}" class="col-sm-4 control-label">
            {{ ucwords($label) }}
            @if($required)
                <span class="red">*</span>
            @endif
        </label>

        <div class="col-sm-8">
            {{  Form::textarea($name, $value, array_merge(['class'=>'form-control', 'id' => $name], $attributes))  }}
            @if ($errors->has($name))
                <span class="help-block">{{ $errors->first($name) }}</span>
            @endif
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
            {{  Form::textarea($name, $value, array_merge(['class'=>'form-control', 'id' => $name], $attributes))  }}

            @if ($errors->has($name))
                <span class="help-block">{{ $errors->first($name) }}</span>
            @endif
        </div>
    </div>

@endif
