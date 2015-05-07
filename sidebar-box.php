  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="box-search profile-dates">
                       <div class="title">
                            BUSCADOR
                        </div> 
                    <form action="" class="filtrador">
                        <label for="sexo"> Hombre / Mujeres</label>
                        <select name="sexo" id="" class="selector">
                            <option value="ambos">Ambos</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                        </select>
                        <label for="sexo"> Edad</label>
                        <select name="sexo" id="" class="selector medio">
                            <option value="todos">desde</option>
                            <option value="Femenino">18</option>
                            <option value="Masculino">19</option>
                        </select>
                            <select name="sexo" id="" class="selector medio">
                            <option value="ambos">Hasta</option>
                            <option value="Femenino">21</option>
                            <option value="Masculino">23</option>
                            </select>
                        <label for="sexo"> Estado</label>
                        <select name="estado" id="" class="selector" >
                                <option value="todos">Todos</option>
                                   <?php
                                                    $args = array(
                                                        'child_of' => 0,
                                                        'parent' => '',
                                                        'orderby' => 'name',
                                                        'order' => 'ASC',
                                                        'hide_empty' => 0,
                                                        'hierarchical' => 0,
                                                        'exclude' => '',
                                                        'include' => '',
                                                        'number' => '',
                                                        'taxonomy' => 'categoria',
                                                        'pad_counts' => false
                                                    );
                                                    ?>
                                                    <?php $categories = get_categories($args); ?> 
                                                    <?php foreach ($categories as $category) { ?>
                                                        <option id="" value="<?php echo  $category->name; ?>"><?php echo  $category->name; ?></option>
                                                    <?php }wp_reset_query(); ?>
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