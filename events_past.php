<?php
/*
Template Name: Events_Past
*/
?>

<?php get_header(); ?>

<div id="left_col">

        		<div id="content">
        		
        			<div class="top"></div>
        		
        			<div class="middle">
        			
        			<div id="sub_nav"><div class="section_title"><a href="/events"><img src="<?php bloginfo('template_url'); ?>/img/events_section_title.png"></a></div>
        			
        			<?php simple_section_nav("<h6>","</h6>"); ?></div>
        			
        			<div id="page_content">		

					<?php $my_query = new WP_Query('cat=8');
        			while ($my_query->have_posts()) : $my_query->the_post();
        			$do_not_duplicate = $post->ID; ?>
					<div class="post" id="post-<?php the_ID(); ?>" class="events_sub">
					<div class="entry">
					<a href="<?php echo the_permalink(); ?>" alt="<?php echo the_title(); ?>"><div id="events_past_image"><img src="<?php echo catch_that_image() ?>" class="events_sub"></div>
					<h3><?php the_title(); ?></h3></a>
					<h5><?php the_excerpt(); ?></h5>
					</div>
					</div>
					<div class="clear"></div>
					<?php endwhile; ?>
							
					</div>
					<!-- /page_content -->
        			
        			</div>
        			<!-- /middle -->
        		
        			<div class="bottom"></div>
        		
        		</div>
        		<!-- /content -->
        		
        	</div>
        	<!-- /left col-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
