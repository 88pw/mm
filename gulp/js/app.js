import Vue from 'vue'
import axios from 'axios'
import Slick from 'vue-slick'
import loader from './loader.vue'

/*******************
  load
*******************/

// window.onload = () =>{
//   setInterval(()=>{
//     document.getElementById('preLoader').classList.add('preloader__remove')
//   },500)
// }


/*******************
  Fixed header
*******************/

window.onscroll = () => {
  const el = document.querySelector('.header__inner')
  const readyClass = 'header__state_ready'
  const fixedClass = 'header__state_fixed'
  if(document.documentElement.scrollTop > 299 || document.body.scrollTop > 299){
    el.classList.add(readyClass)
  }else{
    el.classList.remove(readyClass)
  }
  if(document.documentElement.scrollTop > 300 || document.body.scrollTop > 300){
    el.classList.add(fixedClass)
  }else{
    el.classList.remove(fixedClass)
  }
}

/*******************
  Nav
*******************/

const nav_el = document.querySelector('.header__nav_icon')
const nav_state_class = 'header__nav_state_on'
const nav_target_class = '.header__nav'
const nav_close_class = '.header__nav_close'
const nav_icon_class = 'header__nav_icon_on'


nav_el.addEventListener('click',()=>{
  if(document.querySelector('.'+ nav_state_class) == null){
    document.querySelector(nav_target_class).classList.add(nav_state_class)
    nav_el.classList.add(nav_icon_class)
  }else{
    document.querySelector(nav_target_class).classList.remove(nav_state_class)
    nav_el.classList.remove(nav_icon_class)
  }
},false)

document.querySelector(nav_close_class).addEventListener('click',()=>{
  document.querySelector(nav_target_class).classList.remove(nav_state_class)
},false)


/*******************
  pictureCunstom
*******************/

let pictureCunstom = (el,num=1) => {
  const picture = document.querySelectorAll(el)
  Array.from(picture).forEach((v,i)=>{
    v.style.minHeight = Math.round(v.clientWidth / num)+'px'
  })
}
let pictureCunstomMax = (el,num=1) => {
  const picture = document.querySelectorAll(el)
  Array.from(picture).forEach((v,i)=>{
    v.style.height = Math.round(v.clientWidth / num)+'px'
  })
}

pictureCunstom('.horizon','2')
pictureCunstom('.car-list__figure','1.486')
pictureCunstomMax('.car-gallery__main','1.3')


/*******************
  car-single
*******************/

if (document.getElementById('Car')) {
  const carInstance = new Vue({
    el: "#Car",
    data() {
      return {
        data: null,
        errors: [],
        mainimage: '',
      };
    },
    methods: {
      priceSep(price){
        if(price.indexOf('_') != -1){
          price = price.split('_')[0]+'.'+price.split('_')[1]
        }
        return price
      },
      thumbCount(i){
        if( i % 4 != 0 || i != 0){
          if(i<4){
            return 'col-xs-push-'+i*4
          }else{
            return 'col-xs-push-'+(i%4)*4
          }
        }
      },
      clickFunc(data){
        this.mainimage = data
        myLightbox.content = data
      }
    },
    mounted(){
      axios.get(BASEURL + 'car/'+post_id)
      .then( (res) => {
        this.data = res.data
        this.$nextTick(()=>{
          this.mainimage = this.data.acf.gallery[0].url
          myLightbox.content = this.data.acf.gallery[0].url
        })
      })
    }
  })
}

/*******************
  car-list
*******************/

if (document.getElementById('carList')) {
  const carListInstance = new Vue({
    el: "#carList",
    data() {
      return {
        datas: [],
        price: 0,
        mainimage: '',
      };
    },
    methods: {
      priceSep(price){
        if(price.indexOf('_') != -1){
          price = price.split('_')[0]+'.'+price.split('_')[1]
        }
        return price
      },
      thumbCount(i){
        if( i % 3 != 0 || i != 0){
          if(i<3){
            return 'col-sm-push-'+i*3
          }else{
            return 'col-sm-push-'+(i%3)*3
          }
        }
      }
    },
    mounted(){
      axios.get(BASEURL + 'car?_embed&per_page=100&price=1')
      .then( (res) => {
        this.datas = res.data
      })
    }
  })
}



/*******************
  carousel
*******************/

if (document.getElementById('topCar')) {
  const topCarInstance = new Vue({
    el: "#topCar",
    components: {
      Slick,
      loader
    },
    data() {
      return {
        datas: [],
        carIds: [],
        flag: false,
        slickOptions: {
          slidesToShow: 6,
          slidesToScroll: 3,
          centerMode: true,
          centerPadding: '0px',
          autoplay: true,
          autoplaySpeed: 2000,
          arrows: false,
          // fade: true,
          responsive: [
            {
              breakpoint: 1330,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 480,      // 〜479px
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            }
          ],
        },
      }
    },
    mounted(){
      axios(BASEURL + 'pages?slug=home')
      .then( (res) =>{
        this.carIds = res.data[0].acf.pickup_top
        this.$nextTick(()=>{
          for(let x of this.carIds){
            axios(BASEURL + 'car/'+x.car)
            .then((res)=>{
              this.datas.push(res.data)
              this.$nextTick(()=>{
                pictureCunstom('.car-list__figure','1.486')
              })
              this.flag = true
            })
          }
        })
      })
    },
    beforeUpdate() {
      if (this.$refs.slick) this.$refs.slick.destroy()
    },
    updated() {
      if (this.$refs.slick && !this.$refs.slick.$el.classList.contains('slick-initialized')) this.$refs.slick.create()
    },
    methods: {
      next() {
        this.$refs.slick.next()
      },
      prev() {
        this.$refs.slick.prev()
      },
      reInit() {
        // Helpful if you have to deal with v-for to update dynamic lists
        this.$nextTick(() => {
          this.$refs.slick.reSlick()
        })
      },
      priceSep(price){
        if(price.indexOf('_') != -1){
          price = price.split('_')[0]+'.'+price.split('_')[1]
        }
        return price
      }
    },
  })
}

/*******************
  carousel
*******************/

if (document.getElementById('slider')) {
  const sliderInstance = new Vue({
    el: "#slider",
    components: {
      Slick,
    },
    data() {
      return {
        datas: [],
        slickOptions: {
          slidesToShow: 1,
          centerMode: true,
          centerPadding: '0px',
          autoplay: true,
          arrows: false,
          fade: true,
        },
      }
    },
    mounted(){
    },
    methods: {
      next() {
        this.$refs.slick.next()
      },
      prev() {
        this.$refs.slick.prev()
      },
      reInit() {
        // Helpful if you have to deal with v-for to update dynamic lists
        this.$nextTick(() => {
          this.$refs.slick.reSlick()
        })
      },
    },
  })
}



/*******************
  pickupCar
*******************/

if (document.getElementById('pickupCar')) {
  const pickupCar_5Instance = new Vue({
    el: "#pickupCar",
    data() {
      return {
        dataOrigin: [],
        datas: [],
        carIds: [],
        price: 0,
        mainimage: '',
        pager: 1,
        total: 1,
        color: '',
        segment: 5,
      };
    },
    methods: {
      priceSep(price){
        if(price.indexOf('_') != -1){
          price = price.split('_')[0]+'.'+price.split('_')[1]
        }
        return price
      },
      thumbCount(i){
        if( i % 3 != 0 || i != 0){
          if(i<3){
            return 'col-sm-push-'+i*3
          }else{
            return 'col-sm-push-'+(i%3)*3
          }
        }
      },
      Pager(n){
        this.pager = n
        window.location.hash = this.$el.id
      }
    },
    mounted(){
      axios(BASEURL + 'pages?slug=home')
      .then( (res) =>{
        this.carIds = res.data[0].acf.pickup_detail
        this.$nextTick(()=>{
          for(let x of this.carIds){
            axios(BASEURL + 'car/'+x.car)
            .then((res)=>{
              this.datas.push(res.data)
              this.dataOrigin.push(res.data)
              this.$nextTick(()=>{
                this.color = this.datas[0].price_detail.color
                this.total = Math.ceil(this.dataOrigin.length / perPage)
                this.datas = this.dataOrigin.slice(0,perPage)
              })
            })
          }
        })
      })
    },
    watch: {
      pager() {
        let before = 0
        let after = 0
        before = this.pager==1 ? this.pager-1 : (this.pager-1)*perPage
        if(this.pager*perPage > this.dataOrigin.length){
          after = this.dataOrigin.length
        }else{
          after  = this.pager==1 ? this.pager*perPage : this.pager*perPage
        }
        this.datas = this.dataOrigin.slice(before,after)
      }
    }
  })
}


if(document.getElementsByClassName('carLists')){
  Array.from(document.getElementsByClassName('carLists')).map((x,i)=>{
    const carListsInstance = new Vue({
      el: ".carLists",
      data() {
        return {
          dataOrigin: [],
          datas: [],
          price: 0,
          mainimage: '',
          pager: 1,
          total: 1,
          color: '',
          segment: x.dataset.id,
        };
      },
      methods: {
        priceSep(price){
          if(price.indexOf('_') != -1){
            price = price.split('_')[0]+'.'+price.split('_')[1]
          }
          return price
        },
        thumbCount(i){
          if( i % 3 != 0 || i != 0){
            if(i<3){
              return 'col-sm-push-'+i*3
            }else{
              return 'col-sm-push-'+(i%3)*3
            }
          }
        },
        Pager(n,id = x.id){
          this.pager = n
          window.location.hash = id
        }
      },
      mounted(){
        axios.get(BASEURL + 'car?_embed&per_page=100&price='+this.segment)
        .then( (res) => {
          this.datas = res.data
          this.dataOrigin = res.data
          this.$nextTick(()=>{
            this.color = this.datas[0].price_detail.color
            this.total = Math.ceil(this.dataOrigin.length / perPage)
            this.datas = this.dataOrigin.slice(0,perPage)
          })
        })
      },
      watch: {
        pager() {
          let before = 0
          let after = 0
          before = this.pager==1 ? this.pager-1 : (this.pager-1)*perPage
          if(this.pager*perPage > this.dataOrigin.length){
            after = this.dataOrigin.length
          }else{
            after  = this.pager==1 ? this.pager*perPage : this.pager*perPage
          }
          this.datas = this.dataOrigin.slice(before,after)
        }
      }
    })
  })
}

if(document.getElementsByClassName('carListsKomikomi')){
  Array.from(document.getElementsByClassName('carListsKomikomi')).map((x,i)=>{
    const carListsKomikomiInstance = new Vue({
      el: ".carListsKomikomi",
      data() {
        return {
          datas: [],
          color: '',
          segment: x.dataset.id,
        };
      },
      methods: {
        priceSep(price){
          if(price.indexOf('_') != -1){
            price = price.split('_')[0]+'.'+price.split('_')[1]
          }
          return price
        },
        thumbCount(i){
          if( i % 4 != 0 || i != 0){
            if(i<4){
              return 'col-sm-push-'+i*1
            }else{
              return 'col-sm-push-'+(i%4)*1
            }
          }
        },

      },
      mounted(){
        axios.get(BASEURL + 'car?_embed&per_page=4&price='+this.segment)
        .then( (res) => {
          this.datas = res.data
          this.$nextTick(()=>{
            this.color = this.datas[0].price_detail.color
          })
        })
      },
    })
  })
}

/*******************
  MyModal
*******************/

if (document.getElementById('MyModal')) {
  var myModal = new Vue({
    el: '#MyModal',
    data() {
      return {
        state: false,
        content: '',
      }
    },
    methods: {
      close(){
        this.content = ''
        this.state   = false
      },
    },
    mounted(){
    },
    watch: {
      content() {
        this.state = this.content ? true : false
      }
    }
  })
}

if (document.getElementById('myLightbox')) {
  var myLightbox = new Vue({
    el: '#myLightbox',
    data() {
      return {
        content: '',
      }
    }
  })
}

let myModalClick = () => {
  document.addEventListener('click', (e) => {
    if(e.target.parentNode.dataset.modal){
      let myModalClass   = '.modal-'+e.target.parentNode.dataset.modal+'-content'
      let myModalElement = document.querySelector(myModalClass).innerHTML
      myModal.content = myModalElement
    }
  })
}

myModalClick()



/*******************
  Blog archive
*******************/

if(document.getElementsByClassName('blogs')){
  Array.from(document.getElementsByClassName('blogs')).map((x,i)=>{
    const blogsInstance = new Vue({
      el: ".blogs",
      data() {
        return {
          dataOrigin: [],
          datas: [],
          pager: 1,
          total: 1,
          pageTotal: 0,
          totalPosts: 0,
        };
      },
      components:{
        loader
      },
      methods: {
        Pager(n){
          this.pager = n
        },
        getPosts(page){
          const promise = new Promise((resolve, reject) => {
            axios.get(BASEURL + 'posts?_embed&page='+page)
            .then( (res) => {
              this.$nextTick(()=>{
                resolve(res.data)
              })
            })
          })
          return promise
        },
        description(data,length) {
          const text = data.content.rendered.replace(/<("[^"]*"|'[^']*'|[^'">])*>/g,'').replace(/\&nbsp\;/g,'')
          return text.length > length ? text.slice(0,length)+'…' : text
        },
        getImgUrl(data,imagesize){
          if(data._embedded && 
             data._embedded['wp:featuredmedia'] &&
             data._embedded['wp:featuredmedia'][0].media_details &&
             data._embedded['wp:featuredmedia'][0].media_details.sizes[imagesize]){
            return data._embedded['wp:featuredmedia'][0].media_details.sizes[imagesize].source_url
          }else{
            return false
          }
        },
        postDate(data,flag) {
          const dateArray = data.date.split('-');
          const y = dateArray[0];
          const m = dateArray[1];
          const d = dateArray[2].split("T")[0];
          return flag ? y+m+d : y + "年" + m + "月" + d + "日";
        },
      },
      mounted(){
        axios.get(BASEURL + 'posts?_embed&page=1')
        .then( (res) => {
          this.pageTotal  = res['headers']['x-wp-totalpages']
          this.dataOrigin = res.data
          this.datas = this.dataOrigin.slice(0,perPage)
          this.total = Math.ceil(res['headers']['x-wp-total'] / perPage)
          this.$nextTick(()=>{
            (async () => {
              for (var i = 2; i <= (this.pageTotal); i++) {
                const result = await this.getPosts(i)
                result.map((x)=>this.dataOrigin.push(x))
              }
            })()
          })
        })
      },
      watch: {
        pager() {
          let before = 0
          let after = 0
          before = this.pager==1 ? this.pager-1 : (this.pager-1)*perPage
          if(this.pager*perPage > this.dataOrigin.length){
            after = this.dataOrigin.length
          }else{
            after  = this.pager==1 ? this.pager*perPage : this.pager*perPage
          }
          this.datas = this.dataOrigin.slice(before,after)
        }
      }
    })
  })
}



/*******************
  archives
*******************/

if(document.getElementsByClassName('archives')){
  Array.from(document.getElementsByClassName('archives')).map((x,i)=>{
    const archivesInstance = new Vue({
      el: ".archives",
      data() {
        return {
          dataOrigin: [],
          datas: [],
          dataBase: [],
          pager: 1,
          total: 1,
          category:[],
          searchCategory: [],
          flag: true,
          totalPost: 0,
          searchFlag: false,

          perPage: 0,
          post_type: "",
          taxonomy: "",
          query: "",
        }
      },
      components:{
        loader
      },
      methods: {
        Pager(n){
          this.$el.getElementsByClassName('content-pager__page')[this.pager-1].classList.remove('content-pager__page_active')
          this.pager = n
          this.$el.getElementsByClassName('content-pager__page')[this.pager-1].classList.add('content-pager__page_active')
        },
        getPosts(page){
          const promise = new Promise((resolve, reject) => {
            axios.get(BASEURL + this.post_type +'?_embed&page='+page+this.query)
            .then( (res) => {
              this.$nextTick(()=>{
                resolve(res.data)
              })
            })
          })
          return promise
        },
        description(data,length) {
          const text = data.content.rendered.replace(/<("[^"]*"|'[^']*'|[^'">])*>/g,'').replace(/\&nbsp\;/g,'')
          return text.length > length ? text.slice(0,length)+'…' : text
        },
        getImgUrl(data,imagesize){
          if(data._embedded && 
             data._embedded['wp:featuredmedia'] &&
             data._embedded['wp:featuredmedia'][0].media_details &&
             data._embedded['wp:featuredmedia'][0].media_details.sizes[imagesize]){
            return data._embedded['wp:featuredmedia'][0].media_details.sizes[imagesize].source_url
          }else{
            return false
          }
        },
        postDate(data,flag) {
          const dateArray = data.date.split('-');
          const y = dateArray[0];
          const m = dateArray[1];
          const d = dateArray[2].split("T")[0];
          return flag ? y+m+d : y + "年" + m + "月" + d + "日";
        },
      },
      mounted(){
        if(typeof this.$el.dataset.perpage !== 'undefined') this.perPage = this.$el.dataset.perpage
        // if(typeof this.$el.dataset.taxonomy !== 'undefined') this.taxonomy = this.$el.dataset.taxonomy
        if(typeof this.$el.dataset.post_type !== 'undefined') this.post_type = this.$el.dataset.post_type
        // if(typeof this.$el.dataset.query !== 'undefined') this.query = this.$el.dataset.query

        // if(this.taxonomy){
        //   axios.get(BASEURL + this.taxonomy + '?per_page=100')
        //   .then( (res) => {
        //     this.category = res.data.filter((x)=>{return x.name != "未分類"})
        //   })
        // }


        axios.get(BASEURL + this.post_type +'?_embed&page=1'+this.query)
        .then( (res) => {
          this.dataOrigin = res.data
          this.datas = this.dataOrigin.slice(0,this.perPage)
          this.total = Math.ceil(res['headers']['x-wp-total'] / this.perPage)
          this.totalPost = res['headers']['x-wp-total']
          this.$nextTick(()=>{
            (async () => {
              for (var i = 2; i <= (res['headers']['x-wp-totalpages']); i++) {
                const result = await this.getPosts(i)
                result.map((x)=>this.dataOrigin.push(x))
              }
              this.searchFlag = true
              if(!res.data.length) this.flag = false
              this.dataBase = this.dataOrigin
            })()
          })
        })

      },
      watch: {
        pager() {
          let before = 0
          let after = 0
          before = this.pager==1 ? this.pager-1 : (this.pager-1)*this.perPage
          if(this.pager*this.perPage > this.dataBase.length){
            after = this.dataBase.length
          }else{
            after  = this.pager==1 ? this.pager*this.perPage : this.pager*this.perPage
          }
          this.datas = this.dataBase.slice(before,after)
        },
        searchCategory() {
          if(this.dataBase.length > this.perPage){
            this.$el.getElementsByClassName('content-pager__page_active')[0].classList.remove('content-pager__page_active')
            this.pager = 1
            this.$el.getElementsByClassName('content-pager__page')[0].classList.add('content-pager__page_active')
          }
          if(this.searchCategory.length==0){
            this.dataBase = this.dataOrigin
            this.datas = this.dataBase.slice(0,this.perPage)
            this.total = Math.ceil(this.dataBase.length / this.perPage)
          }else{
            let tax = this.taxonomy
            this.dataBase = this.dataOrigin.filter((x)=>{
              let array1 = x[tax].concat(this.searchCategory)
              let array2 = Array.from(new Set(array1))
              return array1.length != array2.length
            })
            this.total = Math.ceil(this.dataBase.length / this.perPage)
            this.datas = this.dataBase.slice(0,this.perPage)
          }
          this.flag = this.datas.length ? true : false
        }
      }
    })
  })
}



/*******************
  Single
*******************/

if(document.getElementsByClassName('singlePage')){
  Array.from(document.getElementsByClassName('singlePage')).map((x,i)=>{
    const archivesInstance = new Vue({
      el: ".singlePage",
      data() {
        return {
          data: null,
          post_id: 0,
          post_type: '',
        }
      },
      methods: {
        description(data,length) {
          const text = data.content.rendered.replace(/<("[^"]*"|'[^']*'|[^'">])*>/g,'').replace(/\&nbsp\;/g,'')
          return text.length > length ? text.slice(0,length)+'…' : text
        },
        getImgUrl(data,imagesize){
          if(data._embedded && 
             data._embedded['wp:featuredmedia'] &&
             data._embedded['wp:featuredmedia'][0].media_details &&
             data._embedded['wp:featuredmedia'][0].media_details.sizes[imagesize]){
            return data._embedded['wp:featuredmedia'][0].media_details.sizes[imagesize].source_url
          }else{
            return false
          }
        },
        postDate(data,flag) {
          const dateArray = data.date.split('-');
          const y = dateArray[0];
          const m = dateArray[1];
          const d = dateArray[2].split("T")[0];
          return flag ? y+m+d : y + "年" + m + "月" + d + "日";
        },
      },
      mounted(){
        if(typeof this.$el.dataset.post_id !== 'undefined') this.post_id = this.$el.dataset.post_id
        if(typeof this.$el.dataset.post_type !== 'undefined') this.post_type = this.$el.dataset.post_type
        axios.get(BASEURL + this.post_type +'/'+ this.post_id +'/?_embed')
        .then( (res) => {
          this.data = res.data
        })
      }
    })
  })
}


