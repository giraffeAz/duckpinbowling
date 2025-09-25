@extends('back.layout.pages-layout')
@section('title') {{'Home'}} @endsection

@section('content')

<main id="main" class="main">

    @include('back.partials.header')

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Tournament Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Tournament <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                    
                      <h6>IT vs. CS</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Tournament Card -->

             <!-- Players Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

               
                <a href='index'>
                <div class="card-body">
                  <h5 class="card-title">Players <span>| Total Number</span></h5>

                  <div class="d-flex align-items-center">
                   
                    <div class="ps-3">
                      <h6>30</h6>
                    </div>
                  </div>
                </div>
                </a>

              </div>
            </div><!-- End Player Card -->

            <!-- Team Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Team <span>| Total Number</span></h5>

                  <div class="d-flex align-items-center">
                    
                    <div class="ps-3">
                      <h6>5</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Team Card -->

            <!-- Match Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Matches <span>| Ongoing</span></h5>

                  <div class="d-flex align-items-center">
                 
                    <div class="ps-3">
                      <h6>5</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Match Card -->

         

            <!-- Category -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Category Breakdown </h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Category</th>
                        <th scope="col">Players/Team</th>
                        <th scope="col">Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>            
                        <td>Singles</td>
                        <td><a href="#" class="text-primary">45 Players</a></td>
                        <td>-</td>
                      </tr>
                      <tr>            
                        <td>Double</td>
                        <td><a href="#" class="text-primary">12 Teams</a></td>
                        <td>-</td>
                      </tr>
                      <tr>            
                        <td>Mixed Double</td>
                        <td><a href="#" class="text-primary">8 Teams</a></td>
                        <td>-</td>
                      </tr>
                    <tr>            
                        <td>Trio</td>
                        <td><a href="#" class="text-primary">6 Teams</a></td>
                        <td>-</td>
                      </tr>
                     
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Category  -->

          

          </div>
        </div><!-- End  -->

       

      </div>
    </section>

  </main><!-- End #main -->


@endsection