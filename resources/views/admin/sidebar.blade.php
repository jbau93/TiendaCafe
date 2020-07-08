
<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading user">
    {{Auth::user()->name}} {{Auth::user()->lastname}}<br>
    {{Auth::user()->email}} 
  </div>
    <div class="list-group list-group-flush">
      <a href="{{url('/admin')}}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-home"></i> Dashboard</a>
      <a href="{{url('/admin/users')}}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user-friends"></i> Usuarios</a>
      <a href="{{url('/admin/products')}}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-mug-hot"></i> Productos</a>
    </div>
  <a href="{{url('/logout')}}"><i class="fas fa-sign-out-alt"></i></a>
</div>
    