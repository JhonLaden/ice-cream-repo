<?php
    session_start();
    include_once '../variables/active_nav.php';
    $users = 'active';

    include_once '../includes/header.php';
    include_once '../includes/sidebar.php';
    require_once '../includes/headerMain.php';
    require_once '../database/categories.php';
    require_once '../database/items.php';
    require_once '../classes/user.class.php';
    require_once '../tools/functions.php';



    $user = new User();
    $val ;

    if(isset($_POST['save-user'])){
        //sanitize user inputs
        $user->firstname = htmlentities($_POST['firstname']);
        $user->lastname = htmlentities($_POST['lastname']);
        $user->username = htmlentities($_POST['username']);
        $user->password = htmlentities($_POST['password']);
        $user->email = htmlentities($_POST['email']);
        
        if(isset($_POST['type'])){
            $user->type = $_POST['type'];
        }
 

       var_dump(validate_email($_POST));
        if(validate_add_user2($_POST)){
            if($user->edit_user($_GET['id'])){  
                //redirect user to faculty page after saving
                header('location: users.php');
            }
        }
    }

    if(isset($_GET['id'])){
        foreach($user->search_by_id($_GET['id']) as $value){
            if($_GET['id'] == $value['id']){
                $val = $value;
                $_POST = $value;
                break;
            }
        }
    }
    
?> 
    

        <div class="addItem-container fluid dark-light">
            <div class="form-container">
                <form action="editUser.php?id=<?php echo $_GET['id'] ?>" method = "POST">
                    <label for="firstname">First name:</label><br>
                    <input type="text" id="firstname" name="firstname" required placeholder = "Enter first name" value = "<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>"> 
                    <?php
                    if(isset($_POST['save-user']) && !validate_first_name2($_POST)){ ?>
                         <p class="error">Invalid first name</p> 
                    <?php 
                    }else{
                    ?> 
                        <br>
                    <?php
                    }
                    ?>    
                    <label for="lastname">Last Name:</label><br>
                    <input type="text" id="lastname" name="lastname" required placeholder = "Enter last name" value = "<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>"> 
                    <?php
                    if(isset($_POST['save-user']) && !validate_last_name2($_POST)){ ?>
                         <p class="error">Invalid last name</p> 
                    <?php 
                    }else{
                    ?> 
                        <br>
                    <?php
                    }
                    ?>     
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" required placeholder = "Enter username" value = "<?php if(isset($_POST['username'])) { echo $_POST['username']; } ?>"> 
                    <?php
                    if(isset($_POST['save-user']) && !validate_username($_POST)){ ?>
                         <p class="error">Invalid username</p> 
                    <?php 
                    }else{
                    ?> 
                        <br>
                    <?php
                    }
                    ?>   
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password"  required placeholder = "Enter password" value = "<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>"> 
                    <?php
                    if(isset($_POST['save-user']) && !validate_password($_POST)){ ?>
                         <p class="error">Invalid password</p> 
                    <?php 
                    }else{
                    ?> 
                        <br>
                    <?php
                    }
                    ?>   
                    <label for="type">type:</label><br>
                        <select id="type" name="type">
                            <option value="None" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'None') echo ' selected'; } ?>>Select</option>
                            <option value="Admin" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'Admin') echo 'selected'; } ?> >Admin</option>
                            <option value="Cashier" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'Cashier') echo 'selected'; } ?> >Cashier</option>
                        </select><br>
                    <?php
                        if(isset($_POST['save-user']) && !validate_type($_POST)){ ?>
                        <p class="error">Invalid type</p> 
                        <?php 
                    }else{
                    ?> 
                        
                    <?php
                    }
                    ?>  

                    <label for="email">email:</label><br>
                    <input type="email" id="email" name="email" min = "0" required placeholder = "Enter email" value = "<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">

                    <?php
                        if(isset($_POST['save-user']) && !validate_email($_POST)){ ?>
                        <p class="error">Invalid type</p> <br>
                        <?php 
                    }else{
                    ?> 
                        <br>
                    <?php
                    }
                    ?>  

                    <input type="submit" class="button" value="Save user" name="save-user" id="save-user">
                </form>
            </div>
        </div>

        </div>

</body>
</html>