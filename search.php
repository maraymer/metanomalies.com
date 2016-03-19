<?php
/**
 * The template for displaying search results pages.
 *
 */

get_header(); ?>

<!-- CONTENT -->
<div id="Content" class="search">
	<div class="wrapper clearfix">
		<!-- MAIN -->
		<article id="Main">
		<div class="wrapper">
			<form role="search" method="get" class="search" action="<?php echo site_url(); ?>">
				<input type="search" class="text" placeholder="Search …" value="<?php printf( __( '%s', 'metanomalies' ), get_search_query() ); ?>" name="s" title="Search for: <?php printf( __( 'Search Results for: %s', 'metanomalies' ), get_search_query() ); ?>">
				<input type="submit" class="submit" value="&#xf002;">
			</form>
			
			<?php if ( have_posts() ) : ?>
			
				<!-- SEARCH RESULTS -->
				<section class="block results">
					<h2 class="title">
						<?php 
							/* Search Count */ 
							$allsearch = &new WP_Query("s=$s&showposts=-1"); 
							$key = wp_specialchars($s, 1); 
							$count = $allsearch->post_count; 
							_e(''); 
							echo $count . ' '; 
							_e('matches'); 
							wp_reset_query(); 
						?> 
						found for <strong>&ldquo;<?php printf( __( '%s', 'metanomalies' ), get_search_query() ); ?>&rdquo;</strong>
					</h2>
					
					<ul class="results">
						<?php
						// Start the loop.
						while ( have_posts() ) : the_post(); 
						?>
						<li class="result">
							<?php the_title( sprintf( '<h3 class="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
							<time class="date-published" datetime="<?php echo get_the_date( "Y-m-d h:ia" ); ?>"><?php echo get_the_date(); ?></time>
							<div class="category">
								<?php 
									$categories = get_the_category( ); 
									$output = "";
									
									if($categories){
										foreach($categories as $category) {
											$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>';
										}
										echo $output;	
									}
								?>							
							</div>
							<?php the_excerpt(); ?>
						</li>
						<?php
						// End the loop.
						endwhile;
						?>
					</ul>
					
					<!-- <div id="LoadingArticles" class="message loading"><i class="fa fa-spinner fa-spin"></i> Loading more articles&hellip;</div> -->
				</section>
				<!-- /SEARCH RESULTS -->
			<?php
			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content', 'none' );
	
			endif;
			?>
		</div>
		</article>
		<!-- /MAIN -->
	</div>
</div>
<!-- /CONTENT -->

<?php get_footer(); ?>
