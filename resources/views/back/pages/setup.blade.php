@extends('back.layout.pages-layout')
@section('title') {{'Set Up'}} @endsection
@section('content')

<main id="main" class="main">

  @include('back.partials.header')

  <div class="pagetitle">
    <h1>Set Up</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
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

            <div id="successAlert" class="alert alert-success alert-dismissible fade show d-none" role="alert">
              <strong>Success!</strong> You have successfully created a tournament.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <form id="tournamentForm">
              <div class="row mb-3">
                <label for="tournamentName" class="col-sm-2 col-form-label">Tournament Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="tournamentName" placeholder="Enter Tournament Name">
                </div>
              </div>

              <div class="row mb-3">
                <label for="location" class="col-sm-2 col-form-label">Location</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="location" placeholder="Gov. Lim Avenue">
                </div>
              </div>

              <div class="row mb-3">
                <label for="startDate" class="col-sm-2 col-form-label">Start Date</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="startDate">
                </div>
              </div>

              <div class="row mb-3">
                <label for="endDate" class="col-sm-2 col-form-label">End Date</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="endDate">
                </div>
              </div>
              
              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Game Format</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="format" id="single" value="single" checked>
                    <label class="form-check-label" for="single">Single</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="format" id="double" value="double">
                    <label class="form-check-label" for="double">Double</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="format" id="trio" value="trio">
                    <label class="form-check-label" for="trio">Trio</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="format" id="mixedDouble" value="mixedDouble">
                    <label class="form-check-label" for="mixedDouble">Mixed Double</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="format" id="mixedTrio" value="mixedTrio">
                    <label class="form-check-label" for="mixedTrio">Mixed Trio</label>
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

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("tournamentForm");
    const alertBox = document.getElementById("successAlert");

    form.addEventListener("submit", function(e) {
      e.preventDefault(); 

 
      alertBox.classList.remove("d-none");

   
      setTimeout(() => {
        alertBox.classList.add("d-none");
      }, 3000);

     
      form.reset();
    });
  });
</script>

@endsection
