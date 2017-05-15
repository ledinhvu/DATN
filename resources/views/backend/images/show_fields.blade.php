
<!--View Image Field-->
<div class="form-group">
    <img style="border:none; width: 300px; height: 150px;" src="{{ url(config('path.upload_img').$images->name) }}" class = "setpicture img-thumbnail img_upload" id ="image_no"></img>
</div>

<!-- News Field -->
<div class="form-group">
    {!! Form::label('news', 'News Title:') !!}
    <p>@if($images->news==null)  @else {!! $images->news->title !!} @endif</p>
</div>

<!-- Lesson Field -->
<div class="form-group">
    {!! Form::label('lesson', 'Lesson Name:') !!}
    <p>@if($images->lesson==null)  @else {!! $images->lesson->name !!} @endif</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $images->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $images->updated_at !!}</p>
</div>

