<?php
/**
 * Controllers allow you to separate the logic of your templates from your markup.
 * This is especially useful for complex logic, but also in general to keep your templates clean.
 *
 * In this example, we split the tags from the tags field to create a nice tag list
 *
 * More about controllers:
 * https://getkirby.com/docs/guide/templates/controllers
 */
return function ($page) {
    return [
        'tags' => $page->tags()->split(','),
    ];
};
