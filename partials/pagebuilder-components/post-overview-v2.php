<?php

$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => 6,
  'facetwp' => true
);
$the_query = new WP_Query($args);

?>
<section class="pb-16 lg:py-28 px-2.5 lg:px-7.5">

  <?php


  // The Loop
  if ($the_query->have_posts()) :
    $i = 0;
    while ($the_query->have_posts()) : $the_query->the_post();


      // echo $i;
      if ($i === 0 || $i === 3) {
        echo '<div class="flex flex-row flex-wrap gap-2.5 sm:gap-3 md:min-h-[60vh] 2xl:min-h-[90vh] justify-between">';
        $classes = 'flex-[48%] sm:flex-[30%] lg:flex-[48%] xl:flex-[30%]';
      } elseif ($i === 1 || $i === 4) {
        $classes = 'flex-[48%] sm:flex-[25%] lg:flex-[48%] xl:flex-[25%] sm:mt-auto xl:-mb-20 [&>div]:flex-col sm:[&>div]:w-[85%] sm:[&>div]:mx-auto';
      } elseif ($i === 2 || $i === 5) {
        $classes = 'flex-[100%] grow-0 sm:flex-[30%] lg:[&_.itw]:ml-auto';
      }
  ?>

      <a class="<?php echo $classes; ?> flex flex-col duration-300 hover:-translate-y-1 h-max !grow-0" href="<?php the_permalink(); ?> ">
        <div class="block mb-2.5">
          <div class="itw">
            <div class="overflow-hidden">
              <img class="h-auto duration-300" src="<?php the_post_thumbnail_url(); ?>">
            </div>
            <span class="uppercase "><?php the_title(); ?></span>
          </div>
        </div>

      </a>

    <?php
      if ($i === 2) {
        echo ' </div>';
      }
      $i++;
    endwhile;

    ?>


    <div class="flex justify-center [&_button]:uppercase  [&_button]:mt-10">
      <?php echo do_shortcode('[facetwp facet="load_more"]'); ?>
    </div>
  <?php
  endif;
  ?>
</section>