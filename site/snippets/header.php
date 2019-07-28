<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * This header snippet is reused in all templates. 
 * It fetches information from the `site.txt` content file and contains the menu.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title() ?> | <?= $page->title() ?></title>

  <?= css(['assets/css/index.css', '@auto']) ?>

</head>
<body>

  <div class="page">
    <header class="header">
      <a class="logo" href="<?= $site->url() ?>"><?= $site->title() ?></a>

      <nav id="menu" class="menu">
        <?php 
        // In the menu, we only fetch listed pages, i.e. the pages that have a prepended number in their foldername
        // We do not want to display links to unlisted `error`, `home`, or `sandbox` pages
        // More about page status: https://getkirby.com/docs/reference/panel/blueprints/page#statuses
        foreach ($site->children()->listed() as $item): ?>
        <?= $item->title()->link() ?>
        <?php endforeach ?>
      </nav>
    </header>

