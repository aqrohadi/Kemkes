<?php include("session.php"); ?>
<?php
include('../koneksi.php');
  if(isset($_POST['cek'])){
    $imginfo=PATHINFO($_FILES["img_upload"]["name"]);
    $newImgname=$imginfo['filename'] ."_". time() . "." . $imginfo['extension'];
    move_uploaded_file($_FILES["img_upload"]["tmp_name"],"../img/" . $newImgname);
    $folder = $newImgname;

    $select_query = "SELECT * FROM events WHERE id='" . $_GET["id"] . "'";
    $result = mysqli_query($koneksi,$select_query);
    $row = mysqli_fetch_array($result);
    // tentukan direktori penyimpanan file yang akan dihapus
    $path = "../img/".$row["img_upload"];

  // cek jika ada file
  if(file_exists($path)){
    // gunakan fungsi php unlink
    unlink($path);
    $message = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Success!</strong> Record & Image Modified Successfully.
                </div>';
  } else {
                echo "Data Gagal Di hapus";
  }

    $sql = "UPDATE events set img_upload='$folder' WHERE id='" . $_POST["id"] . "'";
    mysqli_query($koneksi,$sql);
    $message = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Success!</strong> Record & Image Modified Successfully.
                </div>';
  } else {
    $sql = "UPDATE events set style_number='" . $_POST["style_number"] . "', nama='" . $_POST["nama"] . "', tmp_lahir='" . $_POST["tmp_lahir"] . "', tgl_lahir='" . $_POST["tgl_lahir"] . "', tmp_lahir='" . $_POST["tmp_lahir"] . "', jabatan='" . $_POST["jabatan"] . "', status='" . $_POST["status"] . "' WHERE id='" . $_POST["id"] . "'";
      mysqli_query($koneksi,$sql); // Eksekusi/ Jalankan query dari variabel $query
  }

      if(count($_POST)>0) {
        $sql = "UPDATE events set style_number='" . $_POST["style_number"] . "', nama='" . $_POST["nama"] . "', tmp_lahir='" . $_POST["tmp_lahir"] . "', tgl_lahir='" . $_POST["tgl_lahir"] . "', tmp_lahir='" . $_POST["tmp_lahir"] . "', jabatan='" . $_POST["jabatan"] . "', status='" . $_POST["status"] . "' WHERE id='" . $_POST["id"] . "'";
      mysqli_query($koneksi,$sql); // Eksekusi/ Jalankan query dari variabel $query
        $message = '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Record Modified Successfully. <br /><a href="tables.php" class="btn btn-primary btn-sm-2">View Tables</a>
                    </div>';
          
}
$select_query = "SELECT * FROM events WHERE id='" . $_GET["id"] . "'";
$result = mysqli_query($koneksi,$select_query);
$row = mysqli_fetch_array($result);
// $startEvent = date("Y-m-d", strtotime($row['start_event']));
// $endEvent = date("Y-m-d", strtotime($row['end_event']));
// $startEvent = date("Y-m-d\TH:i:s", strtotime($row['start_event']));
// $endEvent = date("Y-m-d\TH:i:s", strtotime($row['end_event']));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Data</title>
    <link rel="icon" href="../assets/logo/logo2.png">
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui.min.css">
    <script type="text/javascript" src="../assets/js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../assets/js/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>        
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
  </head>
  <style>
    body {
    font-family: 'Helvetica Neue Light', 'Open Sans', Helvetica;
    font-size: 12px;
    font-weight: 300;
    }
  </style>
  <style>
    .form-control {
        display: block;
        width: 100%;
        height: calc(1.3em + 0.70rem + 2px);
        padding: 0.350rem 0.50rem;
        font-size: 0.8rem;
        font-weight: 280;
        line-height: 1;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
    .btn-sm-2, .btn-group-sm > .btn {
        padding: 0.30rem 0.7rem;
        font-size: 0.7rem;
        line-height: 0.5;
        border-radius: 0.2rem;
        margin-top: 0.5rem;
        }
    .dropdown-item {
        display: block;
        width: 100%;
        padding: 0.25rem 1.5rem;
        clear: both;
        font-weight: 400;
        font-size: 0.8rem;
        color: #212529;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
        }
  </style>
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <center><a class="navbar-brand" href="index.php"><img class="logo" src="../assets/logo/logo2.svg" width="90px" height="20px" alt="DHG"></a></center>
      <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
      <!-- Navbar Search-->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
          <!-- <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
              <div class="input-group-append">
                  <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
              </div>
          </div> -->
      </form>
      <!-- Navbar-->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"> </i><?php echo $_SESSION['fullname']; ?></a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <!-- <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div> -->
            <a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
          </div>
        </li>
      </ul>
    </nav>
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav">
              <div class="sb-sidenav-menu-heading">Dashboard</div>
              <a class="nav-link" href="index.php">
                <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                Calendar
              </a>
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                Summary
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="summary.php">Brand</a>
                  <a class="nav-link" href="summary_dept.php">Dept</a>
                  <a class="nav-link" href="summary_date.php">Date</a>
                </nav>
              </div>
              <!-- <div class="sb-sidenav-menu-heading">Others</div> -->
              <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                  <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                  Layouts
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="layout-static.html">Static Navigation</a>
                      <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                  </nav>
              </div> -->
              <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                  <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                  Pages
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a> -->
              <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                      <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                          Add Input
                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                      </a>
                      <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                          <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="input_any.php">Asignee</a>
                              <a class="nav-link" href="input_brand.php">Brand</a>
                              <a class="nav-link" href="input_dept.php">Dept</a>
                          </nav>
                      </div> -->
                      <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                          Summary
                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                      </a>
                      <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                          <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="summary.php">Brand</a>
                              <a class="nav-link" href="summary_dept.php">Dept</a>
                              <a class="nav-link" href="summary_date.php">Date</a>
                          </nav>
                      </div> -->
                  </nav>
              </div>
              <div class="sb-sidenav-menu-heading">Item Menu</div>
              <a class="nav-link" href="input_data.php">
                  <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                  Add Data Events
              </a>
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                Add Data Others
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="input_any.php">Asignee</a>
                  <a class="nav-link" href="input_brand.php">Brand</a>
                  <a class="nav-link" href="input_dept.php">Dept</a>
                </nav>
              </div>
              <a class="nav-link" href="tables.php">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Tables Events
              </a>
            </div>
          </div>
          <div class="sb-sidenav-footer">
            <div class="small">Company:</div>
            Daehan Global
          </div>
        </nav>
      </div>
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid">
            <!-- <h4 class="mt-4">Edit Data</h4> -->
            &nbsp;
            <ol class="breadcrumb mb-4">
              <h5><i class="fas fa-edit mr-1"></i>Edit Data</h5> 
            </ol>
            <!-- <div class="card mb-4">
                <div class="card-body">
                    DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                    <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                    .
                </div>
            </div> -->
            <div class="card mb-4">
              <!-- <div class="card-header">
                  <h5><i class="fas fa-edit mr-1"></i>Edit Data</h5>
              </div> -->
              &nbsp;
              <div class="container">
                <form name="frmUser" method="post" action="" enctype="multipart/form-data">
                 <?php if(isset($message)) { echo $message; } ?>
                  <div class="form-group row">
                    <label for="style_number" class="col-sm-2 col-form-label">ID Number</label>
                    <div class="col-sm-10">
                                            <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
                      <input type="text" class="form-control" name="style_number" value="<?php echo $row['style_number']; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                      <label for="title" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="tmp_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tmp_lahir" value="<?php echo $row['tmp_lahir']; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label> 
                    <div class="col-sm-10">
                      <input type="text" id="tgl_lahir" class="form-control" name="tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>">
                    </div>
                  </div>

                  <div id="status-group" class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="status" id="status">
                        <option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
                        <option value="Tidak Aktif"> Tidak Aktif</option>
                        <option value="Cuti"> Cuti</option>
                        <option value="Aktif"> Aktif</option>
                      </select>
                    </div>
                  </div>

                  <div id="pic-group" class="form-group row">
                    <label for="pic" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="jabatan" value="<?php echo $row['jabatan']; ?>">
                    </div>
                  </div>

                  <div id="imgupload-group" class="form-group row">
                    <label for="img_upload" class="col-sm-2 col-form-label">Select Image</label>
                    <div class="col-sm-9">
                      <img id="output" src="../img/<?php echo $row['img_upload'] ?>" data-src="holder.js/140x140" alt='Thumbnail' class="img-thumbnail img-responsive"/></br>
                      <input type="file" name="img_upload" onchange="loadFile(event)" class="btn btn-outline-dark btn-sm-2"> 
                    </div>
                  </div>

                  <div id="fabric-group" class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <textarea class="ckeditor" id="alamat" name="alamat"><?php echo $row['alamat']; ?></textarea>
                    </div>
                  </div>
  
                  <div class="text-right">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                  </div> &nbsp;
                </form>
              </div> &nbsp;
            </div>
          </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
              <div class="text-muted">Copyright &copy; <a href="https://www.dhgsourcing.com/"> Daehan Global</a> 2020</div>
              <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="http://imsky.github.com/holder/holder.js"></script>
   <script type="text/javascript">
      $(document).ready(function(){
        $("#tgl_lahir").datepicker();
        // $("#tgl").datepicker({
        //  numberOfMonths: 3,
        // });
        });
    </script>
    <script>
      var loadFile = function(event) {
      var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
      };
    </script>
  </body>
</html>