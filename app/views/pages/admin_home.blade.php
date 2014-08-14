@extends('layouts.admin_default')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12" id="content">
            <h1 class="page-header">Dashboard</h1>

            <div class="panel panel-default">
               <!--  <div class="panel-heading">
                    Basic Tabs
                </div> -->
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#users" data-toggle="tab">Users</a>
                        </li>
                        <li><a href="#category" data-toggle="tab">Categories</a>
                        </li>
                        <li><a href="#product" data-toggle="tab">Products</a>
                        </li>
                        <li><a href="#sales" data-toggle="tab">Sales Invoice</a>
                        </li>
                    </ul>
                        <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="users">
                            <div class="row">
                                <div class="col-lg-12">  
                                    <h4>Users Table</h4>
                                    <div class="panel-body">
                                        <div class="table-responsive"> 
                                            <table class="table table-striped table-bordered table-hover"  id="users_table">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Password</th>
                                                        <th>Role</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                      @foreach($users as $user)
                                                        <tr>
                                                            <td>{{ $user->id }}</td>
                                                            <td>{{ $user->first_name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ Str::limit($user->password,20) }}</td>
                                                            <td>{{ $user->role }}</td>
                                                        </tr>
                                                      @endforeach                                          
                                                </tbody>
                                            </table>
                                       </div> <!-- End of table-responsive  -->   
                                   </div>
                               </div>
                           </div>     
                        </div><!--  End of users -->
                       
                       <!-- ============================ Category ========================= -->
                        <div class="tab-pane fade" id="category">
                            <h4>Category Names</h4>
                                <ul class="list-group">
                                    @foreach($nav_cat as $cat)  
                                        <li class="list-group-item">{{ $cat->category_name }}</li>
                                    @endforeach                                      
                                </ul>
                        </div> <!-- End of Category -->


                       <!--  ===========================Product Tab ==========================  -->  
                            <div class="tab-pane fade" id="product">  
                                <div class="row">
                                    <div class="col-lg-12">                  
                                        <h4>Product Table</h4>
                                 <div class="panel-body">
                                    <div class="table-responsive"> 
                                        <table class="table table-striped table-bordered table-hover" id="product_table">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Slug</th>
                                                    <th>Price</th>
                                                    <th>isFeatured</th>                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 @foreach($products as $product)
                                                    <tr>
                                                        <td class="admin_tbl_prod">                                                        
                                                            {{ HTML::image($product->image, '$product->product_name') }}
                                                        </td>
                                                        {{--
                                                            <!-- td class="table_img_container">
                                                                 <div class="view_admin_product_container">
                                                                     <img src="{{$product->image}}" />
                                                                  </div>
                                                            </td> -->
                                                        --}}                                                        
                                                        <td>{{ $product->product_name }}</td>
                                                        <td>{{ $product->description }}</td>
                                                        <td>{{ $product->slug }}</td>
                                                        <td>{{ $product->price }}</td>
                                                        <td>{{ $product->isFeatured }}</td>                                                        
                                                    </tr>
                                                  @endforeach                                      
                                            </tbody> <!-- End of tbody -->
                                            </table> <!-- End of table -->
                                        </div> <!-- End of table-responsive -->
                                    </div> <!-- End of panel-body -->                               
                              </div> <!-- End of col-lg-12 -->                        
                            </div>  <!--End of main-row-->                       
                        </div> <!--End of product tab-->

                        <div class="tab-pane fade" id="sales">
                                <h4>Settings Tab</h4>
                                <p>Show Sales Invoice</p>
                        </div> <!-- End of sales -->

                    </div><!-- End of tab-content -->                        
                </div> <!-- End of panel-body -->
            </div> <!-- End of panel panel default -->
        </div> <!-- End of col-lg12 -->
    </div><!-- End of row -->
</div><!-- End of wrapper -->
@stop  
@section('admin_scripts')

    {{ Minify::javascript(array('/admin_style/js/plugins/metisMenu/jquery.metisMenu.js', 
    '/admin_style/js/plugins/dataTables/jquery.dataTables.js', '/admin_style/js/plugins/dataTables/dataTables.bootstrap.js', 
    '/admin_style/js/sb-admin.js')) }}

<script>
    $(document).ready(function() {
        $('#product_table').dataTable();
        $('#users_table').dataTable();
    });
</script>
@stop