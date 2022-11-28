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
    $item = new Item();
    $val ;
    if(isset($_GET['id'])){
        foreach($item->select_by_id($_GET['id']) as $value){
            if($_GET['id'] == $value['id']){
                $val = $value;
                break;
            }
        }
    }

    if(isset($_POST['save'])){
        //sanitize user inputs
        $item->name = htmlentities($_POST['itemName']);
        $item->price = htmlentities($_POST['price']);

        if(isset($_POST['category'])){
            $item->category = $_POST['category'];
        }
        if(validate_add_item($_POST)){
            if($item->edit_item($_GET['id'])){  
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
                <form action="editItem.php?id= <?php echo $_GET['id']?>" method = "POST">
                    <label for="itemName">Name of Item:</label><br>
                    <input type="text" id="itemName" name="itemName" placeholder = "Enter Item name" value = "<?php echo $value['name']?>"> 
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
                    <input type="number" id="price" name="price" min = "0" placeholder = "Enter price" value = "<?php if(isset($_GET['id'])) { echo $val['price']; } ?>"><br>
                    

                    <label for="category">category:</label><br>
                        <select id="category" name="category">
                            <option value="None" <?php if(isset($_GET['id'])) { if ($val['category'] == 'None') echo ' selected="selected"'; } ?>>Select</option>
                            <option value="1" <?php if(isset($_GET['id'])) { if ($val['category'] == '1') echo ' selected="selected"'; } ?> >Dessert</option>
                            <option value="2" <?php if(isset($_GET['id'])) { if ($val['category'] == '2') echo ' selected="selected"'; } ?> >Popsicle</option>
                            <option value="3" <?php if(isset($_GET['id'])) { if ($val['category'] == '3') echo ' selected="selected"'; } ?> >Sundae</option>
                            <option value="4" <?php if(isset($_GET['id'])) { if ($val['category'] == '4') echo ' selected="selected"'; } ?> >Breakfast</option>
                            <option value="5" <?php if(isset($_GET['id'])) { if ($val['category'] == '5') echo ' selected="selected"'; } ?> >Cup</option>
                            <option value="6" <?php if(isset($_GET['id'])) { if ($val['category'] == '6') echo ' selected="selected"'; } ?> >Scoops</option>
                            <option value="7" <?php if(isset($_GET['id'])) { if ($val['category'] == '7') echo ' selected="selected"'; } ?> >Bar</option>
                            <option value="8" <?php if(isset($_GET['id'])) { if ($val['category'] == '8') echo ' selected="selected"'; } ?> >Cone</option>
                        </select>
                    <input type="submit" class="button" value="Save item" name="save" id="save">
                </form>
            </div>
        </div>

        </div>

</body>
</html>