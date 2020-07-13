<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdidasSHOP | CategoriesTables</title>
  <link rel="icon" href="public/images/favicon.svg" type="image/svg">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="asserts/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="asserts/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="asserts/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asserts/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="dashboard" class="nav-link">Home</a>
        </li>
      </ul>
      <!-- Right navbar -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="adminLogout" class="nav-link">Logout</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="dashboard" class="brand-link">
        <img src="public/images/logowhite.png" alt="AdminLTE Logo" class="brand-image  elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdidasSHOP</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="public/images/admin.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $_SESSION["adEmail"] ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="dashboard" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Manager
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="adCategories" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categories</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="adProduct" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Product</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="adUser" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Users</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="adOrder" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Order</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>OrderTables</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">OrderTables</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">OrderTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>USER ID</th>
                        <th>Name</th>
                        <th>ADDRESS</th>
                        <th>PHONE</th>
                        <th>DELIVERY</th>
                        <th>TOTAL ORDER</th>
                        <th>STATUS</th>
                        <th>Function</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0; $total= 0;
                      foreach ($order as $item) : ?>
                        <tr>
                          <td><?= $item->id ?></td>
                          <td><?= $item->user_id ?></td>
                          <td><?= $item->name ?></td>
                          <td><?= $item->address ?></td>
                          <td><?= $item->phone ?></td>
                          <td><?= $item->delivery ?></td>
                          <td><?= $item->total_order ?></td>
                          <td><?php switch($item->status){
                                  case 0:
                                    echo 'Doing';
                                  break;
                                  case 1:
                                    $total+=$item->total_order;
                                    echo 'Complete';
                                  break;
                                  case 2:
                                    echo 'Cancel';
                                  break;
                          } ?>     
                          <div class="modal fade" id="change<?= $i?>">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Status Order</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="editStatus" method="post">
                              <div class="modal-body">
                                <input type="hidden" name="order_id" value="<?=$item->id ?>">
                                <label for="status"></label>
                                <select name="status" id="status" value='<?=$item->status?>'>
                                    <option value="0">Doing</option>
                                    <option value="1">Complete</option>
                                    <option value="2">Cancel</option>
                                </select>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                              </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                            <div class="modal fade" id="detail<?= $i ?>">
                              <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Detail Order</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body table-responsive">
                                    <table>
                                      <thead>
                                        <tr>
                                          <th>ORDER ID</th>
                                          <th>PRODUCT ID</th>
                                          <th>PRODUCT NAME</th>
                                          <th>PRODUCT IMAGE</th>
                                          <th>ORIGINAL PRICE (VND)</th>
                                          <th>DISCOUNT (%)</th>
                                          <th>REAL PRICE (VND)</th>
                                          <th>AMOUNT</th>
                                          <th>TOTAL DETAIL</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php foreach($orderDetail[$i] as $item):?>
                                          <tr>
                                            <td><?=$item->order_id?></td>
                                            <td><?=$item->product_id?></td>
                                            <td><?=$item->name?></td>
                                            <td> <img src="<?=$item->img?>" alt="" style="width: 100px;"> </td>
                                            <td><?=$item->originalPrice?></td>
                                            <td><?=$item->discount?></td>
                                            <td><?=$item->realPrice?></td>
                                            <td><?=$item->amount?></td>
                                            <td><?=$item->total_detail?></td>
                                          </tr>
                                          <?php endforeach?>
                                      </tbody>
                                    </table>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                          </td>
                          <td><button type="button" class="btn btn-info btn-sm " data-toggle="modal" data-target="#detail<?= $i ?>"><i class="fas fa-pencil-alt"></i> Detail</button>
                          <button type="button" class="btn btn-success btn-sm " data-toggle="modal" data-target="#change<?= $i ?>"><i class="fas fa-pencil-alt"></i> Change Status</button></td>
                        </tr>
                        <?php $i += 1; ?>
                      <?php endforeach ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>USER ID</th>
                        <th>Name</th>
                        <th>ADDRESS</th>
                        <th>PHONE</th>
                        <th>DELIVERY</th>
                        <th>TOTAL ORDER</th>
                        <th>STATUS</th>
                        <th>Function</th>
                      </tr>
                    </tfoot>
                    <h3>Total: <?php echo number_format($total,0,'',','); ?> VND </h3>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.5
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="asserts/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="asserts/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="asserts/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="asserts/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="asserts/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="asserts/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="asserts/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="asserts/dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      // $('#example2').DataTable({
      //   "paging": true,
      //   "lengthChange": false,
      //   "searching": false,
      //   "ordering": true,
      //   "info": true,
      //   "autoWidth": false,
      //   "responsive": true,
      // });
    });
  </script>
</body>

</html>