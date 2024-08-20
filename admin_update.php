<?php

@include 'config.php';

$id = $_GET['Edit'];

if(isset($_POST['update_product'])){
   $new_id=$_POST['new_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $old_image=$_POST['old_image'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

  
   if($product_image!= ''){
      $update_filename = $_FILES['product_image']['name'];
   }
   else{
      $update_filename =  $old_image;
   }
    
   if( $_FILES['product_image']['name'])
      {
         if(file_exists("uploaded_img/".$_FILES['product_image']['name']))
         {
         $filename = $_FILES['product_image']['name'];
         $message[] = 'Image Already Exist!!';//.$filename
         header('location:admin_page.php');
      }
   } 
      else{

       $update_data = "UPDATE produ SET name='$product_name', price='$product_price', image='$update_filename'  WHERE id = '$new_id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         if($_FILES['product_image']['name'] !=''){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         unlink("uploaded_img/".$old_image);
         }
        $message[] = 'Record Updated Succsefully!!';
      header('location:admin_page.php');
     }
     else{
      $message[] = 'Record Not Updated!!';
      header('location:admin_page.php');
     }
      }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/rp.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM produ WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>

      <input type="hidden" name="new_id" value="<?php  echo $row['id']; ?>">
      <input type="text" class="box" name="product_name" required value="<?php echo $row['name']; ?>" placeholder="enter the product name">
      <input type="number" min="0" class="box" name="product_price" required value="<?php echo $row['price']; ?>" placeholder="enter the product price">
      <input type="file" class="box" name="product_image">
      <input type="hidden" name="old_image" value="<?php echo $row['image'];?>">
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="admin_page.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>