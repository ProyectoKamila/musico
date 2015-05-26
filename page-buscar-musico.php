<?php get_header(''); ?>
<?php 
$var = $_REQUEST['user'];
?>
<?php 
$order = 'user_nicename';
$users = $wpdb->get_results("SELECT * FROM wp_users WHERE wp_users.user_nicename LIKE '%". $var . "%' ORDER BY $order "); // query users
?>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <h2 class="text-right"> &iexcl;Una Red Social de Musicos Norteños, Norteños / Banda, Sierreños y Banda!</h2>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="search">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                                <div class="container-fluid">
                                    <div class="row">
                                        <form action="<?php echo home_url('buscar-musico');?>" method="post">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-large">
                                            <input id='text' type="text" name="user" id="false-search" class="col-lg-11 col-md-11 col-sm-10 col-xs-10 large-input" placeholder="Buscar un musico" required >
                                            <input type="submit" class="col-lg-1 col-md-1 col-sm-2 col-xs-2 enviar" id="lupa" value=" "/>
                                        </form>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</section>
<section class="author ads">
    <div class="container">
        <div class="row">
<?php if(!empty($users)){?>
<?php
    foreach($users as $curauth) : // start users' profile "loop"
    ?>
<?php //echo $user->user_login; ?>
        <?php // echo $user->user_firstname; ?>
        <?php // echo $user->user_lastname; ?>
        <?php // echo $user->user_nickname; ?>
        <?php // echo $user->user_email; ?>
        <?php// echo " -- "; ?>
        <?php //echo $user->user_email; ?>
        <?php // echo $user->user_url; ?>
        <?php// echo $user->user_icq; ?>
        <?php //echo $user->user_aim; ?>
        <?php //echo $user->user_msn; ?>
        <?php //echo $user->user_yim; ?>
        <?php // echo $user->user_nicename; ?>
        <?php //debug($curauth);?>
 
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="profile-dates">
                    <div class="title">
                        <?php echo $curauth->user_login;  ?>
                    </div> 
                    <a href="<?php echo home_url('author/'.$curauth->user_login); ?>">
                   <img src="<?php echo get_field('imagen_perfil', 'user_' . $curauth->ID); ?>" alt="<?php echo $curauth->nickname; ?>"/>
                   </a>
                    <h2><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h2>
                    <p><?php echo $curauth->user_description; ?> </p>
                    <p>Registrado desde: <?php
                        echo $curauth->user_registered;
                        ?></p>
                    <p>Se tocar: 
                        <?php
                        $instrumento = get_field('instrumento', 'user_' . $curauth->ID);
                        if ($instrumento != false) {
                            $r = 1;
                            foreach ($instrumento as $i) {
//                                        debug($i);
                                if ($r != 1) {
                                    echo ', ';
                                }
                                echo $i;
                                $r++;
                            }
                        }
//                                echo get_field('instrumento', 'user_'. $curauth->ID ); 
                        ?>
                    </p>
                    <p>Nivel:                    
                    <?php
                        $nivel = get_field('nivel_musico', 'user_' . $curauth->ID);
                        if ($nivel != false) {
                            $r = 1;
                            foreach ($nivel as $j) {
//                                        debug($i);
                                if ($r != 1) {
                                    echo ', ';
                                }
                                echo $j;
                                $r++;
                            }
                        }else{
                        ?>
                        No he seleccionado nivel
                        <?php } ?>
                    </p>
                    <p><?php echo get_field('estado', 'user_' . $curauth->ID); ?></p>
                    <p><?php echo get_field('ciudad', 'user_' . $curauth->ID); ?></p>
                    <p>Sexo:<?php echo get_field('sexo', 'user_' . $curauth->ID); ?></p>   
                    <p>Edad:<?php echo get_field('edad', 'user_' . $curauth->ID); ?></p>   
                </div>
            </div>
             <?php
    endforeach; // end of the users' profile 'loop'
    ?>
    <?php } else {?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	<br>
    	<br>
    <p>Lo sentimos no se han encontrado coincidencias para: <strong> <?php echo $var;?></strong></p>
    	<br>
    	<br>
</div>
    <?php }?>
        </div>
    </div>
</section>
<?php get_footer(); ?>