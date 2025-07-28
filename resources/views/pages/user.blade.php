@extends('layout.admin_template')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Users</h3>
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
                    <div class="text-tiny">All User</div>
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
                <form action="#">
                    <a class="tf-button style-1 w208" href="{{route('add.user')}}"><i class="icon-plus"></i>Add new User</a>
                </form>
            </div>
            <div class="wg-table table-all-user">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>User</th>
                              <th>Phone</th>
                              <th>Email</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- for getdata from database --}}
                          <tr>
                              <td>1</td>
                              <td class="pname">
                                  <div class="image">
                                      <img src="{{asset('images\avatar\user-1.png')}}" alt="" class="image">
                                  </div>
                                  <div class="name">
                                      <a href="{{route('pages.userpf')}}" class="body-title-2">Admin</a>
                                      <div class="text-tiny mt-3">ADM</div>
                                  </div>
                              </td>
                              <td>1234567890</td>
                              <td>admin@surfsidemedia.in</td>
                              <td>
                                  <div class="list-icon-function">
                                      <a href="{{route('pages.edituser')}}">
                                          <div class="item edit">
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

            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

            </div>
        </div>
    </div>
</div>
@endsection