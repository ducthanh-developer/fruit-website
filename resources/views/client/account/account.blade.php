@extends('client.layouts.main-layout')

@push('style')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}" />
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@push('script')
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        // SweetAlert2
        const deleteAlert = () => {
            Swal.fire({
                title: "Bạn chắc chắn muốn xóa?",
                text: "Dữ liệu sẽ bị xóa sẽ không thể hoàn tác",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Thoát",
                confirmButtonText: "Tiếp tục xóa",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire("Đã xóa!", "", "success");
                }
            });
        };

        const successAlert = () => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Chỉnh sửa của bạn đã được lưu",
                showConfirmButton: false,
                timer: 2500,
            });
        };

        // data table
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "pageLength": 5,
                "language": {
                    "decimal": "",
                    "emptyTable": "Không có dữ liệu trong bảng",
                    "infoEmpty ": "Hiển thị 0 đến 0 của 0 mục ",
                    "infoFiltered": "(Được lọc từ tổng số _MAX_ mục)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Hiển thị _MENU_ mục",
                    "loadingRecords": "Đang tải...",
                    "processing": "Đang xử lý...",
                    "zeroRecords": "Không tìm thấy dữ liệu",
                    "paginate": {
                        "first": "Đầu",
                        "last": "Cuối",
                        "next": "Trước",
                        "previous": "Sau"
                    },
                    "info": "Đang hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "search": "Tìm kiếm:",
                }
            });
        });
    </script>
@endpush

@section('title')
   Tài khoản
@endsection
@section('content')
    	<!-- Title page -->
	<section class="how-overlay2 bg-img1" style="background-image: url(images/bg-07.jpg);">
		<div class="container">
			<div class="txt-center p-t-160 p-b-165">
				<h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
					{{Auth::user()->name}}
				</h2>

				<span class="txt-m-201 cl0 flex-c-m flex-w">
					<a href="index.html" class="txt-m-201 cl0 hov-cl10 trans-04 m-r-6">
						Home
					</a>

					<span>
						/ Edit profile
					</span>
				</span>
			</div>
		</div>
	</section>

	<!-- content page -->
	<div class="bg0 p-t-95 p-b-70">
		<div class="container">
			<!-- Tab03 -->
			<div class="tab03">
				<div class="row">
					<div class="col-md-3 col-lg-2 p-b-30">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item p-b-16">
								<a class="nav-link active" href="{{ route('admin')}}">Dashboard</a>
							</li>

							<li class="nav-item p-b-16">
								<a class="nav-link" data-toggle="tab" href="#orders" role="tab">Orders</a>
							</li>

							<li class="nav-item p-b-16">
								<a class="nav-link" data-toggle="tab" href="#account-details" role="tab">Account details</a>
							</li>
						

							<li class="nav-item p-b-16 ">
								<a class="nav-link" data-toggle="tab" role="tab href="{{ route('logout') }}" 
								onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									Đăng xuất
								</a>
								<form class="p-2" id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</li>
						</ul>
					</div>
						
					<div class="col-md-9 col-lg-10 p-b-30">
						<!-- Tab panes -->
						<div class="tab-content p-l-70 p-l-0-lg">
							<!-- - -->
							<div class="tab-pane fade show active" id="dashboard" role="tabpanel">
								<p class="txt-s-101 cl6 p-b-18">
									Hello {{ Auth::user()->name }} 
								</p>

								<p>
									From your account dashboard you can view your recent orders, manage your shipping and edit your password and account details.
								</p>
							</div>
							<!-- - -->
							<div class="tab-pane fade" id="orders" role="tabpanel">
								<div class="bo-all-1 bocl15 flex-w flex-sb-m p-rl-30 p-tb-10 p-rl-15-ssm">
									<div class="flex-t p-tb-8 m-r-30">
										<img class="m-t-6 m-r-10" src="images/icons/icon-list.png" alt="IMG">
										<div class="row">
											<div class="col-12">
												<div class="card">
													<!-- /.card-header -->
													<div class="card-body">
														<table id="example2" class="table table-bordered table-hover">
															<thead>
																Đơn hàng của {{ Auth::user()->name }} 
																<tr>
																	<th style="width: 5%">ID bills</th>
																	<th style="width: 15%" class="text-center">Tên sản phẩm</th>
																	<th style="width: 30%" class="text-center">Số lượng</th>
																	<th style="width: 10%" class="text-center">Thành tiền</th>
																	<th style="width: 10%" class="text-center">Trạng thái</th>
																	<th style="width: 30%" class="text-center">Thao tác</th>
																</tr>
															</thead>
															<tbody>
																@foreach ($bill as $bill)
																	<tr>
																		<td>{{$bill->idBill}}</td>
																		<td>{{$bill->nameProduct}}</td>
																		<td >
																			{{$bill->quantity}}
																		</td>
																		<td>
																			{{$bill->total}}
																		</td>									
																			@if($bill->status=='1'){
																				<td>{{$bill->status = "Đang xử lí"}}</td>
																			}@elseif($bill->status=='2'){
																				<td>{{$bill->status = "Đã xác nhận"}}</td>
																			}
																			@else{
																				<td>{{$bill->status ="Đang vận chuyển"}}</td>
																			}
																			@endif
																		<td class="d-flex" class="project-actions text-center">
																			<a href="/account/orders/delete/{{$bill->idBill}}" class="btn btn-danger btn-sm" onclick="deleteAlert()">
																				Cancelled 
																			</a>
																		</td>
																	</tr>
																@endforeach
															</tbody>
														</table>
													</div>
													<!-- /.card-body -->
												</div>
												<!-- /.card -->
											</div>
											<!-- /.col- -->
									</div>
s									</div>

									<a href="/" class="flex-c-m txt-s-105 cl0 bg10 size-a-42 hov-btn2 trans-04 p-rl-10 m-tb-8">
										go shop
									</a>
								</div>
							</div>

							<!-- 
							<div class="tab-pane fade" id="addresses" role="tabpanel">
								<p class="txt-s-101 cl6">
									The following addresses will be used on the checkout page by default.
								</p>

								<div class="flex-w flex-sb p-t-37">
									<div class="size-w-63 flex-t w-full-sm p-b-35">
										<div class="size-w-53 p-r-30">
											<h5 class="txt-m-109 cl3 p-b-7">
												Billing address
											</h5>

											<p class="txt-s-101 cl6">
												You have not set up this type of address yet.
											</p>
										</div>

										<a href="#" class="txt-s-115 cl10 hov12 hov-cl10 p-t-6">
											Edit
										</a>
									</div>

									<div class="size-w-63 flex-t w-full-sm p-b-35">
										<div class="size-w-53 p-r-30">
											<h5 class="txt-m-109 cl3 p-b-7">
												Shipping address
											</h5>

											<p class="txt-s-101 cl6">
												You have not set up this type of address yet.
											</p>
										</div>

										<a href="#" class="txt-s-115 cl10 hov12 hov-cl10 p-t-6">
											Edit
										</a>
									</div>
								</div>
							</div>

							<!-- - -->
							<div class="tab-pane fade" id="account-details" role="tabpanel">
								<form>
									<div class="row">
										<div class="col-sm-6 p-b-23">
											<div>
												<div class="txt-s-101 cl6 p-b-10">
													Full Name: <span class="cl12">{{ Auth::user()->name }}</span>
												</div>
											</div>
										</div>

										<div class="col-12 p-b-23">
											<div>
												<div class="txt-s-101 cl6 p-b-10">
													Email address <span class="cl12">{{ Auth::user()->email }}</span>
												</div>
											</div>
										</div>
										<div class="col-12 p-b-23">
											<div>
												<div class="txt-s-101 cl6 p-b-10">
													Số điện thoại <span class="cl12">{{ Auth::user()->phoneNumber }}</span>
												</div>
											</div>
										</div>
										<div class="col-12 p-b-23">
											<div>
												<div class="txt-s-101 cl6 p-b-10">
													Địa chỉ: <span class="cl12">{{ Auth::user()->address }}</span>
												</div>
											</div>
										</div>
										<div class="col-12 p-b-23">
											<div>
												<div class="txt-s-101 cl6 p-b-10">
													Ngày sinh: <span class="cl12">{{ Auth::user()->dateOfBirth }}</span>
												</div>
											</div>
										</div>

										<div class="flex-w p-rl-15 p-t-17">
											<a href="{{ route('user-edit') }}" class="flex-c-m txt-s-105 cl0 bg10 size-a-43 hov-btn2 trans-04 p-rl-10">
												Edit
											</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection