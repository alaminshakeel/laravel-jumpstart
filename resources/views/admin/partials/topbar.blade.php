<div class="header navbar">
    <div class="header-container">
        <ul class="nav-left">
            <li>
                <a id='sidebar-toggle' class="sidebar-toggle" href="javascript:void(0);">
                    <i class="ti-menu"></i>
                </a>
            </li>
            {{--<li class="search-box">--}}
                {{--<a class="search-toggle no-pdd-right" href="javascript:void(0);">--}}
                    {{--<i class="search-icon ti-search pdd-right-10"></i>--}}
                    {{--<i class="search-icon-close ti-close pdd-right-10"></i>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="search-input">
                <input class="form-control" type="text" placeholder="Search...">
            </li>
        </ul>
        <ul class="nav-right">
            {{--<li class="notifications dropdown">--}}
                {{--<span class="counter bgc-red">3</span>--}}
                {{--<a href="" class="dropdown-toggle no-after" data-toggle="dropdown">--}}
                    {{--<i class="ti-email"></i>--}}
                {{--</a>--}}

                {{--<ul class="dropdown-menu">--}}
                    {{--<li class="pX-20 pY-15 bdB">--}}
                        {{--<i class="ti-email pR-10"></i>--}}
                        {{--<span class="fsz-sm fw-600 c-grey-900">Notifications</span>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">--}}
                            {{--<li>--}}
                                {{--<a href="" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>--}}
                                    {{--<div class="peer mR-15">--}}
                                        {{--<img class="w-3r bdrs-50p" src="/images/1.jpg" alt="">--}}
                                    {{--</div>--}}
                                    {{--<div class="peer peer-greed">--}}
                                        {{--<span>--}}
                                            {{--<span class="fw-500">John Doe</span>--}}
                                            {{--<span class="c-grey-600">liked your <span class="text-dark">post</span>--}}
                                            {{--</span>--}}
                                        {{--</span>--}}
                                        {{--<p class="m-0">--}}
                                            {{--<small class="fsz-xs">5 mins ago</small>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>--}}
                                    {{--<div class="peer mR-15">--}}
                                        {{--<img class="w-3r bdrs-50p" src="/images/2.jpg" alt="">--}}
                                    {{--</div>--}}
                                    {{--<div class="peer peer-greed">--}}
                                        {{--<span>--}}
                                            {{--<span class="fw-500">Moo Doe</span>--}}
                                            {{--<span class="c-grey-600">liked your <span class="text-dark">cover image</span>--}}
                                            {{--</span>--}}
                                        {{--</span>--}}
                                        {{--<p class="m-0">--}}
                                            {{--<small class="fsz-xs">7 mins ago</small>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>--}}
                                    {{--<div class="peer mR-15">--}}
                                        {{--<img class="w-3r bdrs-50p" src="/images/3.jpg" alt="">--}}
                                    {{--</div>--}}
                                    {{--<div class="peer peer-greed">--}}
                                        {{--<span>--}}
                                            {{--<span class="fw-500">Lee Doe</span>--}}
                                            {{--<span class="c-grey-600">commented on your <span class="text-dark">video</span>--}}
                                            {{--</span>--}}
                                        {{--</span>--}}
                                        {{--<p class="m-0">--}}
                                            {{--<small class="fsz-xs">10 mins ago</small>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="pX-20 pY-15 ta-c bdT">--}}
                        {{--<span>--}}
                            {{--<a href="" class="c-grey-600 cH-blue fsz-sm td-n">View All Notifications--}}
                                {{--<i class="ti-angle-right fsz-xs mL-10"></i>--}}
                            {{--</a>--}}
                        {{--</span>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--@if(Auth::user()->role == 10)--}}
            {{--<li class="notifications dropdown">--}}
                {{--<span class="counter bgc-blue">{{ $total_expiry_items }}</span>--}}
                {{--<a href="" class="dropdown-toggle no-after" data-toggle="dropdown">--}}
                    {{--<i class="ti-bell"></i>--}}
                {{--</a>--}}

                {{--<ul class="dropdown-menu expiryy" style="overflow-y: scroll;height: 400px;">--}}
                    {{--<li class="pX-20 pY-15 bdB">--}}
                        {{--<i class="ti-bell pR-10"></i>--}}
                        {{--<span class="fsz-sm fw-600 c-grey-900">Licence Expires</span>--}}
                    {{--</li>--}}
                    {{--<li style="display: flex;">--}}
                        {{--<table class="table" style="text-align: center">--}}
                            {{--<tr><th>Pilot Name</th><th>Expires in</th></tr>--}}
                            {{--@foreach($expiry_items as $exp)--}}
                                {{--{{ dd($exp) }}--}}
                                {{--@if($exp->count)--}}
                                    {{--@foreach($exp->items as $items)--}}
                                        {{--@foreach($items as $item)--}}
                                        {{--<tr><td>{{ $item->pilot_name }}</td><td>{{ $exp->within }}</td></tr>--}}
                                        {{--@endforeach--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                                {{--<tr><td>{{ $exp->details->pilot_name }}</td><td><span class="badge badge-pill badge-danger lh-0 p-10">{{ $exp->days_before_expire }} Days</span></td></tr>--}}
                            {{--@endforeach--}}
                        {{--</table>--}}
                        {{--@if($notify_email_3 && $notify_email_3['count'])--}}
                        {{--<ul style="height: 400px;overflow-y: scroll" class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">--}}
                            {{--<li class="pX-20 pY-15 bdB">--}}
                                {{--<i class="ti-email pR-10"></i>--}}
                                {{--<span class="fsz-sm fw-600 c-grey-900">Within 3 days</span>--}}
                            {{--</li>--}}
                            {{--@for($i = 0; $i < 4 ; $i++)--}}
                                {{--@foreach($notify_email_3[$i] as $item)--}}
                                {{--<li>--}}
                                    {{--<a href="" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>--}}
                                        {{--<div class="peer mR-15">--}}
                                            {{--<img class="w-3r bdrs-50p" src="http://placehold.it/160x160" alt="">--}}
                                        {{--</div>--}}
                                        {{--<div class="peer peer-greed">--}}
                                            {{--<div>--}}
                                                {{--<div class="peers jc-sb fxw-nw mB-5">--}}
                                                    {{--<div class="peer">--}}
                                                        {{--<p class="fw-500 mB-0">{{ $item->pilot_name }}</p>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="peer">--}}
                                                        {{--<small class="fsz-xs">{{ $item->pilot_name }}</small>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<span class="c-grey-600 fsz-sm">--}}
                                                    {{--Want to create your own customized data generator for your app...--}}
                                                {{--</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--@endforeach--}}
                            {{--@endfor--}}

                        {{--</ul>--}}
                        {{--@endif--}}
                        {{--@if($notify_email_5 && $notify_email_5['count'])--}}
                            {{--<ul style="height: 400px;overflow-y: scroll"  class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">--}}
                                {{--<li class="pX-20 pY-15 bdB">--}}
                                    {{--<i class="ti-email pR-10"></i>--}}
                                    {{--<span class="fsz-sm fw-600 c-grey-900">Within 5 days</span>--}}
                                {{--</li>--}}
                                {{--@for($i = 0; $i < 4 ; $i++)--}}
                                    {{--@foreach($notify_email_5[$i] as $item)--}}
                                        {{--<li>--}}
                                            {{--<a href="" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>--}}
                                                {{--<div class="peer mR-15">--}}
                                                    {{--<img class="w-3r bdrs-50p" src="http://placehold.it/160x160" alt="">--}}
                                                {{--</div>--}}
                                                {{--<div class="peer peer-greed">--}}
                                                    {{--<div>--}}
                                                        {{--<div class="peers jc-sb fxw-nw mB-5">--}}
                                                            {{--<div class="peer">--}}
                                                                {{--<p class="fw-500 mB-0">{{ $item->pilot_name }}</p>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="peer">--}}
                                                                {{--<small class="fsz-xs">{{ $item->pilot_name }}</small>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                        {{--<span class="c-grey-600 fsz-sm">--}}
                                                        {{--Want to create your own customized data generator for your app...--}}
                                                    {{--</span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                    {{--@endforeach--}}
                                {{--@endfor--}}

                            {{--</ul>--}}
                        {{--@endif--}}
                        {{--@if($notify_email_10 && $notify_email_10['count'])--}}
                        {{--<ul style="height: 400px;overflow-y: scroll"  class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">--}}
                            {{--<li class="pX-20 pY-15 bdB">--}}
                                {{--<i class="ti-email pR-10"></i>--}}
                                {{--<span class="fsz-sm fw-600 c-grey-900">Within 10 days</span>--}}
                            {{--</li>--}}
                            {{--@for($i = 0; $i < 4 ; $i++)--}}
                                {{--@foreach($notify_email_10[$i] as $item)--}}
                                    {{--<li>--}}
                                        {{--<a href="" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>--}}
                                            {{--<div class="peer mR-15">--}}
                                                {{--<img class="w-3r bdrs-50p" src="http://placehold.it/160x160" alt="">--}}
                                            {{--</div>--}}
                                            {{--<div class="peer peer-greed">--}}
                                                {{--<div>--}}
                                                    {{--<div class="peers jc-sb fxw-nw mB-5">--}}
                                                        {{--<div class="peer">--}}
                                                            {{--<p class="fw-500 mB-0">{{ $item->pilot_name }}</p>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="peer">--}}
                                                            {{--<small class="fsz-xs">{{ $item->pilot_name }}</small>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<span class="c-grey-600 fsz-sm">--}}
                                                    {{--Want to create your own customized data generator for your app...--}}
                                                {{--</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--@endforeach--}}
                            {{--@endfor--}}

                        {{--</ul>--}}
                        {{--@endif--}}
                    {{--</li>--}}
                    {{--<li class="pX-20 pY-15 ta-c bdT">--}}
                        {{--<span>--}}
                            {{--<a href="" class="c-grey-600 cH-blue fsz-sm td-n">View All Email <i class="fs-xs ti-angle-right mL-10"></i>--}}
                            {{--</a>--}}
                        {{--</span>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--@endif--}}
            <li class="dropdown">
                <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                    <div class="peer mR-10">
                        <img class="w-2r bdrs-50p" src="{{ auth()->user()->avatar }}" alt="">
                    </div>
                    <div class="peer">
                        <span class="fsz-sm c-grey-900">{{ auth()->user()->name }}</span>
                    </div>
                </a>
                <ul class="dropdown-menu fsz-sm">
                    {{--<li>--}}
                        {{--<a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">--}}
                            {{--<i class="ti-settings mR-10"></i>--}}
                            {{--<span>Setting</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">--}}
                            {{--<i class="ti-user mR-10"></i>--}}
                            {{--<span>Profile</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">--}}
                            {{--<i class="ti-email mR-10"></i>--}}
                            {{--<span>Messages</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li role="separator" class="divider"></li>--}}
                    <li>
                        <a href="/logout" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <i class="ti-power-off mR-10"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
