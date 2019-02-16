<!DOCTYPE html>
@php
  use App\Configs;
  $con = Configs::find(1);
@endphp
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- start linking  -->
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <link rel="icon" href="/img/{{$con->favicon}}">
  <!-- end linking -->
  <title>{{ config('app.name', 'NutFlix') }}</title>
</head>
<body>
