<?php include '../view/header.php'; ?>
<main>
    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <?php include '../view/Roomcategory_nav.php'; ?>        
    </aside>
    <section>
        <h1><?php echo $category_room; ?></h1>
        <ul class="nav">
            <!-- display links for products in selected category -->
            <?php foreach ($rooms as $room) : ?>
            <li>
                <a href="?action=view_product&amp;room_id=<?php 
                          echo $room['RoomID']; ?>">
                    <?php echo $room['roomName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
<?php include '../view/footer.php'; ?>