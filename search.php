<?php
/*
  Template Name: Search Page
 */
get_header('');
?>
<section class="ads espaciado-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="title">
                    <h1>Bienvenido a musicodisponible</h1>
                    <h2>La comunidad”Músico Disponible” es una pequeña red social que permite un socio busca urgentemente músicos</h2>
                </div>
            </div>
          <?php get_template_part('sidebar-box');?>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h3 class="">Anuncios</h3>
                <div class="container-fluid items">
                    <div class="row">

<?php while (have_posts()) {
    $x = the_post(); 
    
?>
                         
                             <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                               <div class="thumbnail">
                                    <a href="<?php echo get_author_posts_url($post->post_author); ?>">
                                        <?php
                                        echo get_avatar(get_the_author_meta('user_email'));
                                        ?> 
                                    </a>
                                </div>
                            </div>
                           <div class="col-lg-11 col-md-11 col-sm-10 col-xs-10 col-xs-offset-1 col-lg-offset-0 col-md-offset-0 col-sm-offset-0">
                                <div class="ads-text">
                                    <a href="<?php the_permalink(); ?>">  
                                        <p>
                                            Publicado el <?php echo get_the_date('d M Y '); ?> - a las <?php echo get_the_date('H M'); ?>
                                            <?php echo get_the_title(); ?> - <?php echo get_the_content(); ?> que sepa tocar  
                                            <?php
                                            foreach (get_field('instrumento') as $instrumento) {
                                                echo $instrumento . ', ';
                                            }
                                            ?> en 
                                            <?php
                                            $categoria = pk_get_the_category(get_the_ID(), 'estado');
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
                                            <?php
                                            $categoria = pk_get_the_category(get_the_ID(), 'ciudad');
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
                    <?php } ?>


                    </div>
                </div>
            </div>
      
            </div>
        </div>
    </section>
    <?php get_footer(''); ?>