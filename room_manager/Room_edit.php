<?php include '../view/header.php'; ?>
<main>
    <center><h1>Edit room</h1></center>
    <form action="index.php" method="post" id="add_room_form">

        <input type="hidden" name="action" value="update_room">

        <input type="hidden" name="room_id"
               value="<?php echo $room['RoomID']; ?>">

        <center>
            <div class="edit">
        <label>Category ID:</label>
        <input type="category_id" name="category_id"
               value="<?php echo $room['categoryID']; ?>">
        <br>

        <label>Room Number:</label>
        <input type="input" name="Rnum"
               value="<?php echo $room['roomNum']; ?>">
        <br>

        <label>Room Name:</label>
        <input type="input" name="Rname"
               value="<?php echo $room['roomName']; ?>">
        <br>

        <label>Daly Rate:</label>
        <input type="input" name="Drate"
               value="<?php echo $room['dalyRate']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
            </div>
        </center>
        <br>
    </form>
    
    <center>
    <p><a href="index.php?action=list_Room">View Room List</a></p>
<br>

        <p> <a href="../main/index.php">Menu</a></p>
    </center>
        <link href="../main.css" rel="stylesheet" type="text/css"/>
</main>
<?php include '../view/footer.php'; ?>