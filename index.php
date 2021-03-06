<?php // custom_all('ciudad');           ?>
<?php get_header(""); ?>
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
                                        <form action="<?php echo home_url('/custom-perfiles'); ?>" method="post" class="bus">
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
</section>
<section class="ads">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="title">
                    <h1>Bienvenido a musicodisponible</h1>
                    <h2>La comunidad”Músico Disponible” es una pequeña red social que permite un socio busca urgentemente músicos</h2>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                <h3 class="">Anuncios</h3>
                <div class="container-fluid items">
                    <div class="row">

                        <?php
                        query_posts(array('post_type' => 'anuncios', 'posts_per_page' => 10));
                        while (have_posts()) {
                            the_post();
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
                        <?php } ?>
                    </div>  
                </div>
            </div>
        </div>
</section>
<?php ?>
<?php get_footer(""); ?>
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