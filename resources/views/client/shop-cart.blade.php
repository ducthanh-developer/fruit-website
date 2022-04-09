@extends('client.layouts.main-layout')
@push('script')
    <script>
        $('.btn-num-product-down').on('click', function() {
            var numProduct = Number($(this).next().val());
            if (numProduct > 0) $(this).next().val(numProduct - 1);

        });

        $('.btn-num-product-up').on('click', function() {
            var numProduct = Number($(this).prev().val());
            $(this).prev().val(numProduct + 1);
        });
    </script>
@endpush
@section('title')
    Checkout
@endsection
@section('content')
    <!-- Title page -->
    <section class="how-overlay2 bg-img1" style="background-image: url(images/bg-07.jpg);">
        <div class="container">
            <div class="txt-center p-t-160 p-b-165">
                <h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
                    Cart
                </h2>

                <span class="txt-m-201 cl0 flex-c-m flex-w">
                    <a href="index.html" class="txt-m-201 cl0 hov-cl10 trans-04 m-r-6">
                        Home
                    </a>

                    <span>
                        / Cart
                    </span>
                </span>
            </div>
        </div>
    </section>

    <!-- content page -->
    <div class="bg0 p-tb-100">
        <div class="container">
            @if (isset($cart))
                <form>
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head bg12">
                                <th class="column-1 p-l-30">Product</th>
                                <th class="column-2">Price</th>
                                <th class="column-3">Quantity</th>
                                <th class="column-4">Total</th>
                            </tr>
                            @foreach ($cart as $item)
                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="flex-w flex-m">
                                            <div class="wrap-pic-w size-w-50 bo-all-1 bocl12 m-r-30">
                                                <img src="{{ asset('images/' . $item->imgUrl) }}" alt="IMG">
                                            </div>

                                            <span>
                                                {{ $item->nameProduct }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="column-2 price">
                                        {{ number_format($item->price) }}
                                    </td>
                                    <td class="column-3">
                                        <div class="wrap-num-product flex-w flex-m bg12 p-rl-10">
                                            <div class="btn-num-product-down flex-c-m fs-29"></div>

                                            <input class="txt-m-102 cl6 txt-center num-product" type="number"
                                                name="quantity" value="{{ $item->quantity }}">

                                            <div class="btn-num-product-up flex-c-m fs-16"></div>
                                        </div>
                                    </td>
                                    <td class="column-4">
                                        <div class="flex-w flex-sb-m">
                                            <span class="sub-total">
                                                {{ number_format($item->price * $item->quantity) }}
                                            </span>

                                            <div class="fs-15 hov-cl10 pointer">
                                                <span class="lnr lnr-cross"></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $total += $item->price * $item->quantity;
                                @endphp
                            @endforeach

                        </table>
                    </div>

                    <div class="flex-w flex-sb-m p-t-20">
                        <div class="flex-w flex-m m-r-50 m-tb-10">
                            <input class="size-a-31 bo-all-1 bocl15 txt-s-123 cl6 plh1 p-rl-20 focus1 m-r-30 m-tb-10"
                                type="text" name="coupon" placeholder="Coupon Code">

                            <div class="flex-c-m txt-s-105 cl0 bg10 size-a-32 hov-btn2 trans-04 pointer p-rl-10 m-tb-10">
                                apply coupon
                            </div>
                        </div>

                        <div class="flex-c-m txt-s-105 cl0 bg10 size-a-33 hov-btn2 trans-04 pointer p-rl-10 m-tb-10">
                            update CART
                        </div>
                    </div>

                    <div class="flex-col-l p-t-68">
                        <span class="txt-m-123 cl3 p-b-18">
                            CART TOTALS
                        </span>

                        <div class="flex-w flex-m bo-b-1 bocl15 w-full p-tb-18">
                            <span class="size-w-58 txt-m-109 cl3">
                                Subtotal
                            </span>

                            <span class="size-w-59 txt-m-104 cl6">
                                {{ number_format($total) }}
                            </span>
                        </div>

                        <div class="flex-w flex-m bo-b-1 bocl15 w-full p-tb-18">
                            <span class="size-w-58 txt-m-109 cl3">
                                Total
                            </span>

                            <span class="size-w-59 txt-m-104 cl10">
                                {{ number_format($total) }}
                            </span>
                        </div>

                        <a href="{{ route('checkout') }}"
                            class="flex-c-m txt-s-105 cl0 bg10 size-a-34 hov-btn2 trans-04 p-rl-10 m-t-43">
                            Check-out
                        </a>
                    </div>
                </form>
            @endif

        </div>
    </div>
@endsection
