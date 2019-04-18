<?php include '../view/header.php'; ?>
<main>
    
    <center>
    <h1>Edit room</h1>
    <form action="index.php" method="post" id="add_customer_form">

        <input type="hidden" name="action" value="update_customer">

        <input type="hidden" name="room_id"
               value="<?php echo $customerdetail['RoomID']; ?>">

        <div class="eC">
        <label>Customer ID:</label>
        <input type="category_id" name="customer_id"
               value="<?php echo $customerdetail['customerID']; ?>">
        <br>

        <label>Customer Name:</label>
        <input type="input" name="Cname"
               value="<?php echo $customerdetail['customerName']; ?>">
        <br>

        <label>phone Number:</label>
        <input type="input" name="pNumber"
               value="<?php echo $customerdetail['phoneNumber']; ?>">
        <br>

        <label>Room Number:</label>
        <input type="input" name="rNum"
               value="<?php echo $customerdetail['roomNum']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        </div>
        <br>
    </form>
    <p><a href="index.php?action=list_customer">View Room List</a></p>
    <br>

        <p> <a href="../main/index.php">Menu</a></p>
    </center>
</main>
<?php include '../view/footer.php'; ?>