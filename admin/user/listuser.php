<?php
include '../config/database.php';
$sql = "SELECT id, fullname, email FROM tb_user";
$result = $conn->query($sql);

?>
<div class="row" >
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data User</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
    <!-- /.card-header -->
     <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Fullname</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                    ?>
                    <tr>
                      <td><?=$row["id"]?></td>
                      <td><?=$row["fullname"]?></td>
                      <td><?=$row["email"]?></td>
                      <td><a href><a href="?menu=detailuser&id=<?=$row["id"]?>"><i class="fas fa-pen-square"></i></a></td>
                    </tr>
                    <?php
                     }
                    } else {
                      echo "0 results";
                    }
                    ?>
                  </tbody>
                </table>
              </div>      
              </div>
            <!-- /.card -->
          </div>
        </div>