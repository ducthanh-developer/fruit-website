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
   Chỉnh sửa tài khoản
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
								<a class="nav-link " href="{{ route('user-profile')}}">Orders</a>
							</li>

							<li class="nav-item p-b-16">
								<a class="nav-link"  href="{{ route('user-profile')}}">Account details</a>
							</li>
							<li class="nav-item p-b-16">
								<a class="nav-link" href="/admin/login">Logout</a>
							</li>
						</ul>
					</div>
						
					<div class="col-md-9 col-lg-10 p-b-30">
						<!-- Tab panes -->
						<div class="tab-content p-l-70 p-l-0-lg">
							<!-- - -->
							{{-- <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
								<p class="txt-s-101 cl6 p-b-18">
									Hello {{ Auth::user()->name }} <span class="txt-s-108"></span> (not <span class="txt-s-108">{{ Auth::user()->name }}</span>? <a href="#" class="txt-s-101 cl6 hov-cl10">Sign out</a>)
								</p>

								<p>
									From your account dashboard you can view your recent orders, manage your shipping and billing addresses and edit your password and account details.
								</p>
							</div>
							<!-- - --> --}}
							<div class="tab-pane ade show active" id="account-details" role="tabpanel">
								<form method="POST"  action="{{route('user-update')}}">
									@csrf
									<div class="row">
										<div class="col-sm-6 p-b-23">
											<div>
												<div class="txt-s-101 cl6 p-b-10">
													Full Name: <span class="cl12"></span>
												</div>

												<input value="{{ Auth::user()->name }}" placeholder="{{ Auth::user()->name }}" class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="text" name="name">
											</div>
										</div>

										<div class="col-12 p-b-23">
											<div>
												<div class="txt-s-101 cl6 p-b-10">
													Email address <span class="cl12"></span>
												</div>

												<input value="{{ Auth::user()->email }}" class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="text" name="email" placeholder="{{ Auth::user()->email }}">
											</div>
										</div>
										<div class="col-12 p-b-23">
											<div>
												<div class="txt-s-101 cl6 p-b-10">
													Phone number <span class="cl12"></span>
												</div>

												<input {{ Auth::user()->phoneNumber }} class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="text" name="phoneNumber" placeholder="{{ Auth::user()->phoneNumber }}">
											</div>
										</div>
										<div class="col-12 p-b-23">
											<div>
												<div class="txt-s-101 cl6 p-b-10">
													Address <span class="cl12"></span>
												</div>

												<input value="{{ Auth::user()->address }}" class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="text" name="address" placeholder="{{ Auth::user()->address }}">
											</div>
										</div>
										<div class="col-12 p-b-23">
											<div>
												<div class="txt-s-101 cl6 p-b-10">
													Date of birth <span class="cl12"></span>
												</div>

												<input value="{{ Auth::user()->dateOfBirth }}" class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="date" name="dateOfBirth" placeholder="{{ Auth::user()->address }}">
											</div>
										</div
										<div class="flex-w p-rl-15 p-t-17">
											<button onclick="successAlert()" type="submit" class="flex-c-m txt-s-105 cl0 bg10 size-a-43 hov-btn2 trans-04 p-rl-10">
												Save
											</button>
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