<?php include '../view/header.php'; ?>

<main>

    <h1>Room List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <?php include '../view/Roomcategory_nav.php'; ?>        
    </aside>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $category_room; ?></h2>
        <table>
            <tr>
                <th>Room Number</th>
                <th>Room Name</th>
                <th class="right">DalyRate</th>
                
            </tr>
            <?php foreach ($rooms as $room) : ?>
            <tr>
                <td><?php echo $room['roomNum']; ?></td>
                <td><?php echo $room['roomName']; ?></td>
                <td class="right"><?php echo $room['dalyRate']; ?></td>
                
            </tr>
            <?php endforeach; ?>
        </table>
       
        <br>
        
         <p> <a href="../index.php">Menu</a></p>
    </section>

</main>
<?php include '../view/footer.php'; ?>