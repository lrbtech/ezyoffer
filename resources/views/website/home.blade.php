@extends('website.layout')
@section('css')
 <style>
        .form-search-wrap {
    background: rgba(255,255,255,.3);
    border-radius: 7px;
    padding: 20px;
}
.rounded {
    border-radius: 0.25rem!important;
}
.form-control {
    height: 43px;
    border-radius: 0;
    font-family: nanum gothic,-apple-system,BlinkMacSystemFont,segoe ui,Roboto,helvetica neue,Arial,sans-serif,apple color emoji,segoe ui emoji,segoe ui symbol,noto color emoji;
}
[data-aos^=fade][data-aos^=fade].aos-animate {
    opacity: 1;
    transform: translate(0);
}
body[data-aos-duration="800"] [data-aos] {
    transition-duration: .8s;
}
.listing-item {
    position: relative;
    overflow: hidden;
    border-radius: 4px;
}
.listing-item .listing-item-content {
    position: absolute;
    bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    z-index: 2;
    width: 100%;
}
.listing-item .bookmark {
    position: absolute;
    right: 20px;
    bottom: 0;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: inline-block;
    background: rgba(255,255,255,.3);
    -webkit-transition: .3s all ease;
    -o-transition: .3s all ease;
    transition: .3s all ease;
}
.listing-item .listing-item-content .category {
    font-size: 12px;
    display: inline-block;
    padding: 5px 30px;
    background: #30e3ca;
    border-radius: 30px;
    color: #fff;
}
.pl-3, .px-3 {
    padding-left: 1rem!important;
}
.listing-item .listing-item-content h2, .listing-item .listing-item-content h2 a {
    color: #fff;
}
.listing-item .listing-item-content h2 {
    font-size: 20px;
}
.listing-item .listing-item-content .address {
    color: rgba(255,255,255,.8);
    font-size: 14px;
}
.listing-item .listing-item-content h2, .listing-item .listing-item-content h2 a {
    color: #fff;
}
.listing-item:after {
    position: absolute;
    content: "";
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    z-index: 1;
    background: rgba(0,0,0,.4);
}
.bg-light {
    background: #ccc;
}
.border-primary {
    position: relative;
}
.text-left {
    text-align: left!important;
}
.border-primary {
    border-color: #30e3ca!important;
}
.border-primary h2 {
    font-weight: 700!important;
}
.border-primary:after {
    position: absolute;
    content: "";
    bottom: 0;
    width: 80px;
    height: 3px;
    background: #30e3ca;
}
.listing {
    -webkit-box-shadow: 0 2px 20px -2px rgb(0 0 0 / 10%);
    box-shadow: 0 2px 20px -2px rgb(0 0 0 / 10%);
    margin-bottom: 30px;
    border-radius: 7px;
    position: relative;
    background: #fff;
}
/* @media (min-width: 992px)
.listing {
    border-top-right-radius: 7px;
    border-bottom-right-radius: 7px;
} */
.listing .img {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
    margin-right: 10px;
    border-top-left-radius: 7px;
    border-bottom-left-radius: 7px;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 230px;
    flex: 0 0 230px;
}
.listing .lh-content {
    padding: 20px;
    position: relative;
    width: 100%;
}
.listing .category {
    font-size: 11px;
    display: inline-block;
    padding: 5px 20px;
    background: #e9ecef;
    border-radius: 30px;
    margin-bottom: 20px;
    color: #000;
    font-weight: 700;
}
.listing .lh-content .bookmark {
    position: absolute;
    right: 20px;
    top: 20px;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: inline-block;
    background: rgba(0,0,0,.03);
    -webkit-transition: .3s all ease;
    -o-transition: .3s all ease;
    transition: .3s all ease;
    font-size: 16px;
}
.listing .lh-content .bookmark span {
    position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
}
.icon-heart:before {
    content: "\f004";
}
.listing h3 {
    font-size: 16px!important;
}
.listing address, .listing .review {
    font-size: 13px;
}
address {
    margin-bottom: 1rem;
    font-style: normal;
    line-height: inherit;
}
.mb-0, .my-0 {
    margin-bottom: 0!important;
}
.listing .lh-content .bookmark {
    position: absolute;
    right: 20px;
    top: 20px;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: inline-block;
    background: rgba(0,0,0,.03);
    -webkit-transition: .3s all ease;
    -o-transition: .3s all ease;
    transition: .3s all ease;
    font-size: 16px;
}
[class^=icon-], [class*=" icon-"] {
    font-family: icomoon!important;
    speak: none;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.text-warning {
    color: #f89d13!important;
}
[class^=icon-], [class*=" icon-"] {
    font-family: icomoon!important;
    speak: none;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.owlthree-item:after {
    position: absolute;
    content: "";
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    z-index: 1;
    background: rgba(0,0,0,.4);
    padding: 5px;
}
 :root{
  --background-dark: #2d3548;
  --text-light: rgba(255,255,255,0.6);
  --text-lighter: rgba(255,255,255,0.9);
  --spacing-s: 8px;
  --spacing-m: 16px;
  --spacing-l: 24px;
  --spacing-xl: 32px;
  --spacing-xxl: 64px;
  --width-container: 1200px;
}

.hero-section{
  align-items: flex-start;
  background-image: linear-gradient(15deg, #333 0%, #ffffff 190%);
  display: flex;
  min-height: 100%;
  justify-content: center;
  padding: var(--spacing-xxl) var(--spacing-l);
}

.card-grid{
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  grid-column-gap: var(--spacing-l);
  grid-row-gap: var(--spacing-l);
  max-width: var(--width-container);
  width: 100%;
}

@media(min-width: 540px){
  .card-grid{
    grid-template-columns: repeat(2, 1fr); 
  }
}

@media(min-width: 960px){
  .card-grid{
    grid-template-columns: repeat(6, 1fr); 
  }
}

.cards{
  list-style: none;
  position: relative;
}

.cards:before{
  content: '';
  display: block;
  padding-bottom: 150%;
  width: 100%;
}

.card__background{
  background-size: cover;
  background-position: center;
  border-radius: var(--spacing-l);
  bottom: 0;
  filter: brightness(0.75) saturate(1.2) contrast(0.85);
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  transform-origin: center;
  trsnsform: scale(1) translateZ(0);
  transition: 
    filter 200ms linear,
    transform 200ms linear;
}

.cards:hover .card__background{
  transform: scale(1.05) translateZ(0);
}

.card-grid:hover > .cards:not(:hover) .card__background{
  filter: brightness(0.5) saturate(0) contrast(1.2) blur(20px);
}

.card__content{
  left: 0;
  padding: var(--spacing-l);
  position: absolute;
  top: 0;
}

.card__category{
  color: var(--text-light);
  font-size: 0.9rem;
  margin-bottom: var(--spacing-s);
  text-transform: uppercase;
}

.card__heading{
  color: var(--text-lighter);
  font-size: 1.2rem;
  text-shadow: 2px 2px 20px rgba(0,0,0,0.2);
  line-height: 1.4;
  word-spacing: 100vw;
}
    </style>
@endsection
@section('section')
      <section class="hero-section">
  <div class="card-grid ">
    <a class="cards" href="#">
      <div class="card__background" style="background-image: url(https://images.unsplash.com/photo-1557177324-56c542165309?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">Example Card Heading</h3>
      </div>
    </a>
    <a class="cards" href="#">
      <div class="card__background" style="background-image: url(https://images.unsplash.com/photo-1557187666-4fd70cf76254?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">Example Card Heading</h3>
      </div>
    </a>
    <a class="cards" href="#">
      <div class="card__background" style="background-image: url(https://images.unsplash.com/photo-1556680262-9990363a3e6d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">Example Card Heading</h3>
      </div>
    </a>
      <a class="cards" href="#">
      <div class="card__background" style="background-image: url(https://images.unsplash.com/photo-1557177324-56c542165309?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">Example Card Heading</h3>
      </div>
    </a>
    <a class="cards" href="#">
      <div class="card__background" style="background-image: url(https://images.unsplash.com/photo-1557004396-66e4174d7bf6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">Example Card Heading</h3>
      </div>
    </a>
       <a class="cards" href="#">
      <div class="card__background" style="background-image: url(https://images.unsplash.com/photo-1557187666-4fd70cf76254?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">Example Card Heading</h3>
      </div>
    </a>
  <div>
</section>
<div class="ps-main-banner">
        <div id="owl-first" class="owl-carousel owl-theme">
            <div class="item">
                <div class="ps-banner-img">
                    <figure><img src="images/home-big-banner2.jpg" alt="Image Description"></figure>
                </div>
            </div>
            {{-- <div class="item">
                <div class="ps-banner-img">
                    <figure><img src="images/banner2.jpg" alt="Image Description"></figure>
                </div>
            </div>
            <div class="item">
                <div class="ps-banner-img">
                    <figure><img src="images/banner3.jpg" alt="Image Description"></figure>
                </div>
            </div>
            <div class="item">
                <div class="ps-banner-img">
                    <figure><img src="images/banner4.jpg" alt="Image Description"></figure>
                </div>
            </div>
            <div class="item">
                <div class="ps-banner-img">
                    <figure><img src="images/banner5.jpg" alt="Image Description"></figure>
                </div>
            </div>
            <div class="item">
                <div class="ps-banner-img">
                    <figure><img src="images/banner6.jpg" alt="Image Description"></figure>
                </div>
            </div> --}}
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="ps-main-banner-content">
                        <div class="ps-main-banner-text animate" data-animate="fadeInLeft">
                            <h1><span>Search, Sell & Buy</span> That's <span>All We Do</span></h1>
                            <p>Consectetur adipisicing eliteiuim seteiusmod tempor incididunt utnae labore etnalom magna aliqua udiminimate</p>        
                        </div>
                        {{-- <form class="ps-form animate" data-animate="fadeInRight">
                            <div class="ps-form__input"><input class="form-control" placeholder="What Are You Looking For?"></div>
                            <div>
                                <div class="ps-geo-location ps-location">
                                    <input type="text" class="form-control" placeholder="Location*">
                                    <a href="javascript:void(0);" class="ps-location-icon ps-index-icon"><i class="ti-target"></i></a>
                                    <a href="javascript:void(0);" class="ps-arrow-icon ps-index-icon"><i class="ti-angle-down"></i></a>
                                    <div class="ps-distance">
                                        <div class="ps-distance__description">
                                            <label for="amountfour">Distance:</label>
                                            <input type="text" id="amountfour" readonly>
                                        </div>                                           
                                        <div id="slider-range-min"></div>
                                    </div>
                                </div>                                  
                                <button class="btn ps-btn">Search Now</button>
                            </div>
                        </form> --}}
<div class="form-search-wrap aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
<form method="post"></form>
<div class="row align-items-center">
<div class="col-lg-12 mb-4 mb-xl-0 col-xl-4">
<input type="text" class="form-control rounded" placeholder="What are you looking for?">
</div>
<div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
<div class="wrap-icon">
<span class="icon icon-room"></span>
<input type="text" class="form-control rounded" placeholder="Location">
</div>
</div>
<div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
<div class="select-wrap">
<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
<select class="form-control rounded" name="" id="">
<option value="">All Categories</option>
<option value="">Real Estate</option>
<option value="">Books &amp; Magazines</option>
<option value="">Furniture</option>
<option value="">Electronics</option>
<option value="">Cars &amp; Vehicles</option>
<option value="">Others</option>
</select>
</div>
</div>
<div class="col-lg-12 col-xl-2 ml-auto text-right">
<input type="submit" class="btn btn-primary btn-block rounded" value="Search">
</div>
</div>
</form>
</div>
                        <div class="ps-banner-down-content">
                            <h6 class="animate" data-animate="fadeInTop">Start With Top Searched Categories:</h6>
                            <figure class="animate" data-animate="swing">
                                <img src="images/arrowcurve.png" alt="Image Description">
                            </figure>
                            <div class="ps-banner--line animate" data-animate="fadeInBottom">
                                <div class="ps-banner__line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>             
        </div>
        {{-- <div id="owl-one" class="ps-slider owl-carousel owl-theme">
            <div class="item">
                <div class="ps-slider--category">
                    <div class="ps-slider--circle">
                        <figure><img src="images/phone.png" alt="Image Description"></figure>
                        <div></div>
                    </div>
                    <div class="ps-category__title">
                        <h6>Mobiles/Tablets</h6>
                        <p>35523 Items</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ps-slider--category">
                    <div class="ps-slider--circle">
                        <figure><img src="images/car.png" alt="Image Description"></figure>
                        <div></div>
                    </div>
                    <div class="ps-category__title">
                        <h6>Vehicles</h6>
                        <p>122563 Items</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ps-slider--category">
                    <div class="ps-slider--circle">
                        <figure><img src="images/home.png" alt="Image Description"></figure>
                        <div></div>
                    </div>
                    <div class="ps-category__title">
                        <h6>Property for Sale</h6>
                        <p>52257 Items</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ps-slider--category">
                    <div class="ps-slider--circle">
                        <figure><img src="images/rent.png" alt="Image Description"></figure>
                        <div></div>
                    </div>
                    <div class="ps-category__title">
                        <h6>Property For Rent</h6>
                        <p>15523 Items</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ps-slider--category">
                    <div class="ps-slider--circle">
                        <figure><img src="images/oven.jpg" alt="Image Description"></figure>
                        <div></div>
                    </div>
                    <div class="ps-category__title">
                        <h6>Home Electronics</h6>
                        <p>122563 Items</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ps-slider--category">
                    <div class="ps-slider--circle">
                        <figure><img src="images/bike.png" alt="Image Description"></figure>
                        <div></div>
                    </div>
                    <div class="ps-category__title">
                        <h6>Bikes And Scooters</h6>
                        <p>4593 Items</p>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
  <main class="ps-main">    
      
                {{-- <div class="ps-center-content">
            
                    <div id="owl-three" class="ps-featured--cards owl-carousel owl-theme">
                        <div class="item owlthree-item">
                        <a class="cards" href="#">
      <div class="card__background" style="background-image: url(https://images.unsplash.com/photo-1557177324-56c542165309?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">Example Card Heading</h3>
      </div>
    </a>
                        </div>
                        <div class="item owlthree-item">
                             <a class="cards" href="#">
      <div class="card__background" style="background-image: url(https://images.unsplash.com/photo-1557177324-56c542165309?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">Example Card Heading</h3>
      </div>
    </a>
                        </div>
                        <div class="item owlthree-item">
                            <div class="cards">
                                <figure>
                                    <img src="images/featured/img-03.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <span class="ps-tag">Featured</span>
                                <span class="ps-tag--arrow"></span>
                                <div class="card-body">
                                    <h6>$1,200</h6>
                                    <p class="card-text">Mac Air Book Pro, Slightly Used</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-03.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item owlthree-item">
                            <div class="card">
                                <figure>
                                    <img src="images/featured/img-04.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <span class="ps-tag">Featured</span>
                                <span class="ps-tag--arrow"></span>
                                <div class="card-body">
                                    <h6>$1,149</h6>
                                    <p class="card-text">Brand New Touch Book For Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-04.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <figure>
                                    <img src="images/featured/img-01.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <span class="ps-tag">Featured</span>
                                <span class="ps-tag--arrow"></span>
                                <div class="card-body">
                                    <h6>$1,149</h6>
                                    <p class="card-text">Brand New Iphone X For Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-01.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <figure>
                                    <img src="images/featured/img-02.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <span class="ps-tag">Featured</span>
                                <span class="ps-tag--arrow"></span>
                                <div class="card-body">
                                    <h6>$650</h6>
                                    <p class="card-text">Galaxy Note 8 Urgent Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-02.png" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <figure>
                                    <img src="images/featured/img-03.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <span class="ps-tag">Featured</span>
                                <span class="ps-tag--arrow"></span>
                                <div class="card-body">
                                    <h6>$1,200</h6>
                                    <p class="card-text">Mac Air Book Pro, Slightly Used</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-03.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <figure>
                                    <img src="images/featured/img-04.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <span class="ps-tag">Featured</span>
                                <span class="ps-tag--arrow"></span>
                                <div class="card-body">
                                    <h6>$1,149</h6>
                                    <p class="card-text">Brand New Touch Book For Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-04.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
       
     
        <!-- INTRO START -->
        
        {{-- <section class="ps-main-section ps-intro">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <div class="ps-intro__img animate" data-animate="fadeInLeft">
                            <figure>
                                <img src="images/buildings.png" alt="Imgae Description">
                            </figure>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="ps-intro__description animate" data-animate="fadeInRight">
                            <h2><span>Best Platform For</span> Buying & Selling</h2>
                            <p>Consectetur adipisicing eliteiuim lokat seteiusmod tempor incididunt utnae labore etnalom magnate aliqua udiminimate losiame pistu.</p>
                            <div class="ps-intro__btn">
                                <button class="btn ps-btn ps-intro__btn--fill">Find Out More</button>
                                <button class="btn ps-btn ps-intro__btn--outline ps-outline-btn">Our Team</button>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>     
        </section> --}}
        <!-- INTRO END -->
        <!-- HOW IT WORKS START -->
        {{-- <section class="ps-main-section ps-howitworks">
            <div class="container">
                <div class="ps-center-content">
                    <div class="row">
                        <div class="col-md-11 col-lg-8 col-xl-7">
                            <div class="ps-center-description">
                                <h6 class="animate" data-animate="swoopInLeft">We Made It Simple</h6>
                                <h4 class="animate" data-animate="swoopInRight">How It Works?</h4>
                                <p class="animate" data-animate="fadeIn">Consectetur adipisicing eliteiuim set eiusmod tempor incididunt labore etnalom dolore magna aliqua udiminimate veniam quistan norud.</p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-howitworks__imges">
                        <div class="ps-howitworks__imges__content">
                            <div class="ps-howitworks__img">
                                <figure><img src="images/howit-works/box-down_arrow.png" alt="Image Description"></figure>
                                <div class="ps-howitworks__dashcircle">
                                    <svg>
                                        <circle cx="50%" cy="50%" r="50%"></circle>
                                    </svg>
                                </div>
                            </div>
                            <div class="ps-howitworks__img__description">
                                <h5><span>Search Best Online</span> Products / Items</h5>
                            </div>
                        </div>                     
                        <div class="ps-howitworks__imges__content">
                            <div class="ps-howitworks__img">
                                <figure><img src="images/howit-works/person.png" alt="Image Description"></figure>
                                <div class="ps-howitworks__dashcircle">
                                    <svg>
                                        <circle cx="50%" cy="50%" r="50%"></circle>
                                    </svg>
                                </div>
                            </div>
                            <div class="ps-howitworks__img__description">
                                <h5><span>Contact Direct To</span> Seller User</h5>
                            </div>
                        </div> 
                        <div class="ps-howitworks__imges__content">
                            <div class="ps-howitworks__img">
                                <figure><img src="images/howit-works/star.png" alt="Image Description"></figure>
                                <div class="ps-howitworks__dashcircle">
                                    <svg>
                                        <circle cx="50%" cy="50%" r="50%"></circle>
                                    </svg>
                                </div>
                            </div>
                            <div class="ps-howitworks__img__description">
                                <h5><span>Leave Your</span> Feedback</h5>
                            </div>
                        </div> 
                        <div class="ps-howitworks__dashline">
                            <svg>
                                <line x1="0" y1="5" x2="100%" y2="5" stroke="black"
                                stroke-dasharray="4 1" />
                            </svg>
                        </div>  
                        <div class="ps-howitworks__arrow1"><figure><img src="images/howit-works/arrow.png" alt="Image Description"></figure></div>
                        <div class="ps-howitworks__arrow2"><figure><img src="images/howit-works/arrow.png" alt="Image Description"></figure></div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- HOW IT WORKS END -->
        <!-- FEATURED START -->
        {{-- <section class="ps-main-section ps-featured">
            <div class="container">
                <div class="ps-center-content">
                    <div class="ps-center-description ps-featured__description">
                        <h6 class="animate" data-animate="swoopInLeft">Start With Top Quality</h6>
                        <h4 class="animate" data-animate="swoopInRight">Featured Ads</h4>
                        <p class="animate" data-animate="fadeIn">Consectetur adipisicing eliteiuim set eiusmod tempor incididunt labore etnalom dolore magna aliqua udiminimate veniam quistan norud.</p>
                    </div>
                    <div id="owl-two" class="ps-featured--cards owl-carousel owl-theme">
                        <div class="item">
                            <div class="card">
                                <figure>
                                    <img src="images/featured/img-01.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <span class="ps-tag">Featured</span>
                                <span class="ps-tag--arrow"></span>
                                <div class="card-body">
                                    <h6>$1,149</h6>
                                    <p class="card-text">Brand New Iphone X For Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-01.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <figure>
                                    <img src="images/featured/img-02.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <span class="ps-tag">Featured</span>
                                <span class="ps-tag--arrow"></span>
                                <div class="card-body">
                                    <h6>$650</h6>
                                    <p class="card-text">Galaxy Note 8 Urgent Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-02.png" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <figure>
                                    <img src="images/featured/img-03.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <span class="ps-tag">Featured</span>
                                <span class="ps-tag--arrow"></span>
                                <div class="card-body">
                                    <h6>$1,200</h6>
                                    <p class="card-text">Mac Air Book Pro, Slightly Used</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-03.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <figure>
                                    <img src="images/featured/img-04.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <span class="ps-tag">Featured</span>
                                <span class="ps-tag--arrow"></span>
                                <div class="card-body">
                                    <h6>$1,149</h6>
                                    <p class="card-text">Brand New Touch Book For Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-04.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <figure>
                                    <img src="images/featured/img-01.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <span class="ps-tag">Featured</span>
                                <span class="ps-tag--arrow"></span>
                                <div class="card-body">
                                    <h6>$1,149</h6>
                                    <p class="card-text">Brand New Iphone X For Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-01.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <figure>
                                    <img src="images/featured/img-02.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <span class="ps-tag">Featured</span>
                                <span class="ps-tag--arrow"></span>
                                <div class="card-body">
                                    <h6>$650</h6>
                                    <p class="card-text">Galaxy Note 8 Urgent Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-02.png" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <figure>
                                    <img src="images/featured/img-03.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <span class="ps-tag">Featured</span>
                                <span class="ps-tag--arrow"></span>
                                <div class="card-body">
                                    <h6>$1,200</h6>
                                    <p class="card-text">Mac Air Book Pro, Slightly Used</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-03.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <figure>
                                    <img src="images/featured/img-04.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <span class="ps-tag">Featured</span>
                                <span class="ps-tag--arrow"></span>
                                <div class="card-body">
                                    <h6>$1,149</h6>
                                    <p class="card-text">Brand New Touch Book For Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-04.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- FEATURED END -->
        <!-- STATUS START -->
        {{-- <section class="ps-main-section ps-status">
            <div class="container">
                <div class="ps-center-content">
                    <div class="ps-center-description">
                        <h6 class="animate" data-animate="swoopInLeft">Why We’re Best</h6>
                        <h4 class="animate" data-animate="swoopInRight">Stat Says It All</h4>
                        <p class="animate" data-animate="fadeIn">Consectetur adipisicing eliteiuim set eiusmod tempor incididunt labore etnalom dolore magna aliqua udiminimate veniam quistan norud.</p>
                    </div>
                    <div class="ps-status__content" id="counter">
                        <div class="ps-status__item">
                            <div class="ps-status__img">
                                <figure><img src="images/ps-status/img-01.png" alt="Image Description"></figure>
                            </div>
                            <div class="ps-status__title">
                                <h5><span class="count" data-count="35">0</span>,<span class="count" data-count="6820"></span></h5>
                                <h6>Active Items</h6>
                            </div>
                        </div>
                        <div class="ps-status__item">
                            <div class="ps-status__img">
                                <figure><img src="images/ps-status/img-02.png" alt="Image Description"></figure>
                            </div>
                            <div class="ps-status__title">
                                <h5><span class="count" data-count="99.56%">0</span>%</h5>
                                <h6>User Feedback</h6>
                            </div>
                        </div>
                        <div class="ps-status__item">
                            <div class="ps-status__img">
                                <figure><img src="images/ps-status/img-03.png" alt="Image Description"></figure>
                            </div>
                            <div class="ps-status__title">
                                <h5><span class="count" data-count="45">0</span>,<span class="count" data-count="824"></span>,<span class="count" data-count="89"></span></h5>
                                <h6>Items Sold</h6>
                            </div>
                        </div>
                        <div class="ps-status__item">
                            <div class="ps-status__img">
                                <figure><img src="images/ps-status/img-04.png" alt="Image Description"></figure>
                            </div>
                            <div class="ps-status__title">
                                <h5><span class="count" data-count="12">0</span>,<span class="count" data-count="0"></span><span class="count" data-count="68"></span></h5>
                                <h6>Cup Of Coffee</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- STATUS END -->
        
        <!-- CATEGORIES START -->
        <section class="ps-main-section ps-common-categories">
            <div class="container">
                <div class="row">
                    <div class="col-md-11 col-lg-8 col-xl-7">
                        <div class="ps-center-content">
                            <div class="ps-center-description">
                                <h6 class="animate" data-animate="swoopInLeft">Start Exploring With Our</h6>
                                <h4 class="animate" data-animate="swoopInRight">Common Categories</h4>
                                <p class="animate" data-animate="fadeIn">Consectetur adipisicing eliteiuim set eiusmod tempor incididunt labore etnalom dolore magna aliqua udiminimate veniam quistan norud.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <div class="ps-common-categories__content">
                            <div class="ps-common-categories__img">
                                <figure><img src="images/common-categories/img-00.png" alt="Image Description"></figure>
                                <div></div>
                            </div>
                            <div class="ps-common-categories__title">
                                <h6>All Items</h6>
                                <p>35523 Items</p>
                            </div>
                            <div class="ps-common-categories__hoverbtn">
                                <button class="btn">Show All</button>
                            </div>
                            <div class="ps-common-categories__hoverimg">
                                <figure><img src="images/common-categories/hover/img-00.png" alt="Image Description"></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <div class="ps-common-categories__content">
                            <div class="ps-common-categories__img">
                                <figure><img src="images/common-categories/img-02.png" alt="Image Description"></figure>
                                <div></div>
                            </div>
                            <div class="ps-common-categories__title">
                                <h6>Vehicles</h6>
                                <p>122563 Items</p>
                            </div>
                            <div class="ps-common-categories__hoverbtn">
                                <button class="btn">Show All</button>
                            </div>
                            <div class="ps-common-categories__hoverimg">
                                <figure><img src="images/common-categories/hover/img-02.png" alt="Image Description"></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <div class="ps-common-categories__content">
                            <div class="ps-common-categories__img">
                                <figure><img src="images/common-categories/img-03.png" alt="Image Description"></figure>
                                <div></div>
                            </div>
                            <div class="ps-common-categories__title">
                                <h6>Property for Sale</h6>
                                <p>52257 Items</p>
                            </div>
                            <div class="ps-common-categories__hoverbtn">
                                <button class="btn">Show All</button>
                            </div>
                            <div class="ps-common-categories__hoverimg">
                                <figure><img src="images/common-categories/hover/img-03.png" alt="Image Description"></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <div class="ps-common-categories__content">
                            <div class="ps-common-categories__img">
                                <figure><img src="images/common-categories/img-04.png" alt="Image Description"></figure>
                                <div></div>
                            </div>
                            <div class="ps-common-categories__title">
                                <h6>Property For Rent</h6>
                                <p>15523 Items</p>
                            </div>
                            <div class="ps-common-categories__hoverbtn">
                                <button class="btn">Show All</button>
                            </div>
                            <div class="ps-common-categories__hoverimg">
                                <figure><img src="images/common-categories/hover/img-04.png" alt="Image Description"></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <div class="ps-common-categories__content">
                            <div class="ps-common-categories__img">
                                <figure><img src="images/common-categories/img-05.png" alt="Image Description"></figure>
                                <div></div>
                            </div>
                            <div class="ps-common-categories__title">
                                <h6>Home Electronics</h6>
                                <p>122563 Items</p>
                            </div>
                            <div class="ps-common-categories__hoverbtn">
                                <button class="btn">Show All</button>
                            </div>
                            <div class="ps-common-categories__hoverimg">
                                <figure><img src="images/common-categories/hover/img-05.png" alt="Image Description"></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <div class="ps-common-categories__content">
                            <div class="ps-common-categories__img">
                                <figure><img src="images/common-categories/img-06.png" alt="Image Description"></figure>
                                <div></div>
                            </div>
                            <div class="ps-common-categories__title">
                                <h6>Bikes And Scooters</h6>
                                <p>4593 Items</p>
                            </div>
                            <div class="ps-common-categories__hoverbtn">
                                <button class="btn">Show All</button>
                            </div>
                            <div class="ps-common-categories__hoverimg">
                                <figure><img src="images/common-categories/hover/img-06.png" alt="Image Description"></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <div class="ps-common-categories__content">
                            <div class="ps-common-categories__img">
                                <figure><img src="images/common-categories/img-07.png" alt="Image Description"></figure>
                                <div></div>
                            </div>
                            <div class="ps-common-categories__title">
                                <h6>Business &  Industrial</h6>
                                <p>14525 Items</p>
                            </div>
                            <div class="ps-common-categories__hoverbtn">
                                <button class="btn">Show All</button>
                            </div>
                            <div class="ps-common-categories__hoverimg">
                                <figure><img src="images/common-categories/hover/img-07.png" alt="Image Description"></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <div class="ps-common-categories__content">
                            <div class="ps-common-categories__img">
                                <figure><img src="images/common-categories/img-08.png" alt="Image Description"></figure>
                                <div></div>
                            </div>
                            <div class="ps-common-categories__title">
                                <h6>Services</h6>
                                <p>52342 Items</p>
                            </div>
                            <div class="ps-common-categories__hoverbtn">
                                <button class="btn">Show All</button>
                            </div>
                            <div class="ps-common-categories__hoverimg">
                                <figure><img src="images/common-categories/hover/img-08.png" alt="Image Description"></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- CATEGORIES END -->
        <!-- MOBILE START -->
        {{-- <section class="ps-mobile">
            <div class="ps-dark-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-xl-8">
                            <div class="ps-main-section ps-center-content">
                                <div class="ps-center-description">
                                    <h3 class="animate" data-animate="swoopInLeft">Introducing All New</h3>
                                    <h2 class="animate" data-animate="swoopInRight">Our Native Mobile App</h2>
                                    <div class="animate" data-animate="fadeIn"><p>Consectetur adipisicing eliteiuim lokat seteiusmod tempor incididunt utnae labore etnalom magnate aliqua udiminimate losiame pistu.</p></div>
                                </div>
                                <div class="ps-mobile__button">
                                    <a href="javascript:void(0);"><figure><img src="images/native-mobile/img-03.png" alt="Image Description"></figure></a> 
                                    <a href="javascript:void(0);"><figure><img src="images/native-mobile/img-04.png" alt="Image Description"></figure></a> 
                                </div>
                            </div>
                        </div>
                        <div class="ps-mobile__img">
                            <figure><img src="images/native-mobile/img-02.png" alt="Image Description"></figure>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- MOBILE END -->
        <!-- ARTICLES START -->
        <section class="ps-main-section ps-articles">
            <div class="container">
                {{-- <div class="row">
                    <div class="col-md-11 col-lg-8 col-xl-7">
                        <div class="ps-center-content">
                            <div class="ps-center-description">
                                <h6 class="animate" data-animate="swoopInLeft">Popular Products</h6>
                                <h4 class="animate" data-animate="swoopInRight">Recent Views</h4>
                               
                            </div>
                        </div>
                    </div>
                </div> --}}

          <div class="site-section aos-init aos-animate" data-aos="fade">

<div class="site-section">
<div class="container">
<div class="row mb-5">
<div class="col-md-7 text-left border-primary">
<h2 class="font-weight-light text-primary">Trending Today</h2>
</div>
</div>
<div class="row mt-5">
<div class="col-lg-6">
<div class="d-block d-md-flex listing">
<a href="listings-single.html" class="img d-block" style="background-image: url('https://preview.colorlib.com/theme/classyads/images/img_2.jpg')"></a>
<div class="lh-content">
<span class="category">Real Estate</span>
<a href="#" class="bookmark"><span class="icon-heart"></span></a>
<h3><a href="listings-single.html">House with Swimming Pool</a></h3>
<address>Don St, Brooklyn, New York</address>
<p class="mb-0">
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-secondary"></span>
<span class="review">(3 Reviews)</span>
</p>
</div>
</div>
<div class="d-block d-md-flex listing">
<a href="listings-single.html" class="img d-block" style="background-image: url('https://preview.colorlib.com/theme/classyads/images/img_3.jpg')"></a>
<div class="lh-content">
<span class="category">Furniture</span>
<a href="#" class="bookmark"><span class="icon-heart"></span></a>
<h3><a href="listings-single.html">Wooden Chair &amp; Table</a></h3>
<address>Don St, Brooklyn, New York</address>
<p class="mb-0">
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-secondary"></span>
<span class="review">(3 Reviews)</span>
</p>
</div>
</div>
<div class="d-block d-md-flex listing">
<a href="listings-single.html" class="img d-block" style="background-image: url('https://preview.colorlib.com/theme/classyads/images/img_4.jpg')"></a>
<div class="lh-content">
<span class="category">Electronics</span>
<a href="#" class="bookmark"><span class="icon-heart"></span></a>
<h3><a href="listings-single.html">iPhone X gray</a></h3>
<address>Don St, Brooklyn, New York</address>
<p class="mb-0">
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-secondary"></span>
<span class="review">(3 Reviews)</span>
</p>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="d-block d-md-flex listing">
<a href="listings-single.html" class="img d-block" style="background-image: url('https://preview.colorlib.com/theme/classyads/images/img_1.jpg')"></a>
<div class="lh-content">
<span class="category">Cars &amp; Vehicles</span>
<a href="#" class="bookmark"><span class="icon-heart"></span></a>
<h3><a href="listings-single.html">Red Luxury Car</a></h3>
<address>Don St, Brooklyn, New York</address>
<p class="mb-0">
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-secondary"></span>
<span class="review">(3 Reviews)</span>
</p>
</div>
</div>
<div class="d-block d-md-flex listing">
<a href="listings-single.html" class="img d-block" style="background-image: url('https://preview.colorlib.com/theme/classyads/images/img_2.jpg')"></a>
<div class="lh-content">
<span class="category">Real Estate</span>
<a href="#" class="bookmark"><span class="icon-heart"></span></a>
<h3><a href="listings-single.html">House with Swimming Pool</a></h3>
<address>Don St, Brooklyn, New York</address>
<p class="mb-0">
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-secondary"></span>
<span class="review">(3 Reviews)</span>
</p>
</div>
</div>
<div class="d-block d-md-flex listing">
<a href="listings-single.html" class="img d-block" style="background-image: url('https://preview.colorlib.com/theme/classyads/images/img_3.jpg')"></a>
<div class="lh-content">
<span class="category">Furniture</span>
<a href="#" class="bookmark"><span class="icon-heart"></span></a>
<h3><a href="listings-single.html">Wooden Chair &amp; Table</a></h3>
<address>Don St, Brooklyn, New York</address>
<p class="mb-0">
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-warning"></span>
<span class="icon-star text-secondary"></span>
<span class="review">(3 Reviews)</span>
</p>
</div>
</div>
</div>
</div>
</div>
</div>
        </section>
        <!-- VIDEO START -->
         <div id="carouselExampleControls" class="carousel slide " data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <div class="carousel-item active">
         <section class="ps-video">
           <a class="ps-video__img" data-rel="prettyPhoto" href="https://youtu.be/XxxIEGzhIG8">
              <figure><img src="images/ps-video/icon/img-01.png" alt="Image Description"></figure>
           </a>
          
        </section>
    </div>
    <div class="carousel-item">
         <section class="ps-video">
           <a class="ps-video__img" data-rel="prettyPhoto" href="https://youtu.be/XxxIEGzhIG8">
              <figure><img src="images/ps-video/icon/img-01.png" alt="Image Description"></figure>
           </a>
          
        </section>
    </div>
    <div class="carousel-item">
      <section class="ps-video">
           <a class="ps-video__img" data-rel="prettyPhoto" href="https://youtu.be/XxxIEGzhIG8">
              <figure><img src="images/ps-video/icon/img-01.png" alt="Image Description"></figure>
           </a>
          
        </section>
    </div>
    <div class="carousel-item">
      <div class="carousel-video-inner embed-responsive embed-responsive-16by9">
        <div id="video-player" data-video-id="0vrdgDdPApQ"></div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
     

        <!-- VIDEO END -->
        <!-- ARTICLES END -->
    </main>
    @endsection