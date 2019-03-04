@extends('admin.layouts.app')

@section('head_section')

<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

@endsection

@section('main_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tickets Tables
        <small>Tickets tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Tickets</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{ route('ticket.create') }}" class="btn btn-danger">Add New</a>
            </div>
            <!-- /.box-header -->
            

          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($lists as $list)
                <tr>
                	<td>{{ $loop->index + 1 }}</td>
                  <td>{{ $list->name }}</td>
                  <td>{{ $list->description }}
                  </td>
                  <td><img src="{{ asset('user/img/tickets/'.$list->image) }}" height="50px" width="50px"></td>
                  <td>{{ $list->price }}</td>
                  <td> <a href="{{ route('ticket.edit',$list->id) }}" class="fa fa-edit"></a></td>
                  <td>
                  	<form method="post" id="delete_ticket-{{ $list->id }}" action="{{ route('ticket.destroy',$list->id) }}">
                  		{{ csrf_field() }}
                  		{{ method_field('DELETE') }}
                  	</form>
                  	<a href="#" class="fa fa-trash" onclick="
                  	if(confirm('Are you sure you want to delete it?'))
                  	{
                  		event.preventDefault();
                  		getElementById('delete_ticket-{{$list->id}}').submit();
                  	}
                  	else
                  	{
                  		event.preventDefault();
                  	}
                  	"></a>
                  </td>
                </tr>
                	@endforeach
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection

@section('footer_section')

<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

@endsection