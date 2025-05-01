@extends('template.base')

@section('title', 'E-Book Store Admin Dashboard')

@section('content')
<style>
  body {
    font-family: 'Playfair Display', serif;
    background-color: #EDE4D5;
    color: #6A100C;
  }

  .main-panel {
    border: 3px solid #6A100C;
    border-radius: 8px;
    padding: 20px;
    background-color: #EDE4D5;
  }

  .card {
    border: 2px solid #6A100C;
    background-color: #fff8f0;
    color: #6A100C;
    font-family: 'Playfair Display', serif;
    border-radius: 10px;
    box-shadow: 4px 4px 0px #6A100C;
  }

  .page-title-icon {
  background-color: #6A100C !important;
  color: white;
}


  .breadcrumb {
    background-color: transparent;
  }

  h4, h2, h6 {
    color: #6A100C !important;
  }

  .legend-horizontal li,
  .legend-vertical li {
    color: #6A100C !important;
  }

  canvas {
    background-color: #fdf7ed;
    border: 1px dashed #6A100C;
    padding: 10px;
  }
</style>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon text-white me-2" style="background-color: #6A100C;">
          <i class="mdi mdi-book-open-page-variant"></i>
        </span> Volasido Bookstore Admin
      </h3>
 
    </div>

    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="font-weight-normal mb-3">Weekly Revenue <i class="mdi mdi-cash-multiple mdi-24px float-end"></i></h4>
            <h2 class="mb-5">$12,450</h2>
            <h6 class="card-text">Up by 20%</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="font-weight-normal mb-3">New Subscribers <i class="mdi mdi-account-plus mdi-24px float-end"></i></h4>
            <h2 class="mb-5">1,234</h2>
            <h6 class="card-text">+12% from last week</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="font-weight-normal mb-3">Active Readers <i class="mdi mdi-eye-outline mdi-24px float-end"></i></h4>
            <h2 class="mb-5">5,789</h2>
            <h6 class="card-text">Steady growth</h6>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="clearfix">
              <h4 class="card-title float-start">Reading & Sales Statistics</h4>
              <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-end"></div>
            </div>
            <canvas id="visit-sale-chart" class="mt-4"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Top Book Genres</h4>
            <div class="doughnutjs-wrapper d-flex justify-content-center">
              <canvas id="traffic-chart"></canvas>
            </div>
            <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('template.includes.footer')
</div>
@endsection
