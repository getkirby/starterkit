<?php

return [
	'ready' => function($kirby) {
		if (!$kirby->user()) {
			$auth = $kirby->auth();
			$auth->login('test@getkirby.com', '12345678');
		}
	},
];
