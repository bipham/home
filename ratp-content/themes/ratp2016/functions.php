<?php

require_once "src/class/View.php";
require_once "src/class/Common.php";


function show_section($post) {
    $sections = get_field('sections', $post->ID); 
    $html = "";
    foreach ($sections as $value) {
        $html .= View::render('section', $value, false, false);
    }
    
    return $html;
}

function show_module($modules) {
    $html = "";
    foreach ($modules as $module) {
        switch ($module['acf_fc_layout']) {
            case "module_1_column_slider":
                $html .= View::render('module/module_1_column_slider', $module, false, false);
                break;
            case "module_1_column_block":
                $html .= View::render('module/module_1_column_block', $module, false, false);
                break;
            case "module_1_column_image_text":
                $html .= View::render('module/module_1_column_image_text', $module, false, false);
                break;
            case "module_2_column_title_slider":
                $html .= View::render('module/module_2_column_title_slider', $module, false, false);
                break;
            case "module_2_column_image_content":
                $html .= View::render('module/module_2_column_image_content', $module, false, false);
                break;
            case "module_2_column_text_logo":
                $html .= View::render('module/module_2_column_text_logo', $module, false, false);
                break;
            case "module_2_column_title_slider_image":
                $html .= View::render('module/module_2_column_title_slider_image', $module, false, false);
                break;
            case "module_2_column_slider":
                $html .= View::render('module/module_2_column_slider', $module, false, false);
                break;
            case "module_2_column_title_slider_image":
                $html .= View::render('module/module_2_column_title_slider_image', $module, false, false);
                break;
            case "module_2_column_youtube":
                $html .= View::render('module/module_2_column_youtube', $module, false, false);
                break;
            case "module_3_column_intro":
                $html .= View::render('module/module_3_column_intro', $module, false, false);
                break;
            case "module_3_column_text_image":
                $html .= View::render('module/module_3_column_text_image', $module, false, false);
                break;
            case "module_3_column_entretien":
                $html .= View::render('module/module_3_column_entretien', $module, false, false);
                break;
            case "module_3_column_carte":
                $html .= View::render('module/module_3_column_carte', $module, false, false);
                break;
        }
        
    }
    
    return $html;
}

function show_block_nos_publication() {
    $postId = 193;
    $postId = 22;
    $data = array(
        'title' => get_field('publication_title', $postId),
        'lists' => get_field('list_item', $postId)
    );
    return View::render('nos_publication', $data, false, false);
    
}