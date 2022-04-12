@extends('client.layouts.main-layout')
@section('title')
    Chi tiết sản phẩm
@endsection
@push('script')
    <script>
        (function($) {
            var cmt = function() {

                var self = this;
                $btn_cmt = $('#btn-cmt')
                this.addCmt = function() {
                    var name = $('#name-cmt').val();
                    var email = $('#email-cmt').val();
                    var content = $('#content-cmt').val();
                    var idProduct = $('#idProduct').data('product-id');
                    let _token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: "/addComment",
                        type: "POST",
                        data: {
                            name: name,
                            email: email,
                            content: content,
                            idProduct: idProduct,
                            _token: _token


                        },
                        success: function(result) {
                            alert("Bình luận thành công");
                            window.location.reload(true);
                        },
                        error: function() {
                            alert("Đã có lỗi xảy ra, vui lòng thử lại sau");
                        }
                    });
                }
                $btn_cmt.click(function() {
                    self.addCmt();
                });
            }
            $(window).ready(function() {
                new cmt();
            });
        })($);
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
@section('content')
    <!-- Title page -->
    <section class="how-overlay2 bg-img1" style="background-image: url(images/bg-07.jpg);">
        <div class="container">
            <div class="txt-center p-t-160 p-b-165">
                <h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
                    shop
                </h2>

                <span class="txt-m-201 cl0 flex-c-m flex-w">
                    <a href="index.html" class="txt-m-201 cl0 hov-cl10 trans-04 m-r-6">
                        Home
                    </a>

                    <a href="shop-product-grid.html" class="txt-m-201 cl0 hov-cl10 trans-04 m-r-6">
                        / Products
                    </a>

                    <a href="#" class="txt-m-201 cl0 hov-cl10 trans-04 m-r-6">
                        / Vegetables
                    </a>

                    <span>
                        / Products
                    </span>
                </span>
            </div>
        </div>
    </section>

    <!-- Product detail -->
    <section class="sec-product-detail bg0 p-t-105 p-b-70">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-6">
                    <div class="m-r--30 m-r-0-lg">
                        <!-- Slide 100 -->
                        <div id="slide100-01">
                            <div class="wrap-main-pic-100 bo-all-1 bocl12 pos-relative">
                                <div class="main-frame">
                                    <div class="wrap-main-pic">
                                        <div class="main-pic">
                                            <img src="{{ asset('images/' . $data->imgUrl) }}" alt="IMG-SLIDE">
                                        </div>
                                    </div>
                                </div>


					},
					success: function(result) {
						alert("Bình luận thành công");
						window.location.reload(true);
					},
					error: function() {
						alert("Đã có lỗi xảy ra, vui lòng thử lại sau");
					}
				});
			}
			$btn_cmt.click(function() {
				alert(1);
				self.addCmt();
			});
		}
		$(window).ready(function() {
			new cmt();
		});
	})($);
</script>
<section class="how-overlay2 bg-img1" style="background-image: url(images/bg-07.jpg);">
	<div class="container">
		<div class="txt-center p-t-160 p-b-165">
			<h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
				shop
			</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 col-lg-6">
                    <div class="p-l-70 p-t-35 p-l-0-lg">
                        <h4 id="idProduct" class="js-name1 txt-l-104 cl3 p-b-16" data-product-id="{{ $data->idProduct }}">
                            {{ $data->nameProduct }}
                        </h4>

                        <span class="txt-m-117 cl9">
                            {{ $data->price }} VNĐ
                        </span>

                        <div class="flex-w flex-m p-t-30 p-b-27">
                            <span class="fs-16 cl11 lh-15 txt-center m-r-15">
                                <i class="fa fa-star m-rl-1"></i>
                                <i class="fa fa-star m-rl-1"></i>
                                <i class="fa fa-star m-rl-1"></i>
                                <i class="fa fa-star m-rl-1"></i>
                                <i class="fa fa-star m-rl-1"></i>
                            </span>

                            <span class="txt-s-115 cl6 p-b-3">
                                (1 customer review)
                            </span>
                        </div>
                        <form action="{{ route('add-cart') }}" method="post" id="form-add">
                            <div class="flex-w flex-m p-t-55 p-b-30">
                                @csrf
                                <input type="hidden" name="idProduct" value="{{ $data->idProductDetail }}">
                                <input type="hidden" name="nameProduct" value="{{ $data->nameProduct }}">
                                <input type="hidden" name="imgUrl" value="{{ $data->imgUrl }}">
                                <input type="hidden" name="price" value="{{ $data->price }}">
                                <div class="wrap-num-product flex-w flex-m bg12 p-rl-10 m-r-30 m-b-30">
                                    <div class="btn-num-product-down flex-c-m fs-29"></div>

                                    <input class="txt-m-102 cl6 txt-center num-product" type="number" name="quantity"
                                        value="1">

                                    <div class="btn-num-product-up flex-c-m fs-16"></div>
                                </div>
                                <button type="submit"
                                    class="flex-c-m txt-s-103 cl0 bg10 size-a-2 hov-btn2 trans-04 m-b-30 js-addcart1">
                                    Thêm vào giỏ hàng
                                </button>
                            </div>
                        </form>

                        <div class="txt-s-107 p-b-6">
                            <span class="cl6">
                                Danh mục :
                            </span>

                            <span class="cl9">
                                {{ $data->nameCategory }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab01 -->
            <div class="tab02 p-t-80">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Mô tả sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Bình luận </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="p-t-30">
                            <p class="txt-s-112 cl9">
                                {{ $data->description }}
                            </p>
                        </div>
                    </div>
                    <!-- - -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="p-t-36">
                            @if ($data->commentProduct != false)
                                Không có bình luận !!
                            @endif

                            @foreach ($data->commentProduct as $comment)
                                <div class="flex-w flex-sb-t bo-b-1 bocl15 p-b-37">
                                    <div class="wrap-pic-w size-w-56">
                                        <img src="https://i.pinimg.com/736x/16/b2/e2/16b2e2579118bf6fba3b56523583117f.jpg"
                                            alt="AVATAR">
                                    </div>

                                    <div class="size-w-57 p-t-2">
                                        <div class="flex-w flex-sb-m p-b-8">
                                            <div class="flex-w flex-b m-r-20 p-tb-5">
                                                <span class="txt-m-103 cl6 m-r-20">
                                                    {{ $comment->name }}
                                                </span>

                                                <span class="txt-s-120 cl9">
                                                    {{ $comment->updated_at }}
                                                </span>
                                            </div>
                                        </div>

                                        <p class="txt-s-101 cl6">
                                            {{ $comment->content }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Add review -->
                            <form class="w-full p-t-42" action="javascript:void(0)" enctype="multipart/form-data"
                                method="POST">
                                {{ method_field('PUT') }}
                                <h5 class="txt-m-102 cl3 p-b-20">
                                    Bình luận
                                </h5>
                                <span class="txt-s-101 cl6">
                                    Bình luận của bạn
                                </span>

                                <div class="row p-t-12">
                                    <div class="col-sm-6 p-b-30">
                                        <input id="name-cmt"
                                            class="txt-s-101 cl3 plh1 size-a-25 bo-all-1 bocl11 focus1 p-rl-20" type="text"
                                            name="name" placeholder="Họ và tên *">
                                    </div>

                                    <div class="col-sm-6 p-b-30">
                                        <input id="email-cmt"
                                            class="txt-s-101 cl3 plh1 size-a-25 bo-all-1 bocl11 focus1 p-rl-20" type="text"
                                            name="email" placeholder="Email *">
                                    </div>

                                    <div class="col-12 p-b-30">
                                        <textarea id="content-cmt" class="txt-s-101 cl3 plh1 size-a-26 bo-all-1 bocl11 focus1 p-rl-20 p-tb-10" name="review"
                                            placeholder="Nội dung *"></textarea>
                                    </div>
                                </div>

                                <div class="flex-r">
                                    <button class="flex-c-m txt-s-103 cl0 bg10 size-a-27 hov-btn2 trans-04" id="btn-cmt">
                                        Bình luận
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
