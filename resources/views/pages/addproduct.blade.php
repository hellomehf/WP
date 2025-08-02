@extends('layout.admin_template')
@section('pageTitle')
    Add product
@endsection
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Add Product</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{route('admin.dashboard')}}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="{{route('pages.product')}}">
                        <div class="text-tiny">Products</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Add product</div>
                </li>
            </ul>
        </div>
        <!-- form-add-product -->
        <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{route('admin.product.store')}}">
            @csrf
            <div class="wg-box">  
                <fieldset class="name">
                    <div class="body-title mb-10">Product name <span class="tf-color-1">*</span>
                    </div>
                    <input class="mb-10" type="text" placeholder="Enter product name" name="name" tabindex="0" value="{{old('name')}}" aria-required="true" required="">
                </fieldset>
                @error('name')
                  <span class="alert alert-danger text-center">{{$message}}</span>
                @enderror

                <fieldset class="name">
                    <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Enter product slug" name="slug" tabindex="0" value="{{old('slug')}}" aria-required="true" required="">
                </fieldset>
                @error('slug')
                  <span class="alert alert-danger text-center">{{$message}}</span>
                @enderror

                <div class="gap22 cols">
                    <fieldset class="category">
                        <div class="body-title mb-10">Category <span class="tf-color-1">*</span>
                        </div>
                        <div class="select">
                            <select class="" name="category_id">
                                <option>Choose category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </fieldset>
                    @error('category_id')
                      <span class="alert alert-danger text-center">{{$message}}</span>
                    @enderror
                  </div>
                  
                  <fieldset class="description">
                    <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                    </div>
                    <textarea class="mb-10" name="description" placeholder="Description" tabindex="0" aria-required="true" required="">{{old('description')}}</textarea>
                    <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                  </fieldset>
                  @error('description')
                    <span class="alert alert-danger text-center">{{$message}}</span>
                  @enderror
            </div>
            <div class="wg-box">
                <fieldset>
                    <div class="body-title">Upload images <span class="tf-color-1">*</span>
                    </div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none">
                            <img src="../../../localhost_8000/images/upload/upload-1.png" class="effect8" alt="">
                        </div>
                        <div id="upload-file" class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                <input type="file" id="myFile" name="image" accept="image/*">
                            </label>
                        </div>
                    </div>
                </fieldset>
                @error('image')
                  <span class="alert alert-danger text-center">{{$message}}</span>
                @enderror

                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">Regular Price <span
                                class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter regular price"
                            name="regular_price" tabindex="0" value="{{old('regular_price')}}" aria-required="true"
                            required="">
                    </fieldset>
                    @error('regular_price')
                      <span class="alert alert-danger text-center">{{$message}}</span>
                    @enderror
                    <fieldset class="name">
                        <div class="body-title mb-10">Sale Price <span
                                class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter sale price"
                            name="sale_price" tabindex="0" value="{{old('sale_price')}}" aria-required="true"
                            required="">
                    </fieldset>
                    @error('sale_price')
                      <span class="alert alert-danger text-center">{{$message}}</span>
                    @enderror
                </div>


                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">Expire Months <span class="tf-color-1">*</span>
                        </div>
                        <input class="mb-10" type="text" placeholder="Enter Expire Months" name="expire_month"
                            tabindex="0" value="{{old('expire_month')}}" aria-required="true" required="">
                    </fieldset>
                    @error('expire_month')
                      <span class="alert alert-danger text-center">{{$message}}</span>
                    @enderror
                    <fieldset class="name">
                      <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span>
                      </div>
                      <input class="mb-10" type="text" placeholder="Enter quantity"
                      name="quantity" tabindex="0" value="{{old('quantity')}}" aria-required="true"
                      required="">
                    </fieldset>
                    @error('quantity')
                      <span class="alert alert-danger text-center">{{$message}}</span>
                    @enderror
                  </div>

                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">Stock</div>
                        <div class="select mb-10">
                            <select class="" name="stock_status">
                                <option value="instock">InStock</option>
                                <option value="outofstock">Out of Stock</option>
                            </select>
                        </div>
                    </fieldset>
                    @error('stock_status')
                      <span class="alert alert-danger text-center">{{$message}}</span>
                    @enderror
                    <fieldset class="name">
                        <div class="body-title mb-10">Featured</div>
                        <div class="select mb-10">
                            <select class="" name="featured">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </fieldset>
                    @error('featured')
                      <span class="alert alert-danger text-center">{{$message}}</span>
                    @enderror
                </div>
                <div class="cols gap10">
                    <button class="tf-button w-full" type="submit">Add product</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scriptBlock')
    <script>
        $(function(){
            $("#myFile").on("change" , function(e){
                const photoInp = $("#myFile");
                const [file] = this.files;
                if(file)
                {
                    $("#imgpreview img").attr('src' , URL.createObjectURL(file));
                    $("#imgpreview").show();

                }
            });

            $("input[name='name']").on("change",function(){
                $("input[name='slug']").val(StringToSlug($(this).val()));
            });
        });


        function StringToSlug(Text)
        {
            return Text.toLowerCase()
            .replace(/[^\w]+/g,"")
            .replace(/ +/g,"-");
        }
    </script>
@endpush