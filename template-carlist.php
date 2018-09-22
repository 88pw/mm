					<section class="car-list col-sm-38 col-xs-120" v-for="(car,index) in datas" :class="thumbCount(index)">
						<header class="car-list__header">
							<div class="car-list__category col-xs-42" :style="'background-color:'+car.price_detail.color">
								<span class="car-list__category_main">全部<b>コミコミ</b></span><br>
								<span class="car-list__category_num">{{priceSep(car.price_detail.slug)}}</span>
								<span class="car-list__category_sub">万円～</span>
							</div>
							<div class="car-list__title col-xs-76 col-xs-push-2">
								<p class="car-list__maker" v-text="car.maker_detail.name"></p>
								<h3 class="car-list__name" v-text="car.acf.name"></h3>
							</div>
						</header>
						<div class="car-list__content">
							<a :href="car.link">
								<figure class="car-list__figure" :style="'background-image:url('+car.acf.gallery[0].url+')'">
									<img :src="car.maker_detail.logo" :alt="car.maker_detail.name" class="car-list__makerlogo">
								</figure>
							</a>
							<a :href="car.link"><div class="car-list__overlay"></div></a>
						</div>
					</section>