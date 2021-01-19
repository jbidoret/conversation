<li class="<?php e($i->isFirst($conversation), 'open') ?> <?php e($i->hasSound(), 'has_sound', 'no_sound') ?> <?=$i->publisher() ?> depth-<?=$i->depth() ?>">

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
  
  <?php if($i->hasSound()): ?>
  <nav>
    <a href="<?= $i->url() ?>" data-audio="<?= $i->audio() ?>" data-youtube="<?= $i->youtube() ?>" class="audiolink">
      <?= $i->title() ?><?php e($i->artist()->isNotEmpty(), ' — ' . $i->artist() ) ?>
    </a>
    <?php if($i->youtube()->isNotEmpty()): ?>
      <span><a href="<?= $i->youtube() ?>" class="yt" target="_blank">YT</a></span>
    <?php endif ?>
  </nav>
  <?php elseif (!$i->text()->isNotEmpty()):?>
    <nav class="imagelink">
      <?= $i->title() ?>
    </nav>
  <?php endif ?>

  <?php if($i->text()->isNotEmpty()) : ?>
  <div class="text <?php e(!$i->hasSound(), 'textlink') ?>">
    <?= $i->text()->kt()->widont() ?>  
  </div>
  <?php endif ?>  

  </li>
  <?php if($i->hasListedChildren()): ?>
    
      <?php foreach($i->children()->listed() as $ii) :?>
        <?php snippet('i', ['i'=> $ii]) ?>
      <?php endforeach ?>
    
  <?php endif ?>
