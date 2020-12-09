@extends('layouts.wrapper')

@section('title', 'Certifications')
@section('content')

{{-- swiper CDN --}}
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
        @foreach($certs as $cert)
        <div class="swiper-slide">
          <img class="m-auto" src="{{ $cert->filepath }}" alt="Certs" height="300" width="500">
        </div>
        @endforeach
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>

 
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
@endsection
