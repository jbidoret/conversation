<?php snippet('header') ?>
<?php $conversation = $site->children()->listed()->flip(); ?>
  <style>
    ol { counter-reset: list <?= $conversation->count() + 1; ?>}
  </style>
  <a href="<?= $site->url() ?>" class="home button">conversation</a>
  <button id="shuffle" class="button">shuffle</button>
  <ol id="conversation" reversed>
  <?php $last = $site->children()->listed()->last(); ?>
  <?php foreach($conversation as $i) :?>
    <li class="<?php e($i == $last, 'playing') ?>">
    <?php if($i->hasImages()) : ?>
      <div class="images">
        <?php foreach($i->images() as $im) :?>
          <figure>
            <img src="<?= $im->resize(1200)->url() ?>" alt="<?= $im->alt() ?>">
            <?php e($im->caption()->isNotEmpty(), '<figcaption>'.$im->caption()->kti() . '</figcaption>') ?>
          </figure>
        <?php endforeach ?>
        </div>
      <?php endif ?>
        
      <nav>
        <a href="<?= $i->url() ?>" data-audio="<?= $i->audio() ?>" data-youtube="<?= $i->youtube() ?>" class="audiolink">
          <?= $i->title() ?><?php e($i->artist()->isNotEmpty(), ' — ' . $i->artist() ) ?>
        </a>
        <?php if($last->youtube()->isNotEmpty()): ?>
          <span><a href="<?= $last->youtube() ?>" class="yt" target="_blank">YT</a></span>
        <?php endif ?>
      </nav>
      
      <?php if($i->text()->isNotEmpty()) : ?>
      <div class="text">
        <?= $i->text()->kt() ?>  
      </div>
      <?php endif ?>
      
    </li>
  <?php endforeach ?>
  </ol>
  <?php if($last->youtube()->isNotEmpty()): ?>
  <div class="plyr__video-embed" id="player">
    <iframe src="<?= $last->youtube() ?>?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"></iframe>
  </div>
  <?php endif ?>
<?php snippet('footer') ?>
