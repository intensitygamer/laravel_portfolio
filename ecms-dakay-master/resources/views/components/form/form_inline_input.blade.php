 <div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    {{  Form::input($type, $name, $value, array_merge(['class'=>'form-control', 'id' => $name], $attributes))  }}

     @if ($errors->has($name))
        <span class="help-block">{{ $errors->first($name) }}</span>
    @endif
</div>
