<?php
/**
 * Template for displaying the blog index page using MixItUp.
 *
 * @package cb-njlive2025
 */

defined( 'ABSPATH' ) || exit;

$page_for_posts = get_option( 'page_for_posts' );

get_header();
?>
<main class="casesstudies">
	<section class="hero">
		<div class="hero__bg-gradient"></div>
		<div class="hero__bg-text">
			<div class="bg-text-line bg-text-line--1">any gaming event&nbsp;<span class="alt">any gaming event</span>&nbsp;any gaming event&nbsp;<span class="alt">any gaming event</span>&nbsp;</div>
			<div class="bg-text-line strong bg-text-line--2"><span class="alt">anywhere in the world.</span>&nbsp;anywhere in the world.&nbsp;<span class="alt">anywhere in the world.</span>&nbsp;anywhere in the world.&nbsp;</div>
			<div class="bg-text-line bg-text-line--3">any gaming event&nbsp;<span class="alt">any gaming event</span>&nbsp;any gaming event&nbsp;<span class="alt">any gaming event</span>&nbsp;</div>
			<div class="bg-text-line strong bg-text-line--4"><span class="alt">anywhere in the world.</span>&nbsp;anywhere in the world.&nbsp;<span class="alt">anywhere in the world.</span>&nbsp;anywhere in the world.&nbsp;</div>
			<div class="bg-text-line bg-text-line--5">any gaming event&nbsp;<span class="alt">any gaming event</span>&nbsp;any gaming event&nbsp;<span class="alt">any gaming event</span>&nbsp;</div>
			<div class="bg-text-line strong bg-text-line--6"><span class="alt">anywhere in the world.</span>&nbsp;anywhere in the world.&nbsp;<span class="alt">anywhere in the world.</span>&nbsp;anywhere in the world.&nbsp;</div>
		</div>
		<div class="overlay"></div>
		<div class="container h-100">
			<div class="hero__title" data-aos="fade">What<br>we create</div>
		</div>
	</section>
	<section class="latest-casestudies py-5">
		<div class="container">
			<h2 class="text-center max-md-ch mb-4">Select the service that you are interested in to see the most relevant case studies</h2>
			<?php
			$case_study_types = get_terms(
				array(
					'taxonomy'   => 'case_study_type',
					'hide_empty' => false,
					'orderby'    => 'name',
					'order'      => 'ASC',
				)
			);
			if ( ! empty( $case_study_types ) && ! is_wp_error( $case_study_types ) ) {
				?>
			<div class="row mb-4 g-2">
				<div class="col-12">
					<div class="filter-buttons">
						<button class="filter-btn active" data-filter="all">All</button>
						<?php
						foreach ( $case_study_types as $cstype ) {
							?>
							<button class="filter-btn" data-filter="<?= esc_attr( $cstype->slug ); ?>"><?= esc_html( $cstype->name ); ?></button>
							<?php
						}
						?>
					</div>
				</div>
			</div>
			<div class="row position-relative g-4">
				<?php
			}

			$q = new WP_Query(
				array(
					'post_type'      => 'casestudy',
					'posts_per_page' => -1,
					'orderby'        => 'date',
					'order'          => 'DESC',
				)
			);

			if ( $q->have_posts() ) {
				while ( $q->have_posts() ) {
					$q->the_post();
					$terms      = get_the_terms( get_the_ID(), 'case_study_type' );
					$categories = implode( ' ', wp_list_pluck( $terms, 'slug' ) );
					?>
				<div class="col-md-6" data-category="<?= esc_attr( $categories ); ?>">
					<a href="<?= esc_url( get_permalink() ); ?>" class="casestudy__item h-100">
						<div class="casestudy__image-wrapper">
							<?php the_post_thumbnail( 'full', array( 'class' => 'casestudy__image' ) ); ?>
						</div>
						<div class="casestudy__meta">
							<h3 class="casestudy__title"><?= esc_html( get_the_title() ); ?></h3>
							<div class="casestudy__cats">
								<?php
								if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
									foreach ( $terms as $cterm ) {
										echo '<span class="casestudy__cat">' . esc_html( $cterm->name ) . '</span>';
									}
								}
								?>
							</div>
						</div>
					</a>
				</div>
					<?php
				}
			}
			?>
			</div>
		</div>
	</section>
</main>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const filterButtons = document.querySelectorAll('.filter-btn');
    const posts = document.querySelectorAll('[data-category]');

    // Add post-item class to all posts
    posts.forEach(post => {
        post.classList.add('post-item');
    });

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filterValue = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter posts
            posts.forEach(post => {
                const postCategories = post.getAttribute('data-category');
                const shouldShow = filterValue === 'all' || (postCategories && postCategories.includes(filterValue));
                
                if (shouldShow) {
                    post.style.display = 'block';
                } else {
                    post.style.display = 'none';
                }
            });
        });
    });

	document.querySelectorAll('.bg-text-line').forEach(function (line) {
		const text = line.innerHTML;
		line.innerHTML = text + text;
		let duration = 65;
		if (line.classList.contains('bg-text-line--2') || line.classList.contains('bg-text-line--5')) duration = 40;
		if (line.classList.contains('bg-text-line--3') || line.classList.contains('bg-text-line--6')) duration = 90;
		const textWidth = line.scrollWidth / 2;
		gsap.to(line, {
			x: -textWidth,
			ease: "linear",
			duration: duration,
			repeat: -1
		});
	});
});
</script>
<?php
get_footer();
?>
