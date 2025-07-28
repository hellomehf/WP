@extends('layout.admin_template')
@section('content')
  <div class="main-content-inner">
      <div class="main-content-wrap">
          <div class="flex items-center flex-wrap justify-between gap20 mb-27">
              <h3>Categories</h3>
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
                      <div class="text-tiny">Categories</div>
                  </li>
              </ul>
          </div>
          <div class="wg-box">
              <div class="flex items-center justify-between gap10 flex-wrap">
                  <div class="wg-filter flex-grow">
                      <form class="form-search">
                          <fieldset class="name">
                              <input type="text" placeholder="Search here..." class="" name="name"
                                  tabindex="2" value="" aria-required="true" required="">
                          </fieldset>
                          <div class="button-submit">
                              <button class="" type="submit"><i class="icon-search"></i></button>
                          </div>
                      </form>
                  </div>
                  <a class="tf-button style-1 w208" href="{{route('pages.addcategory')}}"><i
                          class="icon-plus"></i>Add new</a>
              </div>
              <div class="wg-table table-all-user ">
                  <table class="table table-striped table-bordered ">
                      <thead>
                          <tr>
                              <th>#ID</th>
                              <th>Name</th>
                              <th>Products</th>
                              <th>Create At</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>4</td>
                              <td class="pname">
                                  <div class="image">
                                      <img src="{{asset('images/avatar/user-1.png')}}" alt="" class="image">
                                  </div>
                                  <div class="name">
                                      <a href="#" class="body-title-2">Category4</a>
                                  </div>
                              </td>
                              <td>2</a></td>
                              <td>29/26/2026</td>
                              <td class="ml-8" >
                                  <div class="list-icon-function" >
                                      <a href="{{route('edit.category')}}">
                                          <div class="item edit mt-4 mb-4">
                                              <i class="icon-edit-3"></i>
                                          </div>
                                      </a>
                                      <form action="#" method="POST">
                                          <div class="item text-danger delete">
                                              <i class="icon-trash-2"></i>
                                          </div>
                                      </form>
                                  </div>
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
              <div class="divider"></div>
              <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
              </div>
          </div>
      </div>
  </div>
@endsection