<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Metanomalies
 * @since Metanomalies 1.0
 */

get_header(); 

$categories = get_the_category();
$category = $categories[0];
?>

<!-- CONTENT -->
<div id="Content" class="list">
<div class="wrapper clearfix">
	<!-- MAIN -->
	<article id="Main">
	<div class="wrapper">
		<!-- LATEST ARTICLES -->
		<section class="block articles">
			<h2 class="title">
				<?php echo $category->category_count?> 
				<?php if ($category->category_count == 1) { echo 'article'; } else { echo 'articles'; } ?> 
				in <strong><?php single_cat_title( '', true ); ?></strong>
			</h2>
			<ul class="articles">
				<?php
					$args = array( 
						'numberposts' => '21',
						'category' => $category->cat_ID
					);
					$recent_posts = wp_get_recent_posts( $args );
					
					$featured_ctr = 0;
					$article_ctr = 0;
					
					foreach( $recent_posts as $recent ){
						$post = get_post( $recent["ID"] );
						setup_postdata( $post );
						
						if ($featured_ctr < 3)
						{
							if ($featured_ctr == 0) {
							?>
							<li class="article featured">
								<ul id="FeaturedArticles" class="owl-carousel">
							<?php
							} 
							?>
							<li>
								<?php
									if ( has_post_thumbnail() ) { 
										$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($my_query_postid), 'thumbnail_size' );
										$thumb_url = $thumb['0'];
										?>
										<!-- featured image -->
										<a class="photo" href="<?php echo $thumb_url?>">
										<?php
											the_post_thumbnail( 'large' );
										?>
										</a>
										<?php
									} else {
										?>
										<!-- featured image -->
										<a class="photo" href="#">
											<img src="http://placehold.it/720x480" alt="(article title)" />
										</a>
										<?php
									}
								?>
								<div class="details">
									<!-- title -->
									<h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
									
									<!-- publish date -->
									<time class="date-published" datetime="<?php echo get_the_date( "Y-m-d h:ia" ); ?>"><?php echo get_the_date(); ?></time>
								</div>
							</li>
							<?php
							$featured_ctr++;
							
						} else {
							
							if ($article_ctr == 0) {
							?>
								</ul>
							</li>
							<?php
							}
							
							?>
							<li class="article<?php if ($article_ctr == 0) { echo " grid-sizer"; }?>"> <!-- First non-featured article item in this level should get additional "grid-sizer" class -->
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
							$article_ctr++;
						}
					}
				?>
			</ul>
			
			<!--<div id="LoadingArticles" class="message loading"><i class="fa fa-spinner fa-spin"></i> Loading more articles&hellip;</div>-->
		</section>
		<!-- /LATEST ARTICLES -->
	</div>
	</article>
	<!-- /MAIN -->
</div>
</div>
<!-- /CONTENT -->

<?php get_footer(); ?>
