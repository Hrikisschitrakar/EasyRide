<?php

include 'connection.php';

$ID = $_GET['id'];
$sql = " DELETE FROM `users` WHERE id = $ID " ;
$query = mysqli_query($conn,$sql);




    //echo "Deleted!!!!";

	//header("location:admin_profile.php "<script>alert("hellooo");</script>");


  echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully your profile Deleted');
    window.location.href='Customermanagerprofile.php';
    </script>");




?>