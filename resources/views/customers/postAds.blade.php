  @extends('website.layout')
   @section('css')
   <link rel="stylesheet" href="/css/dashboard.css">
<link rel="stylesheet" href="/css/dashboard-responsive.css">
<link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
   @endsection
@section('section')
<div class="ps-main-banner">
        <div class="ps-dark-overlay">
            <div class="container">
                <div class="ps-banner-content">
                    <h4>Post New Ad</h4>
                    <p><a href="index.html">Home</a> <span><i class="ti-angle-right"></i></span> <a href="insights.html">Dashboard</a> <span> <i class="ti-angle-right"></i></span> Post Ad</p>
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
                        <div class="ps-posted-ads ps-profile-setting">
                            <div class="ps-posted-ads__heading">
                                <h5>Post New Ad</h5>
                                <p>Click “Publish Ad” to Post Ad</p>
                                <button class="btn ps-btn">Publish Ad</button>
                            </div>
                            <div class="ps-profile-setting__content">
                                <!-- POST NEW AD FORM START -->
                                <form class="ps-profile-form">
                                    <div class="ps-profile--row">
                                        <div class="form-group">
                                            <label>
                                                <select class="form-control">
                                                    <option value="" disabled="" selected="" hidden="">Featured Ad:</option>
                                                    <option value="">Yes</option>
                                                    <option value="">No</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <select class="form-control">
                                                    <option value="" disabled="" selected="" hidden="">Select Category(s)*</option>
                                                    <option value="">Yes</option>
                                                    <option value="">No</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group ps-fullwidth">
                                            <input type="text" class="form-control" id="formGroupExampleInput" required="" placeholder="Your Ad Title Here*">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="formGroupExampleInput2" required="" placeholder="Item/ Product Price?*">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="formGroupExampleInput3" required="" placeholder="Mobile Number*">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="formGroupExampleInput4" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="formGroupExampleInput5" placeholder="Skype">
                                        </div>
                                        <div class="form-group ps-fullwidth">
                                            <textarea class="form-control" placeholder="Description*"></textarea>
                                        </div>
                                    </div>
                                </form>
                                <!-- POST NEW AD FORM END -->
                                  <div class="ps-profile-map ps-fullwidth">
                                            <div id="ps-locationmap" style="position: relative; overflow: hidden;">
                                                <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                                                    <div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;">
                                                        <div tabindex="0" aria-label="Map" aria-roledescription="map" role="group" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;">
                                                            <div style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);">
                                                                <div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
                                                                    <div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 984; transform: matrix(1, 0, 0, 1, -85, -205);">
                                                                        <div style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px;">
                                                                            <div style="width: 256px; height: 256px;"></div>
                                                                        </div>
                                                                        <div style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div>
                                                                    </div>
                                                                    <div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div>
                                                                </div>
                                                                <div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;">
                                                                    <div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div style="position: absolute; z-index: 984; transform: matrix(1, 0, 0, 1, -85, -205);"><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 256px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 984; transform: matrix(1, 0, 0, 1, -85, -205);"><div style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i16!2i33215!3i23163!4i256!2m3!1e0!2sm!3i543213770!2m3!1e2!6m1!3e5!3m17!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyBJ3q6w3hiHe_MIbB1Jy31bGOwL8LYlwJw&amp;token=37266" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i16!2i33214!3i23163!4i256!2m3!1e0!2sm!3i543213770!2m3!1e2!6m1!3e5!3m17!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyBJ3q6w3hiHe_MIbB1Jy31bGOwL8LYlwJw&amp;token=85497" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i16!2i33214!3i23162!4i256!2m3!1e0!2sm!3i543227686!2m3!1e2!6m1!3e5!3m17!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyBJ3q6w3hiHe_MIbB1Jy31bGOwL8LYlwJw&amp;token=26756" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i16!2i33215!3i23162!4i256!2m3!1e0!2sm!3i543266702!2m3!1e2!6m1!3e5!3m17!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyBJ3q6w3hiHe_MIbB1Jy31bGOwL8LYlwJw&amp;token=72511" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i16!2i33216!3i23162!4i256!2m3!1e0!2sm!3i543266702!2m3!1e2!6m1!3e5!3m17!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyBJ3q6w3hiHe_MIbB1Jy31bGOwL8LYlwJw&amp;token=24280" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i16!2i33216!3i23163!4i256!2m3!1e0!2sm!3i543213770!2m3!1e2!6m1!3e5!3m17!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyBJ3q6w3hiHe_MIbB1Jy31bGOwL8LYlwJw&amp;token=120106" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div class="gm-style-pbc" style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;"><p class="gm-style-pbt"></p></div><div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;"><div style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div></div><iframe aria-hidden="true" frameborder="0" tabindex="-1" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;"></iframe><div style="pointer-events: none; width: 100%; height: 100%; box-sizing: border-box; position: absolute; z-index: 1000002; opacity: 0; border: 2px solid rgb(26, 115, 232);"></div><div></div><div></div><div></div><div></div><div><button draggable="false" title="Toggle fullscreen view" aria-label="Toggle fullscreen view" type="button" class="gm-control-active gm-fullscreen-control" style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; top: 0px; right: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"></button></div><div></div><div></div><div></div><div></div><div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="40" controlheight="81" style="margin: 10px; user-select: none; position: absolute; bottom: 95px; right: 40px;"><div class="gmnoprint" controlwidth="40" controlheight="40" style="display: none; position: absolute;"><div style="width: 40px; height: 40px;"><button draggable="false" title="Rotate map 90 degrees" aria-label="Rotate map 90 degrees" type="button" class="gm-control-active" style="background: none rgb(255, 255, 255); display: none; border: 0px; margin: 0px 0px 32px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px; height: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px; height: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px; height: 18px;"></button><button draggable="false" title="Tilt map" aria-label="Tilt map" type="button" class="gm-tilt gm-control-active" style="background: none rgb(255, 255, 255); display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; top: 0px; left: 0px; overflow: hidden; width: 40px; height: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;"></button></div></div><div class="gmnoprint" controlwidth="40" controlheight="81" style="position: absolute; left: 0px; top: 0px;"><div draggable="false" style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 40px; height: 81px;"><button draggable="false" title="Zoom in" aria-label="Zoom in" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23333%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23111%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"></button><div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); top: 0px;"></div><button draggable="false" title="Zoom out" aria-label="Zoom out" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"></button></div></div></div></div><div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" rel="noopener" href="https://maps.google.com/maps?ll=46.578498,2.457275&amp;z=16&amp;t=m&amp;hl=en-GB&amp;gl=US&amp;mapclient=apiv3" title="Open this area in Google Maps (opens a new window)" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google4_hdpi.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div></div><div></div><div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 166px; bottom: 0px; width: 87px;"><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="text-decoration: none; cursor: pointer; display: none;">Map Data</a><span>Map data ©2021</span></div></div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 95px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-GB_US/help/terms_maps.html" target="_blank" rel="noopener" style="text-decoration: none; cursor: pointer; color: rgb(0, 0, 0);">Terms of Use</a></div></div><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_blank" rel="noopener" title="Report errors in the road map or imagery to Google" dir="ltr" href="https://www.google.com/maps/@46.578498,2.457275,16z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(0, 0, 0); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2021</div></div></div><div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 300px; height: 180px; position: absolute; left: 184px; top: 60px;"><div style="padding: 0px 0px 10px; font-size: 16px; box-sizing: border-box;">Map Data</div><div style="font-size: 13px;">Map data ©2021</div><button draggable="false" title="Close" aria-label="Close" type="button" class="gm-ui-hover-effect" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; top: 0px; right: 0px; width: 37px; height: 37px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%206.41L17.59%205%2012%2010.59%206.41%205%205%206.41%2010.59%2012%205%2017.59%206.41%2019%2012%2013.41%2017.59%2019%2019%2017.59%2013.41%2012z%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="pointer-events: none; display: block; width: 13px; height: 13px; margin: 12px;"></button></div></div></div><div style="background-color: white; font-weight: 500; font-family: Roboto, sans-serif; padding: 15px 25px; box-sizing: border-box; top: 5px; border: 1px solid rgba(0, 0, 0, 0.12); border-radius: 5px; left: 50%; max-width: 375px; position: absolute; transform: translateX(-50%); width: calc(100% - 10px); z-index: 1;"><div><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google_gray.svg" draggable="false" style="padding: 0px; margin: 0px; border: 0px; height: 17px; vertical-align: middle; width: 52px; user-select: none;"></div><div style="line-height: 20px; margin: 15px 0px;"><span style="color: rgba(0, 0, 0, 0.87); font-size: 14px;">This page can't load Google Maps correctly.</span></div><table style="width: 100%;"><tr><td style="line-height: 16px; vertical-align: middle;"><a href="https://developers.google.com/maps/documentation/javascript/error-messages?utm_source=maps_js&amp;utm_medium=degraded&amp;utm_campaign=billing#api-key-and-billing-errors" target="_blank" rel="noopener" style="color: rgba(0, 0, 0, 0.54); font-size: 12px;">Do you own this website?</a></td><td style="text-align: right;"><button class="dismissButton">OK</button></td></tr></table></div></div>
                                            <figure class="ps-circle">
                                                <img src="images/profile-setting/img-01.png" alt="Image Description">
                                            </figure>
                                        </div>
                                <!-- ADD FEATURES START -->
                                <div class="ps-add-feature">
                                    <div class="ps-add-feature__heading">
                                        <h5>Add Features</h5> 
                                        <a data-toggle="collapse" href="#collapseFeature" role="button" aria-expanded="false" aria-controls="collapseFeature"><i class="ti-angle-down"></i></a>   
                                    </div>
                                    <div class="collapse show" id="collapseFeature">
                                        <ul class="ps-profile-setting__imgs ps-add-feature__content ps-item-mesonry row " style="position: relative; height: 718px;">
                                            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 0px; top: 0px;">
                                                <h5>Printable:</h5>
                                                <input id="feature1" type="radio" name="print">                                                                                       
                                                <label for="feature1">
                                                    <span> No</span>                          
                                                </label>
                                                <input id="feature2" type="radio" name="print">                                         
                                                <label for="feature2">
                                                    <span>Yes</span>
                                                </label>
                                            </li>
                                            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 328px; top: 0px;">
                                                <h5>Paper Quality:</h5>
                                                <input id="feature3" type="radio" name="paper">
                                                <label for="feature3">
                                                    <span> Premium Quality</span>
                                                </label>
                                                <input id="feature4" type="radio" name="paper">
                                                <label for="feature4">
                                                    <span>Best Quality</span>
                                                </label>
                                                <input id="feature5" type="radio" name="paper">
                                                <label for="feature5">
                                                    <span>Regular Quality</span>
                                                </label>
                                            </li>
                                            <li class="ps-feature-select ps-paper-color col-md-6 ps-ms-item" style="position: absolute; left: 0px; top: 97px;">
                                                <h5>Paper Color:</h5>
                                                <input id="feature6" type="radio" name="color">
                                                <label for="feature6">
                                                    <span class="ps-black">Black</span>
                                                </label>
                                                <input id="feature7" type="radio" name="color">
                                                <label for="feature7">
                                                    <span class="ps-off-white">Off White</span>
                                                </label>
                                                <input id="feature8" type="radio" name="color">
                                                <label for="feature8">
                                                    <span class="ps-yellow">Yellow</span>
                                                </label>
                                                <input id="feature9" type="radio" name="color">
                                                <label for="feature9">
                                                    <span class="ps-orange">Orange</span>
                                                </label>
                                                <input id="feature10" type="radio" name="color">
                                                <label for="feature10">
                                                    <span class="ps-blue">Blue</span>
                                                </label>
                                                <input id="feature11" type="radio" name="color">
                                                <label for="feature11">
                                                    <span class="ps-pink">Pink</span>
                                                </label>
                                                <input id="feature12" type="radio" name="color">
                                                <label for="feature12">
                                                    <span>Other</span>
                                                </label>
                                                <input type="text" class="form-control" placeholder="Add Color Name">
                                            </li>
                                            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 328px; top: 126px;">
                                                <h5>Soft Copy:</h5>
                                                <input id="feature13" type="radio" name="softCopy">
                                                <label for="feature13">
                                                    <span>Availability On Demand</span>
                                                </label>
                                                <input id="feature14" type="radio" name="softCopy">
                                                <label for="feature14">
                                                    <span>Yes</span>
                                                </label>
                                                <input id="feature15" type="radio" name="softCopy">
                                                <label for="feature15">
                                                    <span>No</span>
                                                </label>
                                            </li>
                                            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 328px; top: 252px;">
                                                <h5>Color/ B&amp;W:</h5>
                                                <input id="feature16" type="radio" name="color">
                                                <label for="feature16">
                                                    <span>B&amp;W Single Side</span>
                                                </label>
                                                <input id="feature17" type="radio" name="color">
                                                <label for="feature17">
                                                    <span>B&amp;W Double Side</span>
                                                </label>
                                                <input id="feature18" type="radio" name="color">
                                                <label for="feature18">
                                                    <span>Color Single Side</span>
                                                </label>
                                                <input id="feature19" type="radio" name="color">
                                                <label for="feature19">
                                                    <span>Color Double Side</span>
                                                </label>
                                            </li>
                                            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 0px; top: 398px;">
                                                <h5>Spring Bind:</h5>
                                                <input id="feature20" type="radio" name="bind">
                                                <label for="feature20">
                                                    <span>No</span>
                                                </label>
                                                <input id="feature21" type="radio" name="bind">
                                                <label for="feature21">
                                                    <span>Yes</span>
                                                </label>
                                            </li>
                                            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 328px; top: 407px;">
                                                <h5>Door Step Delivery:</h5>
                                                <input id="feature22" type="radio" name="delivery">
                                                <label for="feature22">
                                                    <span>No</span>
                                                </label>
                                                <input id="feature23" type="radio" name="delivery">
                                                <label for="feature23">
                                                    <span>Yes</span>
                                                </label>
                                            </li>
                                            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 0px; top: 495px;">
                                                <h5>Leminated:</h5>
                                                <input id="feature24" type="radio" name="leminate">
                                                <label for="feature24">
                                                    <span>No</span>
                                                </label>
                                                <input id="feature25" type="radio" name="leminate">
                                                <label for="feature25">
                                                    <span>Yes</span>
                                                </label>
                                            </li>
                                            <li class="ps-feature-select col-md-6 ps-ms-item" style="position: absolute; left: 328px; top: 504px;">
                                                <h5>Color:</h5>
                                                <input id="feature26" type="checkbox" name="chooseColor">
                                                <label for="feature26">
                                                    <span>RGB</span>
                                                </label>
                                                <input id="feature27" type="checkbox" name="chooseColor">
                                                <label for="feature27">
                                                    <span>CMYK</span>
                                                </label>
                                                <input id="feature28" type="checkbox" name="chooseColor">
                                                <label for="feature28">
                                                    <span>B&amp;W</span>
                                                </label>
                                                <input id="feature29" type="checkbox" name="chooseColor">
                                                <label for="feature29">
                                                    <span>Others</span>
                                                </label>
                                                <input type="text" class="form-control" placeholder="Mention Here">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- ADD FEATURES END -->
                                <div class="ps-url">
                                    <div class="ps-url__input">
                                        <input type="text" class="form-control" placeholder="Ad Video Link(URL)">
                                        {{-- <button class="btn ps-blue ps-btn"><i class="ti-plus"></i></button> --}}
                                    </div>
                                    {{-- <div class="ps-url__input">
                                        <input type="text" class="form-control" placeholder="Ad Video Link(URL)">
                                        <button class="btn ps-red ps-btn"><i class="ti-trash"></i></button>
                                    </div> --}}
                                </div>
                                <!-- PROFILE SETTINGS START -->
                                <div class="ps-profile-setting__upload">
                                    <h5>Profile Settings</h5>
                                    <div class="ps-profile-setting__uploadarea">
                                        <button class="btn ps-btn">Select File</button>
                                        <p class="ps-drop">Drop files here to upload</p>
                                        <div></div>
                                        <p class="ps-loading">Uploading</p>
                                        <svg>
                                            <rect height="60px" width="100%" rx="6px" stroke-width="2" stroke-dasharray="12 12"></rect>
                                        </svg>
                                    </div>
                                    <form class="ps-profile-setting__imgs ps-x-axis mCustomScrollbar _mCS_1"><div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_horizontal mCSB_inside" style="max-height: none;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px; width: 758px;" dir="ltr">
                                        <label>
                                            <span>
                                                <img src="/images/post-ad/img-01.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <a href="javascript:void(0);" class="ps-trash"><span><i class="ti-trash"></i></span></a>
                                                <span class="ps-tick"><span><i class="fas fa-check"></i></span></span>
                                            </span>
                                        </label>
                                        <label>
                                            <span>
                                                <img src="/images/post-ad/img-02.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <a href="javascript:void(0);" class="ps-trash"><span><i class="ti-trash"></i></span></a> 
                                                <span class="ps-tick"><span><i class="fas fa-check"></i></span></span>  
                                            </span>
                                        </label>
                                        <label>
                                            <span>
                                                <img src="/images/post-ad/img-03.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <a href="javascript:void(0);" class="ps-trash"><span><i class="ti-trash"></i></span></a>  
                                                <span class="ps-tick"><span><i class="fas fa-check"></i></span></span> 
                                            </span>
                                        </label>
                                        <label>
                                            <span>
                                                <img src="/images/post-ad/img-04.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <a href="javascript:void(0);" class="ps-trash"><span><i class="ti-trash"></i></span></a> 
                                                <span class="ps-tick"><span><i class="fas fa-check"></i></span></span>  
                                            </span>
                                        </label>
                                        <label>
                                            <span>
                                                <img src="/images/post-ad/img-05.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <a href="javascript:void(0);" class="ps-trash"><span><i class="ti-trash"></i></span></a>   
                                                <span class="ps-tick"><span><i class="fas fa-check"></i></span></span>
                                            </span>
                                        </label>
                                        <label>
                                            <span>
                                                <img src="/images/post-ad/img-05.jpg" alt="Image Description" class="mCS_img_loaded">
                                                <a href="javascript:void(0);" class="ps-trash"><span><i class="ti-trash"></i></span></a>   
                                                <span class="ps-tick"><span><i class="fas fa-check"></i></span></span>
                                            </span>
                                        </label>
                                    </div><div id="mCSB_1_scrollbar_horizontal" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_horizontal" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_horizontal" class="mCSB_dragger" style="position: absolute; min-width: 30px; display: block; width: 520px; max-width: 618px; left: 0px;"><div class="mCSB_dragger_bar"></div></div><div class="mCSB_draggerRail"></div></div></div></div></form>
                                </div>
                                <!-- PROFILE SETTINGS END -->
                                <div class="ps-profile-setting__save">
                                    <button class="btn ps-btn">Save Changes</button>
                                    <p>Click “Save Changes” to update</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End MAIN CONTENT START -->
              
        </section>
    </main>
@endsection
  @section('js')
  <script src="/js/infobox/data.json"></script>
<script src="/js/infobox/mapclustering.js"></script>
<script src="/js/vendor/markerclusterer.min.js"></script>
<script src="/js/vendor/mapclustering.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ3q6w3hiHe_MIbB1Jy31bGOwL8LYlwJw"></script>
<script src="/js/vendor/gmap3.min.js"></script>

<script src="/js/vendor/masonry.pkgd.min.js"></script>
<script src="/js/vendor/jquery.mCustomScrollbar.concat.min.js"></script>
    @endsection