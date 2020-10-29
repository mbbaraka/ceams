    <nav class="navbar bg-dark navbar-expand-lg sticky-top">
      <div class="container">
      <a class="navbar-brand text-light" href="{{url('/')}}">CEAMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars text-light"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="nav-link text-light" href="{{ url('/') }}">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-light" href="{{ route('particulars.index') }}">Particulars</a></li>
            <li class="nav-item"><a class="nav-link text-light" href="#">Assessment</a></li>
            <li class="nav-item"><a class="nav-link text-light" href="#">Appraisals</a></li>
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

    <header>
      <div class="container">
        <hr>
      </div>
    </header>
