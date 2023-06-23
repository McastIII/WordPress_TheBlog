<?php get_header();?>

<?php if(have_posts()) : while(have_posts()) : the_post()?>
<div class="page__hero" style="background-image:linear-gradient(rgba(0,0,0,.7),rgba(0,0,0,.9)),url(<?php echo get_post_meta(get_the_id(), 'page-banner', true)?>)">
    <h1><?php the_title();?></h1>
</div>

<section class="page__main">
    <div class="container">
        <div class="page__main__grid">
        <?php the_content();?>
        </div>
    </div>
</section>

<?php endwhile;
    else :
        echo "no more posts.";
    endif;
    ?>

<section class="testimonial">
    <div class="container">
        <h3>What our clients say</h3>
        <div class="testimonial__grid">

        <?php $testimonial = new WP_Query(array(
                    'post_type' => 'testimonials',
                    'posts_per_page' => 3,
                ))
                ?>        
                <?php if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post()?>
            <div class="testimonial__item">
                <div class="testimonial__info">
                    <?php if(has_post_thumbnail()){
                        the_post_thumbnail();
                    }?>
                    <div>
                        <ul>
                        <?php
                            $rating = get_post_meta(get_the_ID(), 'rating', true);
                            for ($x = 1; $x <= $rating; $x++){
                            echo "<li><i class='fas fa-star'></i></li>";
                            }
                            ?>
                        </ul>

                        <h4><?php the_title();?> - <?php echo get_post_meta(get_the_ID(),'Position', true)?></h4>
                    </div>
                </div>
                <div class="testimonial__body">
                    <p><?php the_content();?></p>
                </div>
            </div>
            <?php 
                endwhile;
                else :
                    echo "Wala nang testimonial!";
                endif;

                wp_reset_postdata();
              ?>
        
        </div>
    </div>
</section>

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
        </div>
    </div>
</section>
<?php get_footer();?>