<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This about page example uses the content from our layout field
  to create most parts of the page and keeps it modular. Only the
  contact box at the bottom is pre-defined with a set of fields
  in the about.yml blueprint.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>
<?php snippet('intro') ?>
<?php snippet('layouts', ['field' => $page->layout()])  ?>

<aside class="contact">
  <h2 class="h1">Get in contact</h2>
  <div class="grid" style="--gutter: 1.5rem">
    <section class="column text" style="--columns: 4">
      <h3>Address</h2>
      <?= $page->address()->kt() ?>
    </section>
    <section class="column text" style="--columns: 4">
      <h3>Email</h2>
      <p><?= html::email($page->email()) ?></p>
      <h3>Phone</h2>
      <p><?= html::tel($page->phone()) ?></p>
    </section>
    <section class="column text" style="--columns: 4">
      <h3>On the web</h2>
      <ul>
        <?php foreach ($page->social()->toStructure() as $social): ?>
        <li><?= html::a($social->url(), $social->platform()) ?></li>
        <?php endforeach ?>
      </ul>
    </section>
  </div>
</aside>

</div>

<?php snippet('footer') ?>
