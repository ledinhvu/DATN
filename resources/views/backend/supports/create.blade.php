@extends('backend.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Support
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'supports.store']) !!}

                        @include('backend.supports.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
