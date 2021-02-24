<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

      <div class="sidebar-brand-text mx-3">Blanja - Ecommerce</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
      <a class="nav-link" href="{{ route('admin.home') }}" wire:click="$refresh">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Features
    </div>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.category') }}" wire:click="$refresh">
        <i class="fab fa-fw fa-wpforms"></i>
        <span>Category</span>
      </a>
    </li>


  </ul>
  <!-- Sidebar -->
