@extends('layouts.admin')
@section('content')
<section class="content-header">
    <h1>
      Add User Form      
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>      
      <li class="active">{{$breadCrumb[0]}}</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <h3 class="box-title">Data Table With Full Features</h3>
                <div class="box-body">
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <table id="empTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <!--<th scope="col">Product Description</th>-->
                            <th scope="col">Stock</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                    </table>    
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection
<!-- Script -->
@section('customjs')
<script type="text/javascript">
    $(document).ready(function(){
      // DataTable
      $('#empTable').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{route('admin.products.list')}}",
         columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'amount' },
            { data: 'stock' },
            { data: 'action' },
         ]
      });

    });
    </script>   
@endsection

