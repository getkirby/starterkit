<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  Block snippets control the HTML for individual blocks
  in the blocks field. This video snippet overwrites
  Kirby's default video block to add custom classes
  and style attributes.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<?php if ($block->url()->isNotEmpty()): ?>
<figure>
  <span class="video" style="--w:16;--h:9">
    <?= video($block->url()) ?>
  </span>
  <?php if ($block->caption()->isNotEmpty()): ?>
  <figcaption class="video-caption"><?= $block->caption() ?></figcaption>
  <?php endif ?>
</figure>
<?php endif ?>
