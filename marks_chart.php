<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link rel="stylesheet" href="chart.css">
    <link rel="stylesheet" href="navigation.css">
</head>
<body>
  <div class="main_container" id="home">

  <div class="navbar">
      <div class="logo">
      <a href="#">Student Performance Tracker</a>
    </div>
        <div class="navbar_items">
        <ul>
        <li><a href="home.php">LOGOUT</a></li>
          <li><a href="home.php">CONTACT US</a></li>
          <li><a href="stud_login.php">STUDENT</a></li>
          <li><a href="home.php">HOME</a></li>
        </ul>
        </div>
    <div class="banner_image">
        <div class="form-box">
          
                <h2><center>Marks Chart</center></h2></div>
                <table>
                  <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Subject</th>
                    <th>Total</th>
                    <th>Attained</th>
                  </tr>
                  <?php
                  $host = 'localhost';  
                  $username = 'root';  
                  $password = '';
                  $dbname='spt';
                  $conn=mysqli_connect ($host , $username , $password) or die("unable to connect to host");  
                  mysqli_select_db ($conn,"spt") or die("unable to connect to database");   

                  $sql = "SELECT id, firstname, lastname FROM MyGuests";
                  ?>
                </table>
        

          </div>
                
    </div>

</body>

</html>