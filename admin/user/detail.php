<?php
$getUser = "SELECT id, fullname, email FROM tb_user where id='".$_GET['id']."'";
$result = $conn->query($getUser);
$row = array();
if($result->num_rows >0) {
    $row = $result->fetch_assoc();
}


?>

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Detail User</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="../aksi/uploadfile.php" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <label for="fullname">Full Name</label>
          <input type="text" class="form-control" id="fullname" placeholder="Enter Full Name" name="fullname" value="<?=$row["fullname"]?>"> 
          <input type="hidden" value="<?=$row['id']?>" name="id">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="<?=$row["email"]?>">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Upload Avatar</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </div>
</form>
</div>
    