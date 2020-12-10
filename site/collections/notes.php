<?php

return function () {
    return page('notes')
        ->children()
        ->listed()
        ->sortBy('date', 'desc');
};
