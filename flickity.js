$(document).ready(function(){
    var flkty = new Flickity('.carousel');

    var progressBar = document.querySelector('.progress-bar')

    flkty.on( 'scroll', function( progress ) {
      progress = Math.max( 0, Math.min( 1, progress ) );
      progressBar.style.width = progress * 100 + '%';
    });
});


<script type="text/javascript">
    $(document).ready(function(){
        $("#main-gallery").flickity({
          contain: true,
          resize: false,
          pageDots: false,
          initialIndex: 3,
          wrapAround: true,
          imagesLoaded: true,
          accessibility: true, //true by default
          autoPlay: true // advance cells every 3 seconds
        });
    });
</script>
