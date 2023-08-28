<?php include 'header.php' ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Students</h1>
        <a class="btn btn-primary" href="addStudents.php" role="button">Tambah</a>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Addres</th>
              <th scope="col">Gender</th>
              <th scope="col">Religion</th>
              <th scope="col">Photo</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

                $query = "SELECT * FROM students";
                $students = mysqli_query($conn, $query);
                $count = mysqli_num_rows($students);
                $no = 1;

                foreach($students as $s){
                ?>

            <tr>
              <td><?= $no ?></td>
              <td><?= $s['name'] ?></td>
              <td><?= $s['addres'] ?></td>
              <td><?= $s['gender'] ?></td>
              <td><?= $s['religion'] ?></td>
              <td><img src="image/upload/<?= $s['image'] ?>" width="150px" alt=""></td>
              <td><a class="btn btn-warning" href="updateStudents.php?id=<?= $s['id']?>" role="button">Updated</a><a class="btn btn-danger" href="delete.php?idStudents=<?= $s['id']?>" onclick="return confirm('apakah yakin menghapus')" role="button">Delete</a></td>
            </tr>

            <?php $no++; }?>
            
            
            <p>Jumlah data : <?= $count ?></p>
            
          </tbody>
        </table>
      </div>
    </main>
    <?php include 'footer.php' ?>