<body class = "dark-home">
    <nav class = "sidebar">
        <div class="sidebar-container">
            <header class="logo-title">
                <i class='bx bxs-popsicle'></i>
                <span class = "title">IceCream</span>
            </header>
            <div class="navbar">
                <ul class = "navbar-list">
                    <?php 
                        if($_SESSION['logged-in']['type'] == 'Admin'){
                    ?>
                        <li class = "navbar-item">
                        <a href="../admin/dashboard.php" class="navbar-link <?php echo $dashboard ?>">Dashboard</a>
                        </li>
                    <?php
                        }
                    ?>
                    
                    <li class = "navbar-item">
                        <a href="../items/items.php" class="navbar-link <?php echo $items ?>">Items</a>
                    </li>
                    <li class = "navbar-item">
                        <a href="../menu/menu.php" class="navbar-link <?php echo $menu;?>">Menu</a>
                    </li>
                    <li class = "navbar-item">
                        <a href="../users/users.php" class="navbar-link <?php echo $users?>">Users</a>
                    </li>
                    <li class = "navbar-item">
                        <a href="#" class="navbar-link">Purchased History</a>
                    </li>
                    <li class = "navbar-item logout">
                        <a href="../login/logout.php" class="navbar-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>