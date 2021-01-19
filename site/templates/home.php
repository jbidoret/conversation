<?php snippet('header') ?>
  
  <header>
    <a href="<?= $site->url() ?>" class="home button">cromagnons:conversation</a>
    <button id="shuffle" class="button">shuffle</button>
  </header>
  
  <ol id="conversation" reversed>
    <?php foreach($conversation as $i) :?>
      <?php snippet('i', ['i'=> $i]) ?>
    <?php endforeach ?>
  </ol>
  
  <?php $last = $site->children()->listed()->last(); ?>
  <?php if($last->youtube()->isNotEmpty()): ?>
  <div class="plyr__video-embed" id="player">
    <iframe src="<?= $last->youtube() ?>?origin=<?= $site->url()?>&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"></iframe>
  </div>
  <?php endif ?>
<?php snippet('footer') ?>
