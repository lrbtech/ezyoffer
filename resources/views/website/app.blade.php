
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from amentotech.com/htmls/psello/listing-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Feb 2020 13:24:15 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EzyOffers</title>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/fontawesome/fontawesome-all.css">
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/chosen.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
</head>
<body>
    <!-- PRELOADER START -->
    <div class="preloader-outer">
        <figure><img src="images/img-face.png" alt="Image Description">
            <span class="pulse"></span>
        </figure>
    </div>
    <!-- PRELOADER END -->
    <!-- HEADER START -->
    <header class="ps-main-header3">
        <nav>
            <div class="navbar navbar-expand-lg navbar-light ps-navbar">
                <div class="ps-navbar__header">
                    <a href="index.html" class="navbar-brand"><img src="images/logo.png" alt="Image Description"></a>
                    <div class="ps-header-form">
                        <form class="ps-form ps-main-form">
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
                                <button class="btn ps-btn ps-icon"><i class="ti-search"></i></button>
                            </div>
                        </form>
                        <div class="ps-form--cancel">
                            <a href="javascript:void(0);">Cancel</a>
                            <a href="javascript:void(0);" class="ps-icon"><i class="ti-close"></i></a>
                        </div> 
                        <div class="ps-form-btn">
                            <button class="btn ps-btn">
                                <i class="ti-search"></i>
                            </button>
                        </div>
                    </div>
                    <div id="ps-nav" class="ps-nav navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="lnr lnr-menu"></i>
                        </button>
                        <div class="collapse navbar-collapse ps-navigation" id="navbarNav">
                            <ul class="navbar-nav nav-Js ml-auto ps-nav ps-nav__ul">
                                <li class="ps-menuhover menu-item-has-children page_item_has_children">
                                    <a href="javascript:void(0);">Main <i class="fas fa-chevron-down"></i></a>
                                    <ul class="sub-menu ps-dropdown ps-first__dropdown">
                                        <li class="nav-item"><a href="index.html">Home 1</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a href="index-v2.html">Home 2</a></li> 
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="categories.html">Categories</a></li>
                                <li class="nav-item"><a href="contact.html">Contact</a></li>
                                <li class="ps-menuhover menu-item-has-children page_item_has_children">
                                    <a href="javascript:void(0);" class="ps-header__line"><span class="lnr lnr-menu"></span></a>
                                    <ul class="ps-dropdown sub-menu">
                                        <li>
                                            <a href="about.html">About</a>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li class="current-menu-item">
                                            <a href="privacy-info.html">Privacy Info</a>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li class="ps-menuhover ps-submenuhover menu-item-has-children page_item_has_children">
                                            <a href="javascript:void(0);">Blog<i class="ti-angle-right"></i></a>
                                            <ul class="ps-dropdown ps-submenu sub-menu">
                                                <li class="nav-item"><a href="blog-grid.html">Blog Grid</a></li>                             
                                                <li class="dropdown-divider"></li>
                                                <li class="nav-item"><a href="blog-single.html">Blog Single</a></li>  
                                            </ul>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item ps-menuhover ps-submenuhover menu-item-has-children page_item_has_children">
                                            <a href="javascript:void(0);">Listing <i class="ti-angle-right"></i></a>
                                            <ul class="ps-dropdown ps-submenu sub-menu">
                                                <li class="nav-item"><a href="listing-grid.html">Listing Grid</a></li>                             
                                                <li class="dropdown-divider"></li>
                                                <li class="nav-item"><a href="listing-list.html">Listing List</a></li>  
                                                <li class="dropdown-divider"></li>
                                                <li class="nav-item"><a href="listing-single.html">Listing Single</a></li>  
                                            </ul>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a href="login.html">Login</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a href="coming-soon.html">Coming Soon</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a href="404-error.html">404 Error</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ps-navbar__userbtn">
                        <div class="ps-headeruser">              
                            <ul class="navbar-nav ps-nav">
                                <li class="nav-item ps-login--btn"><a href="login.html" class="btn ps-btn">Login / Register</a></li>
                                <li class="nav-item dropdown ps-menuhover ps-userlogo">
                                    <a href="javascript:void(0);" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <figure class="d-inline-block">
                                            <img src="images/user-logo.jpg" alt="Image Description">
                                        </figure>
                                    <span><i class="fas fa-chevron-down"></i></span>
                                    </a>
                                    <ul class="dropdown-menu ps-dropdown ps-user__dropdown position-absolute" aria-labelledby="navbarDropdown4">
                                        <li class="nav-item"><a class="dropdown-item" href="dashboard-insights.html"><i class="ti-dashboard"></i>Insights</a></li>                             
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a class="dropdown-item" href="dashboard-profile-setting.html"><i class="ti-user"></i>Profile Settings</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a class="dropdown-item" href="dashboard-my-ads.html"><i class="ti-align-justify"></i>My Ads</a></li>  
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a class="dropdown-item" href="dashboard-post-ad.html"><i class="ti-settings"></i>Post Ads</a></li>  
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a class="dropdown-item" href="dashboard-offers-messages.html"><i class="ti-email"></i>Offers/Messages</a></li>  
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a class="dropdown-item" href="dashboard-buy-package.html"><i class="ti-shopping-cart"></i>Buy New Packages</a></li>  
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a class="dropdown-item" href="dashboard-payments.html"><i class="ti-user"></i>Payments</a></li>  
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item dropdown ps-menuhover ps-submenuhover">
                                            <a class="dropdown-item" href="javascript:void(0);" id="navbarDropdown5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ti-heart"></i>My Favorite <i class="ti-angle-right ps-right"></i>
                                            </a>
                                            <ul class="dropdown-menu ps-dropdown ps-submenu navbar-nav" aria-labelledby="navbarDropdown5">
                                                <li class="nav-item"><a class="dropdown-item" href="dashboard-my-favorite.html">Favorite Listing</a></li>                             
                                                <li class="dropdown-divider"></li>
                                                <li class="nav-item"><a class="dropdown-item" href="javascript:void(0);">Sub Menu</a></li>
                                            </ul>
                                        </li>  
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a class="dropdown-item" href="dashboard-account-setting.html"><i class="ti-bookmark"></i>Account Setting</a></li>  
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a class="dropdown-item" href="index.html"><i class="ti-shift-right"></i>Logout</a></li>  
                                    </ul>
                                </li>                            
                                <li class="nav-item ps-post--btn"><a href="dashboard-insights.html" class="btn ps-btn">Post Ad</a></li>
                            </ul>
                        </div>
                    </div>           
                </div>
            </div>
        </nav>
    </header>
    <!-- HEADER END -->
    <!-- BANNER START -->
    <div class="ps-main-banner">
        <div class="ps-banner-img3">
            <div class="ps-dark-overlay2">
                <div class="container">
                    <div class="ps-banner-contentv3">
                        <h4>Search Results</h4>
                        <p><a href="index.html">Home</a> <span><i class="ti-angle-right"></i></span> Listings Grid</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BANNER END -->
    <!-- MAIN START -->
    <main class="ps-main">
        <section class="container">
            <div class="row ps-uniqueGadgets ps-gridList ps-main-section">
                <!-- SIDEBAR START -->
                <div class="col-md-5 col-lg-4 col-xl-3">
                    <div class="ps-gridList__searchArea">
                        <h6>Search Again</h6>
                        <form class="ps-form ps-main-form ps-side-mainForm">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Keyword" aria-label="Enter Keyword" aria-describedby="button-addon1">
                                <div class="input-group-append">
                                    <button class="btn" type="button" id="button-addon1"><i class="ti-search"></i></button>
                                </div>
                            </div>
                            <div class="ps-geo-location ps-location input-group">
                                <input type="text" class="form-control" placeholder="Location*">
                                <a href="javascript:void(0);" class="ps-location-icon ps-index-icon"><i class="ti-target"></i></a>
                                <a href="javascript:void(0);" class="ps-arrow-icon ps-index-icon"><i class="ti-angle-down"></i></a>
                                <div class="ps-distance">
                                    <div class="ps-distance__description">
                                        <label for="amountfive">Distance:</label>
                                        <input type="text" id="amountfive" readonly>
                                    </div>                                           
                                    <div id="slider-range-minTwo"></div>
                                </div>
                            </div>                     
                        </form>
                    </div>
                    <div class="ps-gridList__searchArea ps-gridList__categories">
                        <h6>Categories</h6>
                        <div class="ps-gridList__checkbox">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check1">
                                <label class="form-check-label" for="check1">Show All <span>(256)</span></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check2">
                                <label class="form-check-label" for="check2">Mobiles/Tablets <span>(53,165)</span></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check3">
                                <label class="form-check-label" for="check3">Vehicles <span>(7562)</span></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check4">
                                <label class="form-check-label" for="check4">Houses <span>(35)</span></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check5">
                                <label class="form-check-label" for="check5">Land & Plots <span>(845)</span></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check6">
                                <label class="form-check-label" for="check6">Entertainment <span>(4223)</span></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check7">
                                <label class="form-check-label" for="check7">Animals & Pets <span>(5624)</span></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check8">
                                <label class="form-check-label" for="check8">Kids Zone <span>(1245)</span></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check9">
                                <label class="form-check-label" for="check9">Beauty & Fashion <span>(06)</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="ps-gridList__searchArea ps-gridList__priceRange">
                        <h6>Price Range</h6>
                            <input type="text" id="amount" disabled>
                        <div id="slider-range"></div>
                    </div>
                    <div class="ps-gridList__searchArea ps-gridList__categories">
                        <h6>Condition</h6>
                        <div class="ps-gridList__checkbox">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check10">
                                <label class="form-check-label" for="check10">Show All <span>(256)</span></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check11">
                                <label class="form-check-label" for="check11">Brand New <span>(53,165)</span></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check12">
                                <label class="form-check-label" for="check12">Almost Like New <span>(7562)</span></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check13">
                                <label class="form-check-label" for="check13">Gently Used <span>(35)</span></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check14">
                                <label class="form-check-label" for="check14">Heavily Used <span>(845)</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="ps-gridList__searchArea ps-gridList__categories">
                        <h6>Ad Type</h6>
                        <div class="ps-gridList__checkbox">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check15">
                                <label class="form-check-label" for="check15">Show All <span>(256)</span></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check16">
                                <label class="form-check-label" for="check16">Featured Ads <span>(53,165)</span></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check17">
                                <label class="form-check-label" for="check17">Regular Ads <span>(7562)</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="ps-gridList__searchArea ps-gridList__priceRange ps-gridList__areaUnit">
                        <h6>Area Unit</h6>
                        <form class="ps-form">
                            <div class="ps-select ps-sort">
                                <select class="chosen-select locations form-control" data-placeholder="Country" name="locations">
                                    <option value="Location">Area Unit</option>
                                    <option value="United State">United State</option>
                                    <option value="Canada">Canada</option>
                                    <option value="England">England</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="New Zealand">New Zealand</option>
                                </select>
                            </div>
                            <div class="ps-select ps-sort">
                                <select class="chosen-select locations form-control" data-placeholder="Country" name="locations">
                                    <option value="Location">No. of Rooms</option>
                                    <option value="United State">United State</option>
                                    <option value="Canada">Canada</option>
                                    <option value="England">England</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="New Zealand">New Zealand</option>
                                </select>
                            </div>
                            <div class="ps-select ps-sort">
                                <select class="chosen-select locations form-control" data-placeholder="Country" name="locations">
                                    <option value="Location">No. of Washrooms</option>
                                    <option value="United State">United State</option>
                                    <option value="Canada">Canada</option>
                                    <option value="England">England</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="New Zealand">New Zealand</option>
                                </select>
                            </div>
                        </form>
                            <input type="text" id="amount2" disabled>
                        <div id="slider-rangeTwo"></div>
                    </div>
                    <div class="ps-gridList__searchArea ps-gridList__date">
                        <h6>By Year</h6>
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control" placeholder="Starting Date">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control" placeholder="Ending Date">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div class="ps-gridList__searchArea ps-gridList__priceRange">
                        <h6>Mileage</h6>
                            <input type="text" id="amountThree" disabled>
                        <div id="slider-rangeThree"></div>
                    </div>
                    <div class="ps-gridList__searchArea ps-gridList__priceRange ps-gridList__areaUnit">
                        <h6>Misc</h6>
                        <form class="ps-form">
                            <div class="ps-select ps-sort">
                                <select class="chosen-select locations form-control" data-placeholder="Country" name="locations">
                                    <option value="Location">Registered Location</option>
                                    <option value="United State">United State</option>
                                    <option value="Canada">Canada</option>
                                    <option value="England">England</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="New Zealand">New Zealand</option>
                                </select>
                            </div>
                            <div class="ps-select ps-sort">
                                <select class="chosen-select locations form-control" data-placeholder="Country" name="locations">
                                    <option value="Location">Fuel Type</option>
                                    <option value="United State">United State</option>
                                    <option value="Canada">Canada</option>
                                    <option value="England">England</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="New Zealand">New Zealand</option>
                                </select>
                            </div>
                        </form>
                        <div class="ps-gridList__checkbox">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check18">
                                <label class="form-check-label" for="check18">Show All <span>(256)</span></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check19">
                                <label class="form-check-label" for="check19">Ads With Photos <span>(53,165)</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="ps-gridList__searchArea ps-gridList__filter">
                        <h6><span class="d-block">Click “Apply Filter” to</span>get your desired search result</h6>
                        <button class="btn ps-btn">Apply Filter</button>
                        <a href="javascript:void(0);" class="ps-filter__h"><span><i class="ti-reload"></i></span>Reset Filter</a>
                    </div>
                    <div class="ps-gridList__searchArea ps-gridList__ad">
                        <a href="javascript:void(0);"><figure><img src="images/ad-img.jpg" alt="Image Description"></figure></a>
                        <span>Advertisement  255px X 255px</span>
                    </div>
                </div>
                 <!-- SIDEBAR END -->
                 <!-- UNIQUE GADGETS START -->
                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="ps-uniqueGadgets">
                        <div class="ps-uniqueGadgets__heading">
                            <p>12,076 Record Found</p>
                            <h4>Results in “Unique Gadgets”</h4>
                        </div>
                        <div class="ps-uniqueGadgets__content">
                            <p>Showing 1 - 30 of 12,076 results</p>
                            <div class="d-flex flex-wrap">
                                <label class="ps-sort">
                                    <select class="form-control">
                                        <option selected="" hidden="">Sort By:</option>
                                        <option>All</option>
                                        <option>Half</option>
                                    </select>
                                </label>
                                <button class="btn ps-btn ps-outline-btn"><i class="ti-map"></i></button>
                                <button class="btn ps-btn ps-outline-btn"><i class="ti-view-list"></i></button>
                                <button class="btn ps-btn ps-active"><i class="ti-layout-grid2"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row ps-featured--cards ps-gridList__cards">
                        <div class="col-lg-6 col-xl-4">
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
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);" class="ps-favorite"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
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
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);" class="ps-favorite"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
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
                        <div class="col-lg-6 col-xl-4">
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
                        <div class="col-lg-6 col-xl-4">
                            <div class="card">
                                <figure>
                                    <img src="images/grid-list/img-01.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <div class="card-body">
                                    <h6>$1,200</h6>
                                    <p class="card-text">Mac Air Book Pro, Slightly Used</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-05.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="card">
                                <figure>
                                    <img src="images/grid-list/img-02.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <div class="card-body">
                                    <h6>$1,149</h6>
                                    <p class="card-text">Brand New Touch Book For Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-06.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="ps-grid--card">
                                <div class="card">
                                    <figure>
                                        <img src="images/grid-list/img-03.png" class="card-img-top" alt="Image Description">
                                        <div></div>
                                    </figure>
                                    <div class="card-body">
                                        <h6>Want To See Your<span class="d-block"> Add Here?</span></h6>
                                        <p class="card-text">Click “Singup” button below to post your free ad here</p>
                                        <button class="btn ps-btn">Signup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                                <div class="card">
                                    <figure>
                                        <img src="images/grid-list/img-04.jpg" class="card-img-top" alt="Image Description">
                                        <div></div>
                                    </figure>
                                    <div class="card-body">
                                        <h6>$1,149</h6>
                                        <p class="card-text">Brand New Touch Book For Sale</p>
                                        <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                        <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                        <figure><img src="images/user-icon/img-07.jpg" alt="Image Description"></figure>
                                    </div>
                                    <ul class="list-group">
                                        <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="card">
                                <figure>
                                    <img src="images/grid-list/img-05.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <div class="card-body">
                                    <h6>$1,200</h6>
                                    <p class="card-text">Mac Air Book Pro, Slightly Used</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-08.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="card">
                                <figure>
                                    <img src="images/grid-list/img-06.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
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
                        <div class="col-lg-6 col-xl-4">
                            <div class="card">
                                <figure>
                                    <img src="images/grid-list/img-07.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <div class="card-body">
                                    <h6>$1,149</h6>
                                    <p class="card-text">Brand New Touch Book For Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-09.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="card">
                                <figure>
                                    <img src="images/grid-list/img-08.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <div class="card-body">
                                    <h6>$1,149</h6>
                                    <p class="card-text">Brand New Touch Book For Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-10.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="card">
                                <figure>
                                    <img src="images/grid-list/img-09.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <div class="card-body">
                                    <h6>$1,149</h6>
                                    <p class="card-text">Brand New Touch Book For Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-03.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="card">
                                <figure>
                                    <img src="images/grid-list/img-10.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <div class="card-body">
                                    <h6>$1,149</h6>
                                    <p class="card-text">Brand New Touch Book For Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-09.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="card">
                                <figure>
                                    <img src="images/grid-list/img-11.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <div class="card-body">
                                    <h6>$1,149</h6>
                                    <p class="card-text">Brand New Touch Book For Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-10.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="card">
                                <figure>
                                    <img src="images/grid-list/img-12.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <div class="card-body">
                                    <h6>$1,149</h6>
                                    <p class="card-text">Brand New Touch Book For Sale</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-11.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="ps-grid--card">
                                <div class="card">
                                    <figure>
                                        <img src="images/grid-list/img-03.png" class="card-img-top" alt="Image Description">
                                        <div></div>
                                    </figure>
                                    <div class="card-body">
                                        <h6>Want To See Your<span class="d-block"> Add Here?</span></h6>
                                        <p class="card-text">Click “Singup” button below to post your free ad here</p>
                                        <button class="btn ps-btn">Signup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="card">
                                <figure>
                                    <img src="images/grid-list/img-05.jpg" class="card-img-top" alt="Image Description">
                                    <div></div>
                                </figure>
                                <div class="card-body">
                                    <h6>$1,200</h6>
                                    <p class="card-text">Mac Air Book Pro, Slightly Used</p>
                                    <span class="d-block"><i class="ti-layers"></i> <a href="javascript:void(0);">Electronics</a></span>
                                    <span><i class="ti-time"></i> <span>Jun 27, 2019</span></span>
                                    <figure><img src="images/user-icon/img-08.jpg" alt="Image Description"></figure>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span><i class="ti-map"></i> <a href="javascript:void(0);">Manchester, UK</a></span><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="ps-page">
                                <div class="ps-button-left">
                                    <button class="btn ps-btn"><span class="lnr lnr-chevron-left"></span></button>
                                </div>
                                <div class="ps-button-num">
                                    <button class="btn ps-btn"><span>1</span></button>
                                    <button class="btn ps-btn ps-active"><span>2</span></button>
                                    <button class="btn ps-btn"><span>3</span></button>
                                    <button class="btn ps-btn"><span>4</span></button>
                                    <button class="btn ps-btn"><span>...</span></button>
                                    <button class="btn ps-btn"><span>50</span></button>
                                </div>
                                <div class="ps-button-right">
                                    <button class="btn ps-btn"><span class="lnr lnr-chevron-right"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-no-ads">
                        <div>
                            <h5>No Results Found Yet :(</h5>
                            <h6>Click “Search Again” button below to search result</h6>
                            <button class="btn ps-btn">Search Again</button>
                        </div>
                    </div>
                </div>
                <!-- UNIQUE GADGETS END -->
            </div>
        </section>
    </main>
    <!-- MAIN END -->
    <!-- FOOTER START -->
    <footer class="ps-main-footer">
        <section class="ps-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-lg-6">
                        <div class="ps-footer__left">
                            <figure><img src="images/footer/img-01.png" alt="Image Description"></figure>
                            <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt utbor etian dolm magna aliqua enim ad minim veniam quis nostrud exercita ullamco laboris nisie aliquip commodo okialama sikune pisuye.</p>
                            <ul class="ps-footer__contact">
                                <li><a href="javascript:void(0);"><i class="lnr lnr-location"></i> 123 New Design Street, Melbour Australia 54214</a></li>
                                <li><a href="javascript:void(0);"><i class="lnr lnr-envelope"></i> info@domainurl.com</a></li>
                                <li><a href="javascript:void(0);"><i class="lnr lnr-phone-handset"></i> (0800) 1234 567891</a></li>
                            </ul>
                            <ul class="ps-footer__social-media">
                                <li class="ps-facebook"><a href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="ps-twitter"><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>
                                <li class="ps-linkedin"><a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a></li>
                                <li class="ps-instagram"><a href="javascript:void(0);"><i class="fab fa-instagram"></i></a></li>
                                <li class="ps-youtube"><a href="javascript:void(0);"><i class="fab fa-youtube"></i></a></li>
                                <li class="ps-google-plus"><a href="javascript:void(0);"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ps-footer__link">
                            <h6>Useful Links</h6>
                            <ul>
                                <li><a href="javascript:void(0);">How it works?</a></li>
                                <li><a href="javascript:void(0);">About</a></li>
                                <li><a href="javascript:void(0);">Listing Grid</a></li>
                                <li><a href="javascript:void(0);">Listing Single -  With Chatbox</a></li>
                                <li><a href="javascript:void(0);">Latest Article Grid</a></li>
                                <li><a href="javascript:void(0);">Latest Article Detail</a></li>
                                <li><a href="javascript:void(0);">Login Or Register</a></li>
                                <li><a href="javascript:void(0);">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ps-footer__newsletter">
                            <h6>Newsletter</h6>
                            <p>Eiusmod tempor incididunt utbor etian dolm magna aliqua enim minim</p>
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Your Email" aria-label="Your Email" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                  <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="ti-arrow-right"></i></button>
                                </div>
                            </div>
                            <h6>Download Mobile App</h6>
                            <div class="ps-footer__img">
                                <a href="javascript:void(0);"><figure><img src="images/footer/img-02.png" alt="Image Description"></figure></a>
                                <a href="javascript:void(0);"><figure><img src="images/footer/img-03.png" alt="Image Description"></figure></a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="ps-footer-down">
            <P>Copyrights © 2019 by<a href="javascript:void(0);"> PSello</a>. All Rights Reserved.</P>
        </div>
    </footer>
    <!-- FOOTER END -->
    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/vendor/jquery-library.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/vendor/chosen.jquery.js"></script>
    <script src="js/vendor/bootstrap-datepicker.min.js"></script>
    <script src="js/vendor/jquery-ui.min.js"></script>
    <script src="js/vendor/jquery.ui.touch-punch.js"></script>
    <script src="js/main.js"></script>
</body>

<!-- Mirrored from amentotech.com/htmls/psello/listing-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Feb 2020 13:24:26 GMT -->
</html>