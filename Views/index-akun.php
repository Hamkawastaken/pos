<?php



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
            <h1>Profile</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Hi, Admin!</h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>

            <div class="row">
              <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                  <div class="card-body d-flex justify-content-center align-items-center">
                    <img src="../Fastfood.png" style="width: 400px;">
                    </div>
                  </div>
              </div>
              <div class="col-12 col-md-12 col-lg-6">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Penjualan</div>
                        <div class="profile-widget-item-value">187</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Bergabung Sejak</div>
                        <div class="profile-widget-item-value">21 Oktober 2023</div>
                      </div>
                    </div>
                  </div>
                  <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-12">
                            <label>Name</label>
                            <input type="text" class="form-control" value="Admin" required="">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" value="example@gmail.com" required="">
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Gender</label>
                            <select class="form-control selectric">
                            <option>Pria</option>
                            <option>Wanita</option>
                      </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group mb-0 col-12">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                              <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                              <div class="text-muted form-text">
                                You will get new information about products, offers and promotions
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                  
                </div>
              </div>
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

  <script></script>
</body>
</html>