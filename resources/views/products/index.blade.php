@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Manage Product</div>

                <div class="card-body">
                    
                    <a href="{{ route('products.create.step.one') }}" class="btn btn-primary pull-right">Create Product</a>

                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <table id='empTable' class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <!--<th scope="col">Product Description</th>-->
                            <th scope="col">Stock</th>
                            <th scope="col">Amount</th>
                            <!--<th scope="col">Status</th>-->
                        </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- Script -->
<script type="text/javascript">
    $(document).ready(function(){

      // DataTable
      $('#empTable').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{route('products.getProducts')}}",
         columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'amount' },
            { data: 'stock' },
         ]
      });

    });
    </script>   
@endsection
