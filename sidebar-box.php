  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="box-search profile-dates">
                       <div class="title">
                            BUSCADOR
                        </div> 
                    <form action="" class="filtrador">
                        <label for="sexo"> Hombre / Mujeres</label>
                        <select name="sexo" id="" class="selector">
                            <option value="ambos">Ambos</option>
                            <?php custom_all('sexo'); ?>
                        </select>
                        <label for="sexo"> Edad</label>
                        <select name="sexo" id="" class="selector medio">
                            <option value="todos">desde</option>
                            <?php custom_all('edad'); ?>
                        </select>
                            <select name="sexo" id="" class="selector medio">
                            <option value="ambos">Hasta</option>
                            <?php custom_all('edad'); ?>
                            </select>
                        <label for="sexo"> Estado</label>
                        <select name="estado" id="" class="selector" >
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
                                                        <option value="<?php echo $val; ?>" <?php selected($selectedCountry[0], $key); ?>><?php echo $val; ?></option>

                                                    <?php } ?> 
                        </select>
                        <label for="sexo">Ciudad</label>
                        <select name="sexo" id="" class="selector" >
                                <option value="Femenino">Todos</option>
                                <option value="Masculino">Valencia</option>
                                <option value="Masculino">Valencia</option>
                        </select>
                       <label for="sexo">Que sepa tocar</label>
                        <select name="sexo" id="" class="selector" >
                                <option value="Femenino">Todos</option>
                                <option value="Masculino">Guitarra</option>
                                <option value="Masculino">Maraca</option>
                        </select>
                       <label for="sexo">Nivel</label>
                        <select name="sexo" id="" class="selector" >
                                <option value="Femenino">Todos</option>
                                <option value="Masculino">bueno</option>
                                <option value="Masculino">Intermedio</option>
                        </select>
                       <label for="sexo">Estilo</label>
                        <select name="sexo" id="" class="selector" >
                                <option value="Femenino">Todos</option>
                                <option value="Masculino">Perron</option>
                                <option value="Masculino">Intermedio</option>
                        </select>
                       <input type="submit" class="btn btn-default btn-send" value="BUSCAR">
                    </form>
                </div>
            </div>