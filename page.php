<?php get_header(); ?>
<main>
    <div class="container">
        <div class="wrapper">
            <div class="heading">
			    <?php the_title('<h1>', '</h1>'); ?>
            </div>
		    <?php if ( has_post_thumbnail() ): ?>
                <div class="thumbnail">
				    <?php the_post_thumbnail(); ?>
                </div>
		    <?php endif; ?>
            <div class="content">
			    <?php the_content(); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
