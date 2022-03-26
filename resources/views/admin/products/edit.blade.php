@extends('admin.layouts.main-layout')

@push('style')
@endpush

@push('script')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
        const ipnFileElement = document.getElementById('customFile')

        ipnFileElement.addEventListener('change', function(e) {
            const files = e.target.files
            const file = files[0]

            const fileReader = new FileReader()
            fileReader.readAsDataURL(file)
            fileReader.onload = function() {
                const url = fileReader.result
                const htmlString = `<img src="${url}" alt="${file.name}" class="img-thumbnail preview-img" style="height: 150px !important" />`
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
                        </div>
                        <div id="preview" class="mt-4"></div>
                    </div>
                    <div class="form-group col-6">
                        <label for="description">Mô tả</label>
                        <textarea id="description" class="form-control" name="description" rows="10">{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="reset" class="btn btn-secondary mr-2">Hủy</button>
                        <input type="submit" value="Lưu thay đổi" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
