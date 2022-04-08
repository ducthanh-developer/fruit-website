@extends('client.layouts.main-layout')
@section('title')
    Product List
@endsection
@push('style')
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('vendor/noui/nouislider.min.css') }}">
@endpush
@push('script')
    <!--===============================================================================================-->
    <script src=" {{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/noui/nouislider.min.js') }}"></script>
    <script>
        let sort = document.getElementById('sortby');
        sort.onchange = function (){
            window.location.href = "";
            console.log(sort.value);
        }
    </script>
@endpush
<style>
    .active .page-link {
        background-color: #81b03f !important;
        border-color: #81b03f !important;
        color: #fff !important;
    }

    .page-link {
        color: #666 !important;
    }

</style>
@section('content')
    <!-- Title page -->
    <section class="how-overlay2 bg-img1" style="background-image: url({{ asset('images/bg-07.jpg') }});">
        <div class="container">
            <div class="txt-center p-t-160 p-b-165">
                <h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
                    shop
                </h2>

                <span class="txt-m-201 cl0 flex-c-m flex-w">
                    <a href="index.html" class="txt-m-201 cl0 hov-cl10 trans-04 m-r-6">
                        Home
                    </a>

                    <span>
                        / Products
                    </span>
                </span>
            </div>
        </div>
    </section>

    <!-- Content page -->
    <section class="bg0 p-t-85 p-b-45">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-4 col-lg-3 m-rl-auto p-b-50">
                    <div class="leftbar p-t-15">
                        <!--  -->
                        <div class="size-a-21 pos-relative">
                            <form action="/product-search" method="get">
                                @csrf
                                <input class="s-full bo-all-1 bocl15 p-rl-20" type="text" name="search"
                                    placeholder="Search products...">
                                <button class="flex-c-m fs-18 size-a-22 ab-t-r hov11" type="submit">
                                    <img class="hov11-child trans-04" src="{{ asset('images/icons/icon-search.png') }}"
                                        alt="ICON">
                                </button>
                            </form>
                        </div>

                        <!--  -->
                        <div class="p-t-45">
                            <h4 class="txt-m-101 cl3">
                                FILTER BY PRICE
                            </h4>

                            <div class="filter-price p-t-32">
                                <div class="wra-filter-bar">
                                    <div id="filter-bar"></div>
                                </div>

                                <div class="flex-sb-m flex-w p-t-16">
                                    <div class="txt-s-115 cl9 p-t-10 p-b-10 m-r-20">
                                        Price: <span id="value-lower">50000</span> - <span id="value-upper">1000000</span>
                                    </div>

                                    <div>
                                        <a href="#" class="txt-s-107 cl6 hov-cl10 trans-04" id="search-price">
                                            Filter
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--  -->
                        <div class="p-t-40">
                            <h4 class="txt-m-101 cl3 p-b-37">
                                Categories
                            </h4>

                            <ul>
                                <li class="p-b-5">
                                    <a href="#" class="flex-sb-m flex-w txt-s-101 cl6 hov-cl10 trans-04 p-tb-3">
                                        <span class="m-r-10">
                                            Vegetable
                                        </span>

                                        <span>
                                            3
                                        </span>
                                    </a>
                                </li>

                                <li class="p-b-5">
                                    <a href="#" class="flex-sb-m flex-w txt-s-101 cl6 hov-cl10 trans-04 p-tb-3">
                                        <span class="m-r-10">
                                            Fruit
                                        </span>

                                        <span>
                                            5
                                        </span>
                                    </a>
                                </li>

                                <li class="p-b-5">
                                    <a href="#" class="flex-sb-m flex-w txt-s-101 cl6 hov-cl10 trans-04 p-tb-3">
                                        <span class="m-r-10">
                                            Fruit Juic
                                        </span>

                                        <span>
                                            9
                                        </span>
                                    </a>
                                </li>

                                <li class="p-b-5">
                                    <a href="#" class="flex-sb-m flex-w txt-s-101 cl6 hov-cl10 trans-04 p-tb-3">
                                        <span class="m-r-10">
                                            Dried
                                        </span>

                                        <span>
                                            9
                                        </span>
                                    </a>
                                </li>

                                <li class="p-b-5">
                                    <a href="#" class="flex-sb-m flex-w txt-s-101 cl6 hov-cl10 trans-04 p-tb-3">
                                        <span class="m-r-10">
                                            Other
                                        </span>

                                        <span>
                                            2
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!--  -->
                        <div class="p-t-40">
                            <h4 class="txt-m-101 cl3 p-b-37">
                                Best sellers
                            </h4>

                            <ul>
                                <li class="flex-w flex-sb-t p-b-30">
                                    <a href="#" class="size-w-50 wrap-pic-w bo-all-1 bocl12 hov8 trans-04">
                                        <img src="{{ asset('images/best-sell-01.jpg') }}" alt="IMG">
                                    </a>

                                    <div class="size-w-51 flex-col-l p-t-12">
                                        <a href="#" class="txt-m-103 cl3 hov-cl10 trans-04 p-b-12">
                                            Cheery
                                        </a>

                                        <span class="txt-m-104 cl9">
                                            30$
                                        </span>
                                    </div>
                                </li>

                                <li class="flex-w flex-sb-t p-b-30">
                                    <a href="#" class="size-w-50 wrap-pic-w bo-all-1 bocl12 hov8 trans-04">
                                        <img src="{{ asset('images/best-sell-02.jpg') }}" alt="IMG">
                                    </a>

                                    <div class="size-w-51 flex-col-l p-t-12">
                                        <a href="#" class="txt-m-103 cl3 hov-cl10 trans-04 p-b-12">
                                            Asparagus
                                        </a>

                                        <span class="txt-m-104 cl9">
                                            12$
                                        </span>
                                    </div>
                                </li>

                                <li class="flex-w flex-sb-t p-b-30">
                                    <a href="#" class="size-w-50 wrap-pic-w bo-all-1 bocl12 hov8 trans-04">
                                        <img src="{{ asset('') }}images/best-sell-03.jpg" alt="IMG">
                                    </a>

                                    <div class="size-w-51 flex-col-l p-t-12">
                                        <a href="#" class="txt-m-103 cl3 hov-cl10 trans-04 p-b-12">
                                            Eggplant
                                        </a>

                                        <span class="txt-m-104 cl9">
                                            18$
                                        </span>
                                    </div>
                                </li>

                                <li class="flex-w flex-sb-t p-b-30">
                                    <a href="#" class="size-w-50 wrap-pic-w bo-all-1 bocl12 hov8 trans-04">
                                        <img src="{{ asset('images/best-sell-04.jpg') }}" alt="IMG">
                                    </a>

                                    <div class="size-w-51 flex-col-l p-t-12">
                                        <a href="#" class="txt-m-103 cl3 hov-cl10 trans-04 p-b-12">
                                            Carrot
                                        </a>

                                        <span class="txt-m-104 cl9">
                                            17$
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!--  -->
                        <div class="p-t-25">
                            <h4 class="txt-m-101 cl3 p-b-37">
                                Search by tags
                            </h4>

                            <div class="flex-w m-r--10">
                                <a href="#"
                                    class="dis-block bg12 txt-s-101 cl6 hov-btn1 trans-03 p-tb-5 p-rl-12 m-r-10 m-b-10">
                                    Food
                                </a>

                                <a href="#"
                                    class="dis-block bg12 txt-s-101 cl6 hov-btn1 trans-03 p-tb-5 p-rl-12 m-r-10 m-b-10">
                                    Green
                                </a>

                                <a href="#"
                                    class="dis-block bg12 txt-s-101 cl6 hov-btn1 trans-03 p-tb-5 p-rl-12 m-r-10 m-b-10">
                                    Vegetables
                                </a>

                                <a href="#"
                                    class="dis-block bg12 txt-s-101 cl6 hov-btn1 trans-03 p-tb-5 p-rl-12 m-r-10 m-b-10">
                                    Organic
                                </a>

                                <a href="#"
                                    class="dis-block bg12 txt-s-101 cl6 hov-btn1 trans-03 p-tb-5 p-rl-12 m-r-10 m-b-10">
                                    Farm
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-9 m-rl-auto p-b-50">
                    <div>
                        <div class="flex-w flex-r-m p-b-45 flex-row-rev">
                            <div class="flex-w flex-m p-tb-8">
                                <div class="rs1-select2 bg0 size-w-52 bo-all-1 bocl15 m-tb-7 m-r-15">
                                    <select class="js-select2" id="sortby" name="sort">
                                        <option value="1">Sort by popularity</option>
                                        <option value="2">Sort by best sell</option>
                                        <option value="3">Sort by special</option>
                                        <option value="4">Sort prices from low to high</option>
                                        <option value="4">Sort prices from high to low</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>

                                <div class="flex-w flex-m m-tb-7">
                                    <button class="dis-block lh-00 pos-relative how-icon1 m-r-15 js-show-list">
                                        <img class="icon-main trans-04"
                                            src="{{ asset('images/icons/icon-menu-list.png') }}" alt="ICON">
                                        <img class="ab-t-l icon-hov trans-04"
                                            src="{{ asset('images/icons/icon-menu-list1.png') }}" alt="ICON">
                                    </button>

                                    <button class="dis-block lh-00 pos-relative how-icon1 menu-active js-show-grid">
                                        <img class="icon-main trans-04" src="{{ asset('images/icons/icon-grid.png') }}"
                                            alt="ICON">
                                        <img class="ab-t-l icon-hov trans-04"
                                            src="{{ asset('images/icons/icon-grid1.png') }}" alt="ICON">
                                    </button>
                                </div>
                            </div>

                            <span class="txt-s-101 cl9 m-r-30 size-w-53">
                                Showing 1–12 of 23 results
                            </span>
                        </div>

                        <!-- Shop grid -->
                        <div class="shop-grid">
                            <div class="row">
                                @foreach ($productList as $product)
                                    <!-- - -->
                                    <div class="col-sm-6 col-lg-4 p-b-30">
                                        <!-- Block1 -->
                                        <div class="block1">
                                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                                <img src="{{ asset('' . $product->imgUrl) }}" alt="IMG">

                                                <div class="block1-content flex-col-c-m p-b-46">
                                                    <a href="product-single.html"
                                                        class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                                        {{ $product->nameProduct }}
                                                    </a>

                                                    <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
                                                        {{ number_format($product->price) }}
                                                    </span>

                                                    <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                                                        <a href="product-single.html"
                                                            class="block1-icon flex-c-m wrap-pic-max-w">
                                                            <img src="{{ asset('images/icons/icon-view.png') }}"
                                                                alt="ICON">
                                                        </a>

                                                        <a href="#"
                                                            class="block1-icon flex-c-m wrap-pic-max-w js-addcart-b1">
                                                            <img src="{{ asset('images/icons/icon-cart.png') }}"
                                                                alt="ICON">
                                                        </a>

                                                        <a href="wishlist.html"
                                                            class="block1-icon flex-c-m wrap-pic-max-w js-addwish-b1">
                                                            <img class="icon-addwish-b1"
                                                                src="{{ asset('images/icons/icon-heart.png') }}"
                                                                alt="ICON">
                                                            <img class="icon-addedwish-b1"
                                                                src="{{ asset('images/icons/icon-heart2.png') }}"
                                                                alt="ICON">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="flex-w flex-c-m p-t-47">
                            {{ $productList->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
