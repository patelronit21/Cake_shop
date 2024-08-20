<?php

@include 'config.php';

if(isset($_POST['add_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;


   $allowed_exttension = array('gif','png','jpg','jpeg');
   $filename = $_FILES['product_image']['name'];
   $file_extension = pathinfo($filename,PATHINFO_EXTENSION);
   if(!in_array($file_extension,$allowed_exttension)){
      $message[] = 'You Are Allowed  with only Jpg Png Jpeg and Gif file!!';
      //header('location:admin_page.php');
   }
   
   else{

    if(file_exists("uploaded_img/".$_FILES['product_image']['name']))
   {
      $filename = $_FILES['product_image']['name'];
      $message[] = 'Image Already Exist!!';//.$filename
      //header('location:admin_page.php');
   }
   else{
$insert = "INSERT INTO produ(name, price, image) VALUES('$product_name', '$product_price', '$product_image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new product added successfully';
      }
      else{
         $message[] = 'could not add the product';
      }
    }

  }

   };



if(isset($_GET['delete'])){
   $id = $_GET['delete'];

   $sql = mysqli_query($conn,"SELECT * FROM produ WHERE id='$id'");
   $result = mysqli_fetch_array($sql);

   unlink("uploaded_img/".$result['image']);
  
   mysqli_query($conn, "DELETE FROM produ WHERE id = '$id'");
   header('location:admin_page.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/rp.css">

</head>
<body>

<section>

<div class="navbar">
 
<a href="Logout.php">Logout</a>

</div>

</section>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
   
<div class="container">

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new product</h3>
         <input type="text" placeholder="enter product name" required name="product_name" class="box">
         <input type="number" placeholder="enter product price" required name="product_price" class="box">
         <input type="file"  required name="product_image" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM produ");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>product image</th>
            <th>product name</th>
            <th>product price</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" width="110" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>$<?php echo $row['price']; ?>/-</td>
            <td>
               <a href="admin_update.php?Edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
              
               <a href="admin_page.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Remove Item From Data')" class="btn"> <i class="fas fa-trash"></i> delete </a>
               
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>


</body>
</html>