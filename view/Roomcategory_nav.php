
        <nav>
            <ul>
                <!-- display links for all categories -->
                <?php foreach($roomcategories as $roomcategory) : ?>
                <li>
                    <a href="?category_id=<?php 
                              echo $roomcategory['categoryID']; ?>">
                        <?php echo $roomcategory['roomCategory']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

