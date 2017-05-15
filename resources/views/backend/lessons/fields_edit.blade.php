<!-- Menu Field -->
<div class="form-group col-sm-6">	
    {!! Form::label('menu', 'Menu') !!}
    <select name="menu" class="form-control">
    	@foreach($menus as $menu)
    	<!--<option value="{!! $menu->id !!}">{!! $menu->name !!}</option>-->
        <option @foreach($lesson->menus as $menu1)
         @if(($menu->id) === ($menu1->id)) selected @endif @endforeach 
        value="{!! $menu->id !!}">{!! $menu->name !!}</option>
    	@endforeach
    </select>	
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'lessons-textarea']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('lessons.index') !!}" class="btn btn-default">Cancel</a>
</div>
