<?php
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

<?php
if($_POST['simple']){
$s = $wpdb->get_results("SELECT * FROM `wp_posts` WHERE `wp_posts`.`post_content` LIKE '%".$_POST['false-search']."%'");
if(!empty($s) ){
    foreach ($s as $key => $v) {
        
        $s1 = $wpdb->get_results("SELECT * FROM `wp_postmeta` WHERE `post_id` = ".$v->ID." AND `meta_key` LIKE 'instrumento' AND `meta_value` LIKE '%".$_POST['instrumento']."%'");
        
        
        if(!empty($s1)){
//        debug($s1);
            $s2 = $wpdb->get_results("SELECT * FROM `wp_postmeta` WHERE `post_id` = ".$v->ID." AND `meta_key` LIKE 'city_meta_box_country' AND `meta_value` LIKE '".$_POST['estado']."'");
            
            if(!empty($s2)){
                $s3 = $wpdb->get_results("SELECT * FROM `wp_postmeta` WHERE `post_id` = ".$v->ID." AND `meta_key` LIKE 'city_meta_box_state' AND `meta_value` LIKE '".$_POST['ciudad']."'");
                
                query_posts(array('post_type' => 'anuncios', 'posts_per_page' => -1));
                        while (have_posts()) {
                            the_post();
//                            debug($post->ID,false);
                            if($post->ID == $v->ID){
                ?>
                        
                         
                             <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                               <div class="thumbnail">
                                    <a href="<?php echo get_author_posts_url($post->post_author); ?>">
                                        <img src="<?php echo get_field('imagen_perfil', 'user_' . get_the_author_meta('id')); ?>" alt="<?php echo $curauth->nickname; ?>"/>

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
                    <?php
                        }
                        }
                
                
            }else{
                $error = 'no se ha encontrado ningun resultado para';
                debug($error);
            }
            
        }else{
            $error = 'no se ha encontrado ningun resultado para';
        }
    }
    
}else{
    $error = 'no se ha encontrado ningun resultado para';
}
if($error){
    echo $error;
}
}elseif($_POST['all']){                               /////////////////////////////////////////fin simple ///////////////////////////////////////
//    debug($_POST,false);
    query_posts(array('post_type' => 'anuncios', 'posts_per_page' => -1));
                        while (have_posts()) {
                            the_post();
//                            debug($post->ID,false);
                ?>
                        
                         
                             <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                               <div class="thumbnail">
                                    <a href="<?php echo get_author_posts_url($post->post_author); ?>">
                                        <img src="<?php echo get_field('imagen_perfil', 'user_' . get_the_author_meta('id')); ?>" alt="<?php echo $curauth->nickname; ?>"/>

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
                    <?php
                        }
}
?>
                        
                    </div>
                </div>
            </div>
      
            </div>
        </div>
    </section>

<?php


get_footer('');


?>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#estado1').change(function () {
//    console.log('#estado1');

//            console.log($('#cursos'));
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url: "<?php bloginfo('template_url'); ?>/procesar.php",
//                data: "cursos=" + $('#cursos').val()+"&hfh="+,
                data: "estado=" + $('#estado1').val(),
                success: function (data) {
//                    cosole.log($('#cursos'));
                    $('#ciudad1').html(data);
                }
            });
        });
    });
</script>