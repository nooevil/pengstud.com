<?php
$faq->description = get_post_meta($faq->ID,'faq_description',true);
$faq->title = get_post_meta($faq->ID,'faq_title',true);
?>

<div class="faq__wrap__questions">
    <div class="faq__wrap__questions__head">
        <h2><?php echo $faq->title; ?></h2>
        <span class="faq__wrap__questions__drowdown"></span>
    </div>
    <div class="faq__wrap__questions__content">
        <?php echo $faq->description ?>
    </div>
</div>