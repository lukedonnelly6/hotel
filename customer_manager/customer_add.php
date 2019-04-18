<?php include '../view/header.php'; ?>
<main>
    <center>
    <h1>Add customer</h1>
    <form action="index.php" method="post" id="add_customer_form">
        <input type="hidden" name="action" value="add_customer">

        <div class="addC">
        <label>Customer date:</label>
        <select name="customer_id">
        <?php foreach ( $customerdates as $customerdate ) : ?>
            <option value="<?php echo $customerdate['customerID']; ?>">
                <?php echo $customerdate['customerDate']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        
        <label>Customer Name:</label>
        <input type="input" name="Cname">
        <br>

        <label>Phone Number :</label>
        <input type="input" name="pNumber">
        <br>

        <label>Room Number:</label>
        <input type="input" name="rNum">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Customer">
        </div>
        <br>
    </form>
    </center>
    
    <center>
    <p class="last_paragraph">
        <a href="index.php?action=list_customer">View rooms List</a>
    </p>
    <br>

        <p> <a href="../main/index.php">Menu</a></p
    </center>

</main>
<?php include '../view/footer.php'; ?>