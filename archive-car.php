<?php get_header();?>

<main class="main background__pattern">
<!-- mainimage -->
	<div class="mainimage-overlay" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/car/car-main-bg.png);">
		<div class="mainimage-overlay__overlay"></div>
		<div class="mainimage-overlay__inner wrap__main">
			<div class="mainimage-overlay__h1wrap col-sm-60 col-xs-120">
				<h1 class="mainimage-overlay__h1">カーラインナップ</h1>
			</div>
			<div class="mainimage-overlay__slugwrap col-sm-60 col-xs-120">
				<span class="mainimage-overlay__slug">car lineup</span>
			</div>
		</div>
	</div>

<!-- pan -->
	<div class="pan">
		<div class="pan__inner wrap__main">
			<div class="pan__item"><a href="../../">大阪の新車販売店【マンデーオート - MONDAY AUTO】</a></div>
			<div class="pan__item">カーラインナップ</div>
		</div>
	</div>
	
	
	<article class="car background__pattern">
		<div class="wrap__main padding__main pt0">
			<header class="title-header">
				<h2 class="title__main">カーラインナップ</h2>
				<span class="title__main_after">car lineup</span>
			</header>
			

			<section class="carLists car-list-section" data-id="13" v-if="datas.length">
				<h2 class="title__main2 title__main2_type2" :style="'background-color:'+color">月々<span>0.8</span>万円～</h2>
				<div class="wrap__flex">
					<?php get_template_part( 'template', 'carlist' ); ?>
				</div>
				<div class="pager">
					<div class="pager__link" v-for="n in total" @click="Pager(n)" :class="{ pager__link_on : n==pager }" v-text="n"></div>
				</div>
			</section>

			<section class="carLists car-list-section" data-id="5" v-if="datas.length">
				<h2 class="title__main2 title__main2_type2" :style="'background-color:'+color">月々<span>1</span>万円～</h2>
				<div class="wrap__flex">
					<?php get_template_part( 'template', 'carlist' ); ?>
				</div>
				<div class="pager">
					<div class="pager__link" v-for="n in total" @click="Pager(n)" :class="{ pager__link_on : n==pager }" v-text="n"></div>
				</div>
			</section>


			<section class="carLists car-list-section" data-id="6" v-if="datas.length">
				<h2 class="title__main2 title__main2_type2" :style="'background-color:'+color">月々<span>1.3</span>万円～</h2>
				<div class="wrap__flex">
					<?php get_template_part( 'template', 'carlist' ); ?>
				</div>
				<div class="pager">
					<div class="pager__link" v-for="n in total" @click="Pager(n)" :class="{ pager__link_on : n==pager }" v-text="n"></div>
				</div>
			</section>


			<section class="carLists car-list-section" data-id="7" v-if="datas.length">
				<h2 class="title__main2 title__main2_type2" :style="'background-color:'+color">月々<span>1.5</span>万円～</h2>
				<div class="wrap__flex">
					<?php get_template_part( 'template', 'carlist' ); ?>
				</div>
				<div class="pager">
					<div class="pager__link" v-for="n in total" @click="Pager(n)" :class="{ pager__link_on : n==pager }" v-text="n"></div>
				</div>
			</section>

		</div>
	</article>

	<!-- お問い合わせ -->
		
		<div class="contact-bn background__gradient_redtowhite">
			<div class="wrap__main">
				<div class="contact-bn__imagewrap col-sm-40 col-xs-120">
					<img src="<?php echo get_template_directory_uri() ?>/assets/contact-1.jpg" alt="MONDAYへのお問い合わせ">
				</div>
				<div class="contact-bn__imagewrap col-sm-40 col-xs-120">
					<img src="<?php echo get_template_directory_uri() ?>/assets/contact-2.jpg" alt="MONDAYへのお問い合わせ">
				</div>
				<div class="contact-bn__imagewrap col-sm-40 col-xs-120">
					<a href="tel:0725432355">
						<img src="<?php echo get_template_directory_uri() ?>/assets/contact-3.jpg" alt="MONDAYへのお問い合わせ">
					</a>
				</div>
			</div>
		</div>


</main>

<script>
	var post_id = "<?php the_id(); ?>";
	var perPage = 6;
	countTime = 5000
</script>

<?php get_footer();?>