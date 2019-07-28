<?php
/**
 * Templates render the content of your pages. 
 * They contain the markup together with some control structures like loops or if-statements.
 * This template lists all all the subpages of the `phototography` page with title and cover image.
 * Snippets like the header, footer and intro contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

<?php snippet('header') ?>

<main>
  <?php snippet('intro') ?>


  <ul class="albums"<?= attr(['data-even' => $page->children()->listed()->isEven()], ' ') ?>>
    <?php foreach ($page->children()->listed() as $album): ?>
    <li>
      <a href="<?= $album->url() ?>">
        <figure>
          <?php if ($cover = $album->cover()): ?>
          <?= $cover->crop(800, 1000) ?>
          <?php endif ?>
          <figcaption><?= $album->title() ?></figcaption>
        </figure>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
</main>

<?php snippet('footer') ?>
