  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="box-search profile-dates">
                       <div class="title">
                            BUSCADOR
                        </div> 
                    <form action="<?php echo home_url('/search-ad'); ?>" method="post" class="filtrador">
                        <input type="hidden" name="all" value="true"/>
                        <label for="sexo"> Hombre / Mujeres</label>
                        <select name="sexo" id="" class="selector">
                            <option value="ambos">Ambos</option>
                            <option value="m">Masculino</option>
                            <option value="f">Femenino</option>
                        </select>
                        <label for="sexo"> Edad</label>
                        <select name="desde" id="" class="selector medio">
                            <option value="desde">Desde</option>
                            <!--<option value="all">Todos</option>-->
                            <?php // custom_all('edad'); ?>
                            <?php for($i=18; $i<=50; $i++){ ?>
                            <option value="<?= $i;?>"><?= $i;?></option>
                            <?php } ?>
                        </select>
                            <select name="hasta" id="" class="selector medio">
                            <option value="hasta">Hasta</option>
                            <?php // custom_all('edad'); ?>
                            <?php // custom_all('edad'); ?>
                            <?php for($i=18; $i<=50; $i++){ ?>
                            <option value="<?= $i;?>"><?= $i;?></option>
                            <?php } ?>
                            </select>
                        <label for="sexo"> Estado</label>
                        <select name="estado" id="estado1" class="selector" >
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
                        <label for="sexo">Ciudad</label>
                        <select id="ciudad1" name="ciudad" class="selector" required>
                            <option>Seleccione un estado</option>
                        </select>
<!--                        <select name="sexo" id="" class="selector" >
                                <option value="Femenino">Todos</option>
                                <option value="Masculino">Valencia</option>
                                <option value="Masculino">Valencia</option>
                        </select>-->
                       <label for="sexo">Que sepa tocar</label>
                        <select name="intrumento" id="" class="selector" >
                                <option value="Femenino">Todos</option>
                                <option value="Masculino">Guitarra</option>
                                <option value="Masculino">Maraca</option>
                        </select>
                       <label for="sexo">Nivel</label>
                        <select name="nivel" id="" class="selector" >
                            <?php custom_all('nivel_musico'); ?>
<!--                                <option value="Femenino">Todos</option>
                                <option value="Masculino">bueno</option>
                                <option value="Masculino">Intermedio</option>-->
                        </select>
                       <label for="estilo">Estilo</label>
                        <select name="sexo" id="" class="selector" >
                            <?php custom_all('stilo'); ?>
<!--                                <option value="Femenino">Todos</option>
                                <option value="Masculino">Perron</option>
                                <option value="Masculino">Intermedio</option>-->
                        </select>
                       <input type="submit" class="btn btn-default btn-send" value="BUSCAR">
                    </form>
                </div>
            </div>
<?php wp_reset_query(); ?>
