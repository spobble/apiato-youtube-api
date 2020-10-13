<?php

$router->get('/youtube', [
  'as' => 'yt.index',
  'uses'  => 'Controller@index',
]);

$router->any('/youtube/callback', [
    'as' => 'yt.index',
    'uses'  => 'Controller@callback',
]);
