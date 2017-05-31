
<!-- Name Student Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $feedback->student->name }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $feedback->title }}</p>
</div>

<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    <p>{!! $feedback->content !!}</p>
</div>


