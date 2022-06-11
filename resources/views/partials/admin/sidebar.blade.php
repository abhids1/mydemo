<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('/admin/users/')}}" ><i class="fa fa-user"></i> View Users</a></li>
            <li>              
                <a id="index" href="{{url('/admin/users/create')}}">
                <i class="fa fa-user"></i>Add Users
              </a>
            </li>
            <li>              
                <a id="index" href="{{url('/admin/users/form')}}">
                <i class="fa fa-user"></i>Multi Step Form
              </a>
            </li>
          </ul>
        </li>   
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('/admin/products')}}" ><i class="fa fa-user"></i> View Product</a></li>
            <li>              
                <a id="index" href="{{url('/admin/users/create')}}">
                <i class="fa fa-user"></i>Add Product
              </a>
            </li>
          </ul>
        </li> 

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Products With Yajra</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('/admin/products/index_yajra')}}" ><i class="fa fa-user"></i> View Product</a></li>
            <li>              
                <a id="index" href="{{url('/admin/users/create')}}">
                <i class="fa fa-user"></i>Add Product
              </a>
            </li>
          </ul>
        </li> 


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>