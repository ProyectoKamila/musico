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
include('library/logic.php');
// categorias
include('library/pk_get_the_category.php');



show_admin_bar(false);

//Crear Post Personalizados
function theme_custom_types() {
    add_custom_post_type(array(
        'type' => 'Anuncios',
        'supports'=>array('comments', 'editor', 'author','title'),
        'singular' => 'anuncio'
    ));
}

$current_user = wp_get_current_user();
    //debug($current_user->roles[0]); 
//administrator

add_role( 'admin', 'Administrador de p&aacute;gina', 
        array(
        'read'         => true,  // true allows this capability
        'edit_posts'   => true,
        'delete_posts' => false, // Use false to explicitly deny
    )
        );

//remove_role( 'admin' );
if($current_user->roles[0] == 'subscriber'){
      add_action( 'admin_menu', 'remove_menus' );
  }
if($current_user->roles[0] == 'admin'){
     add_action( 'admin_menu', 'remove_menus1' );
  }

function remove_menus(){
  
  //remove_menu_page( 'index.php' );                  //Dashboard
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'edit.php?post_type=countries' );                   //Posts
//  remove_menu_page( 'edit.php?post_type=anuncios' );                   //Posts
  remove_menu_page( 'upload.php' );                 //Media
  remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'themes.php' );                 //Appearance
  remove_menu_page( 'plugins.php' );                //Plugins
  remove_menu_page( 'users.php' );                  //Users
  remove_menu_page( 'tools.php' );                  //Tools
  remove_menu_page( 'options-general.php' );        //Settings
  
}


function remove_menus1(){
    //remove_menu_page('plugins.php');                //Plugins
        remove_menu_page('options-general.php');
        remove_menu_page('tools.php');
        remove_menu_page('admin.php?page=bws_plugins');
        remove_menu_page('update-core.php');
        remove_submenu_page( 'index.php', 'update-core.php' );
//        remove_submenu_page('update-core.php');
}
function pk_selected( $selected, $current = true, $echo = true ) {
	return pk_checked_selected_helper( $selected, $current, $echo, 'selected' );
}
function pk_checked_selected_helper( $helper, $current, $echo, $type ) {
	if ( (string) $helper === (string) $current )
		$result = " $type='$type'";
	else
		$result = '';

	if ( $echo )
		$result;

	return $result;
}
function email_members($post)  {
    global $wpdb;
 debug($post,false);
 $post = query_posts(array('post_type'=>'anuncios', 'post_id'=>$post));
//    $usersarray = $wpdb->get_results("SELECT user_email FROM $wpdb->users;");    
//    $users = implode(",", $usersarray);
//    mail($users, "New WordPress recipe online!", 'A new recipe have been published on http://www.wprecipes.com');
    return $post;
}

add_action('publish_post', 'email_members');