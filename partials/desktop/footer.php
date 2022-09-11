<?php
if (is_front_page()) {
    $color = 'text-white';
} else {
    $color = 'text-black';
}

?>

<section class="fixed bottom-0 z-10 w-[calc(100vw-208px)] ml-auto right-0 hidden lg:block">
    <div class="absolute right-10 bottom-[40px]">
        <span class="uppercase text-base <?php echo $color; ?>">© Herman 2022</span>
    </div>
</section>