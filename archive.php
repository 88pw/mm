<?php
/*
Template Name: アーカイブページ -
*/
?>

<?php get_header();?>

<main class="main">


	<div class="mainimage-overlay" style="background-image: url(../wp-content/themes/monday/assets/about/about-main-bg.png);">
		<div class="mainimage-overlay__overlay"></div>
		<div class="mainimage-overlay__inner wrap__main">
			<div class="mainimage-overlay__h1wrap col-sm-60 col-xs-120">
				<h1 class="mainimage-overlay__h1">ブログ一覧</h1>
			</div>
			<div class="mainimage-overlay__slugwrap col-sm-60 col-xs-120">
				<span class="mainimage-overlay__slug">blogs</span>
			</div>
		</div>
	</div>


	<!-- pan -->
		<div class="pan">
			<div class="pan__inner wrap__main">
				<div class="pan__item"><a href="../">大阪の新車販売店【マンデーオート - MONDAY AUTO】</a></div>
				<div class="pan__item">ブログ一覧</div>
			</div>
		</div>


  <div class="archives wrap__main padding__main" data-perpage="10" data-post_type="posts">

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

    <div class="content-pager">
      <a href="#top" v-if="pager > 1"><i class="fa fa-angle-left content-pager__arrow" aria-hidden="true" @click="Pager(pager-1)"></i></a>
      <a href="#top" class="content-pager__page" v-if="n-1 <= (dataBase.length/perPage)" v-for="n in total" @click="Pager(n)" :class="{'content-pager__page_active':n==1}" v-text="n"></a>
      <a href="#top" v-if="pager < total"><i class="fa fa-angle-right content-pager__arrow" aria-hidden="true" @click="Pager(pager+1)"></i></a>
    </div>

  </div>

</main>

<?php get_footer();?>