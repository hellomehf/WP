@extends('layout.admin_template')
@section('pageTitle')
  Add Product
@endsection
@section('styleBlock')
@endsection
@section('content')
    <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data"
        action="http://localhost:8000/admin/product/store">
        <input type="hidden" name="_token" value="8LNRTO4LPXHvbK2vgRcXqMeLgqtqNGjzWSNru7Xx" autocomplete="off">
        <div class="wg-box">
            <fieldset class="name">
                <div class="body-title mb-10">Product name <span class="tf-color-1">*</span>
                </div>
                <input class="mb-10" type="text" placeholder="Enter product name" name="name" tabindex="0"
                    value="" aria-required="true" required="">
                <div class="text-tiny">Do not exceed 100 characters when entering the
                    product name.</div>
            </fieldset>

            <div class="gap22 cols">
                <fieldset class="category">
                    <div class="body-title mb-10">Category <span class="tf-color-1">*</span>
                    </div>
                    <div class="select">
                        <select class="" name="category_id">
                            <option>Choose category</option>
                            <option value="1">Category1</option>
                            <option value="2">Category2</option>
                            <option value="3">Category3</option>
                            <option value="4">Category4</option>
                        </select>
                    </div>
                </fieldset>

            </div>

            <fieldset class="description">
                <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                </div>
                <textarea class="mb-10" name="description" placeholder="Description" tabindex="0" aria-required="true"
                    required=""></textarea>
                <div class="text-tiny">Do not exceed 100 characters when entering the
                    product name.</div>
            </fieldset>
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
                            <span class="body-text">Drop your images here or select <span class="tf-color">click to
                                    browse</span></span>
                            <input type="file" id="myFile" name="image" accept="image/*">
                        </label>
                    </div>
                </div>
            </fieldset>

            <div class="cols gap22">
                <fieldset class="name">
                    <div class="body-title mb-10">Regular Price <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Enter regular price" name="regular_price"
                        tabindex="0" value="" aria-required="true" required="">
                </fieldset>
                <fieldset class="name">
                    <div class="body-title mb-10">Sale Price <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Enter sale price" name="sale_price"
                        tabindex="0" value="" aria-required="true" required="">
                </fieldset>
            </div>


            <div class="cols gap22">
                <fieldset class="name">
                    <div class="body-title mb-10">Expire <span class="tf-color-1"></span>
                    </div>
                    <input class="mb-10" type="date" placeholder="Enter Discount" name="discount" tabindex="0"
                        value="" aria-required="true" required="">
                </fieldset>
                <fieldset class="name">
                    <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span>
                    </div>
                    <input class="mb-10" type="text" placeholder="Enter quantity" name="quantity" tabindex="0"
                        value="" aria-required="true" required="">
                </fieldset>
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
                <fieldset class="name">
                    <div class="body-title mb-10">Featured</div>
                    <div class="select mb-10">
                        <select class="" name="featured">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </fieldset>
            </div>
            <div class="cols gap10">
                <button class="tf-button w-full" type="submit">Add product</button>
            </div>
        </div>
    </form>
@endsection
