<?php
/*
 * Template Name: OnePage Home
 */

get_header();

wp_enqueue_style('style3', get_template_directory_uri() . '/css/gallery.css', [], '1.4');

?>

<?php
$menu_items = wp_get_nav_menu_items('main-nav');
if( $menu_items ) {
foreach ($menu_items as $menu_item ) {
$args = array('p' => $menu_item->object_id,'post_type' => 'any');

global $wp_query;
$wp_query = new WP_Query($args);
$templatePart = ($menu_item->title == 'Réalisations') ? 'realisations' : $menu_item->object;
?>

<section <?php post_class('sep'); ?> id="<?php echo sanitize_title($menu_item->title); ?> ">
<?php
if ( have_posts() ){
   include(locate_template('home-'.$templatePart.'.php'));
} ?>
</section>
<?php }}; ?>

<?php if (have_posts()) : ?>
    <div class="clearfix"></div>

    <div id="sidebar-center-bottom" class="row clearfix">
        <section id="blog_section" style="padding: 1% 5%;">
          <div class="container-fluid">
            <div class="row">
          <div class="col-lg-12">
            <div class="row">


      <?php
      function orderById(){
            return "ORDER BY ID DESC";

      }

        $categories = get_terms(
              array(
                  'category'
              ),
              array(
                  'hide_empty' => false,
                  'orderby'           => 'ID',
                  'order'             => 'DESC',
              )
          );
          apply_filters( 'get_terms_orderby',"orderById");
        //var_dump($categories);
        foreach( $categories AS $cat )
        {
          //var_dump($cat);
          $args = array(
            	'orderby' => 'ID',
            	'order'   => 'ASC',
            );
          if($cat->parent == 3){
          $taxonomy = new WP_Query( array( 'posts_per_page' => 1, 'tax_query' =>
           array( array('taxonomy' => 'category','field' => 'slug', 'terms' => $cat->slug ) )) );


            while ($taxonomy->have_posts() )
            {
                $taxonomy->the_post();

                $author_id = $cat->term_id; // do stuff to get user ID

                $author_posts = get_posts( array(
                    'category' => $author_id
                ) );

                $counter = 0; // needed to collect the total sum of views

                //echo '<h3>Post views by Author:</h3><ul>'; // do stuff to get author name

                foreach ( $author_posts as $post )
                {

                    $views = absint( get_post_meta( $post->ID, 'views', true ) );
                    $counter += $views;
                    //echo "<li>{$post->post_title} ({$views})</li>";
                }


                $k = 1000;
                if ($counter >= $k) {
                  $counter = round($counter/$k,1).' K';
                } else {
                  $counter = $counter;
                }


                ;
                //echo "</ul><hr /><p>Total Number of views: <strong>". count($author_posts)."</strong></p>";



?>

            <div class="col-lg-3 col-md-4 col-ms-12 ">
              <aside class="aside rounded  case  toto">
                <div class="product-image blog-box-image">
                    <a href="<?php bloginfo( 'wpurl' ); ?>/category/chroniques/<?= $cat->slug ?>">
                        <?php if(has_post_thumbnail()){
                              the_post_thumbnail("medium", array('class'=>'taille'));
                        }else{
                          echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/default.jpg" class="taille"/>';
                          } ?>
                    </a>
                </div>
                    <div class="content-title ">
                        <div style="padding-left:1em">
                        <h4><a href="<?php bloginfo( 'wpurl' ); ?>/category/chroniques/<?= $cat->slug ?>">
                          <?=$cat->name?></a></h4>
                        </div>
                    </div>
                 <div class="content-footer">
                    <span class="pull-right" style="padding-right:1em;">
                      <i class='fa fa-eye'></i> <?=$counter?>  </span>
                 </div>
                 <a href="<?php bloginfo( 'wpurl' ); ?>/category/chroniques/<?= $cat->slug ?>">
                   <div class="overlay"><div class="text"><h4>En savoir +</h4></div></div>
                </a>
               </aside>
            </div>

            <?php
            }
        }}?>

      </div>
    </div>
  </div>

</div>
</section>
    <?php
else :
    // If no content, include the "No posts found" template.
    get_template_part('content', 'none');
endif;
?>

<div class="clearfix"></div>
<?php
$footer_number_of_cols = (int)get_theme_mod('footer_number_of_cols', 5);
get_footer($footer_number_of_cols);
