@extends('back.layout.pages-layout')
@section('title') {{'Player/Team Registration'}} @endsection
@section('content')

<main id="main" class="main">
  @include('back.partials.header')

  <div class="pagetitle">
    <h1>Registration</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
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

            <form id="tournamentForm">
              <div id="successAlert" class="alert alert-success alert-dismissible fade show d-none" role="alert">
                <strong>Success!</strong> You have successfully registered.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <!-- Tournament -->
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tournament</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Select Tournament">
                    <option selected>-- Select Tournament --</option>
                    <option value="1">Zamba Open</option>
                    <option value="2">Summer Invitational</option>
                    <option value="3">Corporate League</option>
                  </select>
                </div>
              </div>

              <!-- Category -->
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                  <select id="categorySelect" class="form-select" aria-label="Select Category">
                    <option selected>-- Select Category --</option>
                    <option value="single">Single</option>
                    <option value="double">Double</option>
                    <option value="trio">Trio</option>
                  </select>
                </div>
              </div>

              <!-- Wrapper for players/teams -->
              <div id="playersWrapper"></div>

              <!-- Buttons -->
              <div class="mb-3">
                <button type="button" id="addPlayerBtn" class="btn btn-secondary d-none">Add Player</button>
                <button type="button" id="addTeamBtn" class="btn btn-success d-none">Add Team</button>
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
  const form = document.getElementById("tournamentForm");
  const alertBox = document.getElementById("successAlert");
  const categorySelect = document.getElementById("categorySelect");
  const addPlayerBtn = document.getElementById("addPlayerBtn");
  const addTeamBtn = document.getElementById("addTeamBtn");
  const playersWrapper = document.getElementById("playersWrapper");
  const tournamentSelect = document.querySelector("select[aria-label='Select Tournament']");

  let playerCount = 0;
  let teamCount = 0;
  let currentCategory = "";

  // Render single player block
  function renderPlayer(num) {
    return `
      <div class="player-block mb-4 border rounded p-3" id="player-${num}">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h5 class="card-title mb-0">Player ${num}</h5>
          ${num > 1 ? `<button type="button" class="btn btn-sm btn-danger remove-player" data-id="${num}"><i class="bi bi-x-lg"></i></button>` : ""}
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label">First Name</label>
          <div class="col-sm-10"><input type="text" class="form-control" name="firstname${num}" required></div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label">Last Name</label>
          <div class="col-sm-10"><input type="text" class="form-control" name="lastname${num}" required></div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label">Age</label>
          <div class="col-sm-10"><input type="number" class="form-control" name="age${num}" required></div>
        </div>
        <fieldset class="row mb-3">
          <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender${num}" value="female" required>
              <label class="form-check-label">Female</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender${num}" value="male" required>
              <label class="form-check-label">Male</label>
            </div>
          </div>
        </fieldset>
      </div>
    `;
  }

  // Render team block
  function renderTeam(teamNum, size) {
    let playersHTML = "";
    for (let i = 1; i <= size; i++) {
      playersHTML += renderPlayer(`${teamNum}-${i}`);
    }
    return `
      <div class="team-block mb-4 border border-2 p-3 rounded" id="team-${teamNum}">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="mb-0">Team ${teamNum}</h4>
          <button type="button" class="btn btn-sm btn-danger remove-team" data-id="${teamNum}"><i class="bi bi-x-lg"></i></button>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label">Team Name</label>
          <div class="col-sm-10"><input type="text" class="form-control" name="teamname${teamNum}" required></div>
        </div>
        ${playersHTML}
      </div>
    `;
  }

  // Reset wrapper
  function resetWrapper() {
    playersWrapper.innerHTML = "";
    playerCount = 0;
    teamCount = 0;
  }

  // Handle category change
  function handleCategoryChange(value) {
    resetWrapper();
    currentCategory = value;
    addPlayerBtn.classList.add("d-none");
    addTeamBtn.classList.add("d-none");

    if (value === "single") {
      playerCount = 1;
      playersWrapper.innerHTML = renderPlayer(1);
      addPlayerBtn.classList.remove("d-none");
    } else if (value === "double") {
      teamCount = 1;
      playersWrapper.innerHTML = renderTeam(1, 2);
      addTeamBtn.classList.remove("d-none");
    } else if (value === "trio") {
      teamCount = 1;
      playersWrapper.innerHTML = renderTeam(1, 3);
      addTeamBtn.classList.remove("d-none");
    }
  }

  categorySelect.addEventListener("change", function () {
    handleCategoryChange(this.value);
  });

  // Tournament auto-assign category
  tournamentSelect.addEventListener("change", function () {
    if (this.value === "1") { // Zamba Open
      categorySelect.value = "single";
      handleCategoryChange("single");
    } else if (this.value === "2") { // Summer Invitational
      categorySelect.value = "double";
      handleCategoryChange("double");
    } else if (this.value === "3") { // Corporate League
      categorySelect.value = "trio";
      handleCategoryChange("trio");
    } else {
      resetWrapper();
    }
  });

  // Add Player (for single)
  addPlayerBtn.addEventListener("click", function () {
    if (currentCategory === "single") {
      playerCount++;
      playersWrapper.insertAdjacentHTML("beforeend", renderPlayer(playerCount));
    }
  });

  // Add Team (for double/trio)
  addTeamBtn.addEventListener("click", function () {
    if (currentCategory === "double") {
      teamCount++;
      playersWrapper.insertAdjacentHTML("beforeend", renderTeam(teamCount, 2));
    } else if (currentCategory === "trio") {
      teamCount++;
      playersWrapper.insertAdjacentHTML("beforeend", renderTeam(teamCount, 3));
    }
  });

  // Remove player or team
  playersWrapper.addEventListener("click", function (e) {
    if (e.target.closest(".remove-player")) {
      const id = e.target.closest(".remove-player").getAttribute("data-id");
      document.getElementById(`player-${id}`).remove();
    }
    if (e.target.closest(".remove-team")) {
      const id = e.target.closest(".remove-team").getAttribute("data-id");
      document.getElementById(`team-${id}`).remove();
    }
  });

  // Submit form
  form.addEventListener("submit", function(e) {
    e.preventDefault();
    alertBox.classList.remove("d-none");
    setTimeout(() => {
      alertBox.classList.add("d-none");
    }, 3000);
    form.reset();
    resetWrapper();
  });
});
</script>

@endsection 
