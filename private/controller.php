<?php

function page_not_found_action($smarty) {
    global $smarty;
    $smarty->display('notfound.tpl');
}

function homepage_action($smarty){
    global $smarty;
    $articles = get_articles();
    $smarty->assign('articles', $articles);
    $home = article_display();
    $smarty->assign('home', $home);
    $smarty->display('header.tpl');
    $smarty->display('menu.tpl');
    $smarty->display('home.tpl');
    $smarty->display('footer.tpl');
}

function contact_action() {
    global $smarty;
    global $page;
    $smarty->display('header.tpl');
    display_page($page);
    $smarty->display('sidebar.tpl');
    $smarty->display('footer.tpl');

}
function news_action() {
    global $smarty, $pageno, $page, $searchterm;
    //model
    $articles = get_some_articles();
    $number_of_pages =  calculate_pages();
    $smarty->assign('current_page',$pageno);
    $smarty->assign('number_of_pages',$number_of_pages);
    $smarty->assign('articles',$articles);
    //views
    display_page($page);
}

function admin_action() {
    global $page;
    check_valid_session();
    display_page($page);
}

function beheer_action() {
    global $smarty, $page;
    check_valid_session();
    $all_articles = beheer_articles();
    $smarty->assign('all_articles', $all_articles);
    display_page($page);
}

function edit_action(){
    global $page, $smarty;
    check_valid_session();
    $formvars = showEdit();
    $smarty->assign('formvars', $formvars);
    display_page($page);
}

function verwerkedit_action() {
    global $page;
    check_valid_session();
    verwerk_edit();
    display_page($page);

}

function verwerkupload_action() {
    global $page;
    check_valid_session();
    upload_post();
    display_page($page);

}

function display_page($page) {
    global $smarty;
    $smarty->assign('title',strtoupper($page));
    $smarty->display('header.tpl');
    $smarty->display('menu.tpl');
    $smarty->display($page . '.tpl');
    $smarty->display('footer.tpl');
}

function verify_login_action() {
    verify_login();
}

function login_action() {
    global $page;
    display_page($page);
}

function logout_action() {
    logout();
}

function delete_action() {
    global $page;
    delete_post();
    check_valid_session();
    display_page($page);
}

function terms_action() {
    global $page;
    display_page($page);
}

function events_action() {
    global $page,$smarty;
    $events = get_events();
    $smarty->assign('events', $events);
    display_page($page);
}

function uploadevent_action() {
    upload_event();
}

function zoek_action() {
    global $page;
    display_page($page);
}
