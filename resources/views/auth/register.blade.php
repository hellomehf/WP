@extends('layout.login_template')
@section('PageTitle')
  Register
@endsection

@section('styleBlock')
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.gstatic.com/">
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Allura&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper.min.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer">
@endsection

@section('Header')
  <header id="header" class="header header-fullwidth header-transparent-bg">
    <div class="container">
      <div class="header-desk header-desk_type_1">
        <div class="logo">
          <a href="index.html">
            <img src="{{asset('assets/images/logo.png')}}" alt="Uomo" class="logo__image d-block" />
          </a>
        </div>
      </div>
    </div>
  </header>
@endsection

@section('content')
  <main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="login-register container">
      <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore active" id="register-tab" data-bs-toggle="tab"
            href="#tab-item-register" role="tab" aria-controls="tab-item-register" aria-selected="true">Register</a>
        </li>
      </ul>
      <div class="tab-content pt-2" id="login_register_tab_content">
        <div class="tab-pane fade show active" id="tab-item-register" role="tabpanel" aria-labelledby="register-tab">
          <div class="register-form">
            <form method="POST" action="#" name="register-form" class="needs-validation" novalidate="">
              <div class="form-floating mb-3">
                <input class="form-control form-control_gray " name="name" value="" required="" autocomplete="name"
                  autofocus="">
                <label for="name">Name</label>
              </div>
              <div class="pb-3"></div>
              <div class="form-floating mb-3">
                <input id="email" type="email" class="form-control form-control_gray " name="email" value="" required=""
                  autocomplete="email">
                <label for="email">Email address *</label>
              </div>

              <div class="pb-3"></div>

              <div class="form-floating mb-3">
                <input id="password" type="password" class="form-control form-control_gray " name="password" required=""
                  autocomplete="new-password">
                <label for="password">Password *</label>
              </div>

              <div class="d-flex align-items-center mb-3 pb-2">
                <p class="m-0">Your personal data will be used to support your experience throughout this website, to
                  manage access to your account, and for other purposes described in our privacy policy.</p>
              </div>

              <button class="btn btn-primary w-100 text-uppercase" type="submit">Register</button>

              <div class="customer-option mt-4 text-center">
                <span class="text-secondary">Have an account?</span>
                <a href="#" class="btn-text js-show-register">Login to your Account</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection

@section('footer')
  <footer class="footer footer_type_2">
    <div class="footer-middle container">
      <div class="row row-cols-lg-5 row-cols-2">
        <div class="footer-column footer-store-info col-12 mb-4 mb-lg-0">
          <div class="logo">
            <a href="index.html">
              <img src="{{asset('assets/images/logo.png')}}" alt="SurfsideMedia" class="logo__image d-block" />
            </a>
          </div>

          <ul class="social-links list-unstyled d-flex flex-wrap mb-0">
            <li>
              <a href="#" class="footer__social-link d-block">
                <svg class="svg-icon svg-icon_facebook" width="9" height="15" viewBox="0 0 9 15"
                  xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_facebook" />
                </svg>
              </a>
            </li>
            <li>
              <a href="#" class="footer__social-link d-block">
                <svg class="svg-icon svg-icon_twitter" width="14" height="13" viewBox="0 0 14 13"
                  xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_twitter" />
                </svg>
              </a>
            </li>
            <li>
              <a href="#" class="footer__social-link d-block">
                <svg class="svg-icon svg-icon_instagram" width="14" height="13" viewBox="0 0 14 13"
                  xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_instagram" />
                </svg>
              </a>
            </li>
            <li>
              <a href="#" class="footer__social-link d-block">
                <svg class="svg-icon svg-icon_youtube" width="16" height="11" viewBox="0 0 16 11"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M15.0117 1.8584C14.8477 1.20215 14.3281 0.682617 13.6992 0.518555C12.5234 0.19043 7.875 0.19043 7.875 0.19043C7.875 0.19043 3.19922 0.19043 2.02344 0.518555C1.39453 0.682617 0.875 1.20215 0.710938 1.8584C0.382812 3.00684 0.382812 5.46777 0.382812 5.46777C0.382812 5.46777 0.382812 7.90137 0.710938 9.07715C0.875 9.7334 1.39453 10.2256 2.02344 10.3896C3.19922 10.6904 7.875 10.6904 7.875 10.6904C7.875 10.6904 12.5234 10.6904 13.6992 10.3896C14.3281 10.2256 14.8477 9.7334 15.0117 9.07715C15.3398 7.90137 15.3398 5.46777 15.3398 5.46777C15.3398 5.46777 15.3398 3.00684 15.0117 1.8584ZM6.34375 7.68262V3.25293L10.2266 5.46777L6.34375 7.68262Z" />
                </svg>
              </a>
            </li>
            <li>
              <a href="#" class="footer__social-link d-block">
                <svg class="svg-icon svg-icon_pinterest" width="14" height="15" viewBox="0 0 14 15"
                  xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_pinterest" />
                </svg>
              </a>
            </li>
          </ul>
        </div>

        <div class="footer-column footer-menu mb-4 mb-lg-0">
          <h6 class="sub-menu__title text-uppercase">Company</h6>
          <ul class="sub-menu__list list-unstyled">
            <li class="sub-menu__item"><a href="about-2.html" class="menu-link menu-link_us-s">About Us</a></li>
            <li class="sub-menu__item"><a href="contact-2.html" class="menu-link menu-link_us-s">Contact Us</a></li>
          </ul>
        </div>

        <div class="footer-column footer-menu mb-4 mb-lg-0">
          <h6 class="sub-menu__title text-uppercase">Shop</h6>
          <ul class="sub-menu__list list-unstyled">
            <li class="sub-menu__item"><a href="shop2.html" class="menu-link menu-link_us-s">New Arrivals</a></li>
            <li class="sub-menu__item"><a href="shop1.html" class="menu-link menu-link_us-s">Shop All</a></li>
          </ul>
        </div>

        <div class="footer-column footer-menu mb-4 mb-lg-0">
          <h6 class="sub-menu__title text-uppercase">Help</h6>
          <ul class="sub-menu__list list-unstyled">
            <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Customer Service</a></li>
            <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Gift Card</a></li>
          </ul>
        </div>

        <div class="footer-column footer-menu mb-4 mb-lg-0">
          <h6 class="sub-menu__title text-uppercase">Categories</h6>
          <ul class="sub-menu__list list-unstyled">
            <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Shirts</a></li>
            <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Shop All</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container d-md-flex align-items-center">
        <span class="footer-copyright me-auto">©2024 Surfside Media</span>
        <div class="footer-settings d-md-flex align-items-center">
          <a href="privacy-policy.html">Privacy Policy</a> &nbsp;|&nbsp; <a href="terms-conditions.html">Terms &amp;
            Conditions</a>
        </div>
      </div>
    </div>
  </footer>
@endsection

@section('ScriptBlock')
  <script src="{{asset('assets/js/plugins/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/bootstrap-slider.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/swiper.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/countdown.js')}}"></script>
  <script src="{{asset('assets/js/theme.js')}}"></script>
@endsection