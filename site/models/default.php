<?php
class DefaultPage extends Page {
    
    // Has audio
    public function hasSound() {
      return $this->youtube()->isNotEmpty() || $this->audio()->isNotEmpty();
    }


}