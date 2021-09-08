@extends("layouts.main")

@section('content')
  <div id="home-page">
    <img src="{{ asset('assets/goPets.png') }}" alt="goPets" />
    <span class="description">Your online petshop</span>
    <div class="content">
      <a href={{ route("home") }} class="link-content" data-tippy-content="Soon...">
        <img src="{{ asset('assets/shop.svg') }}" alt="Loja" />
        <span>Store</span>
      </a>
      <a href={{ route("dashboard") }} class="link-content">
        <img src="{{ asset('assets/dashboard.svg') }}" alt="Dashboard" />
        <span>Dashboard</span>
      </a>
    </div>
  </div>
@endsection
