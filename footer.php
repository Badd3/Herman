</main>

<?php do_action('tailpress_content_end'); ?>

</div>

<?php do_action('tailpress_content_after'); ?>



</div>

<script>

var message = "Hé! Keer een ☕ drinken?";
  var original = document.title;
  
  window.onblur = function () { document.title = message; }
  window.onfocus = function () { document.title = original; }
  
</script>

<?php wp_footer(); ?>

</body>

</html>