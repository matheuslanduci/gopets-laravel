<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <link rel="preconnect" href="https://fonts.gstatic.com" />

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>goPets</title>

  <!-- CSS -->
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" />

  <!-- Application -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}" />

  <!-- External: TippyJS -->
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/tippy.js@6/animations/scale.css" />

  <!-- External: Notyf -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
</head>

<body>
  <!-- Create an area to inject the content of page -->
  @yield("content")

  <!-- JS -->
  <!-- External: TippyJS (Don't remove from here, it need to be placed before every other script) -->
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/tippy.js@6"></script>

  <!-- External: Notyf -->
  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

  <!-- Application -->
  <script src="{{ asset('js/index.js') }}"></script>

  <!-- Create an area to inject other JS scripts and/or files -->
  @yield("scripts")
</body>

</html>
