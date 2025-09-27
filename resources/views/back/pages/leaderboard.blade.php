@extends('back.layout.pages-layout')
@section('title') {{'Leaderboard'}} @endsection
@section('content')

<main id="main" class="main">

  @include('back.partials.header')

  <div class="pagetitle">
    <h1>Leaderboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Tournament</li>
        <li class="breadcrumb-item active">Leaderboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section leaderboard">

    <!-- Tournament Selector -->
    <div class="card mb-3">
      <div class="card-body">
        <form id="tournamentForm" class="row g-3">
          <div class="col-md-6">
            <label for="tournamentSelect" class="form-label">
             
            </label>
            <select id="tournamentSelect" class="form-select">
              <option selected disabled>-- Choose Tournament --</option>
              <option value="1">Zamba Open</option>
              <option value="2">Summer Invitational</option>
              <option value="3">Corporate League</option>
            </select>
          </div>
          <div class="col-md-6 d-flex align-items-end">
            <button type="button" class="btn btn-primary" id="loadLeaderboard">
              <i class="bi bi-search"></i> Load Leaderboard
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Leaderboard Content (Hidden by default) -->
    <div id="leaderboardContent" style="display:none;">
      <div class="row">

        <!-- Top 3 Cards -->
        <div class="col-lg-4">
          <div class="card text-center border-warning">
            <div class="card-body">
              <h5 class="card-title"><i class="bi bi-trophy-fill text-warning"></i> 1st Place</h5>
              <h3 id="firstPlace">Team Alpha</h3>
              <p class="text-muted">Score: <span id="firstScore">2680</span></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card text-center border-secondary">
            <div class="card-body">
              <h5 class="card-title"><i class="bi bi-trophy-fill text-secondary"></i> 2nd Place</h5>
              <h3 id="secondPlace">Team Beta</h3>
              <p class="text-muted">Score: <span id="secondScore">2550</span></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card text-center border-danger">
            <div class="card-body">
              <h5 class="card-title"><i class="bi bi-trophy-fill text-danger"></i> 3rd Place</h5>
              <h3 id="thirdPlace">Team Gamma</h3>
              <p class="text-muted">Score: <span id="thirdScore">2480</span></p>
            </div>
          </div>
        </div>

        <!-- Special Awards -->
        <div class="row mb-4">
        <div class="col-lg-4">
            <div class="card text-center border-primary">
            <div class="card-body">
                <h6 class="card-title"><i class="bi bi-people-fill text-primary"></i> Highest Team</h6>
                <h5 id="highestTeam">Team Alpha</h5>
                <p class="text-muted">Score: <span id="highestTeamScore">2680</span></p>
            </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card text-center border-success">
            <div class="card-body">
                <h6 class="card-title"><i class="bi bi-gender-male text-success"></i> Highest Pinning (Men)</h6>
                <h5 id="highestPinMen">John Doe</h5>
                <p class="text-muted">Pins: <span id="highestPinMenScore">750</span></p>
            </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card text-center border-pink">
            <div class="card-body">
                <h6 class="card-title"><i class="bi bi-gender-female text-danger"></i> Highest Pinning (Women)</h6>
                <h5 id="highestPinWomen">Jane Smith</h5>
                <p class="text-muted">Pins: <span id="highestPinWomenScore">690</span></p>
            </div>
            </div>
        </div>
        </div>

        <!-- Second row for Singles -->
        <div class="row mb-4">
        <div class="col-lg-6">
            <div class="card text-center border-info">
            <div class="card-body">
                <h6 class="card-title"><i class="bi bi-gender-male text-info"></i> Highest Single (Men)</h6>
                <h5 id="highestSingleMen">Michael Lee</h5>
                <p class="text-muted">Score: <span id="highestSingleMenScore">280</span></p>
            </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-center border-warning">
            <div class="card-body">
                <h6 class="card-title"><i class="bi bi-gender-female text-warning"></i> Highest Single (Women)</h6>
                <h5 id="highestSingleWomen">Anna Cruz</h5>
                <p class="text-muted">Score: <span id="highestSingleWomenScore">265</span></p>
            </div>
            </div>
        </div>
        </div>


      </div>

      <!-- Export Buttons -->
      <div class="d-flex justify-content-end mb-3">
        <button id="downloadExcel" class="btn btn-success me-2">
          <i class="bi bi-file-earmark-excel"></i> Export Excel
        </button>
        <button id="downloadPdf" class="btn btn-danger">
          <i class="bi bi-file-earmark-pdf"></i> Export PDF
        </button>
      </div>

      <!-- Standings Table (same as before, with frames, avg, etc.) -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-list-ol"></i> Detailed Standings</h5>
          <div class="table-responsive">
            <table class="table table-striped" id="leaderboardTable">
              <thead class="table-light">
                <tr>
                  <th>Rank</th>
                  <th>Player/Team</th>
                  <th>Category</th>
                  <th>Games</th>
                  <th>Frame 1</th>
                  <th>Frame 2</th>
                  <th>Frame 3</th>
                  <th>Frame 4</th>
                  <th>Frame 5</th>
                  <th>Frame 6</th>
                  <th>Frame 7</th>
                  <th>Frame 8</th>
                  <th>Frame 9</th>
                  <th>Frame 10</th>
                  <th>Total</th>
                  <th>Average</th>
                  <th>Ind. High</th>
                  <th>Team High</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Team Alpha</td>
                  <td>Mixed Trio</td>
                  <td>3</td>
                  <td>200</td><td>220</td><td>180</td><td>195</td><td>210</td>
                  <td>205</td><td>230</td><td>215</td><td>225</td><td>200</td>
                  <td>1880</td>
                  <td>188</td>
                  <td>230</td>
                  <td>2680</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div><!-- Leaderboard Content -->

  </section>
</main>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const leaderboardContent = document.getElementById("leaderboardContent");
  const loadBtn = document.getElementById("loadLeaderboard");
  const select = document.getElementById("tournamentSelect");

  loadBtn.addEventListener("click", () => {
    if (select.value) {
      leaderboardContent.style.display = "block";
    } else {
      alert("Please select a tournament first.");
    }
  });
});
</script>

@endsection
