<?php

/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  Block snippets control the HTML for individual blocks
  in the blocks field. This image snippet overwrites
  Kirby's default image block to add custom classes
  and data attributes.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/

$alt      = $block->alt();
$caption  = $block->caption();
$contain  = $block->crop()->isFalse();
$link     = $block->link();
$ratio    = $block->ratio()->or('auto');
$class    = $ratio != 'auto' ? 'img' : 'auto';
$src      = null;
$lightbox = $link->isEmpty();

if ($block->location() == 'web') {
    $src = $block->src();
} elseif ($image = $block->image()->toFile()) {
    $alt = $alt ?? $image->alt();
    $src = $image->url();
}

if ($ratio !== 'auto') {
  $ratio = Str::split($ratio, '/');
  $w = $ratio[0] ?? 1;
  $h = $ratio[1] ?? 1;
}

$attrs = attr([
  'class'         => $class,
  'data-contain'  => $contain,
  'data-lightbox' => $lightbox,
  'href'          => $link->or($src),
  'style'         => '--w:' . $w . '; --h:' . $h,
]);

?>
<?php if ($src): ?>
<figure>
  <a <?= $attrs ?>>
    <img src="<?= $src ?>" alt="<?= $alt ?>">
  </a>

  <?php if ($caption->isNotEmpty()): ?>
  <figcaption class="img-caption">
    <?= $caption ?>
  </figcaption>
  <?php endif ?>
</figure>
<?php endif ?>
