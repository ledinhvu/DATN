<!-- Name Field -->
<div class="col-lg-12">
    <div class="form-group">
        {{ Form::file('image[]',['class' => 'control','id' => 'files', 'multiple' => 'multiple']) }}
    </div>
    <div id="selectedFiles"></div>
</div>

<!-- News Field -->
<div class="form-group col-sm-6">	
    {!! Form::label('news', 'News') !!}
    <select name="news" class="form-control">
        <option value=""></option>
    	@foreach($news as $new)
    	<option value="{!! $new->id !!}">{!! $new->title !!}</option>
    	@endforeach
    </select>	
</div>

<!-- Lesson Field -->
<div class="form-group col-sm-6">	
    {!! Form::label('lesson', 'Lesson') !!}
    <select name="lesson" class="form-control">
        <option value=""></option>
    	@foreach($lesson as $lesson)
    	<option value="{!! $lesson->id !!}">{!! $lesson->name !!}</option>
    	@endforeach
    </select>	
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('images.index') !!}" class="btn btn-default">Cancel</a>
</div>
