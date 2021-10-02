<?php
include 'assets/header.php';
// include 'assets/navbar.php';
include 'assets/connection.php';

if(isset($_POST['img_upload_btn'])){
    $image=$_FILES['image']['name'];

    $insert="INSERT INTO `image_data`(`image`) VALUES ('$image')";

    if (mysqli_query($conn, $insert)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], "assets/images/" . $image));

        echo "<script>alert('Image Uploaded Successfully!! '); window.location='showImage.php?image=$image';</script>";
    } else {
        echo "<script>alert('Image Can not be Uploaded... please retry!!');window.location='index.php'; </script>";
    }
}
?>

<div class="container mt-5 d-flex justify-content-center">
    <form action="" method="post" enctype='multipart/form-data'>
        <!-- <div class='upload-form '>
            <input type="file" name="Image" id="" placeholder='Upload Image Here' required accept="image/*">
        </div>
        <div class="final_submit d-flex justify-content-end mt-3">
            <input class='btn btn-dark' type="submit" value="Upload Image" name="img_upload_btn">
        </div> -->
        <label for="upload_image">
								<!-- <img src=""   /> -->
                                <div id="uploaded_image"><i class='fas fa-user-circle ' style="font-size:200px;"></i></div>
								<div class="overlay d-flex justify-content-center">
									<div class="text ">Click to Upload Image</div>
								</div>
								<input type="file" name="image" class="image" id="upload_image" style="display:none" accept="image/*" required/>
                                <div class="final_submit d-flex justify-content-center mt-3">
            <input class='btn btn-dark' type="submit" value="Upload Image" name="img_upload_btn">
        </div>
							</label>
    </form>
</div>

<?php
include 'assets/footer.php';

?>