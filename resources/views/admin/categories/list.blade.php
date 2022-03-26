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
    Category Management
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="/"  class="btn btn-outline-success m-2">
                Thêm loại
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
                        <th style="width: 20%">ID</th>
                        <th style="width: 40%" class="text-center">
                            Tên loại sản phẩm
                        </th>
                        <th style="width: 20%" class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td class="text-center">Đồng hồ quân đội</td>
                        <td class="project-actions text-center">
                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit">
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
@endsection
