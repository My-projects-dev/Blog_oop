<?php
include 'includes/header.php';
include 'includes/sidebar.php';

$route = $_GET['route'] ?? '';

switch ($route) {
    case "admins":
    include_once('admins/index.php');
    break;
    case "admins/edit":
    include_once('admins/edit.php');
    break;
    case "admins/create":
    include_once('admins/create.php');
    break;

    case "blog":
    include_once('blog/index.php');
    break;
    case "blog/edit":
    include_once('blog/edit.php');
    break;
    case "blog/create":
    include_once('blog/create.php');
    break;

    case "categories":
    include_once('categories/index.php');
    break;
    case "categories/edit":
    include_once('categories/edit.php');
    break;
    case "categories/create":
    include_once('categories/create.php');
    break;

    case "pages":
    include_once('pages/index.php');
    break;
    case "pages/edit":
    include_once('pages/edit.php');
    break;
    case "pages/create":
    include_once('pages/create.php');
    break;

    case "settings":
    include_once('settings/index.php');
    break;
    case "settings/edit":
    include_once('settings/edit.php');
    break;
    case "settings/create":
    include_once('settings/create.php');
    break;

    default :
    include_once('dashboard.php');
    break;
}

include 'includes/footer.php';

?>
