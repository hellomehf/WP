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

                </div>

            </div>
            <div class="wg-table table-all-user">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                              <th style="width: 80px" class="text-center">#</th>
                              <th>User</th>
                              <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- for getdata from database --}}
                            @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{$user->id}}</td>
                                <td class="pname">
                                    <div class="name">
                                        <div class="body-title-3 mt-3">{{$user->name}}</div>
                                    </div>
                                </td>
                                <td>{{$user->email}}</td>
                            </tr>
                            @endforeach
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