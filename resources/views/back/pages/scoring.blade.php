@extends('back.layout.pages-layout')
@section('title') {{'Scoring'}} @endsection
@section('content')

<main id="main" class="main">

  @include('back.partials.header')

  <div class="pagetitle">
    <h1>Scoring</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Tournament</li>
        <li class="breadcrumb-item active">Scoring</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <!-- Match Selector -->
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="card-title">Select Match</h5>
            <div class="row g-3 align-items-center">
              <div class="col-md-6">
                <select class="form-select" id="matchSelector">
                  <option value="">-- Choose a match --</option>
                  <option value="single">Player A vs Player B (Singles)</option>
                  <option value="double">Team Alpha vs Team Beta (Doubles)</option>
                  <option value="trio">Team Red vs Team Blue (Trios)</option>
                </select>
              </div>
              <div class="col-md-3">
                <button class="btn btn-primary" id="loadMatch">Load Match</button>
              </div>
            </div>
          </div>
        </div>

       <div class="card">
        <div class="card-body">
            <h5 class="card-title">Score Input</h5>
            <p class="text-muted">Enter frame scores. Use Strike, Spare, or Break buttons if applicable.</p>

    
            <div class="table-responsive">
            <table class="table table-bordered mb-0" id="scoreTable">
                <thead class="table-light">
                <tr id="scoreHeader">
                   
                </tr>
                </thead>
                <tbody id="scoreBody">
               
                </tbody>
            </table>
            </div>

            <div class="text-end mt-3">
            <button class="btn btn-success me-2">Save Scores</button>
            <button class="btn btn-dark">Finalize Match</button>
            </div>
        </div>
        </div>


      </div>
    </div>
  </section>

</main>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const matchSelector = document.getElementById("matchSelector");
  const loadMatchBtn = document.getElementById("loadMatch");
  const scoreHeader = document.getElementById("scoreHeader");
  const scoreBody = document.getElementById("scoreBody");

  loadMatchBtn.addEventListener("click", () => {
    const type = matchSelector.value;
    if (!type) {
      alert("Please select a match.");
      return;
    }

    // Reset table
    scoreHeader.innerHTML = "";
    scoreBody.innerHTML = "";

    // Common headers
    scoreHeader.innerHTML = `
      <th>#</th>
      <th>Player/Team</th>
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
      <th>Strike</th>
      <th>Spare</th>
      <th>Break</th>
      <th>Total</th>
    `;

    let rows = [];

    if (type === "single") {
      rows = ["Player A", "Player B"];
    } else if (type === "double") {
      rows = [
        "Team Alpha - Player 1", "Team Alpha - Player 2", 
        "Team Beta - Player 1", "Team Beta - Player 2"
      ];
    } else if (type === "trio") {
      rows = [
        "Team Red - Player 1", "Team Red - Player 2", "Team Red - Player 3",
        "Team Blue - Player 1", "Team Blue - Player 2", "Team Blue - Player 3"
      ];
    }

    rows.forEach((name, index) => {
      const tr = document.createElement("tr");
      tr.innerHTML = `
        <td>${index + 1}</td>
        <td>${name}</td>
        ${Array.from({length: 10}).map(() => `<td contenteditable="true" class="score"></td>`).join("")}
        <td class="flag strike"><i class="bi bi-circle"></i></td>
        <td class="flag spare"><i class="bi bi-circle"></i></td>
        <td class="flag break"><i class="bi bi-circle"></i></td>
        <td class="total">0</td>
      `;
      scoreBody.appendChild(tr);
    });

    // Score auto-calculation
    document.querySelectorAll(".score").forEach(cell => {
      cell.addEventListener("input", () => {
        const row = cell.parentElement;
        const scores = Array.from(row.querySelectorAll(".score"))
          .map(c => parseInt(c.textContent) || 0);
        const total = scores.reduce((a, b) => a + b, 0);
        row.querySelector(".total").textContent = total;
      });
    });

    // Toggle icons for Strike, Spare, Break
    document.querySelectorAll(".flag").forEach(cell => {
      cell.addEventListener("click", () => {
        const icon = cell.querySelector("i");
        if (icon.classList.contains("bi-circle")) {
          icon.classList.remove("bi-circle");
          icon.classList.add("bi-check-circle-fill", "text-success");
        } else {
          icon.classList.remove("bi-check-circle-fill", "text-success");
          icon.classList.add("bi-circle");
        }
      });
    });
  });
});
</script>

@endsection
