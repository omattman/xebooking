/**
 *
 * Parameters for flickity sliders. For documentation and any changes go to:
 * http://flickity.metafizzy.co/options.html
**/

<script type="text/javascript">
$(document).ready(function(){
    $(".slider").flickity({
        cellSelector: '.carousell-cell',
        contain: true,
        pageDots: false,
        cellAlign: 'left',
        imagesLoaded: true,
        autoPlay: 5000,
        pauseAutoPlayOnHover: true
    });
});
</script>
