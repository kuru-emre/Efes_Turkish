<?php do_action('laurent_elated_action_before_page_header'); ?>
<header class="eltdf-page-header">
    <?php do_action('laurent_elated_action_after_page_header_html_open'); ?>
    <div class="eltdf-fixed-wrapper">
        <div class="eltdf-menu-area <?php echo esc_attr($menu_area_position_class); ?>">
            <?php do_action('laurent_elated_action_after_header_menu_area_html_open') ?>

            <?php if($menu_area_in_grid) : ?>
            <div class="eltdf-grid">
                <?php endif; ?>

                <div class="eltdf-vertical-align-containers">
                    <div class="eltdf-position-left"><!--
				 --><div class="eltdf-position-left-inner">
                            <?php if(!$hide_logo) {
                                laurent_elated_get_logo();
                            } ?>
                            <?php if($menu_area_position === 'left') : ?>
                                <?php laurent_elated_get_main_menu(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if($menu_area_position === 'center') : ?>
                        <div class="eltdf-position-center"><!--
					 --><div class="eltdf-position-center-inner">
                                <?php laurent_elated_get_main_menu(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="eltdf-position-right"><!--
				 --><div class="eltdf-position-right-inner">
                            <?php if($menu_area_position === 'right') : ?>
                                <?php laurent_elated_get_main_menu(); ?>
                            <?php endif; ?>
                            <?php laurent_elated_get_header_widget_area_one(); ?>
                        </div>
                    </div>
                </div>

                <?php if($menu_area_in_grid) : ?>
            </div>
        <?php endif; ?>
        </div>
    </div>
    <?php do_action('laurent_elated_action_before_page_header_html_close'); ?>
</header>
<?php do_action('laurent_elated_action_after_page_header'); ?>
