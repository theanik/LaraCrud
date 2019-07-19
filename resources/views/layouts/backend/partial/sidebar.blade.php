<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href=" {{ route('home') }}" class="brand-link">
          <img src="./img/vue-laravel-crud.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              {{-- <img src="./img/vue-laravel-crud.jpg" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
              <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  
              <li class="nav-item ">
                <a href=" {{ route('home') }}" class="nav-link {{Request::is('home') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Dashborad
                  </p>
                </a>
              </li>
              <li class="nav-item ">
                <a href=" {{ route('user.index') }}" class="nav-link {{Request::is('user*') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    User
                  </p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('category.index') }}" class="nav-link {{Request::is('category*') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-coins"></i>
                  <p>
                    Category
                  </p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('product.index') }}" class="nav-link {{Request::is('product*') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-sitemap"></i>
                  <p>
                   Product
                  </p>
                </a>
              </li>
              
              <li class="nav-item ">
                <a href="{{ route('purchases.index') }}" class="nav-link {{Request::is('purchases*') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-coins"></i>
                  <p>
                    Purchases
                  </p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('sales.index') }}" class="nav-link {{Request::is('sales*') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-coins"></i>
                  <p>
                    Sales
                  </p>
                </a>
              </li>
            
              <li class="nav-item ">
                    <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                         <i class="nav-icon fas fa-power-off"></i>
                        <p>Log Out</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
     </aside>