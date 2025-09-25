@extends('back.layout.pages-layout')
@section('title') {{'Player/Team Registration'}} @endsection
@section('content')

<main id="main" class="main">

  @include('back.partials.header')

    <div class="pagetitle">
      <h1>Registration</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item">Tournament</li>
          <li class="breadcrumb-item active">Registration</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Registration Form</h5>

              <!-- Horizontal Form -->
              <form>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tournament</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Select Tournament">
                    <option selected>-- Select Tournament --</option>
                    <option value="1">2025 Zamba Cup</option>
                    <option value="2">Summer Invitational</option>
                    <option value="3">Corporate League</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                  <select id="categorySelect" class="form-select" aria-label="Select Category">
                    <option value="single">Single</option>
                    <option value="double">Double</option>
                    <option value="mixed">Mixed Double</option>
                    <option value="trios">Trios</option>
                    <option value="trios">Mixed Trios</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3" id="teamNameWrapper" style="display:none;">
                <label class="col-sm-2 col-form-label">Team Name</label>
                <div class="col-sm-10">
                  <input type="text" id="teamNameInput" class="form-control" placeholder="Enter Team Name">
                </div>
              </div>

              <!-- Players will be appended here -->
              <div id="playersWrapper"></div>

              <div class="mb-3">
                <button type="button" id="addPlayerBtn" class="btn btn-secondary d-none">Add Player</button>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </form>

            </div>
          </div>


        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const categorySelect = document.getElementById("categorySelect");
      const addPlayerBtn = document.getElementById("addPlayerBtn");
      const playersWrapper = document.getElementById("playersWrapper");
      let playerCount = 1;
      let maxPlayers = 1;

      function renderPlayer(num) {
        return `
          <div class="player-block mb-4 border rounded p-3" id="player-${num}">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <h5 class="card-title mb-0">Player ${num}</h5>
              ${num > 1 ? `<button type="button" class="btn btn-sm btn-danger remove-player" data-id="${num}"><i class="bi bi-x-lg"></i></button>` : ""}
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">First Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="firstname${num}" placeholder="Enter First Name">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Last Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="lastname${num}" placeholder="Enter Last Name">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Age</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="age${num}" placeholder="Enter Age">
              </div>
            </div>
            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender${num}" value="female" checked>
                  <label class="form-check-label">Female</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender${num}" value="male">
                  <label class="form-check-label">Male</label>
                </div>
              </div>
            </fieldset>
          </div>
        `;
      }

      function resetPlayers() {
        playersWrapper.innerHTML = renderPlayer(1);
        playerCount = 1;
      }

      categorySelect.addEventListener("change", function () {
        resetPlayers();
          
        if (this.value === "single") {
          teamNameWrapper.style.display = "none";
          teamNameInput.removeAttribute("required");
        } else {
          teamNameWrapper.style.display = "flex";
          teamNameInput.setAttribute("required", "required");
        }

        if (this.value === "single") {
          maxPlayers = 1;
          addPlayerBtn.classList.add("d-none");
        } else if (this.value === "double" || this.value === "mixed") {
          maxPlayers = 2;
          addPlayerBtn.classList.remove("d-none");
        } else if (this.value === "trios") {
          maxPlayers = Infinity;
          addPlayerBtn.classList.remove("d-none");
        }
      });

      addPlayerBtn.addEventListener("click", function () {
        if (playerCount < maxPlayers) {
          playerCount++;
          playersWrapper.insertAdjacentHTML("beforeend", renderPlayer(playerCount));
        }
        if (playerCount >= maxPlayers && maxPlayers !== Infinity) {
          addPlayerBtn.classList.add("d-none");
        }
      });

      // Handle removing players
      playersWrapper.addEventListener("click", function (e) {
        if (e.target.classList.contains("remove-player")) {
          const id = e.target.getAttribute("data-id");
          document.getElementById(`player-${id}`).remove();
          playerCount--;

          // Show Add button again if under max
          if (playerCount < maxPlayers) {
            addPlayerBtn.classList.remove("d-none");
          }
        }
      });

      resetPlayers(); // initialize with first player
    });
    </script>

@endsection