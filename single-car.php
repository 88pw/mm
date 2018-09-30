<?php get_header();?>

<main class="main background__pattern">
<!-- mainimage -->
	<div class="mainimage-overlay" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/car/car-main-bg.png);">
		<div class="mainimage-overlay__overlay"></div>
		<div class="mainimage-overlay__inner wrap__main">
			<div class="mainimage-overlay__h1wrap col-sm-60 col-xs-120">
				<h1 class="mainimage-overlay__h1"><?php echo $post->post_title ?></h1>
			</div>
			<div class="mainimage-overlay__slugwrap col-sm-60 col-xs-120">
				<span class="mainimage-overlay__slug"><?php echo $post->post_type ?></span>
			</div>
		</div>
	</div>

<!-- pan -->
	<div class="pan">
		<div class="pan__inner wrap__main">
			<div class="pan__item"><a href="../../">大阪の新車販売店【MONDAY -マンデー-】</a></div>
			<div class="pan__item"><a href="../">カーラインナップ</a></div>
			<div class="pan__item"><?php echo $post->post_title ?></div>
		</div>
	</div>

	<article id="Car" class="car" v-if="data">

		<div class="wrap__main">

			<header class="title-header">
				<h2 class="title__main">車両詳細</h2>
				<span class="title__main_after">detail</span>
			</header>

			<div class="col-sm-59 col-sm-push-61 col-xs-120 car-right">
				<div class="car-gallery">
					<div class="car-gallery__mainwrap">
						<div class="car-gallery__main" data-modal="lightbox">
							<img :src="mainimage" alt="" class="car-gallery__mainimage">
						</div>
					</div>
					<div class="car-gallery__thumbs">
						<div v-for="(image,index) in data.acf.gallery" class="car-gallery__thumb col-xs-27" :class="thumbCount(index)">
							<img :src="image.sizes.thumbnail" class="car-gallery__thumbiamge" @click="clickFunc(image.url)">
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-59 col-sm-pull-59 col-xs-120 car-left">
				<section class="section-box">
					<div class="section-box__inner car-free__inner">
						<div class="section-box__content car-free__content" v-html="data.acf.free"></div>
					</div>
				</section>

				<section class="car-box">
					<div class="car-komikomi">
						<span class="car-komikomi__label" :style="'background-color:'+data.price_detail.color">コミコミ</span>
						月々：
						<span class="car-komikomi__price" v-text="priceSep(data.price_detail.slug)"></span>
						万円～<small class="car-komikomi__small">（税別）</small>

					</div>
					<table class="table car-table">
						<tr v-if="data.acf.name">
							<td class="table__td_first car-table__first">車種</td>
							<td class="table__td_last" v-text="data.acf.name"></td>
						</tr>
						<tr v-if="data.acf.grade">
							<td class="table__td_first car-table__first">グレード</td>
							<td class="table__td_last" v-text="data.acf.grade"></td>
						</tr>
						<tr v-if="data.acf.bonus">
							<td class="table__td_first car-table__first">ボーナス</td>
							<td class="table__td_last">￥{{data.acf.bonus}}<small class="car-komikomi__small">（税込）</small></td>
						</tr>
						<tr v-if="data.acf.price">
							<td class="table__td_first car-table__first">車両価格</td>
							<td class="table__td_last">￥{{data.acf.price}}<small class="car-komikomi__small">（税込）</small></td>
						</tr>
						<tr v-if="data.acf.remaining">
							<td class="table__td_first car-table__first">残価</td>
							<td class="table__td_last">￥{{data.acf.remaining}}<small class="car-komikomi__small">（税別）</small></td>
						</tr>
						<tr v-if="data.acf.lease">
							<td class="table__td_first car-table__first">リース期間</td>
							<td class="table__td_last" v-text="data.acf.lease"></td>
						</tr>
						<tr v-if="data.acf.maker">
							<td class="table__td_first car-table__first">メーカーwebサイト</td>
							<td class="table__td_last"><a :href="data.acf.maker" target="_blank" v-text="data.acf.maker_name"></a></td>
						</tr>

					</table>
				</section>
			</div>


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

	
	<article class="car background__pattern">
		<div class="wrap__main padding__main">
			<header class="title-header">
				<h2 class="title__main">今月のおすすめラインナップ</h2>
				<span class="title__main_after">pickup lineup</span>
			</header>
			

			<section id="pickupCar" class="car-list-section" v-if="datas.length">
				<!-- <h2 class="title__main2 title__main2_type2" :style="'background-color:'+color">月々<span>1</span>万円～</h2> -->
				<div class="wrap__flex">
					<?php get_template_part( 'template', 'carlist' ); ?>
				</div>
				<div class="pager">
					<div class="pager__link" v-for="n in total" @click="Pager(n)" :class="{ pager__link_on : n==pager }" v-text="n"></div>
				</div>
			</section>


		</div>
	</article>


	<div id="MyModal" class="my-modal" v-if="state">
		<span class="my-modal__close" @click="close()"></span>
		<div class="my-modal__inner wrap__main" v-html="content"></div>
	</div>

<!-- modal cotnent / modal-{data-modalName}-content -->

	<div id="myLightbox" class="modal-lightbox-content modal-content">
		<img :src="content" class="mylightbox__image">
	</div>

</main>

<script>
	var post_id = "<?php the_id(); ?>";
	var perPage = 6;
	countTime = 5500
</script>

<?php get_footer();?>