@extends('backend.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Feedback</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('backend.feedback.table')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){ 
            $('#feedback-table').DataTable();
        });
    </script>
@endsection