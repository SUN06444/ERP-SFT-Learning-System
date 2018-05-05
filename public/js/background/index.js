// https://developers.google.com/youtube/iframe_api_reference#Loading_a_Video_Player

var tag = document.createElement('script');
tag.src = "https://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
function onYouTubePlayerAPIReady() {
  player = new YT.Player('player', {
    height: 720,
    width: 1280,
    videoId: 'BaR3xOdj5mw',
    playerVars: {
      'rel': 0,
      'controls': 0,
      'autoplay': 1,
      'showinfo': 0,
      'loop': 1 
    },
    events: {
      'onReady': onPlayerReady}
  });
}

function onPlayerReady(event) {
  event.target.mute();
}