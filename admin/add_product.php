<?php require ('../page_structure/connection.php'); ?>
<?php
    if(isset($_POST['insert_product'])) {

        $proName=$_POST['proName'];
        $proDescribtion=$_POST['proDescribtion'];
        $proPrice=$_POST['proPrice'];
        $fortableuse=$_POST['fortableuse'];

        $proImage=$_FILES['proImage']['name'];
        $temp_proImage=$_FILES['proImage']['tmp_name'];

        if($proName=='' or $proDescribtion=='' or $proPrice=='' or $proImage=='' or $fortableuse==''){
            echo "<script>alert('Please fill all the fields')</script>";
            exit();
        }else{
            move_uploaded_file($_FILES['proImage']['tmp_name'],"../product_images/$proImage");
        

            $insert_products="insert into `product` (proImage, proName, proDescribtion, proPrice, fortableuse) values ('$proImage', '$proName', '$proDescribtion', '$proPrice', '$fortableuse')";
            $result_query=mysqli_query($conn, $insert_products);
            if($result_query){
                echo "<script>alert('Successfully inserted the products')</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html id="landingPage" lang="en">
	<head>
		<meta charset="utf-8" />
		<title>HELLO WOOD</title>
		<meta name="author" content="Fang Ting HSU" />
		<meta name="description" content="A toy-selling website ">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="image/logo.png" type="image/png" sizes="10x10"/>
		<link rel="stylesheet" href="../css/style.css" />
	</head>
    <body class="formbody">
        <div>
            <form class="formstyle" action="" method="post" enctype="multipart/form-data">
            <a class="navbar-brand shopper" href="../index.php">
            <img src="../image/logo.png" alt="logo">
            </a>
            <h1>INSERT PRODUCT</h1>
                <div class="insertImage">
                    <label for="proImage">PRODUCT IMAGE</label>
                    <input type="file" name="proImage" id="proImage" required="required">
                </div>
            
            <div class="formaddproduct">
                <div>
                    <label for="proName">PRODUCT NAME</label>
                    <input type="text" placeholder="PRODUCT NAME" name="proName" id="proName" autocomplete="off" required="required">
                </div>

                <div>
                    <label for="proDescribtion">PRODUCT DESCRIPTION</label>
                    <input type="text" placeholder="PRODUCT DESCRIPTION" name="proDescribtion" id="proDescribtion" autocomplete="off" required="required">
                </div>

                <div>
                    <label for="proPrice">PRODUCT PRICE</label>
                    <input type="text" placeholder="PRODUCT PRICE" name="proPrice" id="proPrice" autocomplete="off" required="required">
                </div>

                <div>
                    <label for="fortableuse">FOR TABLE USE</label>
                    <input type="text" placeholder="FOR TABLE USE" name="fortableuse" id="fortableuse" autocomplete="off" required="required">
                </div>
            </div>
                <div>
                    <input class="productbutton" type="submit" name="insert_product" value="INSERT PRODUCT">
                </div>
            </form>
        </div>
        <footer>
            <div>
                <p id="footer1">©HELLO WOOD Inc. All rights reserved</p>
            </div>
        </footer>
    </body>
</html>