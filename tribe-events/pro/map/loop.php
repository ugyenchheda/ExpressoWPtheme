<?php 
/**
 * Map View Loop
 * This file sets up the structure for the map view events loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/map/loop.php
 *
 * @package Tribe__Events__MainCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<?php 

global $more;
$more = false;

?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php do_action( 'tribe_events_inside_before_loop' ); ?>

	<!-- Month / Year Headers -->
	<?php tribe_events_list_the_date_headers(); ?>

	<!-- Event  -->
	<div id="post-<?php the_ID() ?>" class="<?php tribe_events_event_classes() ?>">
		<?php tribe_get_template_part( 'pro/map/single', 'event' ) ?>
	</div><!-- .hentry .vevent -->


	<?php do_action( 'tribe_events_inside_after_loop' ); ?>
<?php endwhile; ?>

