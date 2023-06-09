 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa fa-user-circle"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sistema de seguros</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
            <a class="nav-link" href="/admin">
                <i class="fa fa-info-circle"></i>
            <span>Informacion</span></a>  
           
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/cliente/vehiculo')}}">
            <i class="fa fa-car"></i>
        <span>Vehiculos</span></a>  
       
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/cliente/poliza')}}">
            <i class="fa fa-address-card"></i>
        <span>Polisa</span></a>  
       
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/cliente/pago')}}">
            <i class="fa fa-address-card"></i>
        <span>Pagos</span></a>
       
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="/admin">
            <i class="fa fa-car"></i>
        <span>Siniestro</span></a>  
       
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->