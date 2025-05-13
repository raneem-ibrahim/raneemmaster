{{-- start top --}}
  @include('dashboard.include.top')
  {{-- end top  --}}

  
  {{-- start sidebar --}}
@include('dashboard.include.sidebar')
  {{-- end sidbare --}}
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
    <!-- start Navbar -->
    @include('dashboard.include.nav')
  
    <!-- End Navbar -->
    <div class="container-fluid py-2  cards">



        @yield('content')

      {{-- start footer  --}}
      {{-- @include('dashboard.include.footer') --}}
       {{-- end footer  --}}
    </div>
  </main>
  
  

{{-- start end  --}}
@include('dashboard.include.end')
{{-- end end  --}}