<?php get_header(); ?>

	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/twitter.js"></script>
    <script type="text/javascript" charset="utf-8">
    getTwitters('cabTweets', {
        id: 'DrexelCAB', 
        prefix: '<a href="http://twitter.com/%screen_name%">CAB</a>: ', 
        clearContents: false, // leave the original message in place
        count: 3, 
        withFriends: true,
        ignoreReplies: false,
        newwindow: true
    });
	
    </script>

	<div id="left_col">

        		<div id="headliner">
        		<?php $my_query = new WP_Query('cat=4&showposts=1');
        		while ($my_query->have_posts()) : $my_query->the_post();
        		$do_not_duplicate = $post->ID; ?>
					<div class="post" id="post-<?php the_ID(); ?>">
					<div class="entry">
					<a href="<?php echo the_permalink(); ?>"><img src="<?php echo catch_that_image() ?>" alt="<?php echo the_title(); ?>" class="main_event"></a>
					</div>
					<div class="headliner_title"><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></div>
					</div>
					<?php endwhile; ?>
					</div>
                	        	
        		<?php random_posts(); ?>
        		
        		<div id="twitter">
        		<div class="twitters" id="cabTweets"></div>
        		</div>
        		
        	</div>
        	<!-- /left col-->
        	
<?php get_sidebar(); ?>

<?php get_footer(); ?>