<table class="table table-responsive" id="times-table">
    <thead>
        <th>Time Start</th>
        <th>Time End</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($times as $times)
        <tr>
            <td>{!! $times->time_start !!}</td>
            <td>{!! $times->time_end !!}</td>
            <td>
                {!! Form::open(['route' => ['times.destroy', $times->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('times.show', [$times->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('times.edit', [$times->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>