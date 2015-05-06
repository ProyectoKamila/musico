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
                                        <form>
                                            <div id="musico" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 search-type " onclick='load_form(id);'>
                                                MUSICO
                                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                            </div>
                                            <div id="tocada" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 search-type" onclick='load_form(id);'>
                                                TOCADA
                                                <span class="glyphicon glyphicon-music" aria-hidden="true"></span>
                                            </div>

                                            <div class="col-lg-offset-5 col-md-offset-5 col-lg-3 col-md-3 col-sm-4 col-xs-12 styled-select">

                                                <select id="instrumento" onchange="load_form(this.value);" required>
                                                    <option>Instrumento</option>
                                                    <option>Guitara</option>
                                                    <option>Teclado</option>
                                                    <option>Tolo</option>
                                                </select>

                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 styled-select">

                                                <select name="estado" id="estado" onchange="load_form(this.value);" required>
                                                    <option>Estado</option>
                                                    <option id="rpr_state-alabama" value="Alabama">Alabama</option>
                                                    <option id="rpr_state-alaska" value="Alaska">Alaska</option>
                                                    <option id="rpr_state-arizona" value="Arizona">Arizona</option>
                                                    <option id="rpr_state-arkansas" value="Arkansas">Arkansas</option>
                                                </select>

                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 styled-select no-borde">

                                                <select id="ciudad" onchange="load_form(this.value);" required>
                                                    <option>Ciudad</option>
                                                    <option id="rpr_cuidad-alabaster" value="Alabaster">Alabaster</option>
                                                    <option id="rpr_cuidad-albertville" value="Albertville">Albertville</option>
                                                    <option id="rpr_cuidad-alexander_city" value="Alexander City">Alexander City</option>
                                                    <option id="rpr_cuidad-andalusia" value="Andalusia">Andalusia</option>
                                                    <option id="rpr_cuidad-anniston" value="Anniston">Anniston</option>
                                                </select>

                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-large">
                                                <input id='text' type="text" name="false-search" id="false-search" class="col-lg-11 col-md-11 col-sm-10 col-xs-10 large-input" placeholder="Busqueda" required>
                                                <buttom type="buttom" class="col-lg-1 col-md-1 col-sm-2 col-xs-2 enviar" id="lupa"></buttom>
                                        </form>
                                        <form action="" id="fs">
                                            <input type="text" id="s" name="s" style="display:none" required>
                                            <input type="submit" class="col-lg-1 col-md-1 col-sm-2 col-xs-2 enviar hidden-xs hidden-sm hidden-md hidden-lg" onclick="load_form();">
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
                                //Gather comments for a specific page/post 
                                $comments = get_comments(array(
                                    'status' => 'approve' //Change this to the type of comments to be displayed
                                ));
                               
                                ?>
                            <?php foreach ($comments as $comment){?>
                         
                             <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                <div class="thumbnail">
                                    <?php echo get_avatar($comment->comment_author_email); ?> 
                                </div>
                            </div>
                            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                <div class="ads-text">
                                    <a href="author/<?php echo get_comment_author_link(); ?>">  <p><?php echo $comment->comment_date;?> - <?php echo $comment->comment_content;?></p></a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(""); ?>