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

    if(isset($_POST['save-user'])){
        
        $user = new User();
        //sanitize user inputs
        $user->firstname = htmlentities($_POST['fn']);
        $user->lastname = htmlentities($_POST['ln']);
        $user->username = htmlentities($_POST['username']);
        $user->password = htmlentities($_POST['password']);
        $user->email = htmlentities($_POST['email']);
        
        if(isset($_POST['type'])){
            $user->type = $_POST['type'];
        }
        if(validate_add_user($_POST)){
            if($user->add_user()){  
                //redirect user to faculty page after saving
                header('location: users.php');
            }
        }
    }

?> 
    

        <div class="addItem-container fluid dark-light">
            <div class="form-container">
                <form action="addUser.php" method = "POST">
                    <label for="fn">First name:</label><br>
                    <input type="text" id="fn" name="fn" required placeholder = "Enter first name" value = "<?php if(isset($_POST['fn'])) { echo $_POST['fn']; } ?>"> 
                    <?php
                    if(isset($_POST['save-user']) && !validate_first_name($_POST)){ ?>
                         <p class="error">Invalid first name</p> 
                    <?php 
                    }else{
                    ?> 
                        <br>
                    <?php
                    }
                    ?>    
                    <label for="ln">Last Name:</label><br>
                    <input type="text" id="ln" name="ln" required placeholder = "Enter last name" value = "<?php if(isset($_POST['ln'])) { echo $_POST['ln']; } ?>"> 
                    <?php
                    if(isset($_POST['save-user']) && !validate_last_name($_POST)){ ?>
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