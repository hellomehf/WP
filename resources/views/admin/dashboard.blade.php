@extends('layout.admin_template') {{-- Changed to extend 'layout.admin_template' --}}

@section('pageTitle')
    Admin Dashboard
@endsection

@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="tf-section-1 mb-30">
                <div class="flex gap20 flex-wrap-mobile">
                    <div class="w-half">
                        <div class="wg-chart-default mb-20">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap14">
                                    <div class="image ic-bg">
                                        <i class="icon-shopping-bag"></i>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2">Total Product</div>
                                        <h4>{{$dashProduct[0]->totalproduct}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-half">
                        <div class="wg-chart-default mb-20">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap14">
                                    <div class="image ic-bg">
                                        <i class="icon-shopping-bag"></i>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2">Total Category</div>
                                        <h4>{{$dashCategory[0]->totalcategory}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-half">
                        <div class="wg-chart-default mb-20">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap14">
                                    <div class="image ic-bg">
                                        <i class="icon-shopping-bag"></i>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2">Total User</div>
                                        <h4>{{$dashUser[0]->totaluser}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    


                </div>

                

            </div> 
            <div class="tf-section mb-30">

                <div class="wg-box">
                    <div class="flex items-center justify-between">
                        <h5>Recent Product Add</h5>
                        <div class="dropdown default">
                           
                        </div>
                    </div>
                    <div class="wg-table table-all-user">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>SalePrice</th>
                                        <th>Expire Month</th>
                                        <th>Category</th>
                                        <th>Featured</th>
                                        <th>Stock</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td class="pname">
                                        <div class="image">
                                            <img src="{{asset('uploads/products')}}/{{$product->image}}" alt="{{$product->name}}" class="image">
                                        </div>
                                        <div class="name">
                                            <a href="#" class="body-title-2">{{$product->name}}</a>
                                            <div class="text-tiny mt-3">{{$product->slug}}</div>
                                        </div>  
                                    </td>
                                    <td>${{$product->regular_price}}</td>
                                    <td>${{$product->sale_price}}</td>
                                    <td>{{$product->expire_month}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->feature == 0 ? "No":"Yes"}}</td>
                                    <td>{{$product->stock_status}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>
                                        <div class="list-icon-function">
                                            <a href="{{route('admin.edit.product',['id'=>$product->id])}}">
                                                <div class="item edit">
                                                    <i class="icon-edit-3"></i>
                                                </div>
                                            </a>
                                            <form action="{{route('delete.product',['id'=>$product->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="item text-danger delete">
                                                    <i class="icon-trash-2"></i>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
