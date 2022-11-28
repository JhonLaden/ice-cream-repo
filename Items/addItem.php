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
                header('location: addfaculty.php');
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
                    if(isset($_POST['itemName']) && !validate_add_item($_POST['save'])){ ?>
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
                            <option value="category" <?php if(isset($_POST['rank'])) { if ($_POST['category'] == 'None') echo ' selected="selected"'; } ?>>Select</option>
                            <option value="Dessert" <?php if(isset($_POST['category'])) { if ($_POST['category'] == 'Dessert') echo ' selected="selected"'; } ?> >Dessert</option>
                            <option value="Popsicle" <?php if(isset($_POST['category'])) { if ($_POST['category'] == 'Popsicle') echo ' selected="selected"'; } ?> >Popsicle</option>
                            <option value="Sundae" <?php if(isset($_POST['category'])) { if ($_POST['category'] == 'Sundae') echo ' selected="selected"'; } ?> >Sundae</option>
                            <option value="Breakfast" <?php if(isset($_POST['category'])) { if ($_POST['category'] == 'Breakfast') echo ' selected="selected"'; } ?> >Breakfast</option>
                            <option value="Cup" <?php if(isset($_POST['category'])) { if ($_POST['category'] == 'Cup') echo ' selected="selected"'; } ?> >Cup</option>
                            <option value="Scoops" <?php if(isset($_POST['category'])) { if ($_POST['category'] == 'Scoops') echo ' selected="selected"'; } ?> >Scoops</option>
                            <option value="Bar" <?php if(isset($_POST['category'])) { if ($_POST['category'] == 'NoBarne') echo ' selected="selected"'; } ?> >Bar</option>
                            <option value="Cone" <?php if(isset($_POST['category'])) { if ($_POST['category'] == 'Cone') echo ' selected="selected"'; } ?> >Cone</option>
                        </select>
                    <input type="submit" class="button" value="Save item" name="save" id="save">
                </form>
            </div>
        </div>

        </div>

</body>
</html>