<?php

add_action( 'add_meta_boxes', 'logic_meta_box_add' );
function logic_meta_box_add(){
    add_meta_box( 'logic-meta-box-id', 'Elegir', 'logic_meta_box_cb', 'anuncios', 'side', 'high' );
}
function logic_meta_box_cb($post){
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom( $post->ID );
	//print_r( $values['state_meta_box_country']);exit;
    $selectedCountry = isset( $values['city_meta_box_country'] ) ?  $values['city_meta_box_country']: '';
    $selectedState = isset( $values['city_meta_box_state'] ) ?  $values['city_meta_box_state']: ''; 
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'city_meta_box_nonce', 'meta_box_nonce' );
	
	/* Country */
	$country_array = array( "" => __('Select Country','framework') );
	$country_posts = get_posts( array( 'post_type' => 'countries', 'posts_per_page' => -1, 'suppress_filters' => 0 ) );
	if(!empty($country_posts)){
		foreach( $country_posts as $country_post ){
			$country_array[$country_post->ID] =$country_post->post_title;
		}
	}
	
	/* State */
	$state_array = array( "" => __('Select State','framework') );
	if($selectedCountry)
	{
		$state_posts = get_posts( array( 'post_type' => 'states', 'posts_per_page' => -1, 'suppress_filters' => 0, 'meta_query' => array(
			array(
				'key' => 'state_meta_box_country',
				'value' => $selectedCountry,
			)
		) ) );
	}
	if(!empty($state_posts)){
		foreach( $state_posts as $state_post ){
			$state_array[$state_post->ID] =$state_post->post_title;
		}
	}
    ?>
    <p>
        <label for="city_meta_box_country"><strong>Estado:</strong> </label>
        </p>
       <select name="city_meta_box_country" id="city_meta_box_country" class="required" required title="Please Select Country">
            <?php foreach($country_array as $key=>$val){?>
            <option value="<?php echo $key;?>" <?php selected( $selectedCountry[0], $key ); ?>><?php echo $val;?></option>
            <?php }?>
        </select>
    <p>
        <label for="city_meta_box_state"><strong>Ciudad:</strong> </label>
        </p>
        <select name="city_meta_box_state" id="city_meta_box_state" class="required" required  title="Please Select State">
            <?php foreach($state_array as $key=>$val){?>
            <option value="<?php echo $key;?>" <?php selected( $selectedState[0], $key ); ?>><?php echo $val;?></option>
            <?php }?>
        </select>
    </p>
    <?php  
}

add_action( 'save_post', 'city_meta_box_save' );
function city_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'city_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    //if( !current_user_can( 'edit_post' ) ) return;
	
	// now we can actually save the data
    $allowed = array(
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
    // Make sure your data is set before trying to save it
     if( isset( $_POST['city_meta_box_country'] ) )
        update_post_meta( $post_id, 'city_meta_box_country',  $_POST['city_meta_box_country'] );
	if( isset( $_POST['city_meta_box_state'] ) )
        update_post_meta( $post_id, 'city_meta_box_state',  $_POST['city_meta_box_state'] );	
}
function logic_meta_box_cb1($post){
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom( $post->ID );
	//print_r( $values['state_meta_box_country']);exit;
    $selectedCountry = isset( $values['city_meta_box_country'] ) ?  $values['city_meta_box_country']: '';
    $selectedState = isset( $values['city_meta_box_state'] ) ?  $values['city_meta_box_state']: ''; 
    // We'll use this nonce field later on when saving.
    //wp_nonce_field( 'city_meta_box_nonce', 'meta_box_nonce' );
	
	/* Country */
	$country_array = array( "" => __('Select Country','framework') );
	$country_posts = get_posts( array( 'post_type' => 'countries', 'posts_per_page' => -1, 'suppress_filters' => 0 ) );
	if(!empty($country_posts)){
		foreach( $country_posts as $country_post ){
			$country_array[$country_post->ID] =$country_post->post_title;
		}
	}
	
	/* State */
	$state_array = array( "" => __('Select State','framework') );
	if($selectedCountry)
	{
		$state_posts = get_posts( array( 'post_type' => 'states', 'posts_per_page' => -1, 'suppress_filters' => 0, 'meta_query' => array(
			array(
				'key' => 'state_meta_box_country',
				'value' => $selectedCountry,
			)
		) ) );
	}
	if(!empty($state_posts)){
		foreach( $state_posts as $state_post ){
			$state_array[$state_post->ID] =$state_post->post_title;
		}
	}
    ?>
    
        
            <?php foreach($state_array as $key=>$val){
                if(pk_selected( $selectedState[0], $key )){?>
            <?php echo $val.' estado ';?>
            <?php }?>
            <?php }?>
            <?php foreach($country_array as $key=>$val){
                
                if(pk_selected( $selectedCountry[0], $key )){?>
            <?php  ?><?php echo $val;?>
            <?php }?>
            <?php }?>
   
        
    </p>
    <?php  
}