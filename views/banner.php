<?php if ( isset( $attr[ 'afbba_image' ] ) && !is_null( $attr[ 'afbba_image' ] ) ): ?>
<div class="banner-container" style="background: url(<?php echo $attr[ 'afbba_image' ]; ?>) no-repeat center center">
	<?php else: ?>
    <div class="banner-container">
		<?php endif; ?>
        <div class="banner-container-content">
			<?php if ( isset( $attr[ 'afbba_pre_title' ] ) && !is_null( $attr[ 'afbba_pre_title' ] ) ): ?>
                <div class="pre-title-container">
                    <div class="banner-pre-title"><?php echo $attr[ 'afbba_pre_title' ]; ?></div>
                </div>
			<?php endif; ?>
            <div class="title-container">
                <h1 class="banner-title"><?php echo $attr[ 'afbba_title' ]; ?></h1>
            </div>
			<?php if ( isset( $attr[ 'afbba_sub_title' ] ) && !is_null( $attr[ 'afbba_sub_title' ] ) ): ?>
                <div class="sub-title-container">
                    <div class="banner-post-title"><?php echo $attr[ 'afbba_sub_title' ]; ?></div>
                </div>
			<?php endif; ?>
			<?php if ( isset( $attr[ 'afbba_button_link' ] ) && !is_null( $attr[ 'afbba_button_link' ] ) ): ?>
                <div class="banner-button-container">
                <?php  $hover_color = $attr[ 'afbba_button_hover_color' ];  ?>
                <?php  $bg_color = $attr[ 'afbba_button_color' ];  ?>
                    <a class="button-link" target="_blank"
                       style="background-color: <?php echo $bg_color; ?>;" onmouseenter="this.style.backgroundColor='<?php echo $hover_color; ?>'" onmouseleave="this.style.backgroundColor= '<?php echo $bg_color; ?>'"
                       href="<?php echo esc_url($attr[ 'afbba_button_link' ]); ?>"><span class="afbba-btn-content"><?php echo $attr[ 'afbba_button_text' ] ?></span></a>
                </div>
			<?php endif; ?>
        </div>
    </div>
    <?php if ( isset( $item_cont ) && !empty($item_cont)): ?>
            <div class="bottom-bar" style="background-color: <?php echo $attr['afbba_links_bar_color'];?>">
            <ul>
				<?php echo $item_cont; ?>
            </ul>
            </div>
		<?php endif; ?>