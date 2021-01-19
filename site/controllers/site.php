<?php

return function ($site, $page, $kirby) {
  
  $conversation = $site->children()->listed()->flip();
  
  return [
    'conversation' => $conversation
  ];
};