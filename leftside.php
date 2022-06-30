<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-wind"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Weather</div>
      </a>

      <!-- Divider -->

      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <hr class="sidebar-divider">
      
      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-eye"></i>
          <span>Detail</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Grafik dan Tabel:</h6>
            <a class="collapse-item" href="/interface/suhu">Suhu</a>
            <a class="collapse-item" href="/interface/kelembaban">Kelembaban</a>
          </div>
        </div>
      </li>
           
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Report
      </div>

      <li class="nav-item">
        <a class="nav-link" href="/laporan">
          <i class="fas fa-fw fa-table"></i>
          <span>Buat Laporan</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Log Out</span></a>
      </li>

    </ul>