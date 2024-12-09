<?php get_header(); ?>
<body>
<h1><?php bloginfo( 'name' ); ?></h1>
<h2><?php bloginfo( 'description' ); ?></h2>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="two-column-layout">
            <div class="column-left">
                <!-- Levý sloupec -->
                <?php the_author(); ?>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="column-right">
                <!-- Pravý sloupec -->
                <h1 class="post-title"><?php the_title(); ?></h1>
                <strong><?php the_excerpt(); ?></strong>
                <div class="post-content">
                    <?php the_content(); ?>
                    <?php wp_link_pages(); ?>
                </div>
            </div>
        </div>

        <?php edit_post_link(); ?>
    <?php endwhile; ?>
<?php else : ?>
    <p>No posts found. :(</p>
<?php endif; ?>

<?php if ( get_next_posts_link() ) : ?>
    <?php next_posts_link(); ?>
<?php endif; ?>
<?php if ( get_previous_posts_link() ) : ?>
    <?php previous_posts_link(); ?>
<?php endif; ?>

<?php get_footer(); ?>
</body>

