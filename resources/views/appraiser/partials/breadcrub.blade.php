	<section id="breadcrumb">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Dashboard</a></li>
                    {{-- <span>&nbsp; >> &nbsp;</span> --}}
                    @for($i = 0; $i <= count(Request::segments()); $i++)
                    <li>

                        <a href="">{{Request::segment($i)}}</a>
                        @if($i < count(Request::segments()) & $i > 0)
                            {!!'<span>&nbsp; >> &nbsp;</span>'!!}
                        @endif
                    </li>
                    @endfor
                </ol>
              </div>
              <div class="col-md-2">
                <div class="col-md-2 ml-auto">
                    <div class="dropdown create float-right">
                      <a href="{{ url('/') }}" class="btn border-custom btn-light text-custom dropdown-toggle">
                        Switch Back
                      </a>
                    </div>
                  </div>
              </div>
          </div>

      </div>
    </section>
