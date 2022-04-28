  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Medicine</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Website Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.site.setting')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Site Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.sitemap.setting')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sitemap Setting</p>
                </a>
              </li>
              <li class="nav-item d-none">
                <a href="{{route('admin.route.pages')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pages</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.pages')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pages</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.slider')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.benefit')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Benefits</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-map-marker"></i>
              <p>
                Location
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.country')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Country</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.state')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>State</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.city')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>City</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="{{route('admin.pincode.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pincode</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item">
            <a href="{{route('admin.category.list')}}" class="nav-link">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Category
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.brand.list')}}" class="nav-link">
              <i class="nav-icon fa fa-gift"></i>
              <p>
                Brand
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            
              <i class="nav-icon fa fa-user"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.user.add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.user.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            
              <i class="nav-icon fa fa-user"></i>
              <p>
                Vender
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.vender.add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Vender</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.vender.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vender List</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.product.add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.productcsv.add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Csv Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.product.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product List</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Order
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{route('admin.order.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order List</p>
                </a>
              </li>
              
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Wallet
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.wallet.userlist')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="{{route('admin.wallet.request.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wallet Request</p>
                </a>
              </li>
             
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>