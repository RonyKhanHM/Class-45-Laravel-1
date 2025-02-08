  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link">Contact</a>
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                  role="button">
                  <i class="fas fa-th-large"></i>
              </a>
          </li>
      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{url('/admin/dashboard')}}" class="brand-link">
          <img src="{{asset('backend/images/settings/'.$siteSettings->logo)}}" alt="Logo" height="70">
          <span class="brand-text font-weight-light">{{ucFirst(Auth::user()->role)}}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">

                  @if (Auth::user()->role == 'admin')
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/admin/show-catetory') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/create-catetory') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-book"></i>
                      <p>
                          SubCategories
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ url('/admin/show-subcatetory') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>List</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ url('/admin/create-subcatetory') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Add New</p>
                          </a>
                      </li>

                  </ul>
              </li>
                  @endif

                  @if (Auth::user()->role == "admin" || Auth::user()->role == "editor")
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/show-product')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/create-product') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>

                    </ul>
                </li>
                  @endif

                  <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Orders
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/all-orders')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/status-orders/pending')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/status-orders/confirmed')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Confirmed Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/status-orders/delivared')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Delivared Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/status-orders/canceled')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Canceled Orders</p>
                            </a>
                        </li>

                    </ul>
                </li>

                @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Employees
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/show-employees')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/create-employees')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>

                    </ul>
                </li>
                @endif

                @if (Auth::user()->role == "admin" || Auth::user()->role == "editor")
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/site-settings')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Site Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/show/privacy-policy')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Privacy Policy</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/show/terms-conditions')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Terms & Conditions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/show/refund-policy')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Refund Policy</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/show/payment-policy')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment Policy</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/show/about-us')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>About US</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-book"></i>
                          <p>
                              Authentication
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{url('/admin/show-credentials')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Crendentials</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{url('/admin/logout')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Logout</p>
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
