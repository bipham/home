/**
 * Created by nobikun1412 on 24-Mar-17.
 */
var isHover = false;
var slideIndex = 0;
var sliderDetail;
var sliderDetailTotal;
var oldIndexOverview;
var slider = jQuery('.bxslider.slider-overview').bxSlider({
    pagerCustom: '#bx-pager',
    startSlide: slideIndex,
    slideMargin: 50,
    pagerType: 'full',
    controls: false,
    onSlideAfter: function($slideElement, oldIndex, newIndex) {
        var liSelected = 'li-img-' + newIndex;
        var $this = jQuery('li.' + liSelected)
        chooseThumbnailImage($this, oldIndex);
    },
    speed: 500
});

// slider.goToSlide(slideIndex);
// jQuery('ul li').each(function(i) {
//     jQuery(this).attr('rel');
// });

jQuery('.row.first-row').hover(function(event) {
    if (isHover == false) {
        isHover = true;
    } else if (isHover == true) {
        jQuery(this).addClass('hovered');
        return;
    }
});

jQuery('.frame-slider-cover').click(function() {
    jQuery(this).parent().addClass('hovered');
    jQuery(this).hide();
});

jQuery(function() {
    jQuery("#draggable").draggable({
        axis: 'x',
        scroll: false,
        containment: '#bx-pager',
        drag: function() {
            posX = jQuery(this).position().left;
            posY = jQuery(this).position().top;
            updatePosition(posX, posY);
        }
    });
});

function updatePosition(posX, posY) {
    var tmp = document.elementFromPoint(posY, posX);
}
jQuery(".img-drop-active").droppable({
    accept: '#draggable',
    axis: 'x',
    containment: '#bx-pager',
    over: function(event, ui) {
        slideIndex = jQuery(this).parent().attr('data-slide-index');
        jQuery(this).addClass('img-visiting');
        slider.reloadSlider({
            pagerCustom: '#bx-pager',
            startSlide: slideIndex,
            slideMargin: 50,
            controls: false,
            pagerType: 'full',
            onSlideAfter: function($slideElement, oldIndex, newIndex) {
                var liSelected = 'li-img-' + newIndex;
                var $this = jQuery('li.' + liSelected)
                chooseThumbnailImage($this, oldIndex);
            },
            speed: 500
        });
 // slider.goToNextSlide();
    },
    out: function(event, ui) {
        jQuery(this).removeClass('img-visiting');
    },
    drop: function() {

    }
});
jQuery('ul.thumbnail-list-img li').click(function() {
    var oldIndex = slider.getCurrentSlide();
    chooseThumbnailImage(jQuery(this), oldIndex);
});

function chooseThumbnailImage($this, oldIndex) {
    var classTmp = 'img-thumbnail-' + oldIndex;
    var currentIndex = slider.getCurrentSlide();
    $this.find('.img-drop-active').addClass('img-visiting');
    jQuery('img.' + classTmp).parents('.img-drop-active').removeClass('img-visiting');
    var posX = $this.position().left;
    var posY = jQuery('#draggable').position().top;
    if (currentIndex != 0) {
        posX = posX - 12;
    } else posX = posX - 12;
    jQuery('#draggable').animate({
        'top': posY + 'px',
        'left': posX + 'px'
    }, 100, function() {

    });
}


jQuery('ul.bxslider.slider-overview li .btn-zoom').click(function() {
    var slideOffset = jQuery(this).data('slide-offset');
    oldIndexOverview = slider.getCurrentSlide();
    slider.destroySlider();
    sliderDetail = jQuery('.bxslider.slider-detail').bxSlider({
        startSlide: slideOffset,
        slideMargin: 50,
        controls: false,
        speed: 500,
        pagerType: 'short',
        onSlideAfter: function($slideElement, oldIndex, newIndex) {
            sliderDetailTotal = sliderDetail.getSlideCount();
            updateIndexSlider(newIndex, sliderDetailTotal);
        },
    });
    jQuery('.row.first-row').hide();
    jQuery('.row.second-row').show();
    sliderDetailTotal = sliderDetail.getSlideCount();
    updateIndexSlider(slideOffset, sliderDetailTotal);
    sliderDetail.reloadSlider();
});

jQuery('ul.bxslider.slider-detail li .btn-exit').click(function() {
    slideIndex = jQuery(this).data('slide-index');
    sliderDetail.destroySlider();
    jQuery('.row.first-row').show();
    jQuery('.row.second-row').hide();
    slider = jQuery('.bxslider.slider-overview').bxSlider({
        pagerCustom: '#bx-pager',
        startSlide: slideIndex,
        slideMargin: 50,
        controls: false,
        pagerType: 'full',
        onSlideAfter: function($slideElement, oldIndex, newIndex) {
            var liSelected = 'li-img-' + newIndex;
            var $this = jQuery('li.' + liSelected)
            chooseThumbnailImage($this, oldIndex);
        },
        speed: 500
    });
    var liSelected = 'li-img-' + slideIndex;
    var $this = jQuery('li.' + liSelected)
    chooseThumbnailImage($this, oldIndexOverview);
});

function updateIndexSlider(newIndex, totalIndex) {
    newIndex = newIndex + 1;
    jQuery('.box-slide-current').html(newIndex + '/' + totalIndex);
    if (newIndex == 1) {
        jQuery('#slider-prev').addClass('deactive');
        jQuery('#slider-next').removeClass('deactive');
    } else if (newIndex == totalIndex) {
        jQuery('#slider-next').addClass('deactive');
        jQuery('#slider-prev').removeClass('deactive');
    } else {
        jQuery('#slider-prev').removeClass('deactive');
        jQuery('#slider-next').removeClass('deactive');
    }
}

jQuery('.next-btn').click(function() {
    var currentDetail = sliderDetail.getCurrentSlide() + 1;
    if (currentDetail != sliderDetailTotal) {
        sliderDetail.goToNextSlide();
        updateIndexSlider(currentDetail + 1, sliderDetailTotal);
    }
});

jQuery('.prev-btn').click(function() {
    var currentDetail = sliderDetail.getCurrentSlide() + 1;
    if (currentDetail != 1) {
        sliderDetail.goToPrevSlide();
        updateIndexSlider(currentDetail - 1, sliderDetailTotal);
    }
});