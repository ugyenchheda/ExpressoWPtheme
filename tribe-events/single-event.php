<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single vevent hentry">

	<p id="breadcrumbs">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( __( '&laquo; All %s', 'espresso' ), $events_label_plural ); ?></a>
	</p>

	<!-- Notices -->
	<?php tribe_the_notices() ?>

	

	<div class="tribe-events-schedule updated published tribe-clearfix">
		<?php echo tribe_events_event_schedule_details( $event_id, '<h3>', '</h3>'); ?>
		<?php  if ( tribe_get_cost() ) :  ?>
			<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
		<?php endif; ?>
	</div>

	<!-- Event header -->
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( __( '%s Navigation', 'espresso' ), $events_label_singular ); ?></h3>
		
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-header -->

	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content entry-content description clearfix">
				<?php if (has_post_thumbnail()){ echo '<div class="featured-image single-event-image">'; the_post_thumbnail('gallery-thumb'); echo '</div>'; } ?>
				<?php the_content(); ?>
				<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
			</div><!-- .tribe-events-single-event-description -->
			
			<!-- Event meta -->
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
			<?php tribe_get_template_part( 'modules/meta' ); ?>
			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
		
		</div><!-- .hentry .vevent -->
		<?php if( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments','no' ) == 'yes' ) { comments_template(); } ?>
	<?php endwhile; ?>

	<!-- Event footer -->
    <div id="tribe-events-footer">
		<!-- Navigation -->
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'espresso' ) ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '&laquo; %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% &raquo;' ) ?></li>
		</ul><!-- .tribe-events-sub-nav -->
	</div><!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->