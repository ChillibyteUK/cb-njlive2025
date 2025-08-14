// Vanilla JS Vimeo background video
(function() {
  var vimeoId = window.cbHomeHeroVimeoId;
  if (!vimeoId) return;
  var wrapper = document.querySelector('.video_hero__media-wrapper');
  if (!wrapper) return;

  var iframe = document.createElement('iframe');
  iframe.src = 'https://player.vimeo.com/video/' + encodeURIComponent(vimeoId) + '?background=1&autoplay=1&loop=1&muted=1&byline=0&title=0';
  iframe.setAttribute('frameborder', '0');
  iframe.setAttribute('allow', 'autoplay; fullscreen');
  iframe.setAttribute('webkitallowfullscreen', '');
  iframe.setAttribute('mozallowfullscreen', '');
  iframe.setAttribute('allowfullscreen', '');
  iframe.style.position = 'absolute';
  iframe.style.top = '50%';
  iframe.style.left = '50%';
  iframe.style.width = '100%';
  iframe.style.height = '100%';
  iframe.style.minWidth = '100%';
  iframe.style.minHeight = '100%';
  iframe.style.transform = 'translate(-50%, -50%)';
  iframe.style.zIndex = '1';
  iframe.style.background = 'transparent';
  iframe.style.margin = '0';
  iframe.style.padding = '0';
  iframe.style.pointerEvents = 'none';
  wrapper.style.overflow = 'hidden';
  wrapper.appendChild(iframe);
})();
