<?php include '../view/header.php'; ?>
<main>
    <link href="../main.css" rel="stylesheet" type="text/css"/>
    <center>
    <div class="page-header">       
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
    </div>
    <p>
        <a href="../Registration/reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="../room_manager/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>   
    </center>

    <center>
    <h1>Room List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <?php include '../view/Roomcategory_nav.php'; ?>        
    </aside>
    </center>
    
    <section>
        
        
        <!-- display a table of products -->
        <div class="roomlist2" id="room2">
            <center>
        <h2><?php echo $category_room; ?></h2>
        <table>
            <tr>
                <th>Room Number</th>
                <th>Room Name</th>
                <th class="right">DalyRate</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rooms as $room) : ?>
                <tr>
                    <td><?php echo $room['roomNum']; ?></td>
                    <td><?php echo $room['roomName']; ?></td>
                    <td class="right"><?php echo $room['dalyRate']; ?></td>
                    <td><form action="." method="post">
                            <input type="hidden" name="action"
                                   value="show_edit_form">
                            <input type="hidden" name="room_id"
                                   value="<?php echo $room['RoomID']; ?>">
                            <input type="hidden" name="category_id"
                                   value="<?php echo $room['categoryID']; ?>">
                            <input type="submit" value="Edit">
                        </form></td>
                    <td><form action="." method="post">
                            <input type="hidden" name="action"
                                   value="delete_room">
                            <input type="hidden" name="room_id"
                                   value="<?php echo $room['RoomID']; ?>">
                            <input type="hidden" name="category_id"
                                   value="<?php echo $room['categoryID']; ?>">
                            <input type="submit" value="Delete">
                        </form></td>
                </tr>
            <?php endforeach; ?>
        </table>
            </center>
        
        
        <center>
        <p><a href="?action=show_add_form">Add Room</a></p>
        <p><a href="?action=list_Roomcategory">List Floors</a></p>
        <br>

        <p> <a href="../main/index.php">Menu</a></p>
        </center>
        </div>
    </section>
    
</main>
<?php include '../view/footer.php'; ?>