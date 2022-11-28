<?php
    require_once '../includes/header.php';
    require_once '../classes/user.class.php';
    session_start();

?>
<body>

    <?php

        $user = new User();

        $error = '';
        if(isset($_POST['login-submit'])){
                if(isset($_POST['username']) && isset($_POST['password'])){
                    $inputtedUsername = $_POST['username'];
                    $inputtedPassword = $_POST['password'];
                    $inputtedUsername = htmlentities($inputtedUsername);
                    $inputtedPassword = htmlentities($inputtedPassword);
                    foreach($user->show() as $key => $value){
                        if($value['username'] == $inputtedUsername && $value['password'] == $inputtedPassword){
                            $_SESSION['logged-in'] = $value;

                             header('location: ../admin/dashboard.php');
                        }else{
                            $error = 'wrong username or password';
                        }
                    }
                }
        }

    ?>
    <div class="container">
        <form class="form-container" action = "login.php" method = "POST">
            <div class="form-header">
            <span class = "logo-container ">
                <i class='bx bxl-drupal icon gradient'></i>
            </span>
            <div class="input-form">
                <div class="user-form">
                    <span class="icon-container"><i class='bx bxs-user gradient'></i></span>
                    
                    <input type="text" id = "username"  name= "username" required placeholder = "Username">
                </div>
                <div class="password-form">
                <span class="icon-container"><i class='bx bxs-key gradient' ></i></span> 
                    <input type="password" id = "password" name= "password" required placeholder = "Password">       
                </div>
            </div>

            <input type="submit" name = "login-submit" class = "login-submit gradient" value = "LOGIN" >
            <div class="error-container">
                <p class = "error">  <?php echo $error ?> </p>
            </div>
            </div>
           
            
        
            <div class="login-footer">
                   <div class="circle-1 circle"></div>
                   <div class="circle-2 circle"></div>
                   <div class="circle-3 circle"></div>
                   <div class="circle-4 circle"></div>
                   <div class="circle-5 circle"></div>
                   <div class="circle-6 circle"></div>
                   <div class="circle-7 circle"></div>
                   <div class="circle-8 circle"></div>
                   <div class="circle-9 circle"></div>
                   <div class="circle-10 circle"></div>
                   <div class="circle-11 circle"></div>
                   <div class="circle-12 circle"></div>
                   <div class="circle-13 circle"></div>
                   <div class="circle-14 circle"></div>
                   <div class="circle-15 circle"></div>
                   <div class="circle-16 circle"></div>
                   <div class="circle-17 circle"></div>
                   <div class="circle-18 circle"></div>
                   <div class="circle-19 circle"></div>
                   <div class="circle-20 circle"></div>
                   <div class="circle-21 circle"></div>
                   <div class="circle-22 circle"></div>
                   <div class="circle-23 circle"></div>
                   <div class="circle-24 circle"></div>
                   <div class="circle-25 circle"></div>
                   <div class="circle-26 circle"></div>
                   <div class="circle-27 circle"></div>
                   <div class="circle-28 circle"></div>



            </div>
            
        </form>
    </div>
</body>
</html>