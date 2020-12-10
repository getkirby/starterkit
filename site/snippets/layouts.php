<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This layouts snippet renders the content of a layout
  field with our custom grid system.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<?php foreach ($field->toLayouts() as $layout): ?>
<section class="grid margin-xl" id="<?= $layout->id() ?>" style="--gutter: 1.5rem">
  <?php foreach ($layout->columns() as $column): ?>
  <div class="column" style="--columns:<?= $column->span() ?>">
    <div class="text">
      <?= $column->blocks() ?>
    </div>
  </div>
  <?php endforeach ?>
</section>
<?php endforeach ?>
