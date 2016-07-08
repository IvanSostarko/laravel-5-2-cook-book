@extends('layouts.public')

@section('htmlheader_title')
   My Recipes
@endsection

@section('contentheader_title')
   My recipes
@endsection

@section('sidebar')
    @include('layouts.partials.frontend.menu_items')
@endsection

@section('main-content')

    @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('message_type') }}" role="alert">
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif

    <table class="table" id="main_table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Date published</th>
            <th>Actions</th>

        </tr>
        </thead>
        <tbody>


        @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td><a href="{{ route('web.item', $item->id) }}"><img src="{{ $item->image }}" width="150px" /></a></td>
                <td><a href="{{ route('web.item', $item->id) }}">{{ $item->name }}</a></td>
                <td><a href="{{ route('web.category', $item->category_id) }}">{{ $item->categories->name }}</a></td>
                <td>{{ date('d.m.Y', strtotime($item->created_at)) }}</td>
                <td>
                  	<a href="{{ route('user.items.edit', $item->id) }}"><i class="fa fa-pencil"></i></a>


                    <a href="{{ route('user.items.destroy', $item->id) }}" title="Delete file"><i class="fa fa-ban"></i></a>

                </td>

            </tr>
        @endforeach

        </tbody>

    </table>

@endsection

@section('styles')
    <link href="{{ asset('/public/plugins/validation/css/formValidation.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/public/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/public/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('scripts')
    <script src="{{ asset('/public/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/public/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>


    <script type="text/javascript">
        $(function () {

            $('#main_table').dataTable({
                "bPaginate": true,
                "iDisplayLength": 25,
                "bLengthChange": true,
                "bFilter": true,
                "bSort": false,
                "bInfo": true,
                "bAutoWidth": true

            });
        });

    </script>
@endsection
