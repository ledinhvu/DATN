<?php use App\Components\Util; ?>
<table class="table table-responsive" id="catalogs-table">
    <thead>
        <th>Name</th>
        <th>Description</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($catalogs as $catalog)
        <tr>
            <td>{{ $catalog->name }}</td>
            <td>{!! Util::theExcerpt($catalog->description) !!}</td>
            <td>
                {!! Form::open(['route' => ['catalogs.destroy', $catalog->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('catalogs.show', [$catalog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('catalogs.edit', [$catalog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>