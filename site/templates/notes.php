<?php
/**
 * Templates render the content of your pages. 
 * They contain the markup together with some control structures like loops or if-statements.
 * This template lists all all the subpages of the `notes` page with their title date sorted by date and links to each subpage.
 * Snippets like the header, footer and intro contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

<?php snippet('header') ?>

<main>
  <?php snippet('intro') ?>


  <div class="notes">
    <?php foreach ($page->children()->listed()->sortBy('date', 'desc') as $note): ?>
    <article class="note">
      <header class="note-header">
        <a href="<?= $note->url() ?>">
          <h2><?= $note->title() ?></h2>
          <time><?= $note->date()->toDate('d F Y') ?></time>
        </a>
      </header>
    </article>
    <?php endforeach ?>
  </div>

</main>

<?php snippet('footer') ?>
