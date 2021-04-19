<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  The pagination snippet renders prev/next links in the
  blog, when articles spread across multiple pages

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<?php if ($pagination->hasPages()): ?>
<nav class="pagination">
  <?php if ($pagination->hasPrevPage()): ?>
  <a class="pagination-prev" href="<?= $pagination->prevPageUrl() ?>">&larr;</a>
  <?php else: ?>
  <span class="pagination-prev">&larr;</span>
  <?php endif ?>
  <?php if ($pagination->hasNextPage()): ?>
  <a class="pagination-next" href="<?= $pagination->nextPageUrl() ?>">&rarr;</a>
  <?php else: ?>
  <span class="pagination-next">&rarr;</span>
  <?php endif ?>
</nav>
<?php endif ?>
