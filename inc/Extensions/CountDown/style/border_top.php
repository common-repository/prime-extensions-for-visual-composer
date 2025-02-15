<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$time = rand();
$txt_color = $txt_color ? $txt_color : "#f4cd2e";
ob_start();
?>
<style>
    <?php if ($time_text_size): ?>
    #countdown_<?php echo $time ?> .uc_box .uc_number{
        font-size: <?php echo $time_text_size ?>px;
    }
    <?php endif; ?>
    <?php if ($text_size): ?>
    #countdown_<?php echo $time ?> .uc_box .uc_label{
        font-size: <?php echo $text_size ?>px;
    }
    <?php endif; ?>
    <?php if ($spacing): ?>
    #countdown_<?php echo $time ?> .uc_box{
        margin: 0 <?php echo $spacing ?>px;
    }
    @media screen and    (max-width: 749px) {
        #countdown_<?php echo $time ?> .uc_box{
            margin: <?php echo $spacing ?>px;
        }
    }
    <?php endif; ?>
    <?php if ($txt_color): ?>
    #countdown_<?php echo $time ?> .uc_box .uc_label,
    #countdown_<?php echo $time ?> .uc_box .uc_number{
        color: <?php echo $txt_color?>;
    }
    #countdown_<?php echo $time ?> .uc_box,
    #countdown_<?php echo $time ?> .uc_box .uc_number{
        border-color:<?php echo $txt_color?>;
    }
    <?php endif; ?>
</style>
<div class="wrap-count-down border_top_countdown <?php echo esc_attr($css_class); ?>">
    <div id="countdown_<?php echo $time ?>" class="uc_clean_countdown">
        <div class="uc_box_wraper">
            <div class="uc_box" style='<?php if ($d_color) echo "background-color: $d_color;" ?>'>

                <span class="uc_number">0</span>
                <span class="uc_label">DAYS</span>

            </div>
        </div>
        <div class="uc_box_wraper">
            <div class="uc_box" style='<?php if ($h_color) echo "background-color: $h_color;" ?>'>
                <span class="uc_number">0</span>
                <span class="uc_label">HOURS</span>
            </div>
        </div>
        <div class="uc_box_wraper">
            <div class="uc_box" style='<?php if ($i_color) echo "background-color: $i_color;" ?>'>
                <span class="uc_number">0</span>
                <span class="uc_label">MINUTES</span>
            </div>
        </div>
        <div class="uc_box_wraper">
            <div class="uc_box" style='<?php if ($s_color) echo "background-color: $s_color;" ?>'>
                <span class="uc_number">0</span>
                <span class="uc_label">SECONDS</span>
            </div>
        </div>
        <div style="clear: both;"></div>

    </div>
    <div style="clear: both;"></div>
</div>
<script type="text/javascript">

    setInterval(function () {
        uc_clean_countdown("countdown_<?php echo $time ?>", "<?php echo $countdown_date ?>")
    }, 1000);

</script>
