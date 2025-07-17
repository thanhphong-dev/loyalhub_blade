<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-width="fullwidth" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Wind Lập Trình </title>
    <meta name="Description" content="Quản trị website Wind Lập Trình">
    <meta name="Author" content="Quản trị website Wind Lập Trình">
    <meta name="keywords"
        content="Quản trị website Wind Lập Trình">

    <!-- Favicon -->
    <link rel="icon" href={{ asset('images/logo/favicon.png') }} type="image/x-icon">

    <!-- Choices JS -->
    <script src={{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}></script>

    <!-- Main Theme Js -->
    <script src={{ asset('assets/js/main.js') }}></script>

    <!-- Bootstrap Css -->
    <link id="style" href={{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }} rel="stylesheet">

    <!-- Style Css -->
    <link href={{ asset('assets/css/styles.css') }} rel="stylesheet">

    <!-- Admin Css -->
    <link href={{ asset('assets/css/admin.css') }} rel="stylesheet">

    <!-- Icons Css -->
    <link href={{ asset('assets/css/icons.css') }} rel="stylesheet">

    <!-- Node Waves Css -->
    <link href={{ asset('assets/libs/node-waves/waves.min.css') }} rel="stylesheet">

    <!-- Simplebar Css -->
    <link href={{ asset('assets/libs/simplebar/simplebar.min.css') }} rel="stylesheet">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href={{ asset('assets/libs/flatpickr/flatpickr.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}>

    <!-- Choices Css -->
    <link rel="stylesheet" href={{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}>

    <!-- FlatPickr CSS -->
    <link rel="stylesheet" href={{ asset('assets/libs/flatpickr/flatpickr.min.css') }}>

    <!-- Auto Complete CSS -->
    <link rel="stylesheet" href={{ asset('assets/libs/@tarekraafat/autocomplete.js/css/autoComplete.css') }}>

    <!-- Prism CSS -->
    <link rel="stylesheet" href={{ asset('assets/libs/prismjs/themes/prism-coy.min.css') }}>

    <link rel="stylesheet" href={{ asset('assets/libs/quill/quill.snow.css') }}>
    <link rel="stylesheet" href={{ asseT('assets/libs/quill/quill.bubble.css') }}>

    <!-- Filepond CSS -->
    <link rel="stylesheet" href={{ asset('assets/libs/filepond/filepond.min.css') }}>
    <link rel="stylesheet"
        href={{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}>
    <link rel="stylesheet"
        href={{ asset('assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css') }}>

    <!-- Swiper Css -->
    <link rel="stylesheet" href={{ asset('assets/libs/swiper/swiper-bundle.min.css') }}>

</head>

<body>

    <!-- Start Switcher -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="switcher-canvas" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom d-block p-0">
            <div class="d-flex align-items-center justify-content-between p-3">
                <h5 class="offcanvas-title text-default" id="offcanvasRightLabel">Switcher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <nav class="border-top border-block-start-dashed">
                <div class="nav nav-tabs nav-justified" id="switcher-main-tab" role="tablist">
                    <button class="nav-link active" id="switcher-home-tab" data-bs-toggle="tab"
                        data-bs-target="#switcher-home" type="button" role="tab" aria-controls="switcher-home"
                        aria-selected="true">Theme Styles</button>
                    <button class="nav-link" id="switcher-profile-tab" data-bs-toggle="tab"
                        data-bs-target="#switcher-profile" type="button" role="tab"
                        aria-controls="switcher-profile" aria-selected="false">Theme Colors</button>
                </div>
            </nav>
        </div>
        <div class="offcanvas-body">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active border-0" id="switcher-home" role="tabpanel"
                    aria-labelledby="switcher-home-tab" tabindex="0">
                    <div class="">
                        <p class="switcher-style-head">Theme Color Mode:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-light-theme">
                                        Light
                                    </label>
                                    <input class="form-check-input" type="radio" name="theme-style"
                                        id="switcher-light-theme" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-dark-theme">
                                        Dark
                                    </label>
                                    <input class="form-check-input" type="radio" name="theme-style"
                                        id="switcher-dark-theme">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Directions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-ltr">
                                        LTR
                                    </label>
                                    <input class="form-check-input" type="radio" name="direction"
                                        id="switcher-ltr" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-rtl">
                                        RTL
                                    </label>
                                    <input class="form-check-input" type="radio" name="direction"
                                        id="switcher-rtl">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Navigation Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-vertical">
                                        Vertical
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-style"
                                        id="switcher-vertical" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-horizontal">
                                        Horizontal
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-style"
                                        id="switcher-horizontal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navigation-menu-styles">
                        <p class="switcher-style-head">Vertical & Horizontal Menu Styles:</p>
                        <div class="row switcher-style gx-0 pb-2 gy-2">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-click">
                                        Menu Click
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-menu-click">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-hover">
                                        Menu Hover
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-menu-hover">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-click">
                                        Icon Click
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-icon-click">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-hover">
                                        Icon Hover
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-icon-hover">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidemenu-layout-styles">
                        <p class="switcher-style-head">Sidemenu Layout Styles:</p>
                        <div class="row switcher-style gx-0 pb-2 gy-2">
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-default-menu">
                                        Default Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-default-menu" checked>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-closed-menu">
                                        Closed Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-closed-menu">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icontext-menu">
                                        Icon Text
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icontext-menu">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-overlay">
                                        Icon Overlay
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icon-overlay">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-detached">
                                        Detached
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-detached">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-double-menu">
                                        Double Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-double-menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Page Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-regular">
                                        Regular
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-regular" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-classic">
                                        Classic
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-classic">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-modern">
                                        Modern
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-modern">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Layout Width Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-default-width">
                                        compact
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width"
                                        id="switcher-default-width">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-full-width">
                                        Full Width
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width"
                                        id="switcher-full-width" checked>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-boxed">
                                        Boxed
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width"
                                        id="switcher-boxed">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Menu Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-fixed">
                                        Fixed
                                    </label>
                                    <input class="form-check-input" type="radio" name="menu-positions"
                                        id="switcher-menu-fixed" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-scroll">
                                        Scrollable
                                    </label>
                                    <input class="form-check-input" type="radio" name="menu-positions"
                                        id="switcher-menu-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Header Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-fixed">
                                        Fixed
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-fixed" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-scroll">
                                        Scrollable
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Loader:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-loader-enable">
                                        Enable
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-loader"
                                        id="switcher-loader-enable">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-loader-disable">
                                        Disable
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-loader"
                                        id="switcher-loader-disable" checked>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade border-0" id="switcher-profile" role="tabpanel"
                    aria-labelledby="switcher-profile-tab" tabindex="0">
                    <div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Menu Colors:</p>
                            <div class="d-flex switcher-style pb-2">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-light" checked>
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-dark">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-gradient"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Gradient Menu"
                                        type="radio" name="menu-colors" id="switcher-menu-gradient">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-transparent"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Transparent Menu"
                                        type="radio" name="menu-colors" id="switcher-menu-transparent">
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Menu dynamically
                                change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Header Colors:</p>
                            <div class="d-flex switcher-style pb-2">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Header" type="radio"
                                        name="header-colors" id="switcher-header-light" checked>
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Header" type="radio"
                                        name="header-colors" id="switcher-header-dark">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Header" type="radio"
                                        name="header-colors" id="switcher-header-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-gradient"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Gradient Header"
                                        type="radio" name="header-colors" id="switcher-header-gradient">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-transparent"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Transparent Header"
                                        type="radio" name="header-colors" id="switcher-header-transparent">
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Header dynamically
                                change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Primary:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-1" type="radio"
                                        name="theme-primary" id="switcher-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-2" type="radio"
                                        name="theme-primary" id="switcher-primary1">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-3" type="radio"
                                        name="theme-primary" id="switcher-primary2">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-4" type="radio"
                                        name="theme-primary" id="switcher-primary3">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-5" type="radio"
                                        name="theme-primary" id="switcher-primary4">
                                </div>
                                <div class="form-check switch-select ps-0 mt-1 color-primary-light">
                                    <div class="theme-container-primary"></div>
                                    <div class="pickr-container-primary" onchange="updateChartColor(this.value)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Background:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-1" type="radio"
                                        name="theme-background" id="switcher-background">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-2" type="radio"
                                        name="theme-background" id="switcher-background1">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-3" type="radio"
                                        name="theme-background" id="switcher-background2">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-4" type="radio"
                                        name="theme-background" id="switcher-background3">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-5" type="radio"
                                        name="theme-background" id="switcher-background4">
                                </div>
                                <div
                                    class="form-check switch-select ps-0 mt-1 tooltip-static-demo color-bg-transparent">
                                    <div class="theme-container-background"></div>
                                    <div class="pickr-container-background"></div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-image mb-3">
                            <p class="switcher-style-head">Menu With Background Image:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img1" type="radio"
                                        name="menu-background" id="switcher-bg-img">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img2" type="radio"
                                        name="menu-background" id="switcher-bg-img1">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img3" type="radio"
                                        name="menu-background" id="switcher-bg-img2">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img4" type="radio"
                                        name="menu-background" id="switcher-bg-img3">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img5" type="radio"
                                        name="menu-background" id="switcher-bg-img4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block canvas-footer flex-wrap">
                    <a href="javascript:void(0);" id="reset-all" class="btn btn-danger m-1 w-100">Reset</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Switcher -->


    <!-- Loader -->
    <div id="loader">
        <img src={{ asset('assets/images/media/loader.svg') }} alt="">
    </div>
    <!-- Loader -->

    <div class="page">
        <!-- app-header -->
        <header class="app-header sticky" id="header">

            <!-- Start::main-header-container -->
            <div class="main-header-container container-fluid">

                <!-- Start::header-content-left -->
                <div class="header-content-left">

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="index.html" class="header-logo">
                                <img src={{ asset('images/logo/logo-dark.png') }} alt="logo"
                                    class="desktop-logo">
                                <img src={{ asset('images/logo/logo-light.png') }} alt="logo"
                                    class="toggle-dark">
                                <img src={{ asset('images/logo/logo-light.png') }} alt="logo"
                                    class="desktop-dark">
                                <img src={{ asset('images/logo/logo-dark.png') }} alt="logo" class="toggle-logo">
                            </a>
                        </div>
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <!-- Start::header-link -->
                        <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link" data-bs-toggle="sidebar"
                            href="javascript:void(0);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon menu-btn" width="32"
                                height="32" fill="#000000" viewBox="0 0 256 256">
                                <path
                                    d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
                                </path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon menu-btn-close"
                                width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                                <path
                                    d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z">
                                </path>
                            </svg>
                        </a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->


                </div>
                <!-- End::header-content-left -->

                <!-- Start::header-content-right -->
                <ul class="header-content-right">

                    <!-- Start::header-element -->
                    <li class="header-element d-md-none d-block">
                        <a href="javascript:void(0);" class="header-link" data-bs-toggle="modal"
                            data-bs-target="#header-responsive-search">
                            <!-- Start::header-link-icon -->
                            <i class="bi bi-search header-link-icon"></i>
                            <!-- End::header-link-icon -->
                        </a>
                    </li>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <li class="header-element search-dropdown dropdown d-md-block d-none">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle"
                            data-bs-auto-close="outside" data-bs-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" width="32"
                                height="32" fill="#000000" viewBox="0 0 256 256">
                                <path
                                    d="M228.24,219.76l-51.38-51.38a86.15,86.15,0,1,0-8.48,8.48l51.38,51.38a6,6,0,0,0,8.48-8.48ZM38,112a74,74,0,1,1,74,74A74.09,74.09,0,0,1,38,112Z">
                                </path>
                            </svg>
                        </a>
                        <ul class="main-header-dropdown dropdown-menu dropdown-menu-end overflow-visible"
                            data-popper-placement="none">
                            <li class="px-3 py-2">
                                <div class="header-element header-search d-md-block d-none my-auto">
                                    <!-- Start::header-link -->
                                    <input type="text" class="header-search-bar form-control" id="header-search"
                                        placeholder="Search for Results..." spellcheck=false autocomplete="off"
                                        autocapitalize="off">
                                    <a href="javascript:void(0);" class="header-search-icon border-0">
                                        <i class="bi bi-search"></i>
                                    </a>
                                    <!-- End::header-link -->
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <li class="header-element country-selector dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle"
                            data-bs-auto-close="outside" data-bs-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="none" />
                                <polyline points="240 216 184 104 128 216" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <line x1="144" y1="184" x2="224" y2="184" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="16" />
                                <line x1="96" y1="32" x2="96" y2="56" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="16" />
                                <line x1="32" y1="56" x2="160" y2="56" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="16" />
                                <path d="M128,56a96,96,0,0,1-96,96" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <path d="M69.47,88A96,96,0,0,0,160,152" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            </svg>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <ul class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                            <li>
                                <div class="py-2 px-3">
                                    <input class="form-control form-control-sm" type="text"
                                        placeholder="Search Here" aria-label=".form-control-sm example">
                                </div>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0);">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-rounded avatar-xs lh-1 me-2">
                                            <img src={{ asset('assets/images/flags/us_flag.jpg') }} alt="img">
                                        </span>
                                        English
                                    </div>
                                    <span class="text-muted fs-12">(US)</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0);">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-rounded avatar-xs lh-1 me-2">
                                            <img src={{ asset('assets/images/flags/spain_flag.jpg') }} alt="img">
                                        </span>
                                        español
                                    </div>
                                    <span class="text-muted fs-12">(ES)</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0);">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-rounded avatar-xs lh-1 me-2">
                                            <img src={{ asset('assets/images/flags/french_flag.jpg') }}
                                                alt="img">
                                        </span>
                                        français
                                    </div>
                                    <span class="text-muted fs-12">(FR)</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0);">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-rounded avatar-xs lh-1 me-2">
                                            <img src={{ asset('assets/images/flags/uae_flag.jpg') }} alt="img">
                                        </span>
                                        عربي
                                    </div>
                                    <span class="text-muted fs-12">(AE)</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0);">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-rounded avatar-xs lh-1 me-2">
                                            <img src={{ asset('assets/images/flags/germany_flag.jpg') }}
                                                alt="img">
                                        </span>
                                        DE
                                    </div>
                                    <span class="text-muted fs-12">(US)</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0);">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-rounded avatar-xs lh-1 me-2">
                                            <img src={{ asset('assets/images/flags/china_flag.jpg') }} alt="img">
                                        </span>
                                        中国人
                                    </div>
                                    <span class="text-muted fs-12">(CN)</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <li class="header-element header-theme-mode">
                        <!-- Start::header-link|layout-setting -->
                        <a href="javascript:void(0);" class="header-link layout-setting">
                            <span class="light-layout">
                                <!-- Start::header-link-icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon"
                                    viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <path d="M108.11,28.11A96.09,96.09,0,0,0,227.89,147.89,96,96,0,1,1,108.11,28.11Z"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                </svg>
                                <!-- End::header-link-icon -->
                            </span>
                            <span class="dark-layout">
                                <!-- Start::header-link-icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon"
                                    viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <line x1="128" y1="40" x2="128" y2="32"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <circle cx="128" cy="128" r="56" fill="none"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="16" />
                                    <line x1="64" y1="64" x2="56" y2="56"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <line x1="64" y1="192" x2="56" y2="200"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <line x1="192" y1="64" x2="200" y2="56"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <line x1="192" y1="192" x2="200" y2="200"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <line x1="40" y1="128" x2="32" y2="128"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <line x1="128" y1="216" x2="128" y2="224"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <line x1="216" y1="128" x2="224" y2="128"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                </svg>
                                <!-- End::header-link-icon -->
                            </span>
                        </a>
                        <!-- End::header-link|layout-setting -->
                    </li>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->

                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <li class="header-element header-fullscreen">
                        <!-- Start::header-link -->
                        <a onclick="openFullscreen();" href="javascript:void(0);" class="header-link">
                            <svg xmlns="http://www.w3.org/2000/svg" class="full-screen-open header-link-icon"
                                viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="none" />
                                <polyline points="168 48 208 48 208 88" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <polyline points="88 208 48 208 48 168" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <polyline points="208 168 208 208 168 208" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <polyline points="48 88 48 48 88 48" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="full-screen-close header-link-icon d-none"
                                viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="none" />
                                <polyline points="160 48 208 48 208 96" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <line x1="144" y1="112" x2="208" y2="48" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="16" />
                                <polyline points="96 208 48 208 48 160" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <line x1="112" y1="144" x2="48" y2="208" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="16" />
                            </svg>
                        </a>
                        <!-- End::header-link -->
                    </li>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <li class="header-element dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="me-xl-2 me-0">
                                    <img src={{ asset('storage/'. auth()->user()->avatar_url) }} alt="img"
                                        class="avatar avatar-sm avatar-rounded">
                                </div>
                                <div class="d-xl-block d-none lh-1">
                                    <span class="fw-medium lh-1"> {{ Auth::user()->name }}</span>
                                </div>
                            </div>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                            aria-labelledby="mainHeaderProfile">
                            <li>
                                <div class="py-2 px-3 text-center">
                                    <span class="fw-semibold">{{ Auth::user()->name }}</span>
                                    <span class="d-block fs-12 text-muted">
                                        Chưa có chức vụ
                                </div>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="profile.html"><i
                                        class="ti ti-user text-primary me-2 fs-16"></i>Profile</a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="mail.html"> <i
                                        class="ti ti-mail text-secondary me-2 fs-16"></i>Inbox</a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="to-do-list.html"><i
                                        class="ti ti-checklist text-success me-2 fs-16"></i>Task
                                    Manager</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="mail-settings.html"><i
                                        class="ti ti-settings text-info me-2 fs-16"></i>Settings</a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="chat.html"><i
                                        class="ti ti-headset text-warning me-2 fs-16"></i>Support</a>
                            </li>
                            <li class="py-2 px-3">
                                <a class="btn btn-primary btn-sm w-100" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    <!-- End::header-element -->

                </ul>

            </div>
            <!-- End::main-header-container -->

        </header>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <aside class="app-sidebar sticky" id="sidebar">

            <!-- Start::main-sidebar-header -->
            <div class="main-sidebar-header">
                <a href="index.html" class="header-logo">
                    <img src={{ asset('images/app/logo.png') }} alt="logo" class="desktop-logo">
                    <img src={{ asset('images/app/logo.png') }} alt="logo" class="toggle-dark">
                    <img src={{ asset('images/app/logo.png') }} alt="logo" class="desktop-dark">
                    <img src={{ asset('images/app/logo.png') }} alt="logo" class="toggle-logo">
                </a>
            </div>
            <!-- End::main-sidebar-header -->

            <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll">

                <!-- Sidebar -->
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <div class="slide-left" id="slide-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                        </svg>
                    </div>
                    <ul class="main-menu">
                        <li class="slide__category"><span class="category-name">Hệ thống</span></li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <rect width="256" height="256" fill="none" />
                                    <rect x="48" y="48" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="48" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="48" y="144" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="144" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <path
                                        d="M12.4142 5H21C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H10.4142L12.4142 5ZM4 5V19H20V7H11.5858L9.58579 5H4ZM8 18C8 15.7909 9.79086 14 12 14C14.2091 14 16 15.7909 16 18H8ZM12 13C10.6193 13 9.5 11.8807 9.5 10.5C9.5 9.11929 10.6193 8 12 8C13.3807 8 14.5 9.11929 14.5 10.5C14.5 11.8807 13.3807 13 12 13Z">
                                    </path>
                                </svg>
                                <span class="side-menu__label">Nhân sự</span>
                                <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Nhân sự</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('employees.index') }}" class="side-menu__item">Danh sách</a>
                                </li>
                                {{-- <li class="slide">
                                    <a href={{ route('position.list') }} class="side-menu__item">Chức vụ</a>
                                </li> --}}
                            </ul>
                        </li>

                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">

                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <rect width="256" height="256" fill="none" />
                                    <rect x="48" y="48" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="48" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="48" y="144" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="144" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <path
                                        d="M3.33946 17.0002C2.90721 16.2515 2.58277 15.4702 2.36133 14.6741C3.3338 14.1779 3.99972 13.1668 3.99972 12.0002C3.99972 10.8345 3.3348 9.824 2.36353 9.32741C2.81025 7.71651 3.65857 6.21627 4.86474 4.99001C5.7807 5.58416 6.98935 5.65534 7.99972 5.072C9.01009 4.48866 9.55277 3.40635 9.4962 2.31604C11.1613 1.8846 12.8847 1.90004 14.5031 2.31862C14.4475 3.40806 14.9901 4.48912 15.9997 5.072C17.0101 5.65532 18.2187 5.58416 19.1346 4.99007C19.7133 5.57986 20.2277 6.25151 20.66 7.00021C21.0922 7.7489 21.4167 8.53025 21.6381 9.32628C20.6656 9.82247 19.9997 10.8336 19.9997 12.0002C19.9997 13.166 20.6646 14.1764 21.6359 14.673C21.1892 16.2839 20.3409 17.7841 19.1347 19.0104C18.2187 18.4163 17.0101 18.3451 15.9997 18.9284C14.9893 19.5117 14.4467 20.5941 14.5032 21.6844C12.8382 22.1158 11.1148 22.1004 9.49633 21.6818C9.55191 20.5923 9.00929 19.5113 7.99972 18.9284C6.98938 18.3451 5.78079 18.4162 4.86484 19.0103C4.28617 18.4205 3.77172 17.7489 3.33946 17.0002ZM8.99972 17.1964C10.0911 17.8265 10.8749 18.8227 11.2503 19.9659C11.7486 20.0133 12.2502 20.014 12.7486 19.9675C13.1238 18.8237 13.9078 17.8268 14.9997 17.1964C16.0916 16.5659 17.347 16.3855 18.5252 16.6324C18.8146 16.224 19.0648 15.7892 19.2729 15.334C18.4706 14.4373 17.9997 13.2604 17.9997 12.0002C17.9997 10.74 18.4706 9.5632 19.2729 8.6665C19.1688 8.4405 19.0538 8.21822 18.9279 8.00021C18.802 7.78219 18.667 7.57148 18.5233 7.36842C17.3457 7.61476 16.0911 7.43414 14.9997 6.80405C13.9083 6.17395 13.1246 5.17768 12.7491 4.03455C12.2509 3.98714 11.7492 3.98646 11.2509 4.03292C10.8756 5.17671 10.0916 6.17364 8.99972 6.80405C7.9078 7.43447 6.65245 7.61494 5.47428 7.36803C5.18485 7.77641 4.93463 8.21117 4.72656 8.66637C5.52881 9.56311 5.99972 10.74 5.99972 12.0002C5.99972 13.2604 5.52883 14.4372 4.72656 15.3339C4.83067 15.5599 4.94564 15.7822 5.07152 16.0002C5.19739 16.2182 5.3324 16.4289 5.47612 16.632C6.65377 16.3857 7.90838 16.5663 8.99972 17.1964ZM11.9997 15.0002C10.3429 15.0002 8.99972 13.6571 8.99972 12.0002C8.99972 10.3434 10.3429 9.00021 11.9997 9.00021C13.6566 9.00021 14.9997 10.3434 14.9997 12.0002C14.9997 13.6571 13.6566 15.0002 11.9997 15.0002ZM11.9997 13.0002C12.552 13.0002 12.9997 12.5525 12.9997 12.0002C12.9997 11.4479 12.552 11.0002 11.9997 11.0002C11.4474 11.0002 10.9997 11.4479 10.9997 12.0002C10.9997 12.5525 11.4474 13.0002 11.9997 13.0002Z">
                                    </path>
                                </svg>
                                <span class="side-menu__label">Cài đặt</span>
                                <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Cài đặt</a>
                                </li>
                                <li class="slide">
                                    <a href={{ route('roles.index') }} class="side-menu__item">
                                        Vai trò
                                    </a>
                                </li>
                                {{-- <li class="slide">
                                    <a href={{ route('permission.list') }} class="side-menu__item">Phân quyền</a>
                                </li> --}}
                            </ul>
                        </li>

                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                                    viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <rect x="48" y="48" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="48" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="48" y="144" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="144" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                </svg>
                                <span class="side-menu__label">Quản trị hệ thống</span>
                                <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Quản trị hệ thống</a>
                                </li>
                                {{-- <li class="slide">
                                    <a href={{ route('sections.index') }} class="side-menu__item">Danh sách trang</a>
                                </li> --}}
                            </ul>
                        </li>
                        <!-- Menu::Setting -->

                    </ul>
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                        </svg></div>
                </nav>
                <!-- End Sidebar -->

            </div>
            <!-- End::main-sidebar -->


        </aside>
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        @yield('content')
        <!-- End::app-content -->


        <!-- Footer Start -->
        <footer class="footer mt-auto py-3 bg-white text-center">
            <div class="container">
                <span class="text-muted"> Manager Website <span id="year"></span> <a
                        href="javascript:void(0);" class="text-dark fw-medium"></a>.
                    Designed with by <a href="https://windlaptrinh.com/" target="_blank">
                        <span class="fw-medium text-primary">Wind Lập Trình</span>
                    </a>
                </span>
            </div>
        </footer>
        <!-- Footer End -->
        <div class="modal fade" id="header-responsive-search" tabindex="-1"
            aria-labelledby="header-responsive-search" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="input-group">
                            <input type="text" class="form-control border-end-0"
                                placeholder="Search Anything ..." aria-label="Search Anything ..."
                                aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="button" id="button-addon2"><i
                                    class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow lh-1"><i class="ti ti-arrow-big-up fs-16"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    <!-- Popper JS -->
    <script src={{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}></script>

    <!-- Bootstrap JS -->
    <script src={{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}></script>

    <!-- Defaultmenu JS -->
    <script src={{ asset('assets/js/defaultmenu.min.js') }}></script>

    <!-- Node Waves JS-->
    <script src={{ asset('assets/libs/node-waves/waves.min.js') }}></script>

    <!-- Sticky JS -->
    <script src={{ asset('assets/js/sticky.js') }}></script>

    <!-- Simplebar JS -->
    <script src={{ asset('assets/libs/simplebar/simplebar.min.js') }}></script>
    <script src={{ asset('assets/js/simplebar.js') }}></script>

    <!-- Auto Complete JS -->
    <script src={{ asset('assets/libs/@tarekraafat/autocomplete.js/autoComplete.min.js') }}></script>

    <!-- Color Picker JS -->
    {{-- <script src={{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js') }}></script> --}}

    <!-- Date & Time Picker JS -->
    {{-- <script src={{ asset('assets/libs/flatpickr/flatpickr.min.js') }}></script>
    <script src={{ asset("assets/js/date&time_pickers.js") }}></script> --}}


    <!-- Apex Charts JS -->
    {{-- <script src={{ asset('assets/libs/apexcharts/apexcharts.min.js') }}></script> --}}

    <!-- Sales Dashboard -->
    {{-- <script src={{ asset('assets/js/sales-dashboard.js') }}></script> --}}

    <!-- Custom JS -->
    {{-- <script src={{ asset('assets/js/custom.js') }}></script> --}}


    <!-- Custom-Switcher JS -->
    {{-- <script src={{ asset('assets/js/custom-switcher.min.js') }}></script> --}}

    <!-- Prism JS -->
    {{-- <script src={{ asset('assets/libs/prismjs/prism.js') }}></script>
    <script src={{ asset('assets/js/prism-custom.js') }}></script> --}}

    <!-- Filepond JS -->
    <script src={{ asset('assets/libs/filepond/filepond.min.js') }}></script>
    <script src={{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}></script>
    <script
        src={{ asset('assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}>
    </script>
    <script src={{ asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}>
    </script>
    <script src={{ asset('assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}></script>
    <script src={{ asset('assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.js') }}></script>
    <script src={{ asset('assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}>
    </script>
    <script src={{ asset('assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}>
    </script>
    <script src={{ asset('assets/libs/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}></script>
    <script src={{ asset('assets/libs/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}></script>
    <script src={{ asset('assets/libs/filepond-plugin-image-transform/filepond-plugin-image-transform.min.js') }}></script>

    <!-- Dropzone JS -->
    <script src={{ asset('assets/libs/dropzone/dropzone-min.js') }}></script>

    <!-- Fileupload JS -->
    <script src={{ asset('assets/js/fileupload.js') }}></script>

    <!-- Quill Editor JS -->
    {{-- <script src={{ asset('assets/libs/quill/quill.js') }}></script> --}}

    <!-- Internal Create Blog JS -->
    {{-- <script src={{ asset('assets/js/blog-create.js') }}></script> --}}

    <!-- Swiper JS -->
    <script src={{ asset('assets/libs/swiper/swiper-bundle.min.js') }}></script>

    <!-- Internal Product-Details JS -->
    {{-- <script src={{ asset('assets/js/product-details.js') }}></script> --}}

    <!-- Particles JS -->
    {{-- <script src={{ asset('assets/libs/particles.js/particles.js') }}></script> --}}

    {{-- <script src={{ asset('assets/js/error.js') }}></script> --}}

    @vite(['resources/js/global.js', 'resources/js/app.js'])
    @stack('section-scripts')
</body>

</html>
