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
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); 
?>

<!-- CONTENT -->
<div id="Content" class="single">
	
	<div class="wrapper clearfix">
	
	<!-- MAIN -->
	<?php if ( have_posts() ) : ?>
	
		<?php
			while ( have_posts() ) : the_post();
		?>	
		
		<article id="Main">
		<div class="wrapper">
			<header class="content-header">
				<div class="featured-image">
					<?php
						if ( has_post_thumbnail() ) { 
							the_post_thumbnail();
						} 
					?>
				</div>
				
				<h1 class="title"><?php echo the_title(); ?></h1>
				
				<ul class="meta">
					<li class="author"><a href='<?php echo esc_url( get_author_posts_url( $post->post_author ) ); ?>'><?php the_author_meta('display_name', $post->post_author); ?></a></li>
					<li class="date-published"><time datetime="<?php echo get_the_date( "Y-m-d h:ia" ); ?>"><?php echo get_the_date(); ?></time></li>
					<li class="category">
					<?php 
						$categories = get_the_category( $post->ID ); 
						$output = "";
						
						if($categories){
							foreach($categories as $category) {
								$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>';
							}
							echo $output;	
						}
					?>
					</li>
				</ul>
			</header>
			
			<section class="content-body">
				<?php
					echo apply_filters('the_content', get_post_field('post_content', $post->ID));
				?>
			</section>
			<!--
			<section class="comments">
				(Comments go here.)
			</section>
			-->
		</div>
		</article>
		
		<?php
			endwhile;
		?>
		<!-- /MAIN -->
		
		<!-- AUX -->
		
		<aside id="Aux">
			<!--
			<section class="widget social-actions">
				<h2 class="title">Share This Article</h2>
				
				<div class="body">
					(Social share buttons go here.)
				</div>
			</section>
			-->
			<!--
			<section class="widget ad-space">
				<div class="body">
				(Ad banner goes here.)
				</div>
			</section>
			-->
		</aside>
		<!-- /AUX -->
		
		<!-- SUB -->
		<aside id="Sub">
			
			<?php
				get_template_part( 'content', 'related-articles' );
				
				get_template_part( 'content', 'recent-articles' );
			?>
			
		</aside>
		<!-- /SUB -->
	</div>
	<?php endif; ?>
</div>
<!-- /CONTENT -->

<?php get_footer(); ?>
