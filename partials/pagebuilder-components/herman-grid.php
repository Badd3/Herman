<section class=" text-gray-900 text-base">
    <?php 
    $images = get_sub_field('gallery_images');
    $size = 'large'; // (thumbnail, medium, large, full or custom size)
    if( $images ): ?>
        <div class="grid grid-cols-4 lg:grid-cols-8 gap-0">
            <?php foreach( $images as $image_id ): ?>
                <div class="aspect-w-3 aspect-h-4">
                    <a href="<?php echo wp_get_attachment_url($image_id); ?>" class="chocolat-image zoom-cursor">
                        <?php echo wp_get_attachment_image($image_id, $size, false, [ 'class' => 'object-cover object-center w-full h-full' ]); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>