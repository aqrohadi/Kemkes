<?php include("session.php"); ?>
<?php
// require_once("../koneksi.php");
// $sql = "DELETE FROM events WHERE id='" . $_GET["id"] . "'";
// $query = mysqli_query($koneksi,$sql);
// $data = mysqli_fetch_array($query); // Ambil data dari hasil eksekusi $sql
// if(is_file("../img/".$data['img_upload'])) // Jika gambar ada
// unlink("../img/".$data['img_upload']); // Hapus file gambar sebelumnya yang ada di folder images
// header("Location:tables.php");
?>

<!-- <?php
// require_once("../koneksi.php");
// // $pilih = mysqli_query("SELECT * FROM events WHERE id='" . $_GET["id"] . "'");
// // $data = mysqli_fetch_array($koneksi,$pilih);
// // $foto = $data['img_upload'];
// // unlink("../img/".$foto);
// $hapus = "DELETE FROM events WHERE id='" . $_GET["id"] . "'";
// $query = mysqli_query($koneksi,$hapus);
// $data = mysqli_fetch_array($query);
// $foto = $data['img_upload'];
// unlink("../img/".$foto);
// if($hapus)
// {
// header("Location:tables.php");
// }
// else
// {
// echo "Data Gagal Di hapus";
// }
?> -->

<?php
require_once("../koneksi.php");
	// pilih data yang akan dihapus berdasarkan id
	$sql1 = "SELECT * FROM events WHERE id='" . $_GET["id"] . "'";
	$query1 = mysqli_query($koneksi,$sql1) or die (mysqli_error());
	$data = mysqli_fetch_array($query1);
 
	// lakukan eksekusi hapus data dengan menggunakan query sql DELETE
	$sql2 = "DELETE FROM events WHERE id='" . $_GET["id"] . "'";
	$query2 = mysqli_query($koneksi,$sql2) or die (mysqli_error());
 
	// tentukan direktori penyimpanan file yang akan dihapus
    $path       = "../img/".$data["img_upload"];
    $pathfile   = "../upload/".$data["file_upload"];
    $pathfile2  = "../upload/".$data["file_upload2"];
    $pathfile3  = "../upload/".$data["file_upload3"];
 
	// cek jika ada file
	if(file_exists($path)){
	// gunakan fungsi php unlink
	unlink($path);
    header("Location:tables.php");
    }
    else
    {
    header("Location:tables.php");
    }
    // cek jika ada file
	if(file_exists($pathfile)){
        // gunakan fungsi php unlink
        unlink($pathfile);
        header("Location:tables.php");
        }
        else
        {
        header("Location:tables.php");
        }
     // cek jika ada file
	if(file_exists($pathfile2)){
        // gunakan fungsi php unlink
        unlink($pathfile2);
        header("Location:tables.php");
        }
        else
        {
        header("Location:tables.php");
        }
         // cek jika ada file
	if(file_exists($pathfile3)){
        // gunakan fungsi php unlink
        unlink($pathfile3);
        header("Location:tables.php");
        }
        else
        {
        header("Location:tables.php");
        }
?>