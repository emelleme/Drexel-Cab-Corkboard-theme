<?php
/*
Template Name: Events
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
        						
        			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="post" id="post-<?php the_ID(); ?>">
					<!--h2><?php //the_title(); ?></h2-->
					<div class="entry">
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
					</div>
					<?php endwhile; endif; ?>
					</div>

					<?php $my_query = new WP_Query('cat=4&showposts=1');
        			while ($my_query->have_posts()) : $my_query->the_post();
        			$do_not_duplicate = $post->ID; ?>
					<div class="post" id="post-<?php the_ID(); ?>" class="events_main">
					<div class="entry">
					<a href="<?php echo the_permalink(); ?>" alt="<?php echo the_title(); ?>"><img src="<?php echo catch_that_image() ?>" class="events_main">
					<div id="main_event_text">
					<div id="events_main_title"><?php the_title(); ?></div></a>
					<h5></strong><?php the_excerpt(); ?></h5></div>
					</div>
					</div>
					<div class="clear"></div>
					<?php endwhile; ?>
					
					<?php $my_query1 = new WP_Query('cat=5');
        			while ($my_query1->have_posts()) : $my_query1->the_post();
        			$do_not_duplicate = $post->ID; ?>
					<div class="post" id="post-<?php the_ID(); ?>" class="events_sub">
					<div class="entry">
					<a href="<?php echo the_permalink(); ?>" alt="<?php echo the_title(); ?>"><img src="<?php echo catch_that_image() ?>" class="events_sub">
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
