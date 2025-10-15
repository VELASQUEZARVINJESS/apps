<?php
// Dashboard page - requires authentication
require_once __DIR__ . '/../../core/config.php';
if (!isset($_SESSION['user'])) {
    // Not logged in -> include login page
    include __DIR__ . '/login.php';
    exit;
}
?>
<?php include __DIR__ . '/../part/head.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include __DIR__ . '/../part/navbar.php'; ?>

  <?php include __DIR__ . '/../part/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>0</h3>
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include __DIR__ . '/../part/footer.php'; ?>

</div>
<?php include __DIR__ . '/../part/script.php'; ?>
</body>
