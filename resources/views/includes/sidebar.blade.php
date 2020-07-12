<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
<!-- Brand Logo -->
<a href="/" class="brand-link">
    <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png')}}"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">Kelompok 13</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->

    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item"><a href="/" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}"><i class="nav-icon fas fa-home"></i><p> Beranda</p></a></li>
        <li class="nav-item"><a href="/pertanyaan" class="nav-link {{ (request()->is('pertanyaan*')) ? 'active' : '' }}"><i class="nav-icon far fa-question-circle"></i> <p>Pertanyaan</p></a></li>
        <li class="nav-item"><a href="/pertanyaan" class="nav-link {{ (request()->is('info*')) ? 'active' : '' }}"><i class="nav-icon fas fa-info-circle"></i> <p>Info</p></a></li>
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
