@extends('layout.admin_template')
@section('styleBlock')
<link rel="stylesheet" href="{{asset('css/userpf.css')}}">
@endsection
@section('content')
  <div class="main-content-inner">
      <div class="main-content-wrap">
          <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <div class="profile-info">
                    <img src="{{asset('images\avatar\user-1.png')}}" alt="Profile Picture" class="profile-pic">
                    <div class="profile-details">
                        <h2>Alexa Rawles</h2>
                        <p>alexarawles@gmail.com</p>
                    </div>
                </div>
              <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                  <li>
                      <a href="{{route('pages.user')}}">
                          <div class="text-tiny">User</div>
                      </a>
                  </li>
                  <li>
                      <i class="icon-chevron-right"></i>
                  </li>
                  <li>
                      <div class="text-tiny">Profile</div>
                  </li>
              </ul>
          </div>
          <div class="wg-box">
              <div class="flex items-center justify-between gap10 flex-wrap">
                  <div class="wg-filter flex-grow">
                  </div>
                  <form action="#">
                    <a class="tf-button style-1 w208" href="{{route('pages.userpf')}}"><i class="icon-plus"></i>Save</a>
                  </form>
              </div>
              <div class="form-grid">
                  <div class="form-group">
                      <label for="fullName">First Name</label>
                      <input type="text" id="first_name" placeholder="Your First Name" value="Alexa">
                  </div>
                  <div class="form-group">
                      <label for="nickName">Last Name</label>
                      <input type="text" id="last_name" placeholder="Your Last Name" value="Lexi">
                  </div>
                  <div class="form-group">
                      <label for="gender">Email</label>
                      <input type="text" id="email" placeholder="Email" value="AlexaLexi@admin.com">
                  </div>
                  <div class="form-group">
                      <label for="country">Password</label>
                      <input type="password" id="nickName" placeholder="Country" value="Cambodia">
                  </div>
                  <div class="form-group">
                      <label for="language">Address</label>
                      <input type="text" id="nickName" placeholder="Language" value="Camdodiast2483">
                  </div>
              </div>

              <div class="email-section">
                <h3>My Email</h3>
                <div class="email-card">
                    <div class="email-icon">
                        &#9993; <!-- Mail icon (envelope emoji) -->
                    </div>
                    <div class="email-details">
                        <p>alexarawles@admin.com</p>
                        <small>1 month ago</small>
                    </div>
                </div>
                <a href="#">
                  <button class="add-email-button">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M12 5v14"/><path d="M5 12h14"/></svg>
                      Add Email Address
                  </button>
                </a>
              </div>

              <div class="divider"></div>
              <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
              </div>
          </div>
      </div>
  </div>
@endsection