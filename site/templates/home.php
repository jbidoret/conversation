<?php snippet('header') ?>
<?php $conversation = $site->children()->listed()->flip(); ?>
  <style>
    ol { counter-reset: list <?= $conversation->count() + 1; ?>}
  </style>
  <button id="shuffle">shuffle</button>
  <ol id="conversation" reversed>
  <?php $last = $site->children()->listed()->last(); ?>
  <?php foreach($conversation as $i) :?>
    <li>
    <a class="<?php e($i == $last, 'playing') ?>" href="<?= $i->url() ?>" data-audio="<?= $i->audio() ?>" data-youtube="<?= $i->youtube() ?>" >
    <?= $i->title() ?><?php e($i->artist()->isNotEmpty(), ' – ' . $i->artist() ) ?>
    </a>
    </li>
  <?php endforeach ?>
  </ol>
  <?php
    if($last->youtube()->isNotEmpty()):
  ?>
  <div class="plyr__video-embed" id="player">
    <iframe src="<?= $last->youtube() ?>?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"></iframe>
  </div>
  <?php endif ?>
<?php snippet('footer') ?>
