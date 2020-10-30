    <nav class="navbar bg-custom text-nav-custom navbar-expand-lg sticky-top pt-3 pb-3">

      <div class="container">

      <a class="navbar-brand text-light" href="{{url('/')}}">CEAMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars text-light"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="nav-link text-light" href="{{ url('/hr') }}">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-light" href="{{ route('hr.appraisers') }}">Appraisers</a></li>
            <li class="nav-item"><a class="nav-link text-light" href="{{ route('hr.jobs') }}">Jobs</a></li>
            <li class="nav-item"><a class="nav-link text-light" href="{{ route('hr.staffs') }}">Staffs</a></li>
            <li class="nav-item"><a class="nav-link text-light" href="{{ route('hr.appraisals') }}">Appraisals</a></li>
            <li class="nav-item"><a class="nav-link text-light" href="#">Staff</a></li>
          </ul>
          <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link text-light" href="#">Hi,</a></li>
            <li class="nav-item"><a class="nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                @csrf
            </form>
          </ul>
        </div>
      </div>

    </nav>

    <header >
        <div class="bg-dark p-2">
        </div>
      <div class="container">
        <hr>
      </div>
    </header>
