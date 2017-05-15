
<!-- Images Field -->
<div class="col-lg-12">
    <div class="form-group">
        {{ Form::file('image',['class' => 'control','id' => 'files', 'multiple' => 'multiple']) }}
    </div>
    <div id="selectedFiles">
        <div class="col-lg-4">
            <img style="width:300px;height:200px;margin-bottom:10px;" src="{{ url(config('path.upload_img').$images->name) }}" 
            class = "setpicture img-thumbnail img_upload" id ="image_no"></img><br>
        </div>
    </div>
</div>

<!-- News Field -->
<div class="form-group col-sm-6">	
    {!! Form::label('news', 'News') !!}
    <select name="news" class="form-control">
        <option value=""></option>
    	@foreach($news as $new)
    	<option value="{!! $new->id !!}" @if(($new->id)===($images->id_news)) selected @endif>{{ $new->title }}</option>
    	@endforeach
    </select>	
</div>

<!-- Lesson Field -->
<div class="form-group col-sm-6">	
    {!! Form::label('lesson', 'Lesson') !!}
    <select name="lesson" class="form-control">
        <option value=""></option>
    	@foreach($lesson as $lesson)
    	<option value="{!! $lesson->id !!}" @if(($lesson->id)===($images->id_lesson)) selected @endif>{{ $lesson->name }}</option>
    	@endforeach
    </select>	
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('images.index') !!}" class="btn btn-default">Cancel</a>
</div>