
        <nav>
            <ul>
                <!-- display links for all categories -->
                <?php foreach($customerdates as $customerdate) : ?>
                <li>
                    <a href="?customer_id=<?php 
                              echo $customerdate['customerID']; ?>">
                        <?php echo $customerdate['customerDate']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

