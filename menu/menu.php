<?php
    session_start();
    include_once '../variables/active_nav.php';
    $menu = 'active';
    include_once '../includes/header.php';
    include_once '../includes/sidebar.php';
    
?>


    <section class="menu">
        <div class="menu-header">
        <input type="text" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" />
        </div>

        <div class="menu-body">
        <div class="sorting-cards">
            <div class="card card-1">
                <div class="card-header">
                <i class='bx bx-coffee-togo'></i>
                </div>
                <div class="card-body">
                    <span class = "card-title" >Breakfast</span>
                    <span class = "item-num text" >13 items</span>
                </div>
            </div>
            <div class="card card-2">
                <div class="card-header">
                <i class='bx bx-coffee-togo'></i>
                </div>
                <div class="card-body">
                    <span class = "card-title" >Breakfast</span>
                    <span class = "item-num text" >13 items</span>
                </div>
            </div>
            <div class="card card-3">
                <div class="card-header">
                <i class='bx bx-coffee-togo'></i>
                </div>
                <div class="card-body">
                    <span class = "card-title" >Breakfast</span>
                    <span class = "item-num text" >13 items</span>
                </div>
            </div>
            <div class="card card-4">
                <div class="card-header">
                <i class='bx bx-coffee-togo'></i>
                </div>
                <div class="card-body">
                    <span class = "card-title" >Breakfast</span>
                    <span class = "item-num text" >13 items</span>
                </div>
            </div>
            <div class="card card-5">
                <div class="card-header">
                <i class='bx bx-coffee-togo'></i>
                </div>
                <div class="card-body">
                    <span class = "card-title" >Breakfast</span>
                    <span class = "item-num text" >13 items</span>
                </div>
            </div>
            <div class="card card-6">
                <div class="card-header">
                <i class='bx bx-coffee-togo'></i>
                </div>
                <div class="card-body">
                    <span class = "card-title" >Breakfast</span>
                    <span class = "item-num text" >13 items</span>
                </div>
            </div>
            <div class="card card-7">
                <div class="card-header">
                <i class='bx bx-coffee-togo'></i>
                </div>
                <div class="card-body">
                    <span class = "card-title" >Breakfast</span>
                    <span class = "item-num text" >13 items</span>
                </div>
            </div>
            <div class="card card-8">
                <div class="card-header">
                <i class='bx bx-coffee-togo'></i>
                </div>
                <div class="card-body">
                    <span class = "card-title" >Breakfast</span>
                    <span class = "item-num text"  >13 items</span>
                </div>
            </div>
            
            
        </div>

        <hr class = "divider">
        <div class="menu-items">
            <div class="card">
                <div class="card-header text">
                    <span> Orders 
                    <i class='bx bx-right-arrow-alt '></i> Kitchen 
                    <span>
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <span class = "brand">Fish and chips</span>
                        <span class = "value">₱10.00</span>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <span class = "minus-plus">
                        <i class='bx bx-minus minus-icon icon ' id = "minus"></i>
                        <span class = "item-count">0</span>
                        <i class='bx bx-plus icon ' id = "plus"></i>
                    </span>
                </div>
            </div>
            
        </div>
        </div>
        
    </section>
</body>
</html>