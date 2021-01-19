
const conversation = document.querySelector('#conversation');
const player = new Plyr('#player', {
  hideControls: false,
  controls : ['play', 'progress', 'current-time']
});


var current = document.querySelector('ol a');

player.on('ended', event => {
  playNext();
});

function playNext(){
  var li = current.closest("li").nextElementSibling;
  console.log(li);
  if(li){
    playThis(li.querySelector('a'));
  }
}

function playThis(trgt){
  current.closest("li").classList.remove('playing');
  current = trgt;
  current.closest("li").classList.add('playing');

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
    player.play()
  });
}


conversation.addEventListener('click', function(e){
  
  if(e.target.matches('.audiolink')){
    e.preventDefault();
    playThis(e.target)
  }
})

const shuffle = document.querySelector('#shuffle');
shuffle.addEventListener('click', function(){
  for (i = conversation.children.length; i >= 0; i--) {
    conversation.appendChild(conversation.children[Math.random() * i | 0]);
  }
})
