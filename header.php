<header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarExample01">
                <a class="nav-link" aria-current="page" href="#"><?php require('bootstrapSidebar.php');?></a>

          <div class="col-md-2">
            <input placeholder="введите дату " value="<?php echo date('Y-m-d'); ?>" style="margin:2px;" max="<?php echo date('Y-m-d'); ?>" type="date" class="form-control box" id="selectedDate" onchange="fetchData()"onload="fetchData()" />
        </div>

      </div>
    </div>
  </nav>
 
</header>