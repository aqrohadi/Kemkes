<?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
        
        //melakukan koneksi ke database
        $koneksi        = mysqli_connect("localhost", "root", "", "riset");

        //melakukan koneksi ke calendar
        try {
	            $bdd = new PDO('mysql:host=localhost;dbname=riset;charset=utf8', 'root', '');
            }
                catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }

        //mengambil data table
        $select             = "select * from events ORDER BY id DESC";
        $select             = mysqli_query($koneksi, $select);

        $selectid           = "select * from events WHERE id='" . $_GET["id"] . "'";
        $selectid           = mysqli_query($koneksi, $selectid);

        $selectass          = "select * from assign";
        $selectass          = mysqli_query($koneksi, $selectass);

        $selectbrand        = "select * from brand";
        $selectbrand        = mysqli_query($koneksi, $selectbrand);

        $selectdept         = "select * from dept";
        $selectdept         = mysqli_query($koneksi, $selectdept);

        $selidass           = "select * from assign WHERE id='" . $_GET["id"] . "'";
        $selidass           = mysqli_query($koneksi, $selidass);

        $selfil             = "select * from events GROUP BY title";
        $selfil             = mysqli_query($koneksi, $selfil);

        $selfilbrand        = "select * from events GROUP BY brand";
        $selfilbrand        = mysqli_query($koneksi, $selfilbrand);

        $selfildept         = "select * from events GROUP BY dept";
        $selfildept         = mysqli_query($koneksi, $selfildept);

        $seliddept          = "select * from events INNER JOIN dept ON events.dept = dept.id";
        $seliddept          = mysqli_query($koneksi, $seliddept);

        $selectuser         = "select * from user";
        $selectuser         = mysqli_query($koneksi, $selectuser);
?>