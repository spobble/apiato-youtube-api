<?php

$router->get('/ytapi', [
  'as' => 'yt.index',
  'uses'  => 'Controller@index',
]);

?>
