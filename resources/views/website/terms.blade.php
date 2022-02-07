@extends('website.layouts')
@section('css')
@endsection
@section('section')

<!-- Page Title -->
<section class="page-title style-two" style="background-image: url(/assets/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="content-box centred mr-0">
            <div class="title">
                <h1>{{$language[131][session()->get('lang')]}}</h1>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a class="translate" href="/">Home</a></li>
                <li>{{$language[131][session()->get('lang')]}}</li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title -->


<!-- category-details -->
<section class="category-details bg-color-2">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                @include('website.menu')
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="section-single">
                    <?php echo html_entity_decode($settings->terms_and_conditions); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- category-details end -->
@endsection
@section('js')
<script type="text/javascript">
$('.sidebar_terms').addClass('active');
</script>
@endsection