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
                   <?php echo get_field('imagen_perfil', 'user_' . $curauth->ID); ?>
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
                    <p>Nivel: <?php echo get_field('nivel', 'user_' . $curauth->ID); ?></p>
                    <p><?php echo get_field('estado', 'user_' . $curauth->ID); ?></p>
                    <p><?php echo get_field('ciudad', 'user_' . $curauth->ID); ?></p>
                    <p>Sexo:<?php echo get_field('sexo', 'user_' . $curauth->ID); ?></p>   
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <h3 class="">Anuncios</h3>
                <?php query_posts(array('post_type' => 'anuncios', 'author' => $curauth->nickname)) ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                            <div class="thumbnail">
                                <?php echo get_avatar($comment->comment_author_email); ?> 
                            </div>
                        </div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                            <div class="ads-text">
                                <a href="<?php the_permalink(); ?>">  <p>
                                        Publicado el <?php echo get_the_date('d M Y '); ?> - a las <?php echo get_the_date('h'); ?>
                                        <?php echo get_the_title(); ?> - <?php echo get_the_content(); ?> que sepa tocar  
                                        <?php
                                        foreach (get_field('instrumento') as $instrumento) {
                                            echo $instrumento . ', ';
                                        }
                                        ?> en 
                                        <?php
                                        $categoria = pk_get_the_category(get_the_ID(), 'categoria');
                                        $r = 1;
                                        foreach ($categoria as $category) {
                                            if ($r == 1) {
                                                echo $category->name . ', ';
                                                $r++;
                                            } else {
                                                echo $category->name;
                                            }
                                        }
                                        ?>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
    <?php endwhile;
else:
    ?>
                    <p><?php _e('No posts by this author.'); ?></p>
<?php endif; ?>
            </div>
        </div>
    </div>

</section>
<?php get_footer(); ?>