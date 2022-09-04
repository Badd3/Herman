<?php

$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => 3,
  'facetwp' => true
);
$the_query = new WP_Query($args);

?>
<section class="py-16 lg:py-28 px-2.5 lg:px-8">

  <?php


  // The Loop
  if ($the_query->have_posts()) :
    $i = 0;
    while ($the_query->have_posts()) : $the_query->the_post();


      // echo $i;
      if ($i === 0) {
        echo '<div class="grid grid-cols-12 grid-rows-12 h-[calc(100vh-112px)] lg:h-[calc(100vh-224px)] gap-4 lg:gap-8 2xl:gap-x-16">';
        $classes = 'col-start-1 col-end-7 lg:col-start-1 lg:col-end-5 row-start-1 row-end-6 lg:row-start-1 lg:row-end-[9]';
      } elseif ($i === 1) {
        $classes = 'col-start-1 col-end-10 lg:col-start-5 lg:col-end-9 lg:col-start-5 lg:col-end-9 row-start-[7] row-end-[13] lg:row-start-[7] lg:row-end-[13]';
      } elseif ($i === 2) {
        $classes = 'col-start-7 col-end-13 lg:col-start-9 col-end-13 row-start-[1] row-end-[7] lg:row-start-[1] lg:row-end-[10]';
      }
  ?>

      <a class="<?php echo $classes; ?> flex flex-col" href="<?php the_permalink(); ?> ">
        <div class="flex mb-2.5 overflow-hidden h-full">
          <img class="object-cover w-full" src="<?php the_post_thumbnail_url(); ?>">
        </div>
        <span class="uppercase font-bold"><?php the_title(); ?></span>
      </a>

    <?php
      if ($i === 2) {
        echo ' </div>';
      }
      $i++;
    endwhile;

    ?>


    <div class="flex justify-center [&_button]:uppercase [&_button]:font-bold [&_button]:mt-10">
      <?php echo do_shortcode('[facetwp facet="load_more"]'); ?>
    </div>
  <?php
  endif;
  ?>
</section>