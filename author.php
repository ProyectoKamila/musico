<?php get_header(); ?>
<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
<section class="espaciado-top author ads">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="profile-dates">
                    <div class="title">
                        DATOS PERSONALES
                    </div> 
                   <img src="<?php echo get_field('imagen_perfil', 'user_' . $curauth->ID); ?>" alt="<?php echo $curauth->nickname; ?>"/>
                    <h2><?php echo $curauth->nickname; ?></h2>
                    <h3><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h3>
                    <p><?php echo $curauth->user_description; ?> </p>
                    <p>Registrado desde: <?php
                        echo $curauth->user_registered;

                        $author_id = $curauth->ID;
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
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3 class="">Anuncios</h3>
                <?php query_posts(array('post_type' => 'anuncios', 'author' => $curauth->ID)) ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                            <div class="thumbnail">
                                <img src="<?php echo get_field('imagen_perfil', 'user_' . get_the_author_meta('id')); ?>" alt="<?php echo $curauth->nickname; ?>"/>
                            </div>
                        </div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                            <div class="ads-text">
                                <a href="<?php the_permalink(); ?>"> 
                                 <p>
                                            Publicado el <?php echo get_the_date('d M Y '); ?> - a las <?php echo get_the_date('H M'); ?>
                                            <?php echo get_the_title(); ?> - <?php echo get_the_content(); ?> que sepa tocar  
                                            <?php
                                            if (get_field('instrumento')) {
                                                foreach (get_field('instrumento') as $instrumento) {
                                                    echo $instrumento . ', ';
                                                }
                                            }
                                            ?> en la ciudad de
                                            <?php
                                            logic_meta_box_cb1($post);
                                            ?>

                                        </p>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
    <?php endwhile;
else:
    ?>
                    <p><?php _e('Lo siento no he publicado nada.'); ?></p>
<?php endif; ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 my-videos">
                <h2> Mis Videos</h2>
                <div><?php echo get_field('video_1', 'user_' . $curauth->ID); ?></div>
                <div><?php echo get_field('video_2', 'user_' . $curauth->ID); ?></div>
                <div><?php echo get_field('video_3', 'user_' . $curauth->ID); ?></div>
            </div> 
        </div>
    </div>
</section>
<?php get_footer(); ?>