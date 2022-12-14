<?php

function validate_first_name($POST){
    if(!isset($POST['fn'])){
        return false;
    }else if(strlen(trim($POST['fn']))<1){
        return false;

    }else if($POST['fn'][0] == " "){
        return false;
    }
    return true;
}
function validate_first_name2($POST){
    if(!isset($POST['firstname'])){
        return false;
    }else if(strlen(trim($POST['firstname']))<1){
        return false;

    }else if($POST['firstname'][0] == " "){
        return false;
    }
    return true;
}
function validate_last_name($POST){
    if(!isset($POST['ln'])){
        return false;
    }else if(strlen(trim($POST['ln']))<1){
        return false;
    }else if($POST['ln'][0] == " "){
        return false;
    }
    return true;
}
function validate_last_name2($POST){
    if(!isset($POST['lastname'])){
        return false;
    }else if(strlen(trim($POST['lastname']))<1){
        return false;
    }else if($POST['lastname'][0] == " "){
        return false;
    }
    return true;
}

function validate_item_name($POST){
    if(!isset($POST['itemName'])){
        return false;
    }else if(strlen(trim($POST['itemName']))<1){
        return false;
    }else if($POST['itemName'][0] == " "){
        return false;
    }
    return true;
}
function validate_username($POST){
    if(!isset($POST['username'])){
        return false;
    }else if(strlen(trim($POST['username']))<1){
        return false;
    }else if($POST['username'][0] == " "){
        return false;
    }
    return true;
}
function validate_password($POST){
    if(!isset($POST['password'])){
        return false;
    }else if(strlen(trim($POST['password']))<1){
        return false;
    }else if($POST['password'][0] == " "){
        return false;
    }
    return true;
}
function validate_type($POST){
    if(!isset($POST['type'])){
        return false;
    }else if(strcmp($POST['type'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_price($POST){
    return $POST['price'] > 0;
}

function validate_email($POST){
    // Remove all illegal characters from email
    $email = filter_var($POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate e-mail
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Separate string by @ characters (there should be only one)
        $parts = explode('@', $email);

        // Remove and return the last part, which should be the domain
        $domain = array_pop($parts);

        // Check if the domain is WMSU
        if (strcmp(strtolower($domain), 'wmsu.edu.ph') != 0)
        {
            return false;
        }
    } else {
        return false;
    }
    return true;
}

function validate_faculty_email_duplicate($POST){
    if(!isset($POST['email'])){
        return false;
    }else{
        $faculty = new Faculty();
        foreach ($faculty->show() as $value){
            if(strcmp(strtolower($value['email']), strtolower($POST['email'])) == 0){
                return false;
            }
        }
    }
    return true;
}


function validate_category($POST){
    if(!isset($POST['category'])){
        return false;
    }else if(strcmp($POST['category'], 'None') == 0){
        return false;
    }
    return true;
}


function validate_add_item($POST){
    if(!validate_item_name($POST)  || !validate_category($POST) ){
        return false;
     }
    return true;
}
function validate_add_user2($POST){
    if(!validate_first_name2($POST)  || !validate_last_name2($POST) || !validate_username($POST) || !validate_password($POST) || !validate_email($POST)|| !validate_type($POST) ){
        return false;
     }
    return true;
}

function validate_program_code($POST){
    if(!isset($POST['code'])){
        return false;
    }else if(strlen(trim($POST['code']))<1){
        return false;
    }
    return true;
}

function validate_program_code_duplicate($POST){
    if(!isset($POST['code'])){
        return false;
    }else{
        $program = new Program();
        foreach ($program->show() as $value){
            if(strcmp(strtolower($value['code']), strtolower($_POST['code'])) == 0){
                return false;
            }
        }
    }
    return true;
}

function validate_program_desc($POST){
    if(!isset($POST['description'])){
        return false;
    }else if(strlen(trim($POST['description']))<1){
        return false;
    }
    return true;
}

function validate_level($POST){
    if(!isset($POST['level'])){
        return false;
    }else if(strcmp($POST['level'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_cet($POST){
    if(!isset($POST['cet'])){
        return false;
    }else if($POST['cet'] < 55){
        return false;
    }
    return true;
}

function validate_status($POST){
    if(!isset($POST['status'])){
        return false;
    }
    return true;
}

function validate_add_program($POST){
    if(!validate_program_code($POST) || !validate_program_desc($POST) || !validate_cet($POST) ||
     !validate_level($POST) || !validate_status($POST) || !validate_program_code_duplicate($_POST)){
        return false;
     }
    return true;
}

?>