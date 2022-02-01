<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  m-menu__item" aria-haspopup="true"><a href="{{url('/admin')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-home-1"></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">الرئيسية</span>
									  </span></span></a>
            </li>

            <!-- Start Item of roles-->
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                <span class="m-menu__link ">
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">المستخدمين و الصلاحيات</span>
									<span class="m-menu__link-badge"></span>
                        </span>
                    </span>
                </span>
            </li>
            @can('show roles')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon  fas fa-user-shield "></i><span class="m-menu__link-text">صلاحيات المستخدمين</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/roles')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">كل الصلاحيات</span>
                                </a>
                            </li>
                            <!-- End Item -->

                            <!-- Start Item -->
                            @can('create roles')
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('/admin/roles/create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span></i><span class="m-menu__link-text">صلاحية جديدة</span>
                                    </a>
                                </li>
                             @endcan
                            <!-- End Item -->
                        </ul>
                    </div>
                </li>
             @endcan
            <!-- End Item of roles-->

            <!-- Start Item of Users-->
                @can('show users')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon  fas fa-user-tie"></i><span class="m-menu__link-text">مستخدمو الموقع</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/users')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">كل المستخدمين</span>
                                </a>
                            </li>
                            <!-- End Item -->

                            <!-- Start Item -->
                            @can('create users')
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('/admin/users/create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span></i><span class="m-menu__link-text">انشاء حساب جديد</span>
                                    </a>
                                </li>
                            @endcan
                            <!-- End Item -->
                        </ul>
                    </div>
                </li>
                 @endcan
            <!-- End Item of Users-->

            <!-- Start Item of Clients-->
            @can('show clients')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon  fas fa-user-shield"></i><span class="m-menu__link-text">عملاء الموقع</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/clients')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">كل العملاء</span>
                                </a>
                            </li>
                            <!-- End Item -->

                            <!-- Start Item -->
                            @can('create clients')
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('/admin/clients/create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span></i><span class="m-menu__link-text">عميل جديد</span>
                                    </a>
                                </li>
                        @endcan
                        <!-- End Item -->
                        </ul>
                    </div>
                </li>
            @endcan
        <!-- End Item of Clients-->

            <!-- Start Item of Sayings-->
            @can('show sayings')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon  fas fa-user-shield"></i><span class="m-menu__link-text">قالوا عنا</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/sayings')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">كل الأقوال</span>
                                </a>
                            </li>
                            <!-- End Item -->



                        </ul>
                    </div>
                </li>
            @endcan
        <!-- End Item of Sayings-->



            <!--End Group of users-->

            <!--Start Group of media-->
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                <span class="m-menu__link ">
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">المدونة و الميديا</span>
									<span class="m-menu__link-badge"></span>
                        </span>
                    </span>
                </span>
            </li>
            <!-- Start Item of albums-->
            @can('show albums')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon  fa fa-images"></i><span class="m-menu__link-text">معرض الصور</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/albums')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">كل الألبومات</span>
                                </a>
                            </li>
                            <!-- End Item -->

                           @can('create albums')
                               <!-- Start Item -->
                                   <li class="m-menu__item " aria-haspopup="true">
                                       <a href="{{url('/admin/albums/create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                               <span></span></i><span class="m-menu__link-text">ألبوم جديد</span>
                                       </a>
                                   </li>
                                   <!-- End Item -->
                            @endcan
                        </ul>
                    </div>
                </li>

             @endcan
            <!-- End Item of albums-->

            <!-- Start Item of playlists-->
            @can('show playlists')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon   fas fa-play-circle"></i><span class="m-menu__link-text">مكتبة الفيديو</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/playlists')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">كل قوائم التشغيل</span>
                                </a>
                            </li>
                            <!-- End Item -->

                        @can('create playlists')
                            <!-- Start Item -->
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('/admin/playlists/create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span></i><span class="m-menu__link-text">ألبوم جديد</span>
                                    </a>
                                </li>
                                <!-- End Item -->
                            @endcan
                        </ul>
                    </div>
                </li>

            @endcan
            <!-- End Item of playlists-->

            <!-- Start Item of videos-->
            @can('show videos')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-video"></i><span class="m-menu__link-text">الفيديوهات</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/videos')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">كل الفيديوهات</span>
                                </a>
                            </li>
                            <!-- End Item -->

                        @can('create videos')
                            <!-- Start Item -->
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('/admin/videos/create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span></i><span class="m-menu__link-text">فيديو جديد</span>
                                    </a>
                                </li>
                                <!-- End Item -->
                            @endcan
                        </ul>
                    </div>
                </li>

            @endcan
        <!-- End Item of videos-->

            <!-- Start Item of categories-->
            @can('show categories')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon  fa fa-check-square"></i><span class="m-menu__link-text">تصنيفات المقالات</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/categories')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">كل التصنيفات</span>
                                </a>
                            </li>
                            <!-- End Item -->

                        @can('create categories')
                            <!-- Start Item -->
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('/admin/categories/create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span></i><span class="m-menu__link-text">تصنيف جديد</span>
                                    </a>
                                </li>
                                <!-- End Item -->
                            @endcan
                        </ul>
                    </div>
                </li>

            @endcan
        <!-- End Item of categories-->
            <!-- Start Item of posts-->
            @can('show posts')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon  far fa-newspaper"></i><span class="m-menu__link-text">المقالات</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/posts')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">كل المقالات</span>
                                </a>
                            </li>
                            <!-- End Item -->

                        @can('create posts')
                            <!-- Start Item -->
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('/admin/posts/create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span></i><span class="m-menu__link-text">مقال جديد</span>
                                    </a>
                                </li>
                                <!-- End Item -->
                            @endcan
                        </ul>
                    </div>
                </li>

            @endcan
        <!-- End Item of posts-->



            <!--End Group of media -->
            <!--Start Group of Serves-->
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                <span class="m-menu__link ">
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">الخدمات و الدورات </span>
									<span class="m-menu__link-badge"></span>
                        </span>
                    </span>
                </span>
            </li>

            <!-- Start Item of courses-->
            @can('show courses')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon  fas fa-swatchbook"></i><span class="m-menu__link-text">الدورات</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/courses')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">كل الدورات</span>
                                </a>
                            </li>
                            <!-- End Item -->

                        @can('create courses')
                            <!-- Start Item -->
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('/admin/courses/create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span></i><span class="m-menu__link-text">دورة جديدة</span>
                                    </a>
                                </li>
                                <!-- End Item -->
                            @endcan
                        </ul>
                    </div>
                </li>

            @endcan
             <!-- End Item of courses-->

            <!-- Start Item of contracts-->
            @can('show contracts')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fas fa-file-signature"></i><span class="m-menu__link-text">العقود</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/contracts')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">كل العقود</span>
                                </a>
                            </li>
                            <!-- End Item -->

                        @can('create contracts')
                            <!-- Start Item -->
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('/admin/contracts/create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span></i><span class="m-menu__link-text">عقد جديد</span>
                                    </a>
                                </li>
                                <!-- End Item -->
                            @endcan
                        </ul>
                    </div>
                </li>

            @endcan
             <!-- End Item of contracts-->

            <!-- Start Item of services-->
            @can('show services')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fas fa-file-signature"></i><span class="m-menu__link-text">الخدمات</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/services')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">كل الخدمات</span>
                                </a>
                            </li>
                            <!-- End Item -->

                        @can('create services')
                            <!-- Start Item -->
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('/admin/services/create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span></i><span class="m-menu__link-text">خدمة جديد</span>
                                    </a>
                                </li>
                                <!-- End Item -->
                            @endcan
                        </ul>
                    </div>
                </li>

            @endcan
        <!-- End Item of services-->


            <!-- Start Item of orders-->
            @can('show orders')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fas fa-server"></i><span class="m-menu__link-text">طلبات الخدمات</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/orders')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">كل طلبات الخدمات</span>
                                </a>
                            </li>
                            <!-- End Item -->


                        </ul>
                    </div>
                </li>

            @endcan
        <!-- End Item of orders-->
            <!--End Group of Serves -->

            <!--Start Group of pages-->
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                <span class="m-menu__link ">
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">صفحات الموقع </span>
									<span class="m-menu__link-badge"></span>
                        </span>
                    </span>
                </span>
            </li>
            <!-- Start Item of home_page-->
            @can('show home_page')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fas fa-hotel"></i><span class="m-menu__link-text">الصفحة الرئيسية</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/sliders')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">عارض الشرائح</span>
                                </a>
                            </li>
                            <!-- End Item -->

                         </ul>
                    </div>
                </li>

            @endcan
        <!-- End Item of home_page-->
            <!-- Start Item of usage-->
            @can('show usages')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fas fa-hotel"></i><span class="m-menu__link-text">سياسة الاستخدام و الخصوصية </span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/usage')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">تعديل</span>
                                </a>
                            </li>
                            <!-- End Item -->

                        </ul>
                    </div>
                </li>

            @endcan
        <!-- End Item of usage-->
            <!-- Start Item of contact_us-->
            @can('show contact_us')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fas fa-hotel"></i><span class="m-menu__link-text">تواصل معنا</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/contact_us')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">تعديل</span>
                                </a>
                            </li>
                            <!-- End Item -->

                        </ul>
                    </div>
                </li>

            @endcan
        <!-- End Item of contact_us-->

            <!--End Group of pages-->
            <!--Start Group of market-->
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                <span class="m-menu__link ">
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">التسوق</span>
									<span class="m-menu__link-badge"></span>
                        </span>
                    </span>
                </span>
            </li>

            <!-- Start Item of types-->
            @can('show types')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fab fa-cuttlefish"></i><span class="m-menu__link-text">تصنيفات المنتجات</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/types')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">كل التصنيفات</span>
                                </a>
                            </li>
                            <!-- End Item -->

                        @can('create types')
                            <!-- Start Item -->
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('/admin/types/create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span></i><span class="m-menu__link-text">تصنيف جديد</span>
                                    </a>
                                </li>
                                <!-- End Item -->
                            @endcan
                        </ul>
                    </div>
                </li>

            @endcan
        <!-- End Item of types-->

            <!-- Start Item of products-->
            @can('show products')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fab fa-product-hunt"></i><span class="m-menu__link-text">المنتجات</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/products')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">كل المنتجات</span>
                                </a>
                            </li>
                            <!-- End Item -->

                        @can('create products')
                            <!-- Start Item -->
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('/admin/products/create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span></i><span class="m-menu__link-text">منتج جديد</span>
                                    </a>
                                </li>
                                <!-- End Item -->
                            @endcan
                        </ul>
                    </div>
                </li>

            @endcan
        <!-- End Item of products-->
            <!-- Start Item of requests-->
            @can('show requests')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fab fa-request-hunt"></i><span class="m-menu__link-text">طلبات الشراء</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- Start Item -->
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{url('/admin/requests')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span></i><span class="m-menu__link-text">كل طلبات الشراء</span>
                                </a>
                            </li>
                            <!-- End Item -->


                        </ul>
                    </div>
                </li>

            @endcan
        <!-- End Item of requests-->

            <!--End Group of market-->




            <!--Start Group of settings-->
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                <span class="m-menu__link ">
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">ثوابت الموقع</span>
									<span class="m-menu__link-badge"></span>
                        </span>
                    </span>
                </span>
            </li>

            <!-- Start Item of settings-->
            @can('show settings')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon  fa fa-circle"></i><span class="m-menu__link-text">ثوابت الموقع</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">


                            <!-- Start Item -->
                            @can('edit settings')
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('/admin/settings')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span></i><span class="m-menu__link-text">تعديل</span>
                                    </a>
                                </li>
                            @endcan
                        <!-- End Item -->
                        </ul>
                    </div>
                </li>
        @endcan
        <!-- End Item of settings-->
            <!-- Start Item of socialMedias-->
            @can('show socialMedias')
                <li class="m-menu__item  m-menu__item--submenu pl-3" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon  fab fa-facebook"></i><span class="m-menu__link-text"> التواصل الإجتماعي</span><i
                                class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">


                            <!-- Start Item -->
                            @can('edit socialMedias')
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('/admin/socialMedias')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span></i><span class="m-menu__link-text">تعديل</span>
                                    </a>
                                </li>
                        @endcan
                        <!-- End Item -->
                        </ul>
                    </div>
                </li>
        @endcan
        <!-- End Item of socialMedias-->




            <!--End Group of settings -->

        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
