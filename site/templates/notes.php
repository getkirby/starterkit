<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This template lists all the subpages of the `notes` page with
  their title date sorted by date and links to each subpage.

  This template receives additional variables like $tag and $notes
  from the `notes.php` controller in `/site/controllers/notes.php`

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>

<?php if (empty($tag) === false): ?>
<header class="h1">
  <h1>
    <small>Tag:</small> <?= html($tag) ?>
    <a href="<?= $page->url() ?>">&times;</a>
  </h1>
</header>
<?php else: ?>
  <?php snippet('intro') ?>
<?php endif ?>

<ul class="grid">
  <?php foreach ($notes as $note): ?>
  <li class="column" style="--columns: 4">
      <?php snippet('note', ['note' => $note]) ?>
  </li>
  <?php endforeach ?>
</ul>

<?php snippet('pagination', ['pagination' => $notes->pagination()]) ?>
<?php snippet('footer') ?>
