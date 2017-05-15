<!-- Name Catalog Field -->
<div class="form-group">
    {!! Form::label('catalog', 'Catalog:') !!}
    <p>{{ $menu->catalogs->name }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $menu->name }}</p>
</div>

<!-- Times Field -->
<div class="form-group">
    {!! Form::label('times', 'Times:') !!}
    <p>
        @foreach($menu->times as $time) 
            {!! $time->time_start !!} - {!! $time->time_end !!}   
        @endforeach
    </p>
</div>

<!-- Teachers Field -->
<div class="form-group">
    {!! Form::label('teachers', 'Teachers:') !!}
    <p>{{ $menu->teachers->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $menu->description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $menu->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $menu->updated_at !!}</p>
</div>

