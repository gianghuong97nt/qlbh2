<div class="sticky-header header-section ">
    <div class="header-right">
        <!--search-box-->
        <div class="search-box">
            <form class="input">
                <input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
                <label class="input__label" for="input-31">
                    <svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
                        <path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
                    </svg>
                </label>
            </form>
        </div><!--//end-search-box-->

        <div class="profile_details">
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile_img">
                            <span class="prfil-img"><img src="{{ asset('admin_assets/images/2.jpg') }}" alt=""> </span>
                            <div class="user-name">
                                <p>Name</p>
                                <span>admin_assetsistrator</span>
                            </div>
                            <i class="fa fa-angle-down lnr"></i>
                            <i class="fa fa-angle-up lnr"></i>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <ul class="dropdown-menu drp-mnu">
                        {{--<li> <a href="{{route('admin.auth.profile')}}"><i class="fa fa-suitcase"></i>Thông tin cá nhân </a>--}}
                        {{--<li> <a href="{{route('admin.auth.password')}}"><i class="fa fa-user"></i>Password</a> </li>--}}
                        {{--<li> <a href="{{route('admin.auth.logout')}}"><i class="fa fa-sign-out"></i> Logout</a> </li>--}}
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
</div>