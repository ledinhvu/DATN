<?php use App\Components\Util; ?>
<table class="table table-responsive" id="events-table">
    <thead>
        <th>Menu</th>
        <th>Title</th>
        <th>Content</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($events as $event)
        <tr>
            <td>
                @foreach($event->menus as $menu) 
                    {!! $menu->name !!} 
                @endforeach
            </td>
            <td>{{ $event->title }}</td>
            <td>{!! Util::theExcerpt($event->content) !!}</td>
            <td>
                {!! Form::open(['route' => ['events.destroy', $event->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('events.show', [$event->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('events.edit', [$event->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>