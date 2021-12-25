<div class="form-group row {{ $errors->has("$name") ? 'has-error' : null }}">
    {!! Form::label("$name", $label, ['class'=>'']) !!}
    {!! Form::input($type ?? 'text', "$name", null, ['class'=>'form-control', 'placeholder'=>$label]) !!}
    {!! $errors->first("$name", '<span class="text-danger">:message</span>') !!}
</div>
<!-- / -->