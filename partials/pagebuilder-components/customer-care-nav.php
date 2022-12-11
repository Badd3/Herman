<?php
$customer_care_id = get_page_by_title('Customer Care')->ID;
$post_parent_id = wp_get_post_parent_id();

$child_args = array(
  'post_parent' => $post_parent_id, // The parent id.
  'post_type'   => 'page',
  'post_status' => 'publish',
  'orderby' => 'title',
  'order'   => 'ASC',
);

$children = get_children($child_args);

// var_dump($children);



?>
<section>
  <div class="flex justify-center">
    <div class="basis-full sm:basis-2/5 text-base px-2.5 lg:max-w-5xl mx-auto ">
      <ul class="flex-col flex">
        <h2 class="mb-3">MORE CUSTOMER CARE</h2>
        <?php
        foreach ($children as $key => $child) {
        ?>
          <li><a class="underline" href="<?php echo the_permalink($child->ID); ?>"><?php echo $child->post_title; ?></a></li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
</section>