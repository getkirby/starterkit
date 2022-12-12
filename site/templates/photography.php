<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This template lists all all the subpages of the `phototography`
  page with title and cover image.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>
<?php snippet('intro') ?>

<ul class="grid" style="--gutter: 1.5rem">
  <?php foreach ($page->children()->listed() as $project): ?>
  <li class="column" style="--columns: 3">
    <a href="<?= $project->url() ?>">
      <figure>
        <span class="img" style="--w:4;--h:5">
          <?php if ($cover = $project->cover()): ?>
            <img src="<?= $cover->crop(400, 500)->url() ?>" alt="<?= $cover->alt()->esc() ?>">
          <?php endif ?>
        </span>
        <figcaption class="img-caption">
          <?= $project->title()->esc() ?>
        </figcaption>
      </figure>
    </a>
  </li>
  <?php endforeach ?>
</ul>

<?php snippet('footer') ?>
