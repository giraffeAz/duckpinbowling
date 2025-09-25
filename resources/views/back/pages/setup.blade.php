@extends('back.layout.pages-layout')
@section('title') {{'Set Up'}} @endsection
@section('content')

<main id="main" class="main">

  @include('back.partials.header')

    <div class="pagetitle">
      <h1>Set Up</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item">Tournament</li>
          <li class="breadcrumb-item active">Set Up</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tournament Form</h5>

              <!-- Horizontal Form -->
              <form>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Tournament Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" placeholder="Enter Tournament Name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Location</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" placeholder="Gov. Lim Aveneu">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Start Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">End Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control">
                  </div>
                </div>
                
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Game Format</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Single
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                      <label class="form-check-label" for="gridRadios2">
                        Double
                      </label>
                    </div>
                   <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                      <label class="form-check-label" for="gridRadios2">
                        Trio
                      </label>
                    </div>
                      <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                      <label class="form-check-label" for="gridRadios2">
                        Mixed Double
                      </label>
                    </div>
                   <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                      <label class="form-check-label" for="gridRadios2">
                        Mixed Trio
                      </label>
                    </div>
                  </div>
                </fieldset>
              
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>


        </div>
      </div>
    </section>

  </main><!-- End #main -->

@endsection