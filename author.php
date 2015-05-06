<?php get_header();?>
<?php     $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));?>
<section class="espaciado-top author ads">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="profile-dates">
                    <div class="title">
                        DATOS PERSONALES
                    </div> 
                      <?php echo get_avatar($curauth->user_email,200); ?> 
                    <h2><?php echo $curauth->nickname; ?></h2>
                    <h3><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h3>
                    <p><?php echo $curauth->user_description; ?></p>
                    <p>Registrado desde: <?php echo $curauth->user_registered; ?></p>
                   
                    <?php echo get_field('instrumento');?>
                    <?php echo get_field('estado');?>
                    <?php echo get_field('ciudad');?>
                    <?php
 $x = get_field;
  debug($x,false);
                    ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                       <?php
                                //Gather comments for a specific page/post 
                                $comments = get_comments(array(
                                    'parent'=>$curauth->ID,
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
   
</section>
<?php get_footer();?>