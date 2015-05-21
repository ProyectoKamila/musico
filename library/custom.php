<?php
function custom_all($custom_name){
query_posts(array('post_type' => 'acf', 'posts_per_page' => -1));
while (have_posts()) {
    the_post();
    $meta = get_post_meta(get_the_ID());
    //debug($meta);
    $r = 0;
    $key = array();
    foreach ($meta as $m => $v) {
        $findme = 'field_';
        $pos = strpos($m, $findme);
        if ($pos !== false) {
            $key[$r] = $m;
            $r++;
        }
    }
    foreach ($key as $k) {
        $field = get_field_object($k);
        $field['name'];
        if ($field['name'] == $custom_name) {
//            debug($field);
                foreach ($field['choices'] as $choices) {
//                    debug($choices,false);
//                    echo $choices.'<br>';
                    echo '<option id="rpr_state-alabama" value="'.$choices.'">'.$choices.'</option>';
                }
        }
    }
//                                                        debug($key);

} 
} 
function custom_c($custom_name){
query_posts(array('post_type' => 'acf', 'posts_per_page' => -1));
while (have_posts()) {
    the_post();
    $meta = get_post_meta(get_the_ID());
    //debug($meta);
    $r = 0;
    $key = array();
    foreach ($meta as $m => $v) {
        $findme = 'field_';
        $pos = strpos($m, $findme);
        if ($pos !== false) {
            $key[$r] = $m;
            $r++;
        }
    }
    foreach ($key as $k) {
        $field = get_field_object($k);
        $field['name'];
        if ($field['name'] == $custom_name) {
            debug($field['conditional_logic']['rules'][0]);
//                foreach ($field['choices'] as $choices) {
//                    echo '<option id="rpr_state-alabama" value="'.$choices.'">'.$choices.'</option>';
//                }
        }
    }
//                                                        debug($key);

} 
} 