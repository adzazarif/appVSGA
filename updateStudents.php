<?php include 'header.php' ;

$students   = mysqli_query($conn, "SELECT * FROM students WHERE id = '".$_GET['id']."'");
if(mysqli_num_rows($students) == 0){
    echo "<script>window.location ='students.php'</script>";
}
$p          = mysqli_fetch_object($students);
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Students</h1>
        <a class="btn btn-primary" href="dataProduct.php" role="button">Back</a>
      </div>

      <form style="width: 80%; margin: auto;" action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">name</label>
    <input type="text" name="name" value="<?= $p->name ?>" require class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Addres</label>
    <input type="text" value="<?= $p->addres ?>" name="addres" require class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Gender</label>
    <div class="form-check">
  <input class="form-check-input"  <?php echo ($p->gender =='Male')?'checked':'' ?> type="radio" value="Male" name="gender" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Man
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" <?php echo ($p->gender =='Female')?'checked':'' ?> type="radio" value="Female" name="gender" id="flexRadioDefault2">
  <label class="form-check-label" for="flexRadioDefault2">
    Woman
  </label>
</div>
  </div>




  <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Religion</label>
  <select name="religion" class="form-select" id="inputGroupSelect01">
    <option selected><?= $p->religion ?></option>
    <option value="islam">Islam</option>
    <option value="krister">Kristen</option>
    <option value="budha">Budha</option>
  </select>
</div>


  <div class="mb-3">
    <label for="">Photo</label>
    <img src="image/upload/<?= $p->image ?>" width="150px" class="image" alt="">
                           <input type="hidden" name="gambar2" value="<?= $p->image?>">
                           <input type="file" name="gambar" class="input-control" >
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Add</button>
</form>

<?php
                        if(isset($_POST['submit'])){

                            $name = $_POST['name'];
                            $addres = $_POST['addres'];
                            $gender = $_POST['gender'];   
                            $religion = $_POST['religion'];

                            if($_FILES['gambar']['name']!= ''){
                                $filename   = $_FILES['gambar']['name'];
                                $tmpname    = $_FILES['gambar']['tmp_name'];
                                $filesize   = $_FILES['gambar']['size'];
    
                                $formatfile     = pathinfo($filename, PATHINFO_EXTENSION);
                                $rename         = 'students'.time().'.'.$formatfile;
                                $currdate       = date('Y-m-d H:i:s');
                                $allowedtype = array('png','jpeg','jpg','gif');
                                
                                if(!in_array($formatfile,$allowedtype)){
                                    echo "<div class='alert alert-eror'>file tidak di izinkan</div>";
                                    return false;
                                }elseif($filesize > 1000000){
                                    echo '<div class="alert alert-eror">ukuraan file tidak boleh lebih dari 1mb</div>';
                                    return false;
                                    ;
                                }else{
                                    if(file_exists("image/upload/" .$_POST['gambar2'])){
                                        unlink("image/upload/" .$_POST['gambar2']);
                                    }
                                }
                                

                                move_uploaded_file($tmpname, "image/upload/" .$rename);
                            }else{
                
                                $rename = $_POST['gambar2'];
                            }
                            
                           $update = mysqli_query($conn, "UPDATE students SET
                                name       = '".$name."',
                                addres  = '".$addres."',
                                gender      = '".$gender."',
                                religion  = '".$religion."',
                                image  = '".$rename."'
                                WHERE id = '".$_GET['id']."'
                           ");
                           if($update){
                               echo "<script>window.location='students.php'</script>";
                           }else{
                               echo 'gagal diedit',mysqli_error($conn);
                           }
                        }

                        
                    ?>
    </main>
    <?php include 'footer.php' ?>