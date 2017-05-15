<!-- Name Cat Field -->
<div class="form-group col-sm-6">	
    {!! Form::label('id_cat', 'Catalogs') !!}
    <select name="id_cat" class="form-control">
    	@foreach($catalogs as $catalog)
    	<option value="{!! $catalog->id !!}">{!! $catalog->name !!}</option>
    	@endforeach
    </select>	
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cost', 'Cost:') !!}
    {!! Form::text('cost', null, ['class' => 'form-control']) !!}
</div>

<!-- Times Field -->
<div class="form-group col-sm-6">	
    {!! Form::label('times', 'Times') !!}
    <select name="times" class="form-control">
    	@foreach($times as $time)
    	<option value="{!! $time->id !!}">{!! $time->time_start !!} to {!! $time->time_end !!}</option>
    	@endforeach
    </select>	
</div>

<!-- Teachers Field -->
<div class="form-group col-sm-6">	
    {!! Form::label('teachers', 'Teachers') !!}
    <select name="teachers" class="form-control">
    	@foreach($teachers as $teacher)
    	<option value="{!! $teacher->id !!}">{!! $teacher->name !!}</option>
    	@endforeach
    </select>	
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'menus-textarea']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('menus.index') !!}" class="btn btn-default">Cancel</a>
</div>
