<!-- Time_Start Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_start', 'Time_Start:') !!}
    {!! Form::date('time_start', null, ['class' => 'form-control']) !!}
</div>

<!-- Time_End Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_end', 'Time_End:') !!}
    {!! Form::date('time_end', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('times.index') !!}" class="btn btn-default">Cancel</a>
</div>
