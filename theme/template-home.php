<?php
/*
 * Template Name: OnePage Home
 */

get_header();

?>

<?php
$menu_items = wp_get_nav_menu_items('main-nav');
if( $menu_items ) {
foreach ($menu_items as $menu_item ) {
$args = array('p' => $menu_item->object_id,'post_type' => 'any');

global $wp_query;
$wp_query = new WP_Query($args);
$templatePart = ($menu_item->title == 'Etudes') ? 'education' : $menu_item->object;
?>

<main class="o-main">
<section <?php post_class('sep'); ?> id="<?php echo sanitize_title($menu_item->title); ?> ">
<?php
if ( have_posts() ){
   include(locate_template('template-'.$templatePart.'.php'));
} ?>
</section>
<?php }}; ?>

<?php while(have_posts()) : the_post(); ?>
<h2 class=”post-title”><?php the_title(); ?></h2>
<div class=”post-excerpt”><?php the_excerpt() ?></div>
<div class=”post-content”><?php the_content(); ?></div>
<?php endwhile; ?>


<?php
$footer_number_of_cols = (int)get_theme_mod('footer_number_of_cols', 5);
get_footer($footer_number_of_cols);
?>
</main>