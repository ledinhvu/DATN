<table class="table table-responsive" id="supports-table">
    <thead>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($supports as $support)
        <tr>
            <td>{{ $support->name }}</td>
            <td>{{ $support->phone }}</td>
            <td>{!! $support->email !!}</td>
            <td>
                {!! Form::open(['route' => ['supports.destroy', $support->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('supports.show', [$support->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('supports.edit', [$support->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>