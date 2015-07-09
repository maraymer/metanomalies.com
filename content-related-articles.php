<!-- RELATED ARTICLES -->
<?php

$tags = wp_get_post_tags($post->ID);

if ($tags) {?>

	<section class="block articles related">
		<h2 class="title">Related Articles</h2>
		<ul class="articles">
		<?php
			
			$first_tag = $tags[0]->term_id;
			
			$args=array(
				'tag__in' => array($first_tag),
				'post__not_in' => array($post->ID),
				'posts_per_page'=>5,
				'caller_get_posts'=>1
			);
			
			$my_query = new WP_Query($args);
		
			if( $my_query->have_posts() ) {
				
				$ctr = 0;
				
				while ($my_query->have_posts()) : $my_query->the_post(); 
				
					$my_query_postid = get_the_ID();
				?>
				
					<li class="article<?php if ($ctr == 0) { echo " grid-sizer"; }?>">
					
						<?php
							if ( has_post_thumbnail() ) { 
								$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($my_query_postid), 'thumbnail_size' );
								$thumb_url = $thumb['0'];
								?>
								<!-- featured image -->
								<a class="photo" href="<?php echo $thumb_url?>">
								<?php
									the_post_thumbnail( 'medium' );
								?>
								</a>
								<?php
							} 
						?>
						
						
						<div class="details">
							<!-- title -->
							<h3 class="title"><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							
							<!-- publish date -->
							<time datetime="<?php echo get_the_date( "Y-m-d h:ia" ); ?>"><?php echo get_the_date(); ?></time>
							
							<!-- excerpt -->
							<?php the_excerpt(); ?>
						</div>
					</li>
				<?php
					$ctr++;
				endwhile;
			}
			wp_reset_query();
		?>
		</ul>
	</section>
	<!-- /RELATED ARTICLES -->
	
<?php } ?>