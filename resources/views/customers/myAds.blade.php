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
                    <h4>My Ads</h4>
                    <p><a href="index.html">Home</a> <span><i class="ti-angle-right"></i></span> <a href="insights.html">Dashboard</a> <span><i class="ti-angle-right"></i></span> My Ads</p>
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
                        <div class="ps-posted-ads">
                            <div class="ps-posted-ads__heading">
                                <h5>My Posted Ads</h5>
                                <label class="ps-sort">
                                    <select class="form-control">
                                        <option selected="" hidden="">Show:</option>
                                        <option>All</option>
                                        <option>Half</option>
                                    </select>
                                </label>
                                <button class="btn ps-btn">Post Ad</button>
                            </div>
                            <div class="ps-items-heading">
                                <h6>Title</h6><h6>Status</h6><h6>Actions</h6>
                            </div>
                            <div>
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
                                </ul>
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
                            <div class="ps-no-ads">
                                <div>
                                    <figure><img src="/images/grid-list/img-03.png" alt="Image Description"></figure>
                                    <h5>No Ad Posted Yet :(</h5>
                                    <h6>Click “Post Ad” button below to post your free ad</h6>
                                    <button class="btn ps-btn">Post Ad</button>
                                </div>
                            </div>
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