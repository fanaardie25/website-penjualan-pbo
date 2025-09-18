<!DOCTYPE html>
<!-- Template Name: DashCode - HTML, React, Vue, Tailwind Admin Dashboard Template Author: Codeshaper Website: https://codeshaper.net Contact: support@codeshaperbd.net Like: https://www.facebook.com/Codeshaperbd Purchase: https://themeforest.net/item/dashcode-admin-dashboard-template/42600453 License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project. -->
<html lang="zxx" dir="ltr" class="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>Login</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo/favicon.svg') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" href="{{ asset('assets/css/rt-plugins.cs') }}s">
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
  <!-- End : Theme CSS-->
  <script src="{{ asset('assets/js/settings.js') }}" sync></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">

    @if (session('success'))
    <script>
        alert('{{ session('success') }}')
    </script>
    @endif

    <div class="card ">
        <div class="card-body flex flex-col p-6">
          <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
            <div class="flex-1">
              <div class="card-title text-slate-900 dark:text-white text-center">Login</div>
            </div>
          </header>
          <div class="card-text h-full ">
            <form class="space-y-4" method="POST" action="{{ route('store_login') }}">
                @csrf
             
              <div class="input-area relative pl-28">
                <label for="email" class="inline-inputLabel">Email</label>
                <div class="relative">
                  <input type="email" id="email" name="email" class="form-control !pl-9" placeholder="Your Email">
                  <iconify-icon icon="heroicons-outline:mail" class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                </div>
              </div>
              
              <div class="input-area relative pl-28">
                <label for="password" class="inline-inputLabel">Password</label>
                <div class="relative">
                  <input type="password" name="password" id="password" class="form-control !pl-9" placeholder="8+ characters, 1 capitat letter">
                  <iconify-icon icon="heroicons-outline:lock-closed" class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                 
                </div>
              </div>
              
              <button class="btn inline-flex justify-center btn-dark ml-28 mb-6" type="submit">Submit</button>
            
          
            
              <p class="text-xs font-medium text-slate-500 text-center">Have not account?  <a href="{{ route('register') }}" class="text-primary hover:underline"> create account</a></p>
            </form>
            @if (@session('status'))
            <div class="alert alert-success col-md-6 mt-3" style="max-width: 400px">
                {{ session('status') }}
            </div>
            @endif
          </div>
        </div>
      </div>



    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
  
  {{--   
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/rt-plugins.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/app.min.js"></script> --}}
  </body>
  </html>