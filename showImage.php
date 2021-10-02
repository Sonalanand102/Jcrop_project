<?php
include 'assets/header.php';
include 'assets/navbar.php';
include 'assets/connection.php';


$image=$_GET['image'];
$orig_w = 500;
$orig_h = 600;



$select="SELECT * FROM `image_data` WHERE image='$image'";
$query=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($query);
$path='assets/images/'.$row['image'];
// echo $path;




  if(isset($_POST['save_section'])){

  }


?>

<div class="container mt-5 d-flex justify-content-between">

    <table>
        <tr>
            <td>
                <img src="<?php echo $path;?>" alt=""  height="<?php echo $orig_h; ?>" width="<?php echo $orig_w; ?>" id='cropbox'>
            </td>
            <td>
                Preview:
                <div id="preview" style="  height:100px; width:100px; overflow:hidden;">
                    <img src="<?php echo $path;?>" alt="Preview"  name='outputImage' >
                </div>

               
            </td>
        </tr>
    </table>
    <?php 
  if(isset($_POST['save_section'])){
    $x=$_POST['x'];
    $y=$_POST['y'];
    $w=$_POST['w'];
    $h=$_POST['h'];
    $opImage=$path;


    $targ_w = $targ_h = 100;

$src = $opImage;
$img_r = imagecreatefromjpeg($src);
$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
    $targ_w,$targ_h,$w,$h);

header('Content-type: image/jpeg');
imagejpeg($dst_r, $path.'_b', 100);



imagedestroy($dst_r);
imagedestroy($img_r);

echo `<h1>Saved Image</h1><img src="$opImage'"/>`;


  }?>
    <form action="" method="post">
                
        <p class='text-dark'>
            <input type="hidden" name="x" id="x" value=''>
            <input type="hidden" name="y" id="y" value=''>
            <input type="hidden" name="w" id="w" value=''>
            <input type="hidden" name="h" id="h" value=''>
        </p>

        <button type="submit" class='justify_content_end btn btn-dark' name='final_submit'>Final Submit</button>
    </form>
</div>

<?php
include 'assets/footer.php';

?>
