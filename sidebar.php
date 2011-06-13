        	<div id="right_col">
        	
        		<div id="sidebar_events">
        		<div class="padding">
        		<div id="Events"><img src="<?php bloginfo('template_url'); ?>/img/loading.gif" alt="Loading" /></div>
        		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/eventLoader.js"></script>
        
      			<p><a href="/events/calendar">View All Events</a><br>
        		<strong>Subscribe to Events [ <a href="http://www.google.com/calendar/ical/u9aiauedp0sneee5u5p1splvl4@group.calendar.google.com/public/basic.ics">iCal</a> | <a href="http://www.google.com/calendar/feeds/u9aiauedp0sneee5u5p1splvl4%40group.calendar.google.com/public/basic" target="_blank">RSS</a> ]</a></strong></p></div>
        		</div>
        		<!-- /sidebar_events -->
        		
        		<div id="poll">
        		<div class="padding">
        		<?php if (function_exists('vote_poll') && !in_pollarchive()): ?>
   				<ul>
      				<li><?php get_poll();?></li>
   				</ul>
   				<a href="/pollsarchive">Polls Archive</a>
				<?php endif; ?>
				</div>
				</div>
				<!-- /poll -->
        		
        	</div>
        	<!-- /right col-->
