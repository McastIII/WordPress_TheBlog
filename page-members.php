<?php get_header();?>

<div class="page__hero">
    <h1><?php the_title();?></h1>
</div>


<section class="team">
    <div class="container">
        <h3>Meet the Team</h3>
        <div class="team__grid">
            
        <?php $members = new WP_Query(array(
                    'post_type' => 'members',
                    'posts_per_page' => 4,
                ))
                ?>        
                <?php if($members->have_posts()) : while($members->have_posts()) : $members->the_post()?>
            <div class="team__card">
            <?php if(has_post_thumbnail()){
                        the_post_thumbnail();
                    }?>
                <h4><?php the_title();?></h4>
                <p><?php echo get_post_meta(get_the_ID(),'Position', true)?></p>
                <ul>
                    <li><a href="<?php echo get_post_meta(get_the_ID(),'facebook', true)?>"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="<?php echo get_post_meta(get_the_ID(),'twitter', true)?>"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="<?php echo get_post_meta(get_the_ID(),'linkedin', true)?>"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="<?php echo get_post_meta(get_the_ID(),'email', true)?>"><i class="fas fa-envelope"></i></a></li>
                </ul>
            </div>
            <?php 
                endwhile;
                else :
                    echo "Wala nang testimonial!";
                endif;

                wp_reset_postdata();
              ?>

              <a href="<?php echo site_url('/members')?>">View all members</a>;
        </div>
    </div>
</section>
<?php get_footer();?>