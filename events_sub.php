<?php
/*
Template Name: Events_Sub
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