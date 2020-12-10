<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  The prevnext snippet renders the nice "keep on reading"
  section below each article in the blog, to jump between
  articles. It reuses the note snippet to render a full
  excerpt of the article.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<nav class="blog-prevnext">
  <h2 class="h2">Keep on reading</h2>

  <div class="autogrid" style="--gutter: 1.5rem">
    <?php if ($prev = $page->prevListed()): ?>
    <?php snippet('note', ['note' => $prev, 'excerpt' => false])  ?>
    <?php endif ?>

    <?php if ($next = $page->nextListed()): ?>
    <?php snippet('note', ['note' => $next, 'excerpt' => false])  ?>
    <?php endif ?>
  </div>
</nav>
