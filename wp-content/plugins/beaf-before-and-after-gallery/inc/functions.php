<?php

add_action( 'bafg_after_slider', 'bafg_slider_info', 10 );

function bafg_slider_info($id){
	
	$bafg_width = !empty(get_post_meta( $id, 'bafg_width', true )) ? get_post_meta( $id, 'bafg_width', true ) : '';
	$bafg_height = !empty(get_post_meta( $id, 'bafg_height', true )) ? get_post_meta( $id, 'bafg_height', true ) : '';
	$bafg_slider_alignment = !empty(get_post_meta( $id, 'bafg_slider_alignment', true )) ? get_post_meta( $id, 'bafg_slider_alignment', true ) : '';
	
	$bafg_pro_activated = get_option( 'bafg_pro_activated' );
	
	?>
	<div class="bafg-slider-info-wraper">
		<div style="<?php if( $bafg_pro_activated == 'true' ) { if($bafg_width != ''){ echo 'width: '.$bafg_width.';'; } ?> <?php if( $bafg_width != '' && $bafg_slider_alignment == 'right' ){ echo ' float: right;'; } ?> <?php if( $bafg_width == '' && $bafg_slider_alignment == 'right' ){ echo ' float: right; width: 100%;'; } ?> <?php if( $bafg_slider_alignment == 'center' ){ echo ' margin: 0 auto;'; } } ?>" class="<?php echo esc_attr('slider-info-'.$id.''); ?> bafg-slider-info">
			<?php
			$bafg_slider_title = get_post_meta($id,'bafg_slider_title',true);
			if( trim($bafg_slider_title) != '' ) :
			?>
			<h2 class="bafg-slider-title"><?php echo esc_html($bafg_slider_title); ?></h2>
			<?php
			endif;

			$bafg_slider_description = get_post_meta($id,'bafg_slider_description',true);

			if( trim($bafg_slider_description) != '' ) :
			?>
			<div class="bafg-slider-description">
				<?php
				echo esc_html($bafg_slider_description);
				?>
			</div>
			<?php
			endif;

			$bafg_readmore_link = get_post_meta($id,'bafg_readmore_link',true);
			if( trim($bafg_readmore_link) != '' ) :
			?>
			<div>
			<?php
			$bafg_readmore_link_target = get_post_meta( $id, 'bafg_readmore_link_target', true );
			$bafg_pro_activated = get_option( 'bafg_pro_activated' );
			
			$bafg_readmore_text = esc_html__('Read more','bafg');
			if($bafg_pro_activated == 'true') {
				$bafg_readmore_text = !empty(get_post_meta( $id, 'bafg_readmore_text', true )) ? get_post_meta( $id, 'bafg_readmore_text', true ) : esc_html__('Read more','bafg');
			}
			?>
			<a href="<?php echo esc_url($bafg_readmore_link); ?>" class="bafg_slider_readmore_button" <?php if($bafg_readmore_link_target == 'new_tab') echo 'target="_blank"'; ?> ><?php echo $bafg_readmore_text; ?></a>
			</div>

			<?php endif; ?>
		</div>
	</div>
	<?php
}


add_action( 'bafg_before_slider', 'bafg_slider_info_styles', 10 );

function bafg_slider_info_styles($id){
	
	$bafg_slider_info_heading_font_size = !empty(get_post_meta( $id, 'bafg_slider_info_heading_font_size', true )) ? get_post_meta( $id, 'bafg_slider_info_heading_font_size', true ) : '22px';

	$bafg_slider_info_heading_alignment = !empty(get_post_meta( $id, 'bafg_slider_info_heading_alignment', true )) ? get_post_meta( $id, 'bafg_slider_info_heading_alignment', true ) : '';

	$bafg_slider_info_desc_alignment = !empty(get_post_meta( $id, 'bafg_slider_info_desc_alignment', true )) ? get_post_meta( $id, 'bafg_slider_info_desc_alignment', true ) : '';

	$bafg_slider_info_readmore_alignment = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_alignment', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_alignment', true ) : '';

	$bafg_slider_info_readmore_button_padding_top_bottom = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_button_padding_top_bottom', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_button_padding_top_bottom', true ) : '';

	$bafg_slider_info_readmore_button_padding_left_right = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_button_padding_left_right', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_button_padding_left_right', true ) : '';

	$bafg_slider_info_readmore_button_width = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_button_width', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_button_width', true ) : '';

	$bafg_slider_info_heading_font_color = !empty(get_post_meta( $id, 'bafg_slider_info_heading_font_color', true )) ? get_post_meta( $id, 'bafg_slider_info_heading_font_color', true ) : '';
	$bafg_slider_info_desc_font_size = !empty(get_post_meta( $id, 'bafg_slider_info_desc_font_size', true )) ? get_post_meta( $id, 'bafg_slider_info_desc_font_size', true ) : '';
	$bafg_slider_info_desc_font_color = !empty(get_post_meta( $id, 'bafg_slider_info_desc_font_color', true )) ? get_post_meta( $id, 'bafg_slider_info_desc_font_color', true ) : '';
	$bafg_slider_info_readmore_font_size = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_font_size', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_font_size', true ) : '';
	$bafg_slider_info_readmore_font_color = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_font_color', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_font_color', true ) : '';
	$bafg_slider_info_readmore_bg_color = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_bg_color', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_bg_color', true ) : '';
	$bafg_slider_info_readmore_hover_font_color = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_hover_font_color', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_hover_font_color', true ) : '';
	$bafg_slider_info_readmore_hover_bg_color = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_hover_bg_color', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_hover_bg_color', true ) : '';
	
	$bafg_slider_info_readmore_border_radius = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_border_radius', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_border_radius', true ) : '';
	
	?>
	
	<style>
		.<?php echo esc_attr('slider-info-'.$id.''); ?>.bafg-slider-info .bafg-slider-title {
			<?php if( $bafg_slider_info_heading_font_size != '' ) : ?>
			font-size: <?php echo esc_attr($bafg_slider_info_heading_font_size); ?>;
			<?php endif; ?>
			
			<?php if( $bafg_slider_info_heading_font_color != '' ) : ?>
			color: <?php echo esc_attr($bafg_slider_info_heading_font_color); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_heading_alignment != '' ) : ?>
			text-align: <?php echo esc_attr($bafg_slider_info_heading_alignment); ?>;
			<?php endif; ?>
		}

		.<?php echo esc_attr('slider-info-'.$id.''); ?>.bafg-slider-info .bafg-slider-description {
			<?php if( $bafg_slider_info_desc_font_size != '' ) : ?>
			font-size: <?php echo esc_attr($bafg_slider_info_desc_font_size); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_desc_font_color != '' ) : ?>
			color: <?php echo esc_attr($bafg_slider_info_desc_font_color); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_desc_alignment != '' ) : ?>
			text-align: <?php echo esc_attr($bafg_slider_info_desc_alignment); ?>;
			<?php endif; ?>
		}

		.<?php echo esc_attr('slider-info-'.$id.''); ?>.bafg-slider-info .bafg_slider_readmore_button {
			<?php if( $bafg_slider_info_readmore_font_size != '' ) : ?>
			font-size: <?php echo esc_attr($bafg_slider_info_readmore_font_size); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_font_color != '' ) : ?>
			color: <?php echo esc_attr($bafg_slider_info_readmore_font_color); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_bg_color != '' ) : ?>
			background-color: <?php echo esc_attr($bafg_slider_info_readmore_bg_color); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_bg_color != '' ) : ?>
			border: 1px solid <?php echo esc_attr($bafg_slider_info_readmore_bg_color); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_border_radius != '' ) : ?>
			border-radius: <?php echo esc_attr($bafg_slider_info_readmore_border_radius); ?>;
			<?php endif; ?>

			text-align: center;

			<?php if( $bafg_slider_info_readmore_alignment == 'right' ) : ?>
			float: <?php echo esc_attr($bafg_slider_info_readmore_alignment); ?>;
			max-width: 200px;
			display: block;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_alignment == 'center' ) : ?>
			margin: 10px auto;
			max-width: 200px;
			display: block;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_button_padding_top_bottom != '' ) : ?>
			padding-top: <?php echo esc_attr($bafg_slider_info_readmore_button_padding_top_bottom); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_button_padding_top_bottom != '' ) : ?>
			padding-bottom: <?php echo esc_attr($bafg_slider_info_readmore_button_padding_top_bottom); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_button_padding_left_right != '' ) : ?>
			padding-left: <?php echo esc_attr($bafg_slider_info_readmore_button_padding_left_right); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_button_padding_left_right != '' ) : ?>
			padding-right: <?php echo esc_attr($bafg_slider_info_readmore_button_padding_left_right); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_button_width == 'full-width' ) : ?>
			display: block;
			width: 100%;
			<?php endif; ?>
		}

		.<?php echo esc_attr('slider-info-'.$id.''); ?>.bafg-slider-info .bafg_slider_readmore_button:hover {

			<?php if( $bafg_slider_info_readmore_hover_font_color != '' ) : ?>
			color: <?php echo esc_attr($bafg_slider_info_readmore_hover_font_color); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_hover_bg_color != '' ) : ?>
			background-color: <?php echo esc_attr($bafg_slider_info_readmore_hover_bg_color); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_bg_color != '' ) : ?>
			border: 1px solid <?php echo esc_attr($bafg_slider_info_readmore_bg_color); ?>;
			<?php endif; ?>
		}

	</style>
	<?php
}

//get the option value
if ( !function_exists( 'bafg_option_value' ) ) {
    function bafg_option_value( $name ) {

        $option_value = get_option( 'bafg_watermark' );
        if ( isset( $option_value[$name] ) ) {
            return $option_value[$name];
        }

    }
}
