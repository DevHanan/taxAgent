<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" direction="rtl" style="direction: rtl" >

<!-- begin::Head -->

@include('dashboard_includs.head')

<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->

<!-- BEGIN: Header -->
@include('dashboard_includs.header')
<!-- END: Header -->

<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

    <!-- BEGIN: Left Aside -->
    @include('dashboard_includs.aside')
    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <div class="m-content">

@yield('content')
{{--

            <!--Begin::Section-->
            <div class="m-portlet">
                <div class="m-portlet__body  m-portlet__body--no-padding">
                    <div class="row m-row--no-padding m-row--col-separator-xl">
                        <div class="col-xl-4">

                            <!--begin:: Widgets/Stats2-1 -->
                            <div class="m-widget1">
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">Member Profit</h3>
                                            <span class="m-widget1__desc">Awerage Weekly Profit</span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-brand">+$17,800</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">Orders</h3>
                                            <span class="m-widget1__desc">Weekly Customer Orders</span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-danger">+1,800</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">Issue Reports</h3>
                                            <span class="m-widget1__desc">System bugs and issues</span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-success">-27,49%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end:: Widgets/Stats2-1 -->
                        </div>
                        <div class="col-xl-4">

                            <!--begin:: Widgets/Daily Sales-->
                            <div class="m-widget14">
                                <div class="m-widget14__header m--margin-bottom-30">
                                    <h3 class="m-widget14__title">
                                        Daily Sales
                                    </h3>
                                    <span class="m-widget14__desc">
													Check out each collumn for more details
												</span>
                                </div>
                                <div class="m-widget14__chart" style="height:120px;">
                                    <canvas id="m_chart_daily_sales"></canvas>
                                </div>
                            </div>

                            <!--end:: Widgets/Daily Sales-->
                        </div>
                        <div class="col-xl-4">

                            <!--begin:: Widgets/Profit Share-->
                            <div class="m-widget14">
                                <div class="m-widget14__header">
                                    <h3 class="m-widget14__title">
                                        Profit Share
                                    </h3>
                                    <span class="m-widget14__desc">
													Profit Share between customers
												</span>
                                </div>
                                <div class="row  align-items-center">
                                    <div class="col">
                                        <div id="m_chart_profit_share" class="m-widget14__chart" style="height: 160px">
                                            <div class="m-widget14__stat">45</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="m-widget14__legends">
                                            <div class="m-widget14__legend">
                                                <span class="m-widget14__legend-bullet m--bg-accent"></span>
                                                <span class="m-widget14__legend-text">37% Sport Tickets</span>
                                            </div>
                                            <div class="m-widget14__legend">
                                                <span class="m-widget14__legend-bullet m--bg-warning"></span>
                                                <span class="m-widget14__legend-text">47% Business Events</span>
                                            </div>
                                            <div class="m-widget14__legend">
                                                <span class="m-widget14__legend-bullet m--bg-brand"></span>
                                                <span class="m-widget14__legend-text">19% Others</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end:: Widgets/Profit Share-->
                        </div>
                    </div>
                </div>
            </div>

            <!--End::Section-->

            <!--Begin::Section-->
            <div class="row">
                <div class="col-xl-4">

                    <!--begin:: Widgets/Blog-->
                    <div class="m-portlet m-portlet--head-overlay m-portlet--full-height   m-portlet--rounded-force mb-0">
                        <div class="m-portlet__head m-portlet__head--fit">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text m--font-light">
                                        احصائيات الزوار
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <div class="m-dropdown__wrapper row">
                                    <div class="col-sm-12">
                                        <select class="form-control m-select2" id="select_1" name="param">
                                            <option value="">10/2018</option>
                                            <option value="1">09/2018</option>
                                            <option value="2">08/2018</option>
                                            <option value="3">07/2018</option>
                                            <option value="4">06/2018</option>
                                            <option value="5">05/2018</option>
                                            <option value="6">05/2018</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="m-widget28">
                                <div class="m-widget28__pic m-portlet-fit--sides"></div>
                                <div class="m-widget28__container">
                                    <ul class="m-widget28__nav-items nav nav-pills nav-fill" role="tablist">
                                        <li class="m-widget28__nav-item nav-item">
                                            <a class="nav-link co-000" data-toggle="pill" href="#menu11"><span><i class="fa flaticon-pie-chart"></i></span><span>عدد الزوار</span></a>
                                        </li>
                                        <li class="m-widget28__nav-item nav-item">
                                            <a class="nav-link co-000" data-toggle="pill" href="#menu21"><span><i class="fa flaticon-file-1"></i></span><span>عدد المشتركين</span></a>
                                        </li>
                                        <li class="m-widget28__nav-item nav-item">
                                            <a class="nav-link co-000" data-toggle="pill" href="#menu31"><span><i class="fa flaticon-clipboard"></i></span><span>عدد المستخدمين</span></a>
                                        </li>
                                    </ul>
                                    <!-- end::Nav pills -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end:: Widgets/Blog-->
                </div>
                <div class="col-xl-4">

                    <!--begin:: Widgets/Blog-->
                    <div class="m-portlet m-portlet--head-overlay m-portlet--full-height   m-portlet--rounded-force mb-0">
                        <div class="m-portlet__head m-portlet__head--fit">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text m--font-light">
                                        احصائيات الزوار
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <div class="m-dropdown__wrapper row">
                                    <div class="col-sm-12">
                                        <select class="form-control m-select2" id="select_2" name="param">
                                            <option value="">10/2018</option>
                                            <option value="1">09/2018</option>
                                            <option value="2">08/2018</option>
                                            <option value="3">07/2018</option>
                                            <option value="4">06/2018</option>
                                            <option value="5">05/2018</option>
                                            <option value="6">05/2018</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="m-widget28">
                                <div class="m-widget28__pic m-portlet-fit--sides"></div>
                                <div class="m-widget28__container">
                                    <ul class="m-widget28__nav-items nav nav-pills nav-fill" role="tablist">
                                        <li class="m-widget28__nav-item nav-item">
                                            <a class="nav-link co-000" data-toggle="pill" href="#menu11"><span><i class="fa flaticon-pie-chart"></i></span><span>عدد الزوار</span></a>
                                        </li>
                                        <li class="m-widget28__nav-item nav-item">
                                            <a class="nav-link co-000" data-toggle="pill" href="#menu21"><span><i class="fa flaticon-file-1"></i></span><span>عدد المشتركين</span></a>
                                        </li>
                                        <li class="m-widget28__nav-item nav-item">
                                            <a class="nav-link co-000" data-toggle="pill" href="#menu31"><span><i class="fa flaticon-clipboard"></i></span><span>عدد المستخدمين</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end:: Widgets/Blog-->
                </div>
                <div class="col-xl-4">
                    <!--begin:: Widgets/Blog-->
                    <div class="m-portlet m-portlet--head-overlay m-portlet--full-height   m-portlet--rounded-force mb-0">
                        <div class="m-portlet__head m-portlet__head--fit">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text m--font-light">
                                        احصائيات الزوار
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <div class="m-dropdown__wrapper row">
                                    <div class="col-sm-12">
                                        <select class="form-control m-select2" id="select_3" name="param">
                                            <option value="">10/2018</option>
                                            <option value="1">09/2018</option>
                                            <option value="2">08/2018</option>
                                            <option value="3">07/2018</option>
                                            <option value="4">06/2018</option>
                                            <option value="5">05/2018</option>
                                            <option value="6">05/2018</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="m-widget28">
                                <div class="m-widget28__pic m-portlet-fit--sides"></div>
                                <div class="m-widget28__container">
                                    <ul class="m-widget28__nav-items nav nav-pills nav-fill" role="tablist">
                                        <li class="m-widget28__nav-item nav-item">
                                            <a class="nav-link co-000" data-toggle="pill" href="#menu11"><span><i class="fa flaticon-pie-chart"></i></span><span>عدد الزوار</span></a>
                                        </li>
                                        <li class="m-widget28__nav-item nav-item">
                                            <a class="nav-link co-000" data-toggle="pill" href="#menu21"><span><i class="fa flaticon-file-1"></i></span><span>عدد المشتركين</span></a>
                                        </li>
                                        <li class="m-widget28__nav-item nav-item">
                                            <a class="nav-link co-000" data-toggle="pill" href="#menu31"><span><i class="fa flaticon-clipboard"></i></span><span>عدد المستخدمين</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Blog-->
                </div>
            </div>
            <!--End::Section-->

            <!--Begin::Section-->
            <div class="row">
                <div class="col-xl-6 col-lg-12">

                    <!--Begin::Portlet-->
                    <div class="m-portlet m-portlet--full-height ">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        الاشعارات
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget2_tab1_content" role="tab">
                                            اليوم
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget2_tab2_content" role="tab">
                                            الأمس
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="m_widget2_tab1_content">

                                    <!--Begin::Timeline 3 -->
                                    <div class="m-timeline-3">
                                        <div class="m-timeline-3__items">
                                            <div class="m-timeline-3__item m-timeline-3__item--info">
                                                <span class="m-timeline-3__item-time">09:00</span>
                                                <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	اضافة محتوى جديد
																</span><br>
                                                    <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		من بلال
																	</a>
																</span>
                                                </div>
                                            </div>
                                            <div class="m-timeline-3__item m-timeline-3__item--warning">
                                                <span class="m-timeline-3__item-time">10:00</span>
                                                <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	طلب انضمام الى ارابيك
																</span><br>
                                                    <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		من احمد
																	</a>
																</span>
                                                </div>
                                            </div>
                                            <div class="m-timeline-3__item m-timeline-3__item--brand">
                                                <span class="m-timeline-3__item-time">11:00</span>
                                                <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																		اضافة محتوى جديد
																</span><br>
                                                    <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																			من احمد
																	</a>
																</span>
                                                </div>
                                            </div>
                                            <div class="m-timeline-3__item m-timeline-3__item--success">
                                                <span class="m-timeline-3__item-time">12:00</span>
                                                <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																		طلب انضمام الى ارابيك
																</span><br>
                                                    <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																			من احمد
																	</a>
																</span>
                                                </div>
                                            </div>
                                            <div class="m-timeline-3__item m-timeline-3__item--danger">
                                                <span class="m-timeline-3__item-time">14:00</span>
                                                <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																		اضافة محتوى جديد
																</span><br>
                                                    <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																			من احمد
																	</a>
																</span>
                                                </div>
                                            </div>
                                            <div class="m-timeline-3__item m-timeline-3__item--info">
                                                <span class="m-timeline-3__item-time">15:00</span>
                                                <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																		طلب انضمام الى ارابيك
																</span><br>
                                                    <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																			من بلال
																	</a>
																</span>
                                                </div>
                                            </div>
                                            <div class="m-timeline-3__item m-timeline-3__item--brand">
                                                <span class="m-timeline-3__item-time">17:00</span>
                                                <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																		طلب انضمام الى ارابيك
																</span><br>
                                                    <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																			من بلال
																	</a>
																</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--End::Timeline 3 -->
                                </div>
                                <div class="tab-pane" id="m_widget2_tab2_content">

                                    <!--Begin::Timeline 3 -->
                                    <div class="m-timeline-3">
                                        <div class="m-timeline-3__items">
                                            <div class="m-timeline-3__item m-timeline-3__item--info">
                                                <span class="m-timeline-3__item-time m--font-focus">09:00</span>
                                                <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																		اضافة محتوى جديد
																</span><br>
                                                    <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																			من بلال
																	</a>
																</span>
                                                </div>
                                            </div>
                                            <div class="m-timeline-3__item m-timeline-3__item--warning">
                                                <span class="m-timeline-3__item-time m--font-warning">10:00</span>
                                                <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																		اضافة محتوى جديد
																</span><br>
                                                    <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		من بلال
																	</a>
																</span>
                                                </div>
                                            </div>
                                            <div class="m-timeline-3__item m-timeline-3__item--brand">
                                                <span class="m-timeline-3__item-time m--font-primary">11:00</span>
                                                <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																		اضافة محتوى جديد
																</span><br>
                                                    <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																			من بلال
																	</a>
																</span>
                                                </div>
                                            </div>
                                            <div class="m-timeline-3__item m-timeline-3__item--success">
                                                <span class="m-timeline-3__item-time m--font-success">12:00</span>
                                                <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																		اضافة محتوى جديد
																</span><br>
                                                    <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																			من بلال
																	</a>
																</span>
                                                </div>
                                            </div>
                                            <div class="m-timeline-3__item m-timeline-3__item--danger">
                                                <span class="m-timeline-3__item-time m--font-warning">14:00</span>
                                                <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																		اضافة محتوى جديد
																</span><br>
                                                    <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																			من بلال
																	</a>
																</span>
                                                </div>
                                            </div>
                                            <div class="m-timeline-3__item m-timeline-3__item--info">
                                                <span class="m-timeline-3__item-time m--font-info">15:00</span>
                                                <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																		اضافة محتوى جديد
																</span><br>
                                                    <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																			من بلال
																	</a>
																</span>
                                                </div>
                                            </div>
                                            <div class="m-timeline-3__item m-timeline-3__item--brand">
                                                <span class="m-timeline-3__item-time m--font-danger">17:00</span>
                                                <div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																		اضافة محتوى جديد
																</span><br>
                                                    <span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																			من بلال
																	</a>
																</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--End::Timeline 3 -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--End::Portlet-->
                </div>
            </div>
--}}

            <!--End::Section-->

        </div>
    </div>
</div>

<!-- end:: Body -->



<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

<!-- end::Scroll Top -->
@include('dashboard_includs.script')

</body>

<!-- end::Body -->
</html>