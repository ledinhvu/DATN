<?php use App\Components\Util; ?>
<table class="table table-responsive" id="teachers-table">
    <thead>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Information</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($teachers as $teachers)
        <tr>
            <td>{{ $teachers->name }}</td>
            <td>{!! $teachers->phone !!}</td>
            <td>{!! $teachers->email !!}</td>
            <td>{{ $teachers->address }}</td>
            <td>{!! Util::theExcerpt($teachers->information) !!}</td>
            <td>
                {!! Form::open(['route' => ['teachers.destroy', $teachers->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('teachers.show', [$teachers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('teachers.edit', [$teachers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>