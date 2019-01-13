<?php

return function ($page) {

    $gallery = $page->images()->sortBy("sort");

    return [
        'gallery' => $gallery
    ];

};
