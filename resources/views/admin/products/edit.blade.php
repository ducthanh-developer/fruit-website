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
                showConfirmButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Tiếp tục",
                // timer: 5500,
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
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function() {
        bsCustomFileInput.init();
    });
    const ipnFileElement = document.getElementById('customFile')

        if ({{ !empty($product->imgUrl) }}) {
            const htmlString =
                `<img src="{{ asset('images/'.$product->imgUrl) }}" alt="" class="img-thumbnail preview-img" style="height: 150px !important" />`
            document.getElementById('preview').innerHTML = htmlString
        }

        ipnFileElement.addEventListener('change', function(e) {
            const files = e.target.files
            const file = files[0]

            const fileReader = new FileReader()
            fileReader.readAsDataURL(file)
            fileReader.onload = function() {
                const url = fileReader.result
                const htmlString =
                    `<img src="${url}" alt="${file.name}" class="img-thumbnail preview-img" style="height: 150px !important" />`
                document.getElementById('preview').innerHTML = htmlString
            }
        })
    </script>
@endpush

@section('page-title')
    Sửa sản phẩm
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thông tin sản phẩm</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form action="/admin/product/edit" enctype="multipart/form-data" method="POST">
                @method('PUT')
                <input type="hidden" name="id" value="{{ $product->idProduct }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="category">Loại sản phẩm</label>
                        <select id="category" class="form-control custom-select" name="category">
                            <option disabled="">Chọn loại</option>
                            @foreach ($categories as $category)
                                @if ($category->idCategory == $product->idCategory)
                                    <option value="{{ $category->idCategory }}" selected>{{ $category->nameCategory }}
                                    </option>
                                @else
                                    <option value="{{ $category->idCategory }}">{{ $category->nameCategory }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" id="product-name" name="product-name" class="form-control"
                            value="{{ $product->nameProduct }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="price">Giá sản phẩm</label>
                        <input type="number" id="price" class="form-control" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="quantity">Số lượng</label>
                        <input type="number" id="quantity" name="quantity" class="form-control"
                            value="{{ $product->quantity }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="customFile">Hình ảnh</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="customFile" multiple>
                            <label class="custom-file-label" for="customFile">Chọn file</label>
                            <input type="hidden" name="imageName" value="{{$product->imgUrl}}">
                        </div>
                        <div id="preview" class="mt-4">

                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label for="idTypeProduct">Kiểu sản phẩm</label>
                        <select id="idTypeProduct" class="form-control custom-select" name="idTypeProduct">
                            <option selected="" disabled="">Kiểu sản phẩm</option>
                            @foreach ($typeProduct as $type)
                                @if ($type->idTypeProduct == $product->idTypeProduct)
                                    <option value="{{ $type->idTypeProduct }}" selected>{{ $type->nameTypeProduct }}
                                    </option>
                                @else
                                    <option value="{{ $type->idTypeProduct }}">{{ $type->nameTypeProduct }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="description">Mô tả</label>
                        <textarea id="description" class="form-control" name="description" rows="10">{{ $product->description }}</textarea>
                    </div>
                </div>
<<<<<<< HEAD
                <div class="row">
                    <div class="col-12">
                        <button type="reset" class="btn btn-secondary mr-2">Hủy</button>
                        <input type="submit" value="Lưu thay đổi" class="btn btn-success">
                    </div>
=======
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="reset" class="btn btn-secondary mr-2">Hủy</button>
                    <input type="submit" onclick="successAlert()" value="Lưu thay đổi" class="btn btn-success">
>>>>>>> 7b8b7dc3a11b8301d9d44f13fc976529e0348b38
                </div>
            </form>
        </div>
    </div>
@endsection
