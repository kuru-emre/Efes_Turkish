<div class="eltdf-post-info-author">
    <a itemprop="author" class="eltdf-post-info-author-link" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
        <?php the_author_meta('display_name'); ?>
    </a>
    <?php echo laurent_elated_print_svg('dd-arrows'); ?>
</div>