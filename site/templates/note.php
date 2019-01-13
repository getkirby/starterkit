<?php snippet('header') ?>

<main>
  <article class="note">
    <header class="note-header intro">
      <h1><?= $page->title() ?></h1>
      <time class="note-date"><?= $page->date()->toDate('d F Y') ?></time>
      <?php if ($page->tags()->isNotEmpty()) : ?>
      <p class="note-tags tags"><?= $page->tags() ?></p>
      <?php endif ?>
    </header>

    <div class="note-text text">
      <?= $page->text()->kt() ?>
    </div>
  </article>
</main>

<?php snippet('footer') ?>
