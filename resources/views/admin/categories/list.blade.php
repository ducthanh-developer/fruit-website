@extends('admin.layouts.main-layout')

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
            // if (result.isConfirmed) {
            //     Swal.fire("Đã xóa!", "", "success");
            // }
            alert(result);
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

@section('page-title')
Quản lý loại sản phẩm
@endsection

@section('content')
<!-- /.card -->
@if($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger">
    {!! $error !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endforeach
@endif
@if(Session::has('alert_success'))
<div class="alert alert-success">
    {!! Session::get('alert_success') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(Session::has('alert_error'))
<div class="alert alert-danger">
    {!! Session::get('alert_error') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="/admin/category/add" class="btn btn-outline-success m-2">
                        Thêm loại sản phẩm
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th style="width: 15%" class="text-center">Tên loại sản phẩm</th>
                                <th style="width: 15%" class="text-center">Tên nhóm sản phẩm</th>
                                <th style="width: 15%" class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoryList as $category)
                            <tr>
                                <td>{{ $category->idCategory }}</td>
                                <td>{{ $category->nameCategory }}</td>
                                <td>{{ $category->nameGroupProduct }}</td>
                                <td class="project-actions text-center">
                                    <a href="/admin/category/edit/{{$category->idCategory}}" class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt"> </i>
                                        Sửa
                                    </a>
                                    <a href="{{ route('category.delete', ['id' => $category->idCategory]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn xóa loại sản phẩm này')">
                                        <i class="fas fa-trash"> </i>
                                        Xóa
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th style="width: 15%" class="text-center">Tên loại sản phẩm</th>
                                <th style="width: 15%" class="text-center">Tên nhóm sản phẩm</th>
                                <th style="width: 15%" class="text-center">Thao tác</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
@endsection
