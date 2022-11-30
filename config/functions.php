<?php /** @noinspection ALL */

function isLogged()
{
    if (!isset($_SESSION['logged_in'])) {
        $_SESSION['error_message'] = "Please login for enter admin";
        header("Location:login.php");
    }
}

function errorAlert()
{
    if (isset($_SESSION['error_message'])):?>
        <div class="alert alert-danger" role="alert">
            <?php
            echo $_SESSION['error_message'];
            unset($_SESSION['error_message']);
            ?>
        </div>
    <?php endif;
}

function successAlert

()
{
    if (isset($_SESSION['success_message'])):?>
        <div class="alert alert-success" role="alert">
            <?php
            echo $_SESSION['success_message'];
            unset($_SESSION['success_message']);
            ?>
        </div>
    <?php endif;
}

function errorHeader($errorMessage, $location)
{
    $_SESSION['error_message'] = $errorMessage;
    header("Location: $location");
    exit();
}

?>