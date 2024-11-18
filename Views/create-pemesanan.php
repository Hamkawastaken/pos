<?php

require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Category.php';
require_once __DIR__ . '/../Model/Items.php';
require_once __DIR__ . '/../Model/Sale.php';

if(isset($_SESSION["full_name"])) {
  $name = $_SESSION["full_name"];
  $avatar = $_SESSION["avatar"];
} 

$menu = new Item();
$menus = $menu->all();

// $sale = new Sale();
// $sale = $sale->all();
// var_dump($sale);



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Blank Page &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include ('../components/layout/navbar.php')?>
      <?php include ('../components/layout/sidebar.php')?>

      <!-- Main Content -->
      <div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Tambah Pesanan</h1>
    </div>

    <div class="section-body">
      <div class="row g-4">

      <!-- List Menu di Setengah Layar -->
        <div class="col-12 col-md-6">
          <!-- <h5 class="text-center mb-4">Daftar Menu</h5> -->
          <div class="row g-3 justify-content-center">
            <?php foreach ($menus as $menu) : ?>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card shadow-sm rounded overflow-hidden m-2 position-relative" style="height: 380px;">
                  <!-- Badge -->
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary text-white">
                    +1
                  </span>

                  <!-- Image -->
                  <img 
                    alt="image" 
                    src="../public/img/items/<?= $menu['attachment']?>" 
                    class="card-img-top" 
                    style="height: 250px; object-fit: cover;"
                  >

                  <!-- Card Body -->
                  <div class="card-body text-center">
                    <h5 class="card-title mb-2 text-truncate"><?= $menu['name_item']?></h5>
                    <p class="card-text text-success fw-bold"><?= $menu['price']?></p>
                    <button class="btn btn-primary btn-sm">Add to Cart</button>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
        <!-- End List Menu -->

        <!-- Card Form di Setengah Layar -->
        <div class="col-12 col-md-6">
          <div class="card shadow">
            <div class="card-header text-center">
              <h5>Form Tambah Pesanan</h5>
            </div>
            <div class="card-body">
              <!-- Form Nama Customer -->
              <div class="form-group mb-3">
                <label for="namaCustomer">Nama Customer</label>
                <input type="text" id="namaCustomer" class="form-control" placeholder="Masukkan nama customer">
              </div>

              <!-- Form Catatan -->
              <div class="form-group mb-3">
                <label for="catatan">Catatan</label>
                <textarea id="catatan" class="form-control" rows="3" placeholder="Tambahkan catatan"></textarea>
              </div>

              <!-- Form Status -->
              <div class="form-group mb-3">
                <label for="status">Status</label>
                <select id="status" class="form-control selectric">
                  <option value="terbayar">Terbayar</option>
                  <option value="hutang">Hutang</option>
                  <option value="belum_terbayar">Belum Terbayar</option>
                </select>
              </div>

              <!-- Tombol Tambah -->
              <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary">Tambah</button>
              </div>
            </div>
          </div>
        </div>
        <!-- End Card Form -->

        
      </div>
    </div>
  </section>
</div>


      <?php include ('../components/layout/footer.php')?>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/popper.js"></script>
  <script src="../assets/modules/tooltip.js"></script>
  <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../assets/modules/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
</body>
</html>