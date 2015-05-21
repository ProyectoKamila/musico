<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/main.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head();?>
</head>
<body>
	<section class="main">
	<header class="">
		<section class="container">
			<div class="row">
				<section class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                                    <img src="<?php bloginfo('template_url');?>/images/logo.png" alt="" class="logo">
				</section>
				<section class="col-lg-9 col-md-9 col-sm-9 col-sm-offset-1 col-md-offset-0 col-lg-offset-0 col-xs-12">
					<ul class="nav nav-pills menu">
					  <li role="presentation" class="dropdown">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo home_url("");?>" role="button" aria-expanded="false">
					      INICIO 
					    </a>
					  </li>
                                          <li role="presentation" class="dropdown">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo home_url("busco-musico");?>" role="button" aria-expanded="false">
					      BUSCO MUSICO 
					    </a>
					  </li>
                                            <li role="presentation" class="dropdown">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo home_url("busco-tocada");?>" role="button" aria-expanded="false">
					      BUSCO TOCADA 
					    </a>
					  </li>
                                          <?php $user_ID = get_current_user_id(); ?>
                                          <?php if($user_ID ==0 ){?>
                                              <li role="presentation" class="dropdown">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo home_url('wp-login.php?action=register');?>" role="button" aria-expanded="false">
					      REGISTRARME
					    </a>
					  </li>
                                                <li role="presentation" class="dropdown">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo home_url('wp-admin/');?>" role="button" aria-expanded="false">
					      ACCEDER
					    </a>
					  </li>
                                          <?php }else{?>
                                                <li role="presentation" class="dropdown">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo get_author_posts_url($user_ID); ?>" role="button" aria-expanded="false">
					      MI PERFIL
					    </a>
					  </li>
                                                <li role="presentation" class="dropdown">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo home_url('wp-admin/profile.php');?>" role="button" aria-expanded="false">
					      EDITAR PERFIL
					    </a>
					  </li>
                                          <?php }?>
					</ul>
				</section>
			</div>
		</section>
            
            
	</header>