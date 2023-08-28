<?php

include 'koneksi.php';

if(isset($_GET['idProduct'])){
    $delete = mysqli_query($conn, "DELETE FROM printer WHERE no = '".$_GET['idProduct']."' ");
    echo "<script>window.location = 'dataProduct.php'</script>";
}

if(isset($_GET['idStudents'])){

    $students = mysqli_query($conn, "SELECT image FROM students WHERE id = '".$_GET['idStudents']."' ");
    
    if(mysqli_num_rows($students) > 0){
        $p = mysqli_fetch_object($students);
        if(file_exists("image/upload/".$p->image)){
            unlink("image/upload/".$p->image);
        }
    }

    $delete = mysqli_query($conn, "DELETE FROM students WHERE id = '".$_GET['idStudents']."' ");
    echo "<script>window.location = 'students.php'</script>";
}
