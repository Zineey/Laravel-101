@section('header')
<header class="shadow p-3 mb-5 d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
    <span class="fs-2 brand-text fw-bold text-black">WeTalk</span>
  </a>

  <ul class="nav nav-pills">
    @if(Auth::id())
    <li class="nav-item"><a href="/" class="nav-link text-black">Home</a></li>
    <li class="nav-item"><a href="/form" class="nav-link text-success">Start a Thread</a></li>
    <li class="nav-item"><a href="/logout" class="nav-link text-black">Logout</a></li>
    @endif
  </ul>
</header>
@endsection