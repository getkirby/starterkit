<?php
/**
 * Controllers allow you to separate the logic of your templates from your markup.
 * This is especially useful for complex logic, but also in general to keep your templates clean.
 *
 * In this example, we handle tag filtering and paginating notes in the controller,
 * before we pass the currently active tag and the notes to the template.
 *
 * More about controllers:
 * https://getkirby.com/docs/guide/templates/controllers
 */
return function ($page) {

    $tag   = urldecode(param('tag') ?? '');
    /**
     * We use the collection helper to fetch the notes collection defined in `/site/collections/notes.php`
     * 
     * More about collections:
     * https://getkirby.com/docs/guide/templates/collections
     */
    $notes = collection('notes');

    if (empty($tag) === false) {
        $notes = $notes->filterBy('tags', $tag, ',');
    }

    return [
        'tag'   => $tag,
        'notes' => $notes->paginate(6)
    ];

};
