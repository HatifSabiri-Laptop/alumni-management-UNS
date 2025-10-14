<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ config('app.name', 'Laravel Saya') }}</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
    /* 🌈 Background & layout */
    body {
      background: linear-gradient(135deg, #cfe8ff 0%, #e2f1ff 100%);
      height: 100vh; /* full viewport height (no scroll) */
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Inter', sans-serif;
    }

    /* ✨ Glass panel container */
    .glass-panel {
      background: rgba(255, 255, 255, 0.3);
      box-shadow: 0 8px 25px rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-radius: 20px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      text-align: center;
      padding: 3rem 2rem;
      width: 90%;
      max-width: 600px;
      transition: transform 0.3s ease;
    }

    .glass-panel:hover {
      transform: translateY(-5px);
    }

    /* Logo & text */
    .glass-panel img {
      height: 50%;
      width: 50%;
      margin-bottom: 1.5rem;
    }

    h1 {
      font-size: 1.9rem;
      font-weight: 700;
      color: #1e293b;
      margin-bottom: 0.75rem;
    }

    p {
      color: #334155;
      margin-bottom: 2rem;
    }

    /*Buttons */
    .btn {
      display: inline-block;
      padding: 0.75rem 1.75rem;
      border-radius: 9999px;
      font-weight: 600;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .btn-login {
      background: linear-gradient(135deg, #6366f1, #4338ca);
      color: white;
      border: none;
    }

    .btn-login:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(99, 102, 241, 0.4);
    }

    .btn-register {
      border: 2px solid #6366f1;
      color: #4338ca;
      background: transparent;
    }

    .btn-register:hover {
      background: #eef2ff;
      transform: translateY(-3px);
    }

    /* Mobile responsiveness */
    @media (max-width: 640px) {
      body {
        padding: 1rem;
      }
      .glass-panel {
        padding: 2rem 1.5rem;
      }
      h1 {
        font-size: 1.6rem;
      }
    }
  </style>
</head>

<body>
  <div class="glass-panel">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto">
    <h1>Selamat Datang di <span class="text-indigo-600">Alumni UNS</span></h1>
    <p>Sistem Informasi Alumni mahasiswa yang sudah lulus dari UNS.</p>

    @guest
      <div class="flex justify-center space-x-3">
        <a href="{{ route('login') }}" class="btn btn-login">Log In</a>
        @if (Route::has('register'))
          <a href="{{ route('register') }}" class="btn btn-register">Register</a>
        @endif
      </div>
    @else
      <a href="{{ route('dashboard') }}" class="btn btn-login">Dashboard</a>
    @endguest
  </div>
</body>
</html>
