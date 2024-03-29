<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<?php include('header.php');?>

        <div class="right-links">

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");
            $item_query=mysqli_query($con,"SELECT * FROM items WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
            }

            while($result = mysqli_fetch_assoc($item_query)){
                $res_photo = $result['photo'];
                $res_nameClothing = $result['nameClothing'];
                $res_kind = $result['kind'];
                $res_color = $result['color'];
                $res_notes = $result['notes'];
            }
            $items = mysqli_query($con,"SELECT COUNT(*) AS photo FROM items");
            while($result = mysqli_fetch_assoc($items)){
                $res_count= $result['photo'];
            }
            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            ?>

            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Hello <b><?php echo $res_Uname ?></b>, Welcome to your virtual closet!</p>
            </div>
            <div class="box">
                <p>You have <b><?php echo $res_count ?></b> items in your closet. </p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p>You have <b><?php echo $res_Age ?> saved outfits</b>.</p> 
                <center> <a href='add.php'><button class='btn'> ADD AN ITEM </button></a> </center>
            </div>
          </div>
       </div>

    </main>
</body>
</html>