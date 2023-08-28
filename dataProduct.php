<?php include 'header.php' ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <a class="btn btn-primary" href="addProduct.php" role="button">Tambah</a>
      </div>

      <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name Product</th>
              <th scope="col">Color</th>
              <th scope="col">Count</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

                $query = "SELECT * FROM printer";
                $product = mysqli_query($conn, $query);
                $no = 1;

                foreach($product as $p){
                ?>

            <tr>
              <td><?= $no ?></td>
              <td><?= $p['name_product'] ?></td>
              <td><?= $p['color'] ?></td>
              <td><?= $p['count'] ?></td>
              <td><a class="btn btn-warning" href="updateProduct.php?id=<?= $p['no']?>" role="button">Updated</a><a class="btn btn-danger" href="delete.php?idProduct=<?= $p['no']?>" onclick="return confirm('apakah yakin menghapus')" role="button">Delete</a></td>
            </tr>

            <?php $no++; } ?>
          </tbody>
        </table>
      </div>
    </main>
    <?php include 'footer.php' ?>