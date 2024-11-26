<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/dashboard')}}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>    
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">Category</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">          
          <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category')}}">Add category</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('admin/view')}}">View category</a></li>
                    
        </ul>
      </div>
    </li>    
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
        aria-controls="form-elements">
        <i class="mdi mdi-view-headline menu-icon"></i>
        <span class="menu-title">Brands</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{url('admin/brand')}}">View brand</a></li>          
        </ul>
      </div>
    </li>    
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="mdi mdi-chart-pie menu-icon"></i>
        <span class="menu-title">Products</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ url('admin/product')}}">View Products</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Home slider</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ url('admin/sliders')}}">view sliders</a></li>
          </li>
        </ul>
      </div>
    </li>    
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <i class="mdi mdi-emoticon menu-icon"></i>
        <span class="menu-title">Icons</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu">          
          <li class="nav-item"> <a class="nav-link" href="../../pages/icons/font-awesome.html">Font Awesome</a></li>                              
        </ul>
      </div>
    </li>    
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../../pages/samples/blank-page.html"> Blank Page </a></li>
          <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a></li>
          <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a></li>
          <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Login </a></li>          
          <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Register </a></li>                    
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../../../docs/documentation.html">
        <i class="mdi mdi-file-document-box menu-icon"></i>
        <span class="menu-title">logout</span>
      </a>
    </li>
  </ul>
</nav>