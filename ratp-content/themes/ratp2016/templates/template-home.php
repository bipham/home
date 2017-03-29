<?php
   /* Template Name: Home */
   
   get_header();
   $sliders = get_field('slider');
   ?>
<div class="row first-row">
   <div class="slider-custom">
      <ul class="bxslider slider-overview">
         <?php foreach($sliders as $key => $slider): 
            $slider_desktop = $slider['image_desktop'];
            $slider_mobile = $slider['image_mobile'];
            ?>
         <li>
            <span class="slide_effect-back slide-pull-left-landscape">
               <div class="slide_box">
                  <img src="<?php echo $slider_desktop['url'];?>" class="img-<?php echo $key; ?> img-slider img-left" data-slide-offset = "<?php echo $key; ?>"/>
                  <div class="slide_corner-box">
                     <a class="slide_page-tip" href="#">
                        <div class="slide_corner-contents">
                           <div class="slide_corner-button btn-zoom" data-slide-offset = "<?php echo $key; ?>"><img class="img-rollover" src="../ratp-content/themes/ratp2016/public/img/rollover.png"></div>
                        </div>
                     </a>
                  </div>
               </div>
            </span>
            <span class="slide_effect-back slide-pull-right-vertical">
               <div class="slide_box">
                  <img src="<?php echo $slider_mobile['url'];?>" class="img-<?php echo $key + 1; ?> img-slider img-right" data-slide-offset = "<?php echo $key + 1; ?>"/>
                  <div class="slide_corner-box">
                     <a class="slide_page-tip" href="#">
                        <div class="slide_corner-contents">
                           <div class="slide_corner-button btn-zoom" data-slide-offset = "<?php echo $key + 1; ?>"><img class="img-rollover" src="../ratp-content/themes/ratp2016/public/img/rollover.png"></div>
                        </div>
                     </a>
                  </div>
               </div>
            </span>
         </li>
         <?php endforeach; ?>
      </ul>
   </div>
   <div class="row thumbnail-scroll">
      <div class="thumbnail-slider">
         <div id="bx-pager">
            <ul class="thumbnail-list-img">
               <?php foreach($sliders as $key => $slider): 
                  $slider_desktop = $slider['image_desktop'];
                  $slider_mobile = $slider['image_mobile'];
                  ?>
               <li class="li-img-<?php echo $key; ?>">
                  <a data-slide-index="<?php echo $key; ?>" href="">
                     <div class="img-drop-active <?php if ($key == 0) echo 'img-visiting';?>">
                        <div class="img-thumbnail-over-left">
                           <img src="<?php echo $slider_desktop['url'];?>" class="img-thumbnail-<?php echo $key; ?> img-thumbnail-left img-thumb" data-slide-offset="<?php echo $key; ?>" />
                        </div>
                        <div class="img-thumbnail-over-right img-drop">
                           <img src="<?php echo $slider_mobile['url'];?>" class="img-thumbnail-<?php echo $key; ?> img-thumbnail-right img-thumb" data-slide-offset="<?php echo $key + 1; ?>" />
                        </div>
                     </div>
                  </a>
               </li>
               <?php endforeach; ?>
            </ul>
            <img id="draggable" src="../ratp-content/themes/ratp2016/public/img/slider-active.png">
         </div>
      </div>
   </div>
   <div class="frame-slider-cover">
      <div class="noted-slider">
         <div class="noted-slider-inner">
         </div>
         <div class="content-noted">
            <p class="top-noted-inner">Déplacer vous parmis les visuels avec le curseur</p>
            <img src="../ratp-content/themes/ratp2016/public/img/handle-scroll.png" class="img-noted-inner">
            <p class="bottom-noted-inner">ou bien utiliser la frise ci-dessous:</p>
         </div>
      </div>
   </div>
</div>
<div class="row second-row">
         <div class="slider-detail-custom">
            <ul class="bxslider slider-detail">
            <?php foreach($sliders as $key => $slider): 
                  $slider_desktop = $slider['image_desktop'];
                  $slider_mobile = $slider['image_mobile'];
                  ?>
               <li>
                  <div class="slide_effect-back">
                     <div class="slide_box">
                        <img src="<?php echo $slider_desktop['url'];?>" class="img-<?php echo $key; ?> img-slider" data-slide-index="<?php echo $key; ?>" data-slide-offset = "<?php echo $key; ?>"/>
                        <div class="slide_corner-box">
                           <a class="slide_page-tip" href="#">
                              <div class="slide_corner-contents">
                                 <div class="slide_corner-button btn-exit" data-slide-index="<?php echo $key; ?>" data-slide-offset = "<?php echo $key; ?>"><img class="img-rollover" src="../ratp-content/themes/ratp2016/public/img/rollover-close.png"></div>
                              </div>
                           </a>
                        </div>
                     </div>
                     <span class="content-detail-img content-bottom-right-img-landscape content-img-landscape">
                     <img src="../ratp-content/themes/ratp2016/public/img/infobulle.png">
                     </span>
                  </div>
               </li>
               <li>
                  <div class="slide_effect-back slide-pull-vertical">
                     <div class="slide_box">
                        <img src="<?php echo $slider_mobile['url'];?>" class="img-<?php echo $key + 1; ?> img-slider" data-slide-index="<?php echo $key + 1; ?>" data-slide-offset = "<?php echo $key + 1; ?>"/>
                        <div class="slide_corner-box">
                           <a class="slide_page-tip" href="#">
                              <div class="slide_corner-contents">
                                 <div class="slide_corner-button btn-exit" data-slide-index="<?php echo $key; ?>" data-slide-offset = "<?php echo $key + 1; ?>"><img class="img-rollover" src="../ratp-content/themes/ratp2016/public/img/rollover-close.png"></div>
                              </div>
                           </a>
                        </div>
                     </div>
                     <span class="content-detail-img content-bottom-right-img-vertical content-img-vertical">
                     <img src="../ratp-content/themes/ratp2016/public/img/infobulle.png ?>">
                     </span>
                  </div>
               </li>
                <?php endforeach; ?>
            </ul>
         </div>
         <div class="control-slider">
            <span id="slider-prev" class="prev-btn active"><img  src="../ratp-content/themes/ratp2016/public/img/arrow-left.png"></span>
            <span class="box-slide-current">1/20</span>
            <span id="slider-next" class="next-btn active"><img  src="../ratp-content/themes/ratp2016/public/img/arrow-right.png"></span>
            <div class="share-socials">
               <img src="../ratp-content/themes/ratp2016/public/img/infobulle-partage.png">
            </div>
         </div>
      </div>
<script src="../ratp-content/themes/ratp2016/public/js/slider.js"></script>