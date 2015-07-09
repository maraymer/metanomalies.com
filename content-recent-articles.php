<!-- RECENT ARTICLES -->
<section class="block articles recent">
	<h2 class="title">
		Recent Articles
		<?php
			/*
			echo 'Recent Articles in ';
			if($categories){
				$output = "";
				$category_list = array();
				foreach($categories as $category) {
					$category_list[] = $category->cat_name;
				}
				echo '<strong>'. implode(',', $category_list) .'</strong>';
			}
			*/
		?>
	</h2>
	
	<ul class="articles">
		<?php
			$args = array( 'numberposts' => '8' );
			$recent_posts = wp_get_recent_posts( $args );
			$ctr = 0;
			foreach( $recent_posts as $recent ){
				if ($ctr > 0) {
					
					$post = get_post( $recent["ID"] );
					setup_postdata( $post );
				?>
				<li class="article<?php if ($ctr == 1) { echo " grid-sizer"; }?>"> <!-- First non-featured article item in this level should get additional "grid-sizer" class -->
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
					
					<!-- title -->
					<h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
					
					<!-- publish date -->
					<time datetime="<?php echo get_the_date( "Y-m-d h:ia" ); ?>"><?php echo get_the_date(); ?></time>
					
					<!-- excerpt -->
					<?php the_excerpt(); ?>
				</li>
				<?php
				}
				$ctr++;
			}
		?>
	</ul>
</section>
<!-- /RECENT ARTICLES -->
