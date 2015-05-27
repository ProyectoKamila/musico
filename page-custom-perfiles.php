<?php get_header(""); ?>
    <?php
$text = $_REQUEST['false-search'];
$inst = $_REQUEST['instrumento'];
$esta = $_REQUEST['estado'];
$ciudad = $_REQUEST['ciudad'];
?>

<?php
$users = $wpdb->get_results("SELECT * FROM wp_users"); // query users
$ctext = $wpdb->get_results("SELECT * FROM wp_users WHERE wp_users.user_nicename LIKE '%". $text . "%' ORDER BY $order "); // query users
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
<!--                                           <form action="<?php //echo home_url('/custom-perfiles'); ?>" method="post" class="bus">
                                            <input type="hidden" name="simple" value="true"/>
                                            <div id="musico" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 search-type ">
                                                MUSICO
                                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                            </div>
                                            <div id="tocada" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 search-type">
                                                TOCADA
                                                <span class="glyphicon glyphicon-music" aria-hidden="true"></span>
                                            </div>

                                            <div class="col-lg-offset-5 col-md-offset-5 col-lg-3 col-md-3 col-sm-4 col-xs-12 styled-select">

                                                <select id="instrumento" name="instrumento" required="">
                                                    <option>Instrumento</option>
                                                    <?php custom_all('instrumento'); ?>

                                                </select>

                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 styled-select">

                                                <select name="estado" id="estado" required="">

                                                    <?php
                                                    $country_array = array("" => __('Estado', 'framework'));
                                                    $country_posts = get_posts(array('post_type' => 'countries', 'posts_per_page' => -1, 'suppress_filters' => 0));
                                                    if (!empty($country_posts)) {
                                                        foreach ($country_posts as $country_post) {
                                                            $country_array[$country_post->ID] = $country_post->post_title;
                                                        }
                                                    }
                                                    ?>

                                                    <?php foreach ($country_array as $key => $val) { ?>
                                                        <option value="<?php echo $key; ?>" <?php selected($selectedCountry[0], $key); ?>><?php echo $val; ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 styled-select no-borde">
                                                <select id="ciudad" name="ciudad" required></select>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-large">
                                                <input id='text' type="text" name="false-search" id="false-search" class="col-lg-11 col-md-11 col-sm-10 col-xs-10 large-input" placeholder="Busqueda" required>
                                                
                                                <input type="submit" class="col-lg-1 col-md-1 col-sm-2 col-xs-2 enviar" value=""/>
                                        



                                    </div>

</form>-->

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
            
            <?php if (!empty($ctext)) { ?>
                <?php
                foreach ($ctext as $iden) : // start users' profile "loop"
                    ?>
             <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="profile-dates">
                            <div class="title">
                                <?php echo $iden->user_login; ?>
                            </div> 
                            <a href="<?php echo home_url('author/' . $iden->user_login); ?>">
                                <img src="<?php echo get_field('imagen_perfil', 'user_' . $iden->ID); ?>" alt="<?php echo $curauth->nickname; ?>"/>
                            </a>
                            <h2><?php echo $iden->first_name; ?> <?php echo $iden->last_name; ?></h2>
                            <p><?php echo $iden->user_description; ?> </p>
                            <p>Registrado desde: <?php
                                echo $iden->user_registered;
                                ?></p>
                            <p>Se tocar: 
                                <?php
                                $instrumento = get_field('instrumento', 'user_' . $iden->ID);
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
                                } else {
                                    ?>
                                    No he seleccionado nivel
                                <?php } ?>
                            </p>
                            <p><?php get_field('estado', 'user_' . $iden->ID); ?></p>
                            <p><?php get_field('ciudad', 'user_' . $iden->ID); ?></p>
                            <p>Sexo:<?php echo get_field('sexo', 'user_' . $iden->ID); ?></p>   
                            <p>Edad:<?php echo get_field('edad', 'user_' . $iden->ID); ?></p>   
                        </div>
                    </div>
            <div class="clearfix"></div>
                <?php endforeach; ?>
            <?php } ?>
            <?php if (!empty($users)) { ?>
            <h4> Resultados para Estado y Ciudad</h4>
                <?php
                foreach ($users as $curauth) : // start users' profile "loop"
                     $cit = get_field('ciudad', 'user_' . $curauth->ID);
                    $est = get_field('estado', 'user_' . $curauth->ID);
                        $instrumento = get_field('instrumento', 'user_' . $curauth->ID);
                                if ($instrumento != false) {
                                    $X=0;
                                    foreach ($instrumento as $i) {
//                                        debug($i);
                                       if($X==0){
                                           $i1=$i;
                                           
                                       }
                                       if($X==1){
                                           $i2=$i;
                                       }
                                       if($X==2){
                                           $i3=$i;
                                       }
                                        $X++;
                                       
                                    }
                                }
                     if($est->ID == $esta and $cit->ID == $ciudad and ($i1 == $inst or $i2 or $i2 == $inst or $i3 == $inst )){

                    ?>
            
                    <?php //echo $user->user_login;  ?>
                    <?php // echo $user->user_firstname; ?>
                    <?php // echo $user->user_lastname; ?> 
                    <?php // echo $user->user_nickname; ?>
                    <?php // echo $user->user_email; ?>
                    <?php // echo " -- "; ?>
                    <?php //echo $user->user_email; ?>
                    <?php // echo $user->user_url; ?>
                    <?php // echo $user->user_icq; ?>
                    <?php //echo $user->user_aim; ?>
                    <?php //echo $user->user_msn; ?>
                    <?php //echo $user->user_yim; ?>
                    <?php // echo $user->user_nicename; ?>
                    <?php //debug($curauth);?>
                    <?php ?>
            <?php ?>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="profile-dates">
                            <div class="title">
                                <?php echo $curauth->user_login; ?>
                            </div> 
                            <a href="<?php echo home_url('author/' . $curauth->user_login); ?>">
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
                                } else {
                                    ?>
                                    No he seleccionado nivel
                                <?php } ?>
                            </p>
                            <p>Estado: <?php $est = get_field('estado', 'user_' . $curauth->ID);
                            echo $est->post_name;
                        ?></p>
                            <p>Ciudad: <?php $cit =  get_field('ciudad', 'user_' . $curauth->ID); 
                            echo $cit->post_name;
                            ?>
                            </p>
                            <p>Sexo:<?php echo get_field('sexo', 'user_' . $curauth->ID); ?></p>   
                            <p>Edad:<?php echo get_field('edad', 'user_' . $curauth->ID); ?></p>   
                        </div>
                    </div>
                     <?php } ?>
                    <?php
                endforeach; // end of the users' profile 'loop'
                ?>

            <?php } else { ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br>
                    <br>
                    <p>Lo sentimos no se han encontrado coincidencias para: <strong> <?php echo $var; ?></strong></p>
                    <br>
                    <br>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#estado').change(function () {

//            console.log($('#cursos'));
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url: "<?php bloginfo('template_url'); ?>/procesar.php",
//                data: "cursos=" + $('#cursos').val()+"&hfh="+,
                data: "estado=" + $('#estado').val(),
                success: function (data) {
//                    cosole.log($('#cursos'));
                    $('#ciudad').html(data);
                }
            });
        });
        $('#musico').click(function(){
            $('#tocada').removeClass('active');
            $('#musico').addClass('active');
            $('.bus').attr('action','<?php echo home_url('/custom-perfiles'); ?>');
            
        });
        
        $('#tocada').click(function(){
            $('#musico').removeClass('active');
            $('#tocada').addClass('active');
            $('.bus').attr('action','<?php echo home_url('/search-ad'); ?>');
        });
    });
</script>
<?php get_footer(""); ?>
