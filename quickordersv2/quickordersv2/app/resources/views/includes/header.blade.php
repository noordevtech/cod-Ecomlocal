<header class="m-grid__item		m-header " data-minimize-mobile="hide" data-minimize-offset="200" data-minimize-mobile-offset="200" data-minimize="minimize">
    <div class="m-header__top">
       <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
          <div class="m-stack m-stack--ver m-stack--desktop">
             <!-- begin::Brand -->
             <div class="m-stack__item m-brand">
                <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                   <div class="m-stack__item m-stack__item--middle m-brand__logo">
                      <a href="/" class="m-brand__logo-wrapper">
                      <img alt="" src="{{ asset('/app/media/img/logo.png') }}">
                      </a>
                   </div>
                   <div class="m-stack__item m-stack__item--middle m-brand__tools">
                      <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                      <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                      <span></span>
                      </a>
                      <!-- END -->
                      <!-- begin::Responsive Header Menu Toggler-->
                      <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                      <span></span>
                      </a>
                      <!-- end::Responsive Header Menu Toggler-->
                      <!-- begin::Topbar Toggler-->
                      <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                      <i class="flaticon-more"></i>
                      </a>
                      <!--end::Topbar Toggler-->
                   </div>
                </div>
             </div>
             <!-- end::Brand -->
             <!-- begin::Topbar -->
             <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                   <div class="m-stack__item m-topbar__nav-wrapper">
                      <ul class="m-topbar__nav m-nav m-nav--inline">
                         <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                            <a href="#" class="m-nav__link m-dropdown__toggle">
                            <span class="m-topbar__userpic m--hide">
                            <img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt="">
                            </span>
                            <span class="m-topbar__welcome">
                            Hello,&nbsp;
                            </span>
                            <span class="m-topbar__username">
                            Reda
                            </span>
                            </a>
                         </li>
                         <li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click" aria-expanded="true">
                            <a href="#" class="m-nav__link m-dropdown__toggle">
                            <span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
                            <span class="m-nav__link-icon">
                            <span class="m-nav__link-icon-wrapper">
                            <i class="flaticon-share"></i>
                            </span>
                            </span>
                            </a>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>
             <!-- end::Topbar -->
          </div>
       </div>
    </div>
    <div class="m-header__bottom">
       <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
          <div class="m-stack m-stack--ver m-stack--desktop">
             <!-- begin::Horizontal Menu -->
             <div class="m-stack__item m-stack__item--middle m-stack__item--fluid">
                <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
                   <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                      <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                         <a href="/" class="m-menu__link ">
                         <span class="m-menu__item-here"></span>
                         <span class="m-menu__link-text">
                         Dashboard
                         </span>
                         </a>
                      </li>
                   </ul>
                </div>
             </div>
             <!-- end::Horizontal Menu -->
             <!--begin::Search-->
             <div class="m-stack__item m-stack__item--middle m-dropdown m-dropdown--arrow m-dropdown--large m-dropdown--mobile-full-width m-dropdown--align-right m-dropdown--skin-light m-header-search m-header-search--expandable m-header-search--skin-" id="m_quicksearch" data-search-type="default">
                <!--begin::Search Form -->
                <form class="m-header-search__form">
                   <div class="m-header-search__wrapper">
                      <span class="m-header-search__icon-search" id="m_quicksearch_search">
                      <i class="la la-search"></i>
                      </span>
                      <span class="m-header-search__input-wrapper">
                      <input autocomplete="off" type="text" name="q" class="m-header-search__input" value="" placeholder="Search..." id="m_quicksearch_input">
                      </span>
                      <span class="m-header-search__icon-close" id="m_quicksearch_close">
                      <i class="la la-remove"></i>
                      </span>
                      <span class="m-header-search__icon-cancel" id="m_quicksearch_cancel">
                      <i class="la la-times"></i>
                      </span>
                   </div>
                </form>
                <!--end::Search Form -->
             </div>
             <!--end::Search-->
          </div>
       </div>
    </div>
 </header>