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
                      @can('isHR', Auth::user()->role)
                      <a href="{{ route('hr.index') }}" class="btn border-custom btn-light text-custom dropdown-toggle">
                        Switch to HR
                        <span class="caret"></span>
                      </a>
                      @elsecan('isAppraiser', Auth::user()->role)
                      <a href="{{ route('appraiser.index') }}" class="btn border-custom btn-light text-custom dropdown-toggle">
                        Switch to Appraiser
                        <span class="caret"></span>
                      </a>
                      @endcan
                      {{-- <ul class="dropdown-menu border-custom text-custom dropdown-menu-right" aria-labelledby="dropdownMenu1">

                          @switch(Auth::user()->role)
                              @case(1)
                              <li><a href="#" class="dropdown-item">Switch to HR</a></li>
                                  @break
                              @case(2)
                              <li><a href="#" class="dropdown-item">Switch to HOD</a></li>
                                  @break
                              @case(3)
                              <li><a href="#" class="dropdown-item">Switch to DEAN</a></li>
                                  @break
                              @case(4)
                              <li><a href="#" class="dropdown-item">Switch to US</a></li>
                                  @break
                              @case(5)
                              <li><a href="#" class="dropdown-item">Switch to VS</a></li>
                                  @break
                              @default

                          @endswitch


                        {{-- <li><a href="#" class="dropdown-item">Switch to DEAN</a></li>
                        <li><a href="#" class="dropdown-item">Switch to US</a></li>
                        <li><a href="#" class="dropdown-item">Switch to VC</a></li>
                      </ul> --}}
                    </div>
                  </div>
              </div>
          </div>

      </div>
    </section>
