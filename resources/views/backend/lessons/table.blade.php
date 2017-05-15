<?php use App\Components\Util; ?>
<table class="table table-responsive" id="lessons-table">
    <thead>
        <th>Menu</th>
        <th>Name</th>
        <th>Content</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($lessons as $lesson)
        <tr>
            <td>
                @foreach($lesson->menus as $menu) 
                    {!! $menu->name !!} 
                @endforeach
            </td>
            <td>{{ $lesson->name }}</td>
            <td>{!! Util::theExcerpt($lesson->content) !!}</td>
            <td>
                {!! Form::open(['route' => ['lessons.destroy', $lesson->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('lessons.show', [$lesson->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('lessons.edit', [$lesson->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>