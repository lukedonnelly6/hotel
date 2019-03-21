<?php include '../view/header.php'; ?>
<main>
    <h1>Add Room</h1>
    <form action="index.php" method="post" id="add_room_form">
        <input type="hidden" name="action" value="add_room">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ( $roomcategories as $roomcategory ) : ?>
            <option value="<?php echo $roomcategory['categoryID']; ?>">
                <?php echo $roomcategory['roomCategory']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Room Number:</label>
        <input type="input" name="Rnum">
        <br>

        <label>Room Name:</label>
        <input type="input" name="Rname">
        <br>

        <label>Daly Rate:</label>
        <input type="input" name="Drate">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add room">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_Room">View rooms List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>