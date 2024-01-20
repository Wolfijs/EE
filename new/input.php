<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/input.css">
    <title>Task Management</title>
    <script src="script.js"></script>
</head>

<body>
    <?php include 'header.php'; ?>

    <!-- InputBox -->
    <div class="box">
        <div class="int">
            <div class="tasks">
                <h1 class="baltais">Event</h1>
            </div>
            <div class="taskName">
                <label class="boxlable">Event Name:</label>
                <input class="boxinput" type="text" id="taskName">
                <p id="taskNameError" class="error"></p>
                <p id="taskNameSuccess" class="success"></p>
            </div>
            <div class="taskName">
                <label class="boxlable">Event Artist/Team:</label>
                <input class="boxinput" type="text" id="taskartist">
                <p id="taskArtistError" class="error"></p>
                <p id="taskArtistSuccess" class="success"></p>
            </div>
            <div class="taskDesc">
                <label class="boxlable">Category:</label>
                <select class="boxinput" id="categoryDropdown">
                    <option value=""></option>
                    <!-- Add your categories here -->
                </select><br>
                <p id="categoryError" class="error"></p> 
                
            </div>
            <div class="taskDesc">
                <label class="boxlable">Ticket Quantity:</label>
                <input class="boxinput" type="number" id="tickets">
                <p id="ticketsError" class="error"></p>
                <p id="ticketsSuccess" class="success"></p>
            </div>
            <div class="taskDate">
                <label class="boxlable">Date time:</label>
                <input class="boxinput" type="date" id="date"><br>
                <p id="dateError" class="error"></p>
                <p id="dateSuccess" class="success"></p>
            </div>
            <div class="taskName">
                <label class="boxlable">Address:</label>
                <input class="boxinput" type="text" id="taskaddress">
                <p id="taskAddressError" class="error"></p>
                <p id="taskAddressSuccess" class="success"></p>
            </div>
            <div class="taskStatus">
                <label class="boxlable">Country</label>
                <select class="boxinput" id="countryDropdown">
                    <option value=""></option>
                    <!-- Countries will be dynamically added here -->
                </select>
                <p id="dropdownError" class="error"></p>
                <p id="dropdownSuccess" class="success"></p>
            </div>
        </div>

        <div class="add">
            <button class="pogaadd" type="submit" id="add">Add</button>
        </div>
    </div>

    <!-- Error and success messages section -->
    <div id="allMessages">
        <!-- Add all error and success messages here -->
        <div id="errorMessage" class="error-message"></div>
    </div>

    <script src="script.js"></script>
</body>

</html>
