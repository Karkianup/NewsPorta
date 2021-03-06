@extends('layouts.app')

@section('content')
<link href="{{ asset('css/adminlte.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte.min.css.map') }}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="sidebar">
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a  class="brand-link">
      {{-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">DashBoard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('userImage/'.auth()->user()->image)}}" class="img-circle elevation-2" alt="User Image" style="width:80px">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/user/profile" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

          <li class="nav-item">
            <a href="/user/dashboard/create" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Post Article
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/user/dashboard/posts" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                View your Post
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/view/deleted/items" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                  View deleted items
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/user/dashboard/messages" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                  Messages
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/user/dashboard/favourite" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                    Favourite
              </p>
            </a>
          </li>
        </ul>
      </nav></div></aside>
</div>
@yield('body')
@endsection
