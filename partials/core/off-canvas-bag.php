<section class="fixed overflow-y-auto h-full w-full xx:w-5/6 md:w-5/12 lg:w-1/4 bg-white z-20 duration-700 ease-in-out" :class="bagOpen ? 'right-0' : '-right-full'">
    <div class="relative h-full w-full ">
        <button @click="bagOpen = !bagOpen" class="absolute right-5 top-5 text-black">X</button>
    
        <?php herman_woocommerce_header_cart(); ?>


    </div>
</section>

<!-- Overlay -->
<section @click="bagOpen = !bagOpen" :class="bagOpen ? 'bg-black/50 block' : 'hidden'" class="fixed z-[19] h-full w-full">

    
</section>