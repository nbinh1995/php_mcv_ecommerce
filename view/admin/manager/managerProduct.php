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

<body class="hold-transition sidebar-mini">
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
                  <a href="adProduct" class="nav-link active">
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
              <h1>ProductTables</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">ProductTables</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Product content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">ProductTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <caption><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add"><i class="fas fa-folder-plus"></i> Add</button></caption>
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Categories Detail ID</th>
                        <th>Item Name</th>
                        <th>Content</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Product New</th>
                        <th>Product Hot</th>
                        <th>Create Date</th>
                        <th>Function</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php for ($i = 0; $i < count($product); $i++) : ?>
                        <tr>
                          <td><?= $product[$i]->id ?></td>
                          <td><?php
                              foreach ($categoriesDetail as $type) {
                                if ($product[$i]->categories_detail_id === $type->id) {
                                  echo $type->item_name;
                                  break;
                                }
                              }
                              ?></td>
                          <td><?= $product[$i]->name ?></td>
                          <td><?= $product[$i]->content ?></td>
                          <td><?= $product[$i]->price ?></td>
                          <td><?= $product[$i]->discount ?></td>
                          <td><?php if ($product[$i]->isNew) echo 'Có';
                              else echo 'Không'; ?></td>
                          <td><?php if ($product[$i]->isHot) echo 'Có';
                              else echo 'Không'; ?></td>
                          <td><?= $product[$i]->created ?></td>
                          <td><button type="button" onclick="edit(<?= $i + 1 ?>)" class="btn btn-info btn-sm " data-toggle="modal" data-target="#edit"><i class="fas fa-pencil-alt"></i> Edit</button>
                            <a class="btn btn-danger btn-sm" href="deletePro?id=<?= $product[$i]->id ?>"><i class="fas fa-trash"></i> Delete</a></td>
                        </tr>
                      <?php endfor ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Categories Detail ID</th>
                        <th>Item Name</th>
                        <th>Content</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Product New</th>
                        <th>Product Hot</th>
                        <th>Create Date</th>
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
            <div class="modal-dialog modal-lg" role="editCategories">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Categories</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="editPro" method="post" enctype="multipart/form-data">
                  <div class="modal-body d-flex flex-column">
                    <label for="id">ID</label>
                    <input type="text" name="id" id="id" value="">
                    <label for="categories_detail_id"> Categories Detail ID </label>
                    <select name="categories_detail_id" id="categories_detail_id">
                      <?php foreach ($categoriesDetail as $type) : ?>
                        <option value="<?= $type->id ?>"><?= $type->item_name ?></option>
                      <?php endforeach ?>
                    </select>
                    <label for="item_name">Item Name</label>
                    <input type="text" name="name" id="item_name" value="">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="30" rows="10"></textarea>
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" value="">
                    <label for="discount">Discount</label>
                    <input type="text" name="discount" id="discount" value="">
                    <label for="isNew">Product New</label>
                    <select name="isNew" id="isNew">
                      <option value="0">Không</option>
                      <option value="1">Có</option>
                    </select>
                    <label for="isHot">Product Hot</label>
                    <select name="isHot" id="isHot">
                      <option value="0">Không</option>
                      <option value="1">Có</option>
                    </select>
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
            const Categories = document.getElementById('categories_detail_id');
            const Item = document.getElementById('item_name');
            const Content = document.getElementById('content');
            const Price = document.getElementById('price');
            const Discount = document.getElementById('discount');
            const News = document.getElementById('isNew');
            const Hot = document.getElementById('isHot');

            function edit(row) {
              Table.rows[row]
              IDEdit.value = Table.rows[row].cells[0].innerText;
              temp = Table.rows[row].cells[1].innerText;
              <?php foreach ($categoriesDetail as $type) : ?>
                if (temp === '<?= $type->item_name ?>') Categories.value = <?= $type->id ?>;
              <?php endforeach ?>
              Item.value = Table.rows[row].cells[2].innerText;
              Content.value = Table.rows[row].cells[3].innerText;
              Price.value = Table.rows[row].cells[4].innerText;
              Discount.value = Table.rows[row].cells[5].innerText;
              $temp1 = Table.rows[row].cells[6].innerText;
              if ($temp1 === 'Không') News.value = 0;
              else News.value = 1;
              $temp2 = Table.rows[row].cells[7].innerText;
              if ($temp2 === 'Có') Hot.value = 1;
              else Hot.value = 0;
            }
          </script>
          <!-- /.edit -->
          <!-- add -->
          <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="editCategories">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Categories</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="addPro" method="post" enctype="multipart/form-data">
                  <div class="modal-body d-flex flex-column">
                    <!-- <label for="id">ID</label>
                    <input type="text" name="id" id="id" value=""> -->
                    <label for="Acategories_detail_id"> Categories Detail ID </label>
                    <select name="categories_detail_id" id="Acategories_detail_id">
                      <?php foreach ($categoriesDetail as $type) : ?>
                        <option value="<?= $type->id ?>"><?= $type->item_name ?></option>
                      <?php endforeach ?>
                    </select>
                    <label for="Aitem_name">Item Name</label>
                    <input type="text" name="name" id="Aitem_name" value="">
                    <label for="Acontent">Content</label>
                    <textarea name="content" id="Acontent" cols="30" rows="5"></textarea>
                    <label for="Aprice">Price</label>
                    <input type="text" name="price" id="Aprice" value="">
                    <label for="Adiscount">Discount</label>
                    <input type="text" name="discount" id="Adiscount" value="">
                    <label for="AisNew">Product New</label>
                    <select name="isNew" id="AisNew">
                      <option value="0">Không</option>
                      <option value="1">Có</option>
                    </select>
                    <label for="AisHot">Product Hot</label>
                    <select name="isHot" id="AisHot">
                      <option value="0">Không</option>
                      <option value="1">Có</option>
                    </select>
                    <!-- <label for="AfileToUploadI">Image</label>
                    <input type="file" name="fileToUpload" id="AfileToUploadI">
                    <img id="blah1" src="http://placehold.it/100" alt="your image" width="100px" height="100px"/> -->
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
      <!-- img content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">ImgProductTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <caption><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addImg"><i class="fas fa-folder-plus"></i> Add</button></caption>
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Product ID</th>
                        <th>Image</th>
                        <th>Function</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php for ($i = 0; $i < count($imgProduct); $i++) : ?>
                        <tr>
                          <td><?= $imgProduct[$i]->id ?></td>
                          <td><?= $imgProduct[$i]->product_id ?></td>
                          <td><img src="<?= $imgProduct[$i]->img ?>" alt="img_<?= $imgProduct[$i]->id ?>" width="100px"></td>
                          <td><button type="button" onclick="editI(<?= $i + 1 ?>)" class="btn btn-info btn-sm " data-toggle="modal" data-target="#editImg"><i class="fas fa-pencil-alt"></i> Edit</button>
                            <a class="btn btn-danger btn-sm" href="deleteImgPro?id=<?= $imgProduct[$i]->id ?>"><i class="fas fa-trash"></i> Delete</a></td>
                        </tr>
                      <?php endfor ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Product ID</th>
                        <th>Image</th>
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
          <div class="modal fade" id="editImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="editCategories">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Categories</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="editImgPro" method="post" enctype="multipart/form-data">
                  <div class="modal-body d-flex flex-column">
                    <label for="idI">ID</label>
                    <input type="text" name="id" id="idI" value="">
                    <label for="product_id"> Product ID </label>
                    <input type="text" name="product_id" id="product_id">
                    <label for="fileToUpload">Image</label>
                    <!-- <input type="text" name="target" id="url_img"> -->
                    <img src="" alt="" id="img" width="100px">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <img id="blah" src="http://placehold.it/100" alt="your image" width="100px" height="100px"/>
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
            const TableI = document.getElementById('example2');
            const IDImgEdit = document.getElementById('idI');
            const Product = document.getElementById('product_id');
            const Img = document.getElementById('img');
            const UrlImg = document.getElementById('url_img');

            function editI(row) {
              TableI.rows[row]
              IDImgEdit.value = TableI.rows[row].cells[0].innerText;
              Product.value = TableI.rows[row].cells[1].innerText;
              Img.src = TableI.rows[row].cells[2].lastElementChild.src;
              // UrlImg.value = TableI.rows[row].cells[2].lastElementChild.src;
            }
          </script>
          <!-- /.edit -->
          <!-- add -->
          <div class="modal fade" id="addImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="editCategories">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Categories</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="addImgPro" method="post" enctype="multipart/form-data">
                  <div class="modal-body d-flex flex-column">
                    <!-- <label for="id">ID</label>
                    <input type="text" name="id" id="id" value=""> -->
                    <label for="Aproduct_idI"> Product ID </label>
                    <input type="number" name="product_id" id="Aproduct_idI" min='1' max='<?= count($product) ?>'>
                    <label for="AfileToUploadI">Image</label>
                    <input type="file" name="fileToUpload" id="AfileToUploadI">
                    <img id="blah1" src="http://placehold.it/100" alt="your image" width="100px" height="100px"/>
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
      <!-- /.img content -->
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
      $("#example2").DataTable({
        "responsive": true,
        "autoWidth": false,
      });

      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }
      function readURL1(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#blah1').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }
      $("#AfileToUploadI").change(function() {
        readURL1(this);
      });

      $("#fileToUpload").change(function() {
        readURL(this);
      });
     
      // $('.summernote').summernote();
      // $('#example1').DataTable({
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