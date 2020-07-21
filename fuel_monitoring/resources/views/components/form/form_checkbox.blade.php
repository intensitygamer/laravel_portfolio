@if($alignment == 'horizontal')

    <div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
        <label for="{{ $name }}" class="col-sm-4 control-label">
            {{ ucwords($label) }}
            @if($required)
                <span class="red">*</span>
            @endif
        </label>

        <div class="col-sm-8">
            <div class="col-sm-12 row">
                @foreach($options as $val => $key)
                    @php($checked = ($val == $value) ? 'checked' : '')
                    <label class="control-label">{!! Form::checkbox($name,$val,$checked,$attributes) !!} {{ ucwords($key) }} </label>&nbsp;&nbsp;
                @endforeach
            </div>

            @if ($errors->has($name))
                <span class="help-block">{{ $errors->first($name) }}</span>
            @endif
        </div>
    </div>

@else

    <div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
        <label for="{{ $name }}" class="control-label">
            {{ ucwords($label) }}
            @if($required)
                <span class="red">*</span>
            @endif
        </label>

        <div class="col-sm-12 row">
            @foreach($options as $val => $key)
                @php($checked = ($val == $value) ? 'checked' : '')
                <label class="control-label">{!! Form::checkbox($name,$val,$checked,$attributes) !!} {{ ucwords($key) }} </label>&nbsp;&nbsp;
            @endforeach
        </div>

        @if ($errors->has($name))
            <span class="help-block">{{ $errors->first($name) }}</span>
        @endif
    </div>

@endif
