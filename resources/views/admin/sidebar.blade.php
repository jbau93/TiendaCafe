
<div class="sidebar shadow">
  <div class="section-top">

    <div class="user">
      <span class="subtitle">Bienvenido:</span>
      <div class="name">
        {{ Auth::user()->name}} {{ Auth::user()->lastname}}
      </div>
      <div class="email">
        {{ Auth::user()->email}}
      </div>
      <div class="logout">
        <a href="{{ url('/logout') }}" data-toggle="tooltip" data-placement="top" title="Salir">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="main">
    <ul>
      <li>
        <a href="{{ url('/admin') }}"><i class="fas fa-home"></i>Dashboard</a> 
      </li>
      <li>
        <a href="{{ url('/admin/users/all') }}"><i class="fas fa-user-friends"></i>Usuarios</a> 
      </li>
      <li>
        <a href="{{ url('/admin/products') }}"><i class="fas fa-mug-hot"></i>Productos</a> 
      </li>
      <li>
        <a href="{{ url('/admin/categories/1') }}"><i class="fas fa-tags"></i>Categorias</a>
      </li>
    </ul>
  </div>
</div>
    