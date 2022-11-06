<?php
    session_start();
    include_once '../variables/active_nav.php';
    $menu = 'active';
    include_once '../includes/header.php';
    include_once '../includes/sidebar.php';
    
?>


    <div class = "main">
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

        <div class="menu-items" >
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
            <div class="card active">
                <div class="card-header text">
                    <span> Orders 
                    <i class='bx bx-right-arrow-alt '></i> Kitchen 
                    <span>
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <span class = "brand">Roast Chicken</span>
                        <span class = "value">₱10.00</span>
                        
                    </div>
                    
                </div>
                <div class="card-footer">
                    <span class = "minus-plus">
                        <i class='bx bx-minus minus-icon icon ' id = "minus"></i>
                        <span class = "item-count">2</span>
                        <i class='bx bx-plus icon ' id = "plus"></i>
                    </span>
                </div>
            </div>
            <div class="card">
                <div class="card-header text ">
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
            <div class="card">
                <div class="card-header text">
                    <span > Orders 
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

        
    </section>
    <section class = "sidebar-right">
        <div class="title-container">
            <div class="title">
                <h1 class="text">Table 5</h1>
                <span class="sub">Leslie K.</span>
            </div>
            <span class="icon-container">
                <i class='bx bxs-edit-alt icon'></i>
            </span>
        </div>
        <div class="list-container">
            <ul class="want-list">
                <li class="want-item">
                    <span class="x-mark">
                        <i class='bx bx-x'></i>
                    </span>
                    <div class="details">
                        <div class="counter-name">
                            <span class="item-counter">1</span>
                            <span class="item-name">Roast Chicken</span>
                            <span class="quantity">x2</span>
                        </div>
                        <div class="price">₱10.00</div>

                    </div>
                </li>

                <li class="want-item">
                    <div class="details">
                        <div class="counter-name">
                            <span class="item-counter">2</span>
                            <span class="item-name">Red Caviar</span>
                            <span class="quantity">x3</span>
                        </div>
                        <div class="price">₱36.10</div>

                    </div>
                </li>

                <li class="want-item">
                    <div class="details">
                        <div class="counter-name">
                            <span class="item-counter">3</span>
                            <span class="item-name">German Sausage</span>
                            <span class="quantity">x1</span>
                        </div>
                        <div class="price">₱5.34</div>

                    </div>
                </li>

                <li class="want-item">
                    <div class="details">
                        <div class="counter-name">
                            <span class="item-counter">4</span>
                            <span class="item-name">Irish Cream</span>
                            <span class="quantity">x1</span>
                        </div>
                        <div class="price">₱4.20</div>

                    </div>
                </li>

                <li class="want-item">
                    <div class="details">
                        <div class="counter-name">
                            <span class="item-counter">2</span>
                            <span class="item-name">Strawberry</span>
                            <span class="quantity">x2</span>
                        </div>
                        <div class="price">₱10.00</div>

                    </div>
                </li>
                <li class="want-item">
                    <div class="details">
                        <div class="counter-name">
                            <span class="item-counter">2</span>
                            <span class="item-name">Strawberry</span>
                            <span class="quantity">x2</span>
                        </div>
                        <div class="price">₱10.00</div>

                    </div>
                </li>
            </ul>
        </div>
        <!-- <div class="total-container">

        </div> -->
    <section>
    <div >

</body>
</html>