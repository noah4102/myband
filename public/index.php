<?php

require('../private/smarty/Smarty.class.php');
require('../private/model.php');
require('../private/controller.php');
$smarty = new Smarty();
$smarty->setCompileDir('../private/tmp');
$smarty->setTemplateDir('../private/views');

if(isset($_POST['submit_login'])){
    verify_login_action();
}

if(isset($_POST['event_submit'])){
    uploadevent_action();
}

define('ARTICLES_PER_PAGE',5);

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$pageno = isset($_GET['pageno']) ? $_GET['pageno'] : '1';
$searchterm = isset($_GET['searchterm']) ? '%' . $_GET['searchterm'] . '%' : '%';

switch ($page){
    case 'home': homepage_action($smarty); break;
    case 'news': news_action(); break;
    case 'contact': contact_action(); break;
    case 'admin' : admin_action(); break;
    case 'beheer' : beheer_action(); break;
    case 'edit' : edit_action(); break;
    case 'verwerkedit' : verwerkedit_action(); break;
    case 'verwerkupload' : verwerkupload_action(); break;
    case 'login': login_action(); break;
    case 'logout': logout_action(); break;
    case 'delete' : delete_action(); break;
    case 'terms' : terms_action(); break;
    case 'events' : events_action(); break;
    case 'zoek': zoek_action(); break;
    default: page_not_found_action($smarty); break;
}

