<?php 
  session_start();  
  include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel of Bus</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="sidebar.css">
  <link rel="stylesheet" href="managebuses.css">
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
      <li><a href="loginMenu.php">Logout</a></li>
    </ul>
  </div>

  <div class="sidebar2">
    <h1 class="adminTopic">Manage Buses</h1>

    <?php
      $sqlget = "SELECT * FROM bus";
      $sqldata = mysqli_query($conn, $sqlget) or die('error getting');
    ?>

    <table>
      <tr>
        <th>Id</th>
        <th>Bus Name</th>
        <th>Telephone no</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>

      <?php while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)): ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['Bus_Name']; ?></td>
          <td><?php echo $row['Tel']; ?></td>
          <td>
            <button><a href="UpdateBus.php?id=<?php echo $row['id']; ?>">Update</a></button>
          </td>
          <td>
            <button ><a href="deleteBus.php?id=<?php echo $row['id']; ?>">Delete</a></button>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
    <br>
    <a href="AddBus.php"><button class="btnPolicy">Add Bus</button></a>
  </div>
</body>
</html>
