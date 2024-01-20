

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/heading.css"></link>
    <title>Website</title>


    <style>
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            z-index: 1000;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 999;
        }
        .head{
            height:20%;

        }
        .text{
            height:80%;
        }
    </style>

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
            <img src="asset/logo.png" href="cau">
        </div>
        <div class="hpart">
            <a class="butt" onclick="showPopup('newtask.php')">Add Task</a>
        </div>
        <div class="hpart">
            <a  class="butt" onclick="showPopup('calendar.php')">Calendar</a>
        </div>
        <div class="hpart">
            <a  class="butt" onclick="showPopup('tasks.php')">Tasks</a>
        </div>
        <div class="hpart2">
            <div class="logbutt">
                <a href="login.php" class="butt">Log In</a>
            </div>
        </div>
        <div class="hpart2">
            <div class="regbutt">
                <a href="register.php" class="butt2">Sign Up</a>
            </div>
        </div>
        <div class="sidebar" id="mySidebar">
        
        <a href="javascript:void(0)" class="closebtn" onclick="closeMenu()" style="border: none;">×</a>
        <a href="index.php"style="margin-top:100px;background-color: white;">Home</a>
        <a href="input.php"style="margin-top:20px;background-color: white;">New Task</a>
        <a href="calendar.php" style="margin-top:20px;background-color: white;">Calendar</a>
        <a href="tasks.php" style="margin-top:20px;background-color: white;">Tasks</a>

        <a href="login.php" style="margin-top:100px;background-color: white;" >Log In</a>
        <a href="register.php"  style="margin-top:20px;background-color: black;color: white;">Sign Up</a>
       
        </div>
    </div>
    <h1 class="welcome">Welcome To Tasker!</h1>
    <p class="text">Our company, Tasker Technologies, was founded on the principle of simplifying project management for individuals and teams alike. We believe that everyone should have access to effective project management tools without the complexity and steep learning curves associated with many other platforms. With Tasker, you'll find an intuitive and feature-rich system that empowers you to create, organize, and complete projects with ease.</p>
</div>

<div class="popup" id="loginPopup">
        <p>You need to log in to access this feature.</p>
        
        <button  style="margin-left:45%;" onclick="hidePopup()">OK</button>
        </div>
    

    <div class="overlay" id="overlay" onclick="hidePopup()"></div>


    <script>
        function showPopup(link) {
            document.getElementById('loginPopup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function hidePopup() {
            document.getElementById('loginPopup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
        function toggleMenu() {
    document.getElementById("mySidebar").style.width = "50%";
  }

  // Function to close the sidebar
  function closeMenu() {
    document.getElementById("mySidebar").style.width = "0";
  }

  // Event listener for the burger icon
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelector(".burger-icon").addEventListener("click", () => {
      toggleMenu();
    });



  });  
</script>
    
</body>
</html>
