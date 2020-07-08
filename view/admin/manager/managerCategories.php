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
                  <a href="adCategories" class="nav-link active">
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
                  <a href="adOrder" class="nav-link">
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
              <h1>CategoriesTables</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">CategoriesTables</li>
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
                  <h3 class="card-title">CategoriesTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <caption><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add"><i class="fas fa-folder-plus"></i> Add</button></caption>
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Categories ID</th>
                        <th>Item Name</th>
                        <th>Function</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php for ($i = 0; $i < count($categoriesDetail); $i++) : ?>
                        <tr>
                          <td><?= $categoriesDetail[$i]->id ?></td>
                          <td><?php
                              switch ($categoriesDetail[$i]->categories_id) {
                                case 1:
                                  echo 'Nam';
                                  break;
                                case 2:
                                  echo 'Nữ';
                                  break;
                                case 3:
                                  echo 'Trẻ em';
                                  break;
                              }
                              ?></td>
                          <td><?= $categoriesDetail[$i]->item_name ?></td>
                          <td><button type="button" onclick="edit(<?= $i + 1 ?>)" class="btn btn-info btn-sm " data-toggle="modal" data-target="#edit"><i class="fas fa-pencil-alt"></i> Edit</button>
                            <a class="btn btn-danger btn-sm" href="deleteCat?id=<?= $categoriesDetail[$i]->id ?>"><i class="fas fa-trash"></i> Delete</a></td>
                        </tr>
                      <?php endfor ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Categories ID</th>
                        <th>Item Name</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <!-- edit -->
          <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="editCategories">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Categories</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="editCat" method="post">
                  <div class="modal-body d-flex flex-column">
                    <label for="id">ID</label>
                    <input type="text" name="id" id="id" value="">
                    <label for="categories_id"> Categories ID </label>
                    <select name="categories_id" id="categories_id">
                      <option value="1">Nam</option>
                      <option value="2">Nữ</option>
                      <option value="3">Trẻ em</option>
                    </select>
                    <label for="item_name">Item Name</label>
                    <input type="text" name="item_name" id="item_name" value="">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <script>
            const Table = document.getElementById('example1');
            const IDEdit = document.getElementById('id');
            const Categories = document.getElementById('categories_id');
            const Item = document.getElementById('item_name');

            function edit(row) {
              Table.rows[row]
              IDEdit.value = Table.rows[row].cells[0].innerText;
              type = Table.rows[row].cells[1].innerText;
              switch (type) {
                case 'Nam':
                  Categories.value = 1;
                  break;
                case 'Nữ':
                  Categories.value = 2;
                  break;
                case 'Trẻ em':
                  Categories.value = 3;
                  break;
              }
              Item.value = Table.rows[row].cells[2].innerText;
            }
          </script>
          <!-- /.edit -->
          <!-- add -->
          <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="addCategories">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="addCat" method="post">
                  <div class="modal-body d-flex flex-column">
                    <!-- <label for="add_id">ID</label>
                  <input type="text" name="id" id="add_id" value=""> -->
                    <label for="categories_add"> Categories ID </label>
                    <select name="categories_id" id="categories_add">
                      <option value="1">Nam</option>
                      <option value="2">Nữ</option>
                      <option value="3">Trẻ em</option>
                    </select>
                    <label for="add_name">Item Name</label>
                    <input type="text" name="item_name" id="add_name" value="">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.add -->
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
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>