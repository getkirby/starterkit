<?php snippet('header') ?>

<main class="album">
  <article>

    <header>
      <?php if ($cover = $page->cover()): ?>
      <figure class="album-cover">
        <?= $cover->crop(1024, 768) ?>
        <figcaption>
          <h1><?= $page->headline()->or($page->title()) ?></h1>
        </figcaption>
      </figure>
      <?php endif ?>
    </header>

    <div class="album-text text">
      <?= $page->description()->kt() ?>

      <?php if ($page->tags()->isNotEmpty()): ?>
      <p class="album-tags tags"><?= $page->tags() ?></p>
      <?php endif ?>
    </div>

    <ul class="album-gallery"<?= attr(['data-even' => $gallery->isEven(), 'data-count' => $gallery->count()], ' ') ?>>
      <?php foreach ($gallery as $image): ?>
      <li>
        <figure>
          <a href="<?= $image->link()->or($image->url()) ?>">
            <?= $image->crop(800, 1000) ?>
          </a>
        </figure>
      </li>
      <?php endforeach ?>
    </ul>
  </article>
</main>

<?php snippet('footer') ?>
