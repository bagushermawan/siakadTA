@extends('layouts.master')
@section('title', 'Product')
@section('header', 'Product')
@section('button-header')
{{-- <div class="section-header-button">
    <a href="features-post-create.html" class="btn btn-primary">Add New</a>
  </div> --}}
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                          <h4>Role Form</h4>
                        </div> --}}
                <div class="card-body">
                    {{-- <div class="alert alert-info">
                            <b>Note!</b> Not all browsers support HTML5 type input.
                          </div> --}}
                    <form id="myForm" action="{{ route('product.update', ['id' => $product->id]) }}" method="POST">
                        @csrf
                        {{ method_field('put') }}
                        <div class="form-group">
                            <label>Edit Nama:</label>
                            <input type="text" name="nama" class="form-control" value="{{ $product->nama }}">
                        </div>
                        <div class="form-group">
                            <label>Edit Stock:</label>
                            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
                        </div>
                        <div class="form-group">
                          <label>Edit Price:</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <div class="input-group-text">
                                      Rp
                                  </div>
                              </div>
                              <input type="number" class="form-control currency" name="price" value="{{$product->price}}">
                          </div>
                      </div>
                        <div class="form-group">
                            <label>Edit Category:</label>
                            <select name="category_id[]" multiple class="category" class="form-control">
                                @foreach($product->category as $category)
                                        <option value="{{ $category->id }}" selected>{{ $category->nama }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Update</button>
                            <button class="btn btn-secondary" type="reset" onclick="resetForm()">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('page-script')
    <script type="text/javascript">
       // Simpan pilihan kategori awal pada saat halaman dimuat
        var initialCategories = {!! json_encode($product->category->pluck('id')) !!};

        $(function() {
            $('.category').select2({
                placeholder: 'Select Category',
                ajax: {
                    url: "{{route('category.ajaxsearch')}}",
                    dataType: 'json',
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: item.nama,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        });

        function resetForm() {
            // Atur ulang nilai Select2 ke kondisi semula (pilihan kategori awal)
            $('.category').val(initialCategories).trigger('change');
        }
    </script>
  <script src="{{ asset('assets/js/iziToast.js') }}"></script>
    
    @endpush