  @extends('website.layout')
   @section('css')
   <link rel="stylesheet" href="/css/dashboard.css">
<link rel="stylesheet" href="/css/dashboard-responsive.css">
   @endsection
@section('section')

<div class="ps-main-banner">
        <div class="ps-dark-overlay">
            <div class="container">
                <div class="ps-banner-content">
                    <h4>Dashboard</h4>
                    <p><a href="index.html">Home</a> <span><i class="ti-angle-right"></i></span> Dashboard</p>
                </div>
            </div>
        </div>
    </div>
<main class="ps-main">
        <section class="ps-main-section">
            <div class="container">
                <div class="row">
               @include('customers.sidebar')
                    <!-- MAIN CONTENT START -->
                    <div class="col-lg-8 ps-dashboard-user">
                        <div class="ps-dashboard--btn">
                            <a href="javascript:void(0);" class="btn ps-post ps-btn">
                                <h6>15,260 <span class="d-block">Total Posted Ads</span></h6>
                                <span class="ps-icon"><i class="ti-bookmark-alt"></i></span>
                            </a>
                            <a href="javascript:void(0);" class="btn ps-item ps-btn">
                                <h6>13,908 <span class="d-block">Total Items Sold</span></h6>
                                <span class="ps-icon"><i class="ti-star"></i></span>
                            </a>
                            <a href="javascript:void(0);" class="btn ps-cancel ps-btn">
                                <h6>1,352 <span class="d-block">Total Cancelled Ads</span></h6>
                                <span class="ps-icon"><i class="ti-na"></i></span>
                            </a>
                        </div>
                        <!-- POSTED ADS START -->
                        <div class="ps-posted-ads ps-my-ads">
                            <div class="ps-posted-ads__heading">
                                <h5>My Posted Ads</h5>
                                <button class="btn ps-btn">Post Ad</button>
                            </div>
                            <div class="ps-items-heading">
                                <h6>Title</h6><h6>Status</h6><h6>Actions</h6>
                            </div>
                            <ul>
                                <li>
                                    <div>
                                        <div class="ps-posted-ads__title">
                                            <h6>Title</h6>
                                            <div>
                                                <figure><img src="/images/insights/icon/img-01.jpg" alt="Images Description"></figure>
                                                <div class="ps-description">
                                                    <h5>AED650</h5>
                                                    <h6>Galaxy Note 8 Urgent Sale</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-posted-ads__status">
                                            <h6>Status</h6>
                                            <button class="btn ps-btn ps-featured">Featured</button>
                                        </div>
                                        <div class="ps-posted-ads__actions">
                                            <h6>Actions</h6>
                                            <span><a href="javascript:void(0);" class="ps-edit"><i class="ti-pencil"></i> Edit</a><span>/</span><a href="javascript:void(0);" class="ps-delete"><i class="ti-trash"></i> Delete</a></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <div class="ps-posted-ads__title">
                                            <h6>Title</h6>
                                            <div>
                                                <figure><img src="/images/insights/icon/img-02.jpg" alt="Images Description"></figure>
                                                <div class="ps-description">
                                                    <h5>AED1,149</h5>
                                                    <h6>Brand New Iphone X For Sale</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-posted-ads__status">
                                            <h6>Status</h6>
                                            <button class="btn ps-btn ps-active">Active</button>
                                        </div>
                                        <div class="ps-posted-ads__actions">
                                            <h6>Actions</h6>
                                            <span><a href="javascript:void(0);" class="ps-edit"><i class="ti-pencil"></i> Edit</a><span>/</span><a href="javascript:void(0);" class="ps-delete"><i class="ti-trash"></i> Delete</a></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <div class="ps-posted-ads__title">
                                            <h6>Title</h6>  
                                            <div>
                                                <figure><img src="/images/insights/icon/img-03.jpg" alt="Images Description"></figure>
                                                <div class="ps-description">
                                                    <h5>AED1,320</h5>
                                                    <h6>Brand New Touch Book For Sale</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-posted-ads__status">
                                            <h6>Status</h6>
                                            <button class="btn ps-btn ps-inactive">Inactive</button>
                                        </div>
                                        <div class="ps-posted-ads__actions">
                                            <h6>Actions</h6>
                                            <span><a href="javascript:void(0);" class="ps-edit"><i class="ti-pencil"></i> Edit</a><span>/</span><a href="javascript:void(0);" class="ps-delete"><i class="ti-trash"></i> Delete</a></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <div class="ps-posted-ads__title">
                                            <h6>Title</h6>
                                            <div>
                                                <figure><img src="/images/insights/icon/img-04.jpg" alt="Images Description"></figure>
                                                <div class="ps-description">
                                                    <h5>AED1,200</h5>
                                                    <h6>Mac Air Book Pro, Slightly Used</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-posted-ads__status">
                                            <h6>Status</h6>
                                            <button class="btn ps-btn ps-sold">Sold</button>
                                        </div>
                                        <div class="ps-posted-ads__actions">
                                            <h6>Actions</h6>
                                            <span><a href="javascript:void(0);" class="ps-edit"><i class="ti-pencil"></i> Edit</a><span>/</span><a href="javascript:void(0);" class="ps-delete"><i class="ti-trash"></i> Delete</a></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <div class="ps-posted-ads__title">
                                            <h6>Title</h6>
                                            <div>
                                                <figure><img src="/images/insights/icon/img-05.jpg" alt="Images Description"></figure>
                                                <div class="ps-description">
                                                    <h5>AED1,711</h5>
                                                    <h6>Brand New Touch Book Pro For Sale</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-posted-ads__status">
                                            <h6>Status</h6>
                                            <button class="btn ps-btn ps-expired">Expired</button>
                                        </div>
                                        <div class="ps-posted-ads__actions">
                                            <h6>Actions</h6>
                                            <span><a href="javascript:void(0);" class="ps-edit"><i class="ti-pencil"></i> Edit</a><span>/</span><a href="javascript:void(0);" class="ps-delete"><i class="ti-trash"></i> Delete</a></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <div class="ps-posted-ads__title">
                                            <h6>Title</h6>
                                            <div>
                                                <figure><img src="/images/insights/icon/img-06.jpg" alt="Images Description"></figure>
                                                <div class="ps-description">
                                                    <h5>AED1,321</h5>
                                                    <h6>100% working drone for sale/exchange</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-posted-ads__status">
                                            <h6>Status</h6>
                                            <button class="btn ps-btn ps-deleted">Deleted</button>
                                        </div>
                                        <div class="ps-posted-ads__actions">
                                            <h6>Actions</h6>
                                            <span><a href="javascript:void(0);" class="ps-edit"><i class="ti-pencil"></i> Edit</a><span>/</span><a href="javascript:void(0);" class="ps-delete"><i class="ti-trash"></i> Delete</a></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <div class="ps-posted-ads__title">
                                            <h6>Title</h6>
                                            <div>
                                                <figure><img src="/images/insights/icon/img-07.jpg" alt="Images Description"></figure>
                                                <div class="ps-description">
                                                    <h5>AED1,458</h5>
                                                    <h6>New Skateboard exchange offer</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-posted-ads__status">
                                            <h6>Status</h6>
                                            <button class="btn ps-btn ps-active">Active</button>
                                        </div>
                                        <div class="ps-posted-ads__actions">
                                            <h6>Actions</h6>
                                            <span><a href="javascript:void(0);" class="ps-edit"><i class="ti-pencil"></i> Edit</a><span>/</span><a href="javascript:void(0);" class="ps-delete"><i class="ti-trash"></i> Delete</a></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="ps-no-ads">
                                <div>
                                    <figure><img src="/images/grid-list/img-03.png" alt="Image Description"></figure>
                                    <h5>No Ad Posted Yet :(</h5>
                                    <h6>Click “Post Ad” button below to post your free ad</h6>
                                    <button class="btn ps-btn">Post Ad</button>
                                </div>
                            </div>
                        </div>
                         <!-- POSTED ADS END -->
                        <div class="ps-dashboard--downbtn">
                            <a href="#" class="btn ps-offer-btn">
                                <i class="ti-email"></i>
                                <div class="ps-line"></div>
                                <h6>New Offer/Messages <span class="d-block">15 New Unread Messages</span></h6>
                                <div class="ps-circle">
                                    <div></div>
                                </div>
                            </a>
                            <a href="#" class="btn ps-package-btn">
                                <i class="ti-time"></i>
                                <div class="ps-line"></div>
                                <h6>Extended Package <span class="d-block">Package expiry days left: 23 Days</span></h6>
                            </a>
                        </div>
                    </div>
                    <!-- MAIN CONTENT END -->
                </div>
            </div>
        </section>
    </main>
@endsection
  @section('js')


    @endsection