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
                  <a href="adUser" class="nav-link active">
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
              <h1>UserTables</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">UserTables</li>
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
                  <h3 class="card-title">UserTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <button type="button" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#add"><i class="fas fa-folder-plus"></i> Add</button>
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Created Date</th>
                        <th>Function</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php for($i=0;$i<count($user);$i++) : ?>
                        <tr>
                          <td><?= $user[$i]->id ?></td>
                          <td><?= $user[$i]->email ?></td>
                          <td><?= $user[$i]->password ?></td>
                          <td><?= $user[$i]->name ?></td>
                          <td><?= $user[$i]->address ?></td>
                          <td><?= $user[$i]->phone ?></td>
                          <td><?= $user[$i]->created ?></td>
                          <td><button type="button" onclick="edit(<?= $i + 1 ?>)" class="btn btn-info btn-sm " data-toggle="modal" data-target="#edit"><i class="fas fa-pencil-alt"></i> Change Pass</button>
                            <a class="btn btn-danger btn-sm" href="deleteUser?id=<?= $user[$i]->id ?>"><i class="fas fa-trash"></i> Delete</a></td>
                        </tr>
                      <?php endfor ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Created Date</th>
                        <th>Function</th>
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
                <form action="editUser" method="post">
                  <div class="modal-body d-flex flex-column">
                    <label for="id">ID</label>
                    <input type="text" name="id" id="id" value="">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Password" pattern="(?=.*[a-zA-Z0-9]).{6,}" title="Mật khẩu có ít nhất 6 kí tự và không có kí tự đặc biệt!">
                    <h4 class="err"><?= $err['password'] ?></h4>
                    <label for="">Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" pattern="(?=.*[a-zA-Z0-9]).{6,}" required title="Mật khẩu có ít nhất 6 kí tự và không có kí tự đặc biệt!">
                    <h4 class="err"><?= $err['confirm_password'] ?></h4>
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

            function edit(row) {
              IDEdit.value = Table.rows[row].cells[0].innerText;
            }
          </script>
          <!-- /.edit -->
          <!-- add -->
          <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="addCategories">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="addUser" method="post">
                  <div class="modal-body d-flex flex-column">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="E-Mail" required>
                    <h4 class="err"><?= $err['email'] ?></h4>
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Password" pattern="(?=.*[a-zA-Z0-9]).{6,}" title="Mật khẩu có ít nhất 6 kí tự và không có kí tự đặc biệt!">
                    <h4 class="err"><?= $err['password'] ?></h4>
                    <label for="">Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" pattern="(?=.*[a-zA-Z0-9]).{6,}" required title="Mật khẩu có ít nhất 6 kí tự và không có kí tự đặc biệt!">
                    <h4 class="err"><?= $err['confirm_password'] ?></h4>
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="FullName" required>
                    <h4 class="err"><?= $err['name'] ?></h4>
                    <label for="">Address</label>
                    <input type="text" name="address" placeholder="Address" required>
                    <h4 class="err"><?= $err['address'] ?></h4>
                    <label for="">Phone</label>
                    <input type="tel" name='phone' placeholder="PhoneNumber" pattern="^0[0-9]{9,10}$" required title="Không phải số điện thoại!">
                    <h4 class="err"><?= $err['phone'] ?></h4>
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
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">User Admin Table with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <!-- <button type="button" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#add"><i class="fas fa-folder-plus"></i> Add Admin</button> -->
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Created Date</th>
                        <th>Function</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($userAd as $one) : ?>
                        <tr>
                          <td><?= $one->id ?></td>
                          <td><?= $one->email ?></td>
                          <td><?= $one->password ?></td>
                          <td><?= $one->name ?></td>
                          <td><?= $one->address ?></td>
                          <td><?= $one->phone ?></td>
                          <td><?= $one->created ?></td>
                          <!-- <td><a class="btn btn-danger btn-sm" href="delete?id=<?= $one->id ?>"><i class="fas fa-trash"></i></a></td> -->
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Created Date</th>
                        <th>Function</th>
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
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>
</body>

</html>