<?php include '../view/header.php'; ?>
<main>

    <h1>Customer List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Dates</h2>
        <?php include '../view/customerdate_nav.php'; ?>        
    </aside>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $customer_Date; ?></h2>
        <table>
            <tr>
                <th>Customer Name</th>
                <th>Phone Number</th>
                <th class="right">Room Number</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($customerdetails as $customerdetail) : ?>
            <tr>
                <td><?php echo $customerdetail['customerName']; ?></td>
                <td><?php echo $customerdetail['phoneNumber']; ?></td>
                <td class="right"><?php echo $customerdetail['roomNum']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="room_id"
                           value="<?php echo $customerdetail['RoomID']; ?>">
                    <input type="hidden" name="customer_id"
                           value="<?php echo $customerdetail['customerID']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_customer">
                    <input type="hidden" name="room_id"
                           value="<?php echo $customerdetail['RoomID']; ?>">
                    <input type="hidden" name="customer_id"
                           value="<?php echo $customerdetail['customerID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add customer</a></p>
        <p><a href="?action=list_customerdates ">List Dates</a></p>
        <br>
        
         <p> <a href="../index.php">Menu</a></p>
    </section>

</main>
<?php include '../view/footer.php'; ?>