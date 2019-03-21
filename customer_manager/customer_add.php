<?php include '../view/header.php'; ?>
<main>
    <h1>Add customer</h1>
    <form action="index.php" method="post" id="add_customer_form">
        <input type="hidden" name="action" value="add_customer">

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
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_customer">View rooms List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>