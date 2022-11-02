<body class = "dark-home">
    <nav class = "sidebar">
        <div class="sidebar-container">
            <header class="logo-title">
                <i class='bx bxs-popsicle'></i>
                <span class = "title">IceCream</span>
            </header>
            <div class="navbar">
                <ul class = "navbar-list">
                    <li class = "navbar-item">
                        <a href="../admin/dashboard.php" class="navbar-link <?php echo $dashboard ?>">Dashboard</a>
                    </li>
                    <li class = "navbar-item">
                        <a href="#" class="navbar-link">Table Services</a>
                    </li>
                    <li class = "navbar-item">
                        <a href="../menu/menu.php" class="navbar-link <?php echo $menu;?>">Menu</a>
                    </li>
                    <li class = "navbar-item">
                        <a href="#" class="navbar-link">Delivery</a>
                    </li>
                    <li class = "navbar-item">
                        <a href="#" class="navbar-link">Accounting</a>
                    </li>
                    <li class = "navbar-item logout">
                        <a href="../login/logout.php" class="navbar-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>