
<?php

require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Category.php';
require_once __DIR__ . '/../Model/Sale.php';

$sales = new Sale();
$sales = $sales->all2(0, 3);
$categories = new Category();

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
$limit = 3; 
$start = ($page - 1) * $limit;
$totalData = count($categories->all()); 
$totalPages = ceil($totalData / $limit); 


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
  <link rel="stylesheet" href="assets/modules/prism/prism.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include('../components/layout/navbar.php'); ?>

      <?php include('../components/layout/sidebar.php'); ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Home Category</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Advanced Table</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" id="search" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div id="content" class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>
                          <th>Nama Categori</th>
                          <th>Catatan</th>
                          <th>Jumlah</th>
                          <th>Nama Cashier</th>
                          <th>Status Pembayaran</th>
                          <th>Action</th>
                        </tr>
                        <?php foreach ($sales as $category) : ?>
                        <tr >
                          <td class="">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                              <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?= $category["name_customer"] ?></td>
                          <td><?= $category["note"] ?></td>
                          <td><?= $category["amount"] ?></td>
                          <td><?= $category["full_name"] ?></td>
                          <td><?= $category["status"] ?></td>
                          <td class="justify-content-end">
                            <button onclick="modalDetail(<?= $category['id_sales'] ?>, '<?= $category['name_customer'] ?>')" class="btn btn-primary mr-1"><i class="far fa-eye"></i> Detail</button>
                            <a href="edit-category.php?id=<?= $category['id_sales']?>" class="btn btn-success mr-1"> <i class="far fa-edit"></i> Edit</a>
                            <a href="../services/delete-category.php?id=<?= $category['id_sales']?>" class="btn btn-danger mr-1" onclick="return confirm('Are you sure want to delete this?')"><i class="far fa-trash-alt"></i> Hapus</a>
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </table>
                    </div>
                  </div>
                  <div class="card-body">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        
                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                      <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
                    </li>
            
                  
                <?php

                for ($i = 1; $i <= $totalPages; $i++) : ?>
                  <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                  </li>
                <?php endfor; ?>

            <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
            </li>
        </ul>
    </nav>
</div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php include('../components/layout/footer.php'); ?>
    </div>

    <!-- Modal -->

            <div class="modal fade" tabindex="-1" role="dialog" id="detailModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Modal body text goes here.</p>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
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

  <!-- Js Libraies -->
  <script src="../assets/modules/prism/prism.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/bootstrap-modal.js"></script>


  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>


  <script>
    $(document).ready(function() {
      $("#search").on("keyup", function() {
        $("#content").load("../assets/search/category.php?keyword=" + $(this).val());
      });
    });
    function modalDetail(id, name) {
      $('#detailModal .modal').empty();
      let content = '</ul>';
      content += `<li><strong>Id Kategori:</strong> ${id}</li>`;
      content += `<li><strong>Name Kategori:</strong> ${name}</li>`;
      content += '</ul>';
      $('#detailModal .modal-body').html(content);
      $('#detailModal .modal-title').text('Detail Kategori');
      $('#detailModal').modal('show');
    }
  </script>
</body>

</html>
