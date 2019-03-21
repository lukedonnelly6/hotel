<?php include '../view/header.php'; ?>
<main>
    <h1>Edit room</h1>
    <form action="index.php" method="post" id="add_room_form">

        <input type="hidden" name="action" value="update_room">

        <input type="hidden" name="room_id"
               value="<?php echo $room['RoomID']; ?>">

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
        <br>
    </form>
    <p><a href="index.php?action=list_Room">View Room List</a></p>

</main>
<?php include '../view/footer.php'; ?>