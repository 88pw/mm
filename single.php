<?php /* Template : ブログ詳細ページ  */ ?>


<?php get_header();?>

<main class="main">


	<div class="singlePage" data-post_type="posts" data-post_id="<?php echo $post->ID ?>">

		<div class="mainimage-overlay" style="background-image: url(../wp-content/themes/monday/assets/about/about-main-bg.png);" v-if="data">
			<div class="mainimage-overlay__overlay"></div>
			<div class="mainimage-overlay__inner wrap__main">
				<div class="mainimage-overlay__h1wrap col-sm-60 col-xs-120">
					<h1 class="mainimage-overlay__h1" v-text="data.title.rendered"></h1>
				</div>
				<div class="mainimage-overlay__slugwrap col-sm-60 col-xs-120">
					<span class="mainimage-overlay__slug" v-text="postDate(data,false)"></span>
				</div>
			</div>
		</div>

	<!-- pan -->
		<div class="pan content-single__pan" v-if="data">
			<div class="pan__inner wrap__main">
				<div class="pan__item"><a href="../">大阪の新車販売店【MONDAY -マンデー-】</a></div>
				<div class="pan__item"><a href="../blog/">ブログ一覧</a></div>
				<div class="pan__item" v-text="data.title.rendered"></div>
			</div>
		</div>

		<div class="background__pattern">

			<div class="wrap__main padding__main" v-if="data">
				<div class="content-single background__base padding__main">
					<div class="content-single__content" v-html="data.content.rendered"></div>
				</div>
			</div>

		</div>

	</div>

	<!-- お問い合わせ -->
		
		<div class="contact-bn background__gradient_redtowhite">
			<div class="wrap__main">
				<div class="contact-bn__imagewrap col-sm-40 col-xs-120">
					<img src="../wp-content/themes/monday/assets/contact-1.jpg" alt="MONDAYへのお問い合わせ">
				</div>
				<div class="contact-bn__imagewrap col-sm-40 col-xs-120">
					<img src="../wp-content/themes/monday/assets/contact-2.jpg" alt="MONDAYへのお問い合わせ">
				</div>
				<div class="contact-bn__imagewrap col-sm-40 col-xs-120">
					<a href="tel:0725432355">
						<img src="../wp-content/themes/monday/assets/contact-3.jpg" alt="MONDAYへのお問い合わせ">
					</a>
				</div>
			</div>
		</div>


  <div class="archives padding__main background__pattern" data-perpage="6" data-post_type="posts">
		
		<div class="wrap__main">
			<header class="title-header">
				<h2 class="title__main">最新ブログ</h2>
				<span class="title__main_after">NEW</span>
			</header>

	    <div id="top" class="wrap__flex" v-if="datas">

					<section v-for="(data,index) in datas" class="section-blog col-sm-59 col-xs-120 col-xs-push-0" :class="{ 'col-sm-push-2' : index % 2 == 1 }">
						<div class="section-blog__inner">
							<figure v-if="getImgUrl(data,'thumbnail')" class="section-blog__figure">
								<img :src="getImgUrl(data,'thumbnail')" :alt="data.title.rendered" class="section-blog__img">
							</figure>
							<div class="section-blog__content">
								<time class="section-blog__time" data-time="postDate(data,true)" v-text="postDate(data,false)"></time>
								<h3 class="section-blog__title"><a :href="data.link" v-text="data.title.rendered"></a></h3>
								<div class="section-blog__excerpt" v-html="description(data,100)"></div>
							</div>
						</div>
					</section>

	    </div>
			<div class="text__align_center">
				<a href="./blog/" class="btn">MONDAYブログ一覧</a>
			</div>
		</div>
</main>

<script>countTime = 2000</script>

<?php get_footer();?>