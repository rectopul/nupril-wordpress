const fullBanner = document.querySelector('.fullBanner');

if(fullBanner) {
    //full banner swiper
    var bannerSwiper = new Swiper('.fullBanner__swiper', {
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
    });
}

//categories caroussel
//full banner swiper
var categoriesSwiper = new Swiper('.categories .swiper-container', {
    slidesPerView: 2,
    spaceBetween: 22,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    // Responsive breakpoints
    breakpoints: {
      // when window width is >= 480px
      480: {
        slidesPerView: 2,
        spaceBetween: 22
      },
      // when window width is >= 640px
      640: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      // when window width is >= 640px
      1024: {
        slidesPerView: 4,
        spaceBetween: 30
      }
    }
});

//first products
//first-products__products
var firstProducts = new Swiper('.first-products__products .swiper-container', {
  slidesPerView: 2,
  spaceBetween: 30,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

//timeline
//timeline
var timeline = new Swiper('.timeline .swiper-container', {
  slidesPerView: 2,
  spaceBetween: 50,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 480px
    480: {
      slidesPerView: 2,
      spaceBetween: 30
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 2,
      spaceBetween: 70
    },
    // when window width is >= 640px
    1024: {
      slidesPerView: 6,
      spaceBetween: 70
    }
  }
});

//categories-banner
var categoriesBanner = new Swiper('.categories-banner', {
  slidesPerView: 1,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});

//Api REST

const api = (() => {
  //facebook
  

  async function getFaceFeed(token, pageName) {
    
    const url = 'https://graph.facebook.com/v8.0/'+ pageName +
    '/posts?access_token='+ token +
    '&fields=permalink_url%2Cfull_picture.width(198).height(198)'+
    '&limit=15&callback='; 
    // Limit can be changed to suit your needs

    return new Promise((resolve, reject) => {
      try {
        fetch(url, {
          method: 'GET',
          headers: {
            'content-type': 'application/json',
          },
        })
          .then(r => r.json())
          .then(res => {
            if(res.error) return reject(res.error)
            resolve(res)
          })
          .catch(reject)
      } catch (error) {
        return reject(error)
      }
      
    })
  }

  function facebookLinkGenerator(url) {
    return new Promise((resolve, reject) => {
      const link = document.createElement('a')

      link.href = url

      link.setAttribute('target', '_blank')
      
      return resolve(link)
    })
  }

  function facebookImageGenerator(source) {

    return new Promise((resolve, reject) => {
      const image = document.createElement('img')

      image.src = source
      
      return resolve(image)
    })
    
  }


  async function faceFeed(token, pagename, selector) {
    try {

      const target = document.querySelector(selector + ' .socials__wrapper');

      if(!target) return 
      
      const feed = await getFaceFeed(token, pagename)


      const functionWithPromise = item => { //a function that returns a promise
        
        return Promise.resolve('ok')
      }

      const anAsyncFunction = async item => {
        try {

          console.log(item);

          const link  = await facebookLinkGenerator(item.permalink_url)

          const image = await facebookImageGenerator(item.full_picture)

          const figure = document.createElement('figure')

          figure.classList.add('swiper-slide')

          link.append(image)

          figure.append(link)

          return target.append(figure)
        } catch (error) {
          console.log(error)
        }

        return functionWithPromise(item)
      }

      //generate image
      

      await Promise.all(feed.data.map(anAsyncFunction))



      function theSwiper() {
        var faceSwiper = new Swiper(selector, {
          slidesPerView: 2,
          spaceBetween: 22,
          navigation: {
            nextEl: '.arrow-face-next',
            prevEl: '.arrow-face-prev',
          },
          // Responsive breakpoints
          breakpoints: {
            // when window width is >= 480px
            480: {
              slidesPerView: 2,
              spaceBetween: 22
            },
            // when window width is >= 640px
            640: {
              slidesPerView: 2,
              spaceBetween: 10
            },
            // when window width is >= 640px
            1024: {
              slidesPerView: 5,
              spaceBetween: 45
            }
          }
        });
      }

      theSwiper()
    } catch (error) {
      console.log(error)
    }
  }
  //instagram
  function getImagesInstagram(token, target, callback){
    return new Promise((resolve, reject) => {
      const feed = new Instafeed({
          accessToken: token,
          limit: 20,
          target,
          template: `
          <figure class="instagram__item swiper-slide">
            <a href="{{link}}" target="_blank"><img title="{{caption}}" src="{{image}}" /></a>
          </figure>`,
          after: callback,
          transform: function(item) {
              var d = new Date(item.timestamp);
              item.date = [d.getDate(), d.getMonth(), d.getYear()].join('/');
              return item;
          }
      });
      
      feed.run();
    })
  }

  async function getInstagram(selector, token) {
    try {
      const target = document.querySelector(selector);

      if(!target) return

      const output = target.querySelector('.swiper-wrapper');

      const photos = await getImagesInstagram(token, output, theSwiper)

      function theSwiper() {
        var instaSwiper = new Swiper(selector, {
          slidesPerView: 2,
          spaceBetween: 22,
          navigation: {
            nextEl: '.arrow-insta-next',
            prevEl: '.arrow-insta-prev',
          },
          // Responsive breakpoints
          breakpoints: {
            // when window width is >= 480px
            480: {
              slidesPerView: 2,
              spaceBetween: 22
            },
            // when window width is >= 640px
            640: {
              slidesPerView: 2,
              spaceBetween: 10
            },
            // when window width is >= 640px
            1024: {
              slidesPerView: 5,
              spaceBetween: 45
            }
          }
        });
      }

      
    } catch (error) {
      console.log(error)
    }
  }

  //private var/functions
  function handlePost(list) {
    
    const target = document.querySelector('.categoryList__posts');

    if(list.length < 1) return false

    list.map(async thePost => {
      const post = document.createElement('li')

      post.classList.add('col-lg-4', 'col-sm-6', 'col-xs-12')

      const { title, link, featured_media } = thePost

      const thumbnail = await getMedia(featured_media)

      
      const { post_category: image } = thumbnail.media_details.sizes

      post.innerHTML = `
      <a href="${link}">
          <figure class="post__image">
              <img src="${image.source_url}" alt="${thumbnail.title.rendered}">
              <?php the_post_thumbnail(get_the_id(), 'post_category'); ?>
          </figure>
          <h3>${title.rendered}</h3>
      </a>
      `

      target.append(post)
    })
    

    return true

  }

  function getMedia(id) {
    return new Promise((resolve, reject) => {

      fetch(`/wp-json/wp/v2/media/${id}`, {
        method: 'GET',
        headers: {
          'content-type': 'application/json',
        },
      })
        .then(r => r.json())
        .then(resolve)
        .catch(reject)
    })
  }

  function getPosts(id, offset) {
    return new Promise((resolve, reject) => {

      fetch(`/wp-json/wp/v2/posts?categories=${id}&offset=${offset}`, {
        method: 'GET',
        headers: {
          'content-type': 'application/json',
        },
      })
        .then(r => r.json())
        .then(resolve)
        .catch(reject)
    })
  }

  async function listPostsByCategory(btn) {
    try {
      const id = btn.dataset.id
      const page = btn.dataset.page
      const quantity = btn.dataset.quantity

      const offset = quantity * page

      const posts = await getPosts(id, offset)

      const infos = await handlePost(posts)

      if(infos == false) return showAlert('warning', `Todos os posts já foram exibidos`)

      btn.dataset.page = parseInt(page)+1

      //success

      return showAlert('success', `${posts.length} posts carregados`)

    } catch (error) {
      console.log(error)
    }
  }

  function showAlert(type, message) {
    const theAlert = document.createElement('div')

    theAlert.classList.add('alert', `alert-${type}`, 'alert-dismissible', 'fade', 'show')

    theAlert.setAttribute('role', 'alert')

    theAlert.innerHTML = `
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text"><strong>Alerta!</strong> ${message}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
    </button>
    `

    //check alert
    const bodyAlert = document.querySelector('.alert.alert-dismissible');

    if(bodyAlert) bodyAlert.remove()

    document.body.append(theAlert)

    return  setTimeout(() => {
      jQuery('.alert').alert('close')
    }, 4000);

    
  }

  function loadMorePosts(selector) {
    const btn = document.querySelector(selector);

    if(!btn) return 

    btn.addEventListener('click', function (e) {
      // body
      e.preventDefault();

      listPostsByCategory(btn)
    });
  }
  
  return {
    //public var/functions
    getPosts,
    listPostsByCategory,
    loadMorePosts,
    getInstagram,
    faceFeed
  }
})()

const btnLoadPosts = document.querySelector('.load-more-posts');

const faceTokenGenerated = `EAAFn8ZCiTCHcBAMOZAzCUAOWxsPs1jIG0SV5M7cNiezZAgZCEAfcVqJ0vKPDzNunxMOcW2TctQ4k3dL6kyGTPt1tIGLF3q3EQfNz87OTmxnKcbxYNZBaHeDC1I88CdXo0o943wf27yVMyNdYZBvfgy7SVa4YZCfvIKqKP25gbmoQJmZA9XtU6yVRo0q8n6PX8B7OsMZBvYzdLO0bOhe0nrbjk`

api.loadMorePosts('.load-more-posts')

api.faceFeed(
  faceTokenGenerated, 
  '102213031683298', 
  '.facebook__container'
)

api.getInstagram(
  '.instagram__list--container', 'IGQVJXaFhjX1dLaWY1cW16eV9fRUdMeXg5dDBXQlVIb19wSjZAvR3Vxby14UXRacEtEd3EyM09MQnluX2hSRFlXdzJxSXduUHVFcEFPbThpdlYzQmtiZAnFWTVM5cC1oSktOSWNrYjdVRllkVERLVlBBawZDZD'
)

//Youtube videos //youtube__container
//timeline
var youtubeCarrousel = new Swiper('.youtube__container', {
  slidesPerView: 1,
  spaceBetween: 20,
  navigation: {
    nextEl: '.arrow-youtube-next',
    prevEl: '.arrow-youtube-prev',
  },
  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 480px
    480: {
      slidesPerView: 1,
      spaceBetween: 20
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 2,
      spaceBetween: 10
    },
    // when window width is >= 640px
    1024: {
      slidesPerView: 3,
      spaceBetween: 47
    }
  }
});