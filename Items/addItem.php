<?php
    session_start();
    include_once '../variables/active_nav.php';
    $items = 'active';
    include_once '../includes/header.php';
    include_once '../includes/sidebar.php';
    require_once '../database/categories.php';
    require_once '../database/items.php';
    
    require_once '../classes/category.class.php';
    require_once '../classes/item.class.php';
    require_once '../tools/functions.php';

    if(isset($_POST['save'])){
        
        $item = new Item();
        //sanitize user inputs
        $item->name = htmlentities($_POST['itemName']);
        $item->price = htmlentities($_POST['price']);

        if(isset($_POST['category'])){
            $item->category = $_POST['category'];
        }
        if(validate_add_item($_POST)){
            if($item->add_item()){  
                //redirect user to faculty page after saving
                header('location: items.php');
            }
        }
    }

?> 
    <div class="main flex-direction-column">
        <!-- header -->
        <div class="header-title flex flex-end">
            <div class="header-container flex flex-justify-between flex-align-center dark-light">
                <i class='bx bxs-user-circle icon'></i>
                <div class="user-name header-text ">Jhon Laden B. Adjaluddin</div>
            </div>
        </div>

        <div class="addItem-container fluid dark-light">
            <div class="form-container">
                <form action="addItem.php" method = "POST">
                    <label for="itemName">Name of Item:</label><br>
                    <input type="text" id="itemName" name="itemName" placeholder = "Enter Item name" value = "<?php if(isset($_POST['itemName'])) { echo $_POST['itemName']; } ?>"> 
                    <?php
                    if(isset($_POST['itemName']) && validate_item_name($_POST['save'])){ ?>
                         <p class="error">Invalid item name</p> 
                    <?php 
                    }else{
                    ?> 
                        <br>
                    <?php
                    }
                    ?>         

                    <label for="price">Price:</label><br>
                    <input type="number" id="price" name="price" min = "0" placeholder = "Enter price" value = "<?php if(isset($_POST['price'])) { echo $_POST['price']; } ?>"><br>
                    

                    <label for="category">category:</label><br>
                        <select id="category" name="category">
                            <option value="None" <?php if(isset($_POST['rank'])) { if ($_POST['category'] == 'None') echo ' selected'; } ?>>Select</option>
                            <option value="1" <?php if(isset($_POST['category'])) { if ($_POST['category'] == '1') echo ' selected'; } ?> >Dessert</option>
                            <option value="2" <?php if(isset($_POST['category'])) { if ($_POST['category'] == '2') echo ' selected'; } ?> >Popsicle</option>
                            <option value="3" <?php if(isset($_POST['category'])) { if ($_POST['category'] == '3') echo ' selected'; } ?> >Sundae</option>
                            <option value="4" <?php if(isset($_POST['category'])) { if ($_POST['category'] == '4') echo ' selected'; } ?> >Breakfast</option>
                            <option value="5" <?php if(isset($_POST['category'])) { if ($_POST['category'] == '5') echo ' selected'; } ?> >Cup</option>
                            <option value="6" <?php if(isset($_POST['category'])) { if ($_POST['category'] == '6') echo ' selected'; } ?> >Scoops</option>
                            <option value="7" <?php if(isset($_POST['category'])) { if ($_POST['category'] == '7') echo ' selected'; } ?> >Bar</option>
                            <option value="8" <?php if(isset($_POST['category'])) { if ($_POST['category'] == '8') echo ' selected'; } ?> >Cone</option>
                        </select>
                    <input type="submit" class="button" value="Save item" name="save" id="save">
                </form>
            </div>
        </div>

        </div>

</body>
</html>