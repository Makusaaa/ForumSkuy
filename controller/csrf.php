<?php
    function generateCSRF(){
        if(!isset($_SESSION['csrf-token'])){
            $_SESSION['csrf-token'] = sha1(uniqid());
        }
    }

    function checkCSRF($token){
        if (isset($_SESSION['csrf-token']) && $_SESSION['csrf-token'] === $token){
            unset($_SESSION['csrf-token']);
            return true;
        }
        return false;
    }
?>

