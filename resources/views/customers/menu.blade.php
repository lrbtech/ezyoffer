<style>
.admin-message-count {
    background: red;
    color: #ffffff;
    padding: 3px 5px;
    border-radius: 5px;
}
</style>
<div class="default-sidebar category-sidebar">
    <div class="sidebar-search sidebar-widget">
        <div class="widget-title">
            <h3>{{$language[150][session()->get('lang')]}}</h3>
        </div>
        <div class="widget-content">
            <ul class="account-links">
                <li class="sidebar_dashboard"><a href="/customer/dashboard"><i class="fas fa-layer-group"></i> {{$language[142][session()->get('lang')]}}</a></li>
                <li class="sidebar_settings"><a href="/customer/profile-settings"><i class="fas fa-user-circle"></i> {{$language[143][session()->get('lang')]}}</a></li>
                <li class="sidebar_my_ads"><a href="/customer/my-ads"><i class="fas fa-list-ul"></i> {{$language[144][session()->get('lang')]}}</a></li>
                <li class="sidebar_post_ad"><a href="/customer/new-post-ads"><i class="fas fa-paper-plane"></i> {{$language[145][session()->get('lang')]}}</a></li>
                <!-- <li class="sidebar_offer"><a href="/customer/offers"><i class="fas fa-envelope"></i> Offers</a></li> -->
                <li class="sidebar_chat"><a href="/customer/chat"><i class="fas fa-envelope"></i> {{$language[140][session()->get('lang')]}} <span class="message-count">0</span></a></li>
                <!-- <li class="sidebar_packages"><a href="/customer/packages"><i class="fas fa-repeat"></i> Buy/Renew Packages</a></li> -->
                <li class="sidebar_favourite"><a href="/customer/favourite"><i class="fas fa-star"></i> {{$language[147][session()->get('lang')]}}</a></li>
                <li class="sidebar_account"><a href="/customer/account-privacy"><i class="fas fa-info-circle"></i> {{$language[148][session()->get('lang')]}}</a></li>
                <li class="sidebar_chat_admin"><a href="/customer/chat-admin"><i class="fas fa-envelope"></i> {{$language[146][session()->get('lang')]}} <span class="admin-message-count">0</span></a></li>
                <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-inbox-out"></i> {{$language[149][session()->get('lang')]}}</a></a>
                </li> 

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>

            </ul>
        </div>
    </div>
    <div class="tags-widget sidebar-widget">
        <!-- <div class="widget-title">
            <h3>Google Ads</h3>
        </div> -->
        <div class="widget-content">
            @if($google_ads->image_300_250 != '')
            <center><img src="/ads_image/{{$google_ads->image_300_250}}"></center>
            @else
            <center><img src="https://via.placeholder.com/300x250"></center> 
            @endif
        </div>
    </div> 

</div>