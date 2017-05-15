<?php use App\Components\Util; ?>
<table class="table table-responsive" id="feedback-table">
    <thead>
        <th>Name</th>
        <th>Title</th>
        <th>Content</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($feedback as $feedback)
        <tr>
            <td>{{ $feedback->student->name }}</td>
            <td>{{ $feedback->title }}</td>
            <td>{!! Util::theExcerpt($feedback->content) !!}</td>
            <td>
                {!! Form::open(['route' => ['feedback.destroy', $feedback->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('feedback.show', [$feedback->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('feedback.edit', [$feedback->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>