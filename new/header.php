<?php
// session_start();

// // include("connections.php");
// // include("functions.php");

// // $user_data = check_login($con);

// // $sql = "SELECT id, username, email, FROM login WHERE username = ?";
// // $stmt = $con->prepare($sql);

// // if ($stmt) {
// //     $stmt->bind_param("s", $user_data['username']);
// //     $stmt->execute();
// //     $result = $stmt->get_result();

    
// //     $userData = $result->fetch_assoc();
    
   
// //     $stmt->close();
// // } else {
    
// //     die("Error in database query: " . $con->error);
// // }



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/heading.css"></link>
    <title>Document</title>
</head>

<body>
<div class="main">
    <div class="head">
   
    <div  href="javascript:void(0)" class="burger-icon" onclick="toggleMenu()">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
        <div class="hpart">
            <img style=" width: 105%; height: 100%;" src="asset/logo.png" href="cau">
        </div>
        <div class="hpart">
            <a href="index.php" class="butt">Home</a>
        </div>
        <div class="hpart">
            <a href="input.php" class="butt">Add Event</a>
        </div>
        <div class="hpart">
            <a href="calendar.php" class="butt">Ticket History</a>
        </div>
        <div class="hpart">
            <a href="ticketrewiew.php" class="butt">Ticket Rewiew</a>
        </div>
        <div class="hpart">
            <a href="events.php" class="butt"> Events</a>
        </div>
        <div style="justify-content:space-between; width:17%;" class="hpart2">
            
                <!-- <a  class="butt">Hello, <?php echo $user_data['username'];?> </a>  -->
               
        </div>
        
        <div class="hpart2">
            <div style="width:40%;  transition: background-color 0.3s; "  class="logbutt">
                <a class="butt" href="logout.php">Logout </a>
            </div>
        </div>
        <div class="sidebar" id="mySidebar">
        
        <a href="javascript:void(0)" class="closebtn" onclick="closeMenu()" style="border: none;">×</a>
        <a href="index.php"style="margin-top:100px;background-color: white;">Home</a>
        <a href="input.php"style="margin-top:20px;background-color: white;">New Task</a>
        <a href="calendar.php" style="margin-top:20px;background-color: white;">Calendar</a>
        <a href="tasks.php" style="margin-top:20px;background-color: white;">Tasks</a>

        <a href="logout.php" style="margin-top:100px;background-color: white;" >Log Out</a>
        
       
    </div>
    </div>
    
    <script src="script.js"></script>
</body>
      
        

</html>