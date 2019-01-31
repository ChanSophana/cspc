<div id="sidebar" class="nav-collapse ">
  <!-- sidebar menu start-->
  <ul class="sidebar-menu" id="nav-accordion">
    <p class="centered"><a href=""><img src="{{ URL::asset("assets/images/".Auth::user()->image)}}" class="img-circle" width="80"></a></p>
    <h5 class="centered">{{ Auth::user()->name }}</h5>
    <li class="mt">
      <a href="{{url('/home/category/')}}">
        <i class="fa fa-cubes"></i>
        <span>Category</span>
      </a>  
      
        
    </li>
    <li class="sub-menu">
    <a href="{{url('/home/product/')}}">
            <i class="fa fa-product-hunt"></i>
            <span>Product</span>
            </a>
      </li>
      <li class="sub-menu">
          <a href="{{url('/home/supplier/')}}">
            <i class="nav-icon fa fa-male"></i>
            <span>Supplier</span>
          </a>
        </li>
  </ul>
  <!-- sidebar menu end-->
</div>
