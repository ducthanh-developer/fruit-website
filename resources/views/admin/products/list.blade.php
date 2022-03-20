@extends('admin.layouts.main-layout')

@push('style')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}" />
@endpush

@push('script')
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
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
                timer: 1500,
            });
        };
    </script>
@endpush

@section('page-title')
    Quản lý sản phẩm
@endsection

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <a href="/admin/product/add" class="btn btn-outline-success m-2">
                Thêm sản phẩm
            </a>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0" style="display: block">
            <table class="table projects">
                <thead>
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 15%" class="text-center">Tên sản phẩm</th>
                        <th style="width: 50%" class="text-center">Mô tả</th>
                        <th style="width: 10%" class="text-center">Giá</th>
                        <th style="width: 15%" class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            Casio AE-1200WHD-1AVDF – Nam – Kính Nhựa – Quartz (Pin) –
                            Dây Kim Loại
                        </td>
                        <td style="display: flex">
                            <div>
                                <img src="https://cdn3.dhht.vn/wp-content/uploads/2017/07/AE-1200WHD-1AVDF-699x699.jpg"
                                    alt="" width="80px" />
                            </div>
                            <div>
                                Đồng hồ nam Casio AE1200WHD có mặt đồng hồ vuông to với
                                phong cách thể thao, mặt số điện tử với những tính năng
                                hiện đại tiện dụng, kết hợp với dây đeo bằng kim loại
                                đem lại vẻ mạnh mẽ cá tính dành cho phái nam.
                            </div>
                        </td>
                        <td class="text-center">1,308,000</td>
                        <td class="project-actions text-center">
                            <a href="/admin/product/edit" class="btn btn-info btn-sm">
                                <i class="fas fa-pencil-alt"> </i>
                                Sửa
                            </a>
                            <a class="btn btn-danger btn-sm" onclick="deleteAlert()">
                                <i class="fas fa-trash"> </i>
                                Xóa
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
