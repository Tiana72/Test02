<?php get_header(); ?>
<div class="container">
	<div class="row">
        <div class="col">
            <div class="row">
                <?php if (have_posts()): while (have_posts()): the_post();?>
                    <!-- посты -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="<?php the_permalink(); ?>"><h5 class="card-title"><?php the_title(); ?> </h5></a>
                            </div>
                            <div class="card-body">
                                <?php if (has_post_thumbnail()) :
                                    the_post_thumbnail('thumbnail', array('class' => 'float-left mr-3'));
                                else:?>
                                    <img src="https://picsum.photos/150/150" width="150" height="150" class="float-left mr-3">
                                <?php endif; ?>
                                <p class="card-text"><?php  the_excerpt(); //the_content(''); // ?></p>
                            </div>
                            <div class="card-footer">
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php _e('Читать далее...', 'test02'); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                    <!-- навигация -->
                    <?php the_posts_pagination(array(
                        'show_all'     => false,
                        'end_size'     => 2,
                        'mid_size'     => 2,
                        'prev_next'    => true,
                        'prev_text'    => __('« Назад', 'test02'),
                        'next_text'    => __('Вперед »', 'test02'),
                        'type'         => 'list',
                        'add_args'     => false,
                        'add_fragment' => '',
                    ) ); ?>
                <?php else: ?>
                    <!-- нет постов -->
                    <p>Постов нет...</p>
                <?php endif; ?>
            </div>
        </div>
        <?php get_sidebar('left'); ?>
        <?php get_sidebar(); ?>
    </div>
</div>

<!-- <?php $query = new WP_Query('cat=31,21&posts_per_page=-1'); ?> -->
<?php $query = new WP_Query( array (
    //'cat' => '31,21',
    'category_name' => 'edge-case-2, markup',
    'posts_per_page' => '-1',
    'orderby' => 'title',
    'order' => 'ASC',
    ) ); ?>
    
<?php if ($query->have_posts()): while ($query->have_posts()): $query->the_post();?>
    <!-- пост -->
    <h3><?php the_title() ; ?></h3>
<?php endwhile; ?>
    <!-- навигация -->
<?php else: ?>
    <!-- нет постов -->
<?php endif; ?>

<!-- Возвращаем оригинальные данные поста. Сбрасываем $post. -->
<?php wp_reset_postdata() ; ?>

<?php get_footer(); ?>
