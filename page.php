<?php get_header(); ?>

	<div id="content">
		<div class="inner-title page-title">
			<div class="wrap"><div class="table"><div class="table-cell"><h1><?php the_title(); ?></h1></div></div></div>					
			<?php if(has_post_thumbnail()){ 
				$thumb_id = get_post_thumbnail_id();
				$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
				$thumb_url = $thumb_url_array[0];

				echo '<span class="head-bg" style="background-image:url('. $thumb_url .');"></span>';

			} ?>
			<span class="overlay"></span>
		</div>

		<div id="inner-content" class="wrap cf">
			
			<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php
						$title=get_the_title();
						$query = new WP_Query(array(
										'post_type'=>'page_button',
										'posts_per_page'=>'4',
										'category_name'=> $title)); ?>

					<?php

					if ( $query->have_posts() ) : ?>
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="sub-wrap">
					<div class="sub-page-buttons">
						<?php if (has_post_format('link') && get_post_meta($post->ID, 'link_to_url', true)) : ?>
						<a href="<?php echo get_post_meta($post->ID, 'link_to_url', true); ?>"><?php the_title(); ?></a>
						<?php else : ?>
						<a href="<?php 'link_to_url' ?>"><?php the_title(); ?></a>
						<?php endif; ?>
					</div>
					</div>
					<?php endwhile; wp_reset_postdata(); ?>
					<?php else : ?>
					<?php endif; ?>


					<?php
						$title=get_the_title();
						$query = new WP_Query(array(
										'post_type'=>'page_tile',
										'posts_per_page'=>'8',
										'category_name'=> $title)); ?>

					<?php

					if ( $query->have_posts() ) : ?>
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="sub-page-tiles">
						<h2><?php the_title(); ?>
						</h2>
							<div class="tile-image"><?php the_post_thumbnail($size = 'large'); ?>
							</div>
								<p><?php the_content(); ?>
								</p>
							<div class="tile-button">
							<?php if (has_post_format('link') && get_post_meta($post->ID, 'learn_more_button', true)) : ?>
							<a href="<?php echo get_post_meta($post->ID, 'learn_more_button', true); ?>">LEARN MORE</a>
							<?php endif; ?>
							</div>

					</div>
					<?php endwhile; wp_reset_postdata(); ?>
					<?php else : ?>
					<?php endif; ?>




					<div class="main-content-area">
						<section class="entry-content cf" itemprop="articleBody">
							<?php the_content(); 

							wp_link_pages( array(
						      'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'nz-scene' ) . '</span>',
						      'after'       => '</div>',
						      'link_before' => '<span>',
						      'link_after'  => '</span>',
						    ) );

							?>
							<?php edit_post_link('[edit this page]', '<p>', '</p>'); ?>
						</section>
					</div>


				<?php endwhile; ?>

				<?php else : ?>

					<article id="post-not-found" class="hentry cf">
							<header class="article-header">
								<h1><?php _e( 'Oops, Post Not Found!', 'nz-scene' ); ?></h1>
								<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'nz-scene' ); ?></p>
							</header>
					</article>

				<?php endif; ?>

			</div>

			<?php get_sidebar('page'); ?>

		</div>

	</div>

<?php get_footer(); ?>