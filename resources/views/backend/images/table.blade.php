<table class="table table-responsive" id="images-table">
    <thead>
        <th>Name</th>
        <th>News</th>
        <th>Lesson</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($images as $images)
        <tr>
            <td>{!! $images->name !!}</td>
            <td>@if($images->news==null)  @else {!! $images->news->title !!} @endif</td>
            <td>@if($images->lesson==null)  @else {!! $images->lesson->name !!} @endif</td>
            <td>
                {!! Form::open(['route' => ['images.destroy', $images->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('images.show', [$images->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('images.edit', [$images->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>