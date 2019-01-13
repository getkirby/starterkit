<?php snippet('header') ?>

<main>
  <header class="intro">
    <h1><?= $page->title() ?></h1>
  </header>

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
