<?php 

	session_start();

?>
<?php include("connection.php");?>
<!--
<!DOCTYPE html>
<html>
<head>
	<title>Easy Ride</title>
</head>
<body>

   <?php// echo "welcome:".  $_SESSION['id']; ?>
   <a href="loginMenu.php"><button class="btnHome">logout</button></a>

</body>
</html>

-->


<!DOCTYPE html>
<html>
<head>
  <title>Bus Driver adding</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="sidebar.css">
<link rel="stylesheet" href="signUp.css">
<link rel="stylesheet" href="Addroute.css">

</head>
<body>
  <input type="checkbox" id="check">

  <label for="check">
<i class="fa fa-bars" id="btn"></i>
<i class="fa fa-times" id="cancle"></i>


  </label>
  <div class="sidebar">
<header><img src="iconpic.jpg">
<p><?php echo $_SESSION['username']; ?></p>
</header>
<ul>

 <li><a href="admin_dashboard.php">Manage Routes</a></li>
 <li><a href="manageprofiles.php">Manage Profiles</a></li>
    <li><a href="ManagesBuses.php">Manage Buses</a></li>
    <li><a href="BookingManage.php">Booking People</a></li>
    <li><a href="PaymentManage.php">Transaction</a></li>
    <li><a href="loginMenu.php">logout</a></li>
  <!--  <li><a href="#">Event</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Service</a></li>
    <li><a href="#">Contact</a></li>-->
    </ul>
 <!--  <li>
      <div class="social-links">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="google-plus"><i class="fa fa-youtube"></i></a>
        
      </div>
    </li>-->
   

</div>



<div class="sidebar2">


        <?php 


  if(isset($_POST['Add_BusDriver'])){

     $id=$_POST['id'];
     $user_id=$_POST['user_id'];
     $Driver_Name=$_POST['Driver_Name'];
     $Bus_Name=$_POST['Bus_Name'];
     $Telephone_no=$_POST['Telephone_no'];
     $Email=$_POST['Email'];
     $Password=$_POST['Password'];
    

    


       if($conn->connect_error)
          {
            die('Connection Failed :'.$conn->connect_error);
          }
          else
          {

              //$userPay_id = random_num(20);
              $stmt=$conn->prepare("INSERT INTO bus_driver(id,user_id,Driver_Name,Bus_Name,Telephone_no,Email,Password) VALUES(?,?,?,?,?,?,?)");
              //table3 is the table name//

              $stmt->bind_param("ssssssi",$id,$user_id,$Driver_Name,$Bus_Name,$Telephone_no,$Email,$Password);

              $stmt->execute();
              
              echo ("<script LANGUAGE='JavaScript'>
              window.alert('Succesfully Bus Driver Added!!!');
              window.location.href='Busdriverprofile.php';
              </script>");
               


              
              $stmt->close();
              $conn->close();
              }
                
          
      }     
  

   ?>




          <div class="wrapper">
  <div class="registration_form">
    <div class="title">
      Bus Driver adding
    </div>

    <form action="#" method="POST">
      <div class="form_wrap">
        
        <div class="input_wrap">
          <label for="title">Id</label>
          <input type="number" id="title" name="id" placeholder="Id"  class="idclass" required>
        </div>

        <div class="input_wrap">
          <label for="title">User Id</label>
          <input type="number" id="title" name="user_id" placeholder="User Id"  class="idclass" required>
        </div>

        <div class="input_wrap">
          <label for="title">Driver Name</label>
          <input type="text" id="title" name="Driver_Name" placeholder="Driver Name" required>
        </div>


        <div class="input_wrap">
                            <label for="title">Select Bus</label>
                            <select id="title" name="Bus_Name" class="idclass" required>
    <?php 
    $sql = "SELECT Bus_Name FROM bus";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['Bus_Name']."'>".$row['Bus_Name']."</option>";
        }
    }
    ?>
</select>
                        </div>

        <div class="input_wrap">
          <label for="title">Telephone no</label>
          <input type="number" id="title" name="Telephone_no" placeholder="Telephone no" class="idclass" required>
        </div>

        <div class="input_wrap">
          <label for="title">Email</label>
          <input type="email" id="title" name="Email" placeholder="Email" class="idclass" required>
        </div>

        <div class="input_wrap">
          <label for="title">Password</label>
          <input type="password" id="title" name="Password" placeholder="Password" class="idclass" required>
        </div>
        
        
        <div class="input_wrap">
          <input type="submit" value="Add Bus Driver" class="submit_btn" name="Add_BusDriver">

        </div>



      </div>
    </form>
  </div>
</div>




</div>

</body>
</html>