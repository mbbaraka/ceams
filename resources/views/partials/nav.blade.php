    <nav class="navbar navbar-expand-lg navbar-default sticky-top">
      <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars text-light"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="index.html">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('particulars.index') }}">Particulars</a></li>
            <li class="nav-item"><a class="nav-link" href="posts.html">Assessment</a></li>
            <li class="nav-item"><a class="nav-link" href="users.html">Appraisals</a></li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="#">Welcome, Brad</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                @csrf
            </form>
          </ul>
        </div>
      </div>
    </nav>

    <header id="header" class="">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h1><span class="fa fa-cog" aria-hidden="true"></span> Dashboard </h1>
          </div>
          <div class="col-md-2 ml-auto">
            <div class="dropdown create float-right">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Roles
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="#" class="dropdown-item">Add Page</a></li>
                <li><a href="#" class="dropdown-item">Add Post</a></li>
                <li><a href="#" class="dropdown-item">Add User</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>