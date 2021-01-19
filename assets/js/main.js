
const conversation = document.querySelector('#conversation');
const player = new Plyr('#player', {
  hideControls: false,
  controls : ['play', 'progress', 'current-time']
});


var current = document.querySelector('ol li');

player.on('ended', event => {
  playNext();
});

function playNext(){
  var sibling = current.nextElementSibling;
	while (sibling) {
		if (sibling.matches('.has_sound')) {
      playThis(sibling.querySelector('a'));
      return false;
    }
		sibling = sibling.nextElementSibling
  }
}

function showThis(trgt){
  current.classList.remove('playing','open');
  current = trgt.closest('li');
  current.classList.add('playing','open');
}


function playThis(trgt){
  current.classList.remove('playing','open');
  current = trgt.closest('li');
  current.classList.add('playing','open');

  // mp3
  var mp3 = trgt.dataset.audio;
  if(mp3){
    player.source = {
      type: 'audio',
      title: trgt.textcontent,
      sources: [
        {
          src: mp3,
          type: 'audio/mp3',
        },
      ],
    };
  }
  //  yt
  var youtube = trgt.dataset.youtube;
  if(youtube){
    console.log(youtube);
    var id = youtube.match(/v=([^&]+)/)[1]
    player.source = {
      type: 'video',
      sources: [
        {
          src: id,
          provider: 'youtube',
        },
      ],
    };
  }

  player.on('ready', event => {
    player.play();
  });
}


conversation.addEventListener('click', function(e){  
  if(e.target.matches('.audiolink')){
    e.preventDefault();
    playThis(e.target);
  } else {

    if(e.target.matches('img') ){
      e.preventDefault();
      console.log('tada');
      e.target.closest('.images').classList.toggle('view');
    }else if(e.target.matches('p') ||e.target.matches('.imagelink') ){
      e.preventDefault();
      showThis(e.target);
    }
  }
});

const shuffle = document.querySelector('#shuffle');
shuffle.addEventListener('click', function(){
  for (i = conversation.children.length; i >= 0; i--) {
    conversation.appendChild(conversation.children[Math.random() * i | 0]);
  }
});
