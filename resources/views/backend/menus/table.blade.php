<?php use App\Components\Util; ?>
<table class="table table-responsive" id="menus-table">
    <thead>
        <th>Catalog</th>
        <th>Name</th>
        <th>Cost</th>
        <th>Times</th>
        <th>Teacher</th>
        <th>Description</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($menus as $menu)
        <tr>
            <td>{!! $menu->catalogs->name !!}</td>
            <td>{{ $menu->name }}</td>
            <td>{{ $menu->cost }}</td>
            <td>@foreach($menu->times as $time) 
                    {!! $time->time_start !!} - {!! $time->time_end !!}   
                @endforeach</td>
            <td>{!! $menu->teachers->name !!}</td>
            <td>{!! Util::theExcerpt($menu->description) !!}</td>
            <td>
                {!! Form::open(['route' => ['menus.destroy', $menu->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('menus.show', [$menu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('menus.edit', [$menu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>