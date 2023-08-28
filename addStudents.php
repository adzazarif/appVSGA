<?php include 'header.php' ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Product</h1>
        <a class="btn btn-primary" href="students.php" role="button">kembali</a>
      </div>

      <form style="width: 80%; margin: auto;" action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">name</label>
    <input type="text" name="name" require class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Addres</label>
    <input type="text" name="addres" require class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Gender</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" value="Male" name="gender" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" value="Female" name="gender" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Female
  </label>
</div>
  </div>




  <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Religion</label>
  <select name="religion" class="form-select" id="inputGroupSelect01">
    <option selected>Select</option>
    <option value="islam">Islam</option>
    <option value="krister">Kristen</option>
    <option value="budha">Budha</option>
  </select>
</div>


  <div class="mb-3">
    <label for="">Photo</label>
    <input type="file" name="foto" class="input-control" required>
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Add</button>
</form>

 <?php
                        if(isset($_POST['submit'])){

                            $name = $_POST['name'];
                            $addres = $_POST['addres'];
                            $gender = $_POST['gender'];   
                            $religion = $_POST['religion'];
                            

                           $filename = $_FILES['foto']['name'];
                           $tmpname = $_FILES['foto']['tmp_name'];
                           $filesize = $_FILES['foto']['size'];

                           $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                           $rename = 'user'.time().'.'.$formatfile;

                           $allowedtype = array('png','jpeg','JPG','jpg','gif');

                           if(!in_array($formatfile,$allowedtype)){
                               echo "<div class='alert alert-eror'>file tidak di izinkan</div>";
                           }elseif($filesize > 100000000){
                               echo '<div class="alert alert-eror">ukuraan file tidak boleh lebih dari 1mb</div>';
                           }else{
                               move_uploaded_file($tmpname, "image/upload/" .$rename);

                                    $simpan = mysqli_query($conn, "INSERT INTO students VALUES(
                                        null,
                                        '".$name."',
                                        '".$addres."',
                                        '".$gender."',
                                        '".$religion."',
                                        '".$rename."'
                                    )");
                                    if($simpan){
                                        echo "<script>window.location='students.php'</script>";
                                    }else{
                                        echo 'gagal disimpan',mysqli_error($conn);
                                    }
                            }

                        }
                    ?>
    </main>
    <?php include 'footer.php' ?>