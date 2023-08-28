<?php include 'header.php' ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Product</h1>
        <a class="btn btn-primary" href="tambahBarang.php" role="button">add</a>
      </div>

      <form action="" method="POST">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name Product</label>
    <input type="text" name="name" require class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Color</label>
    <input type="text" name="color" require class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Count</label>
    <input type="text" name="count" require class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  

  <button type="submit" name="submit" class="btn btn-primary">tambah</button>
</form>

<?php
                        if(isset($_POST['submit'])){

                            $name = $_POST['name'];
                            $color = $_POST['color'];
                            $count = $_POST['count'];   

                                    $query = "INSERT INTO printer VALUES(
                                        null,
                                        '".$name."',
                                        '".$color."',
                                        '".$count."'
                                    )";
                                    $simpan = mysqli_query($conn, $query);
                                    if($simpan){
                                        echo "<script>window.location='dataProduct.php'</script>";
                                    }else{
                                        echo 'gagal disimpan',mysqli_error($conn);
                                    }
                            }

                        
                    ?>
    </main>
    <?php include 'footer.php' ?>