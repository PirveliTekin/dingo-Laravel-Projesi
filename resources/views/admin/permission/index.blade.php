@extends('admin.layouts.master')@section('head')    <head>        <meta charset="utf-8">        <meta http-equiv="X-UA-Compatible" content="IE=edge">        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">        <meta name="description" content="">        <meta name="author" content="">        <title>{{$title}}</title>        <!-- Custom styles for this template-->        <link href="{{mix('admins/css/sb-admin.css')}}" rel="stylesheet">        <!-- Custom fonts for this template-->        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"              rel="stylesheet">        <link href="{{asset('admins/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">    </head>@endsection@section('content')    <div class="card shadow mb-4">        <div class="card-header py-3">            <h6 class="m-0 font-weight-bold text-primary">Routes</h6>        </div>        <div class="card-body">            @if (Session::has('error'))                <div class="alert alert-danger" role="alert">{{ Session::get('error') }}                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">                        <span aria-hidden="true">&times;</span>                    </button>                </div>                {{Session::forget('error')}}            @elseif(Session::has('success'))                <div class="alert alert-success" role="alert">{{ Session::get('success') }}                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">                        <span aria-hidden="true">&times;</span>                    </button>                </div>                {{Session::forget('success')}}            @endif            <div class="table-responsive">                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">                    <thead>                    <tr>                        <th>Name</th>                        <th>Description</th>                        <th>İs Main</th>                        <th>Guard Name</th>                        <th>Action</th>                    </tr>                    </thead>                    <tfoot>                    <tr>                        <th>Name</th>                        <th>Description</th>                        <th>İs Main</th>                        <th>Guard Name</th>                        <th>Action</th>                    </tr>                    </tfoot>                    <tbody>                    @foreach($permissions as $permission)                        <tr>                            <td>{{$permission->name}}</td>                            <td>{{$permission->description}}</td>                            <td>                                @if($permission->is_main===1)                                    Yes                                @else                                    No                                @endif                            </td>                            <td>{{$permission->guard_name}}</td>                            <td>                                <a href="{{route('admin.permissions.destroy',$permission->id)}}"                                   class="btn btn-circle btn-info btn-sm float-left"                                   title="Edit"><i class="fa fa-pen"></i></a>                                <form method="POST" action="{{route('admin.permissions.destroy',$permission->id)}}">                                    @csrf                                    @method('DELETE')                                    <button class="btn btn-circle btn-danger btn-sm ml-1 float-left"                                            title="Delete"><i                                                class="fa fa-trash"></i></button>                                </form>                            </td>                        </tr>                    @endforeach                    </tbody>                </table>            </div>        </div>    </div>@endsection@section('foot_js')    <!-- Page level plugins -->    <script src="{{asset('admins/js/datatables/jquery.dataTables.min.js')}}"></script>    <script src="{{asset('admins/js/datatables/dataTables.bootstrap4.min.js')}}"></script>/    <!-- Page level custom scripts -->    <script src="{{asset('admins/js/demo/datatables-demo.js')}}"></script>@endsection