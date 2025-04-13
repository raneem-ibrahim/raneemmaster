


     {{-- start top --}}
     @include('dashboard.include.top')
     {{-- end top --}}
  


       {{-- start navbar --}}
       @include('dashboard.include.nav')
       {{-- end navbar --}}

  

    
     <div class="container-fluid page-body-wrapper">

      <!-- partial:partials/_settings-panel.html -->
      {{-- <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div> --}}



      {{-- start sidebar right --}}
      @include('dashboard.include.sidebar2')
      {{--  end sidebar right  --}}




      {{--start sidebar --}}
      @include('dashboard.include.sidebar')
      {{-- end sidebar  --}}


      {{-- start content main --}}
     
      <div class="main-panel">
        <div class="card-body">
            <h4 class="card-title">Add Student</h4>
          
            <form class="forms-sample" method="POST" action="{{ url('/add-student') }}">
              @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" name="Password" class="form-control" id="Password" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="user">User Type</label>
                <input type="text" name="user" class="form-control" id="user" placeholder="User Type">
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button type="reset" class="btn btn-light">Cancel</button>
            </form>
          </div>
          
  {{-- end content main --}}


     {{-- start footer  --}}
       @include('dashboard.include.footer')
     {{-- end footer  --}}
      </div>
     
    </div>   
    <!-- page-body-wrapper ends -->
  {{-- </div> --}}
  <!-- container-scroller -->


{{-- end --}}
@include('dashboard.include.end')