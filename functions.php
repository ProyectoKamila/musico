<?php

//Cambior el logo de inicio de Sesion
add_action('login_head', 'custom_login_logo');
include('library/login-logo.php');
//Funciones para crear post y Caetegory personalizados
add_action('init', 'theme_custom_types');
include('library/custom-post-type.php');
//Texto de desarrollado por y el enlace a web de desarrollo
add_filter('admin_footer_text', 'left_admin_footer_text_output');
add_filter('update_footer', 'right_admin_footer_text_output', 11);
include('library/copyright.php');
//borrar dashboard y mensaje de actualizacion
//add_action('wp_dashboard_setup', 'custom_dashboard_widgets');
include('library/widget-delete.php');
//Debug para las consultas
include('library/debug.php');
//opciones del themplate
include('library/options.php');
//generar las portadas
include('library/portada.php');
//funcion para extraer la url del thumbnail
include('library/imgurl.php');
//funcion para acortar cadenas
include('library/limited-caracter.php');

include('library/custom.php');
// categorias
include('library/pk_get_the_category.php');



show_admin_bar(false);

//Crear Post Personalizados
function theme_custom_types() {
    add_custom_post_type(array(
        'type' => 'Anuncios',
        'singular' => 'anuncio'
    ));
}

add_custom_taxonomy(array(
    'name' => 'categoria',
    'singular' => 'categoria',
    'genero' => 'f',
    'post_type' => 'anuncios',
    'hierarchical' => true
));

$current_user = wp_get_current_user();
//    debug($current_user->roles[0]);
if ($current_user->roles[0] == 'subscriber') {

    function remove_menus() {
        remove_menu_page('index.php');                  //Dashboard
        remove_menu_page('edit.php');                   //Posts
//  remove_menu_page( 'edit.php?post_type=anuncios' );                   //Posts
        remove_menu_page('upload.php');                 //Media
        remove_menu_page('edit.php?post_type=page');    //Pages
        remove_menu_page('edit-comments.php');          //Comments
        remove_menu_page('themes.php');                 //Appearance
        remove_menu_page('plugins.php');                //Plugins
        remove_menu_page('users.php');                  //Users
        remove_menu_page('tools.php');                  //Tools
        remove_menu_page('options-general.php');        //Settings
    }

    add_action('admin_menu', 'remove_menus');
}