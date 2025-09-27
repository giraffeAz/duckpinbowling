@extends('back.layout.pages-layout')
@section('title') {{'Tournament Bracket'}} @endsection
@section('content')

<main id="main" class="main">

  @include('back.partials.header')

  <div class="pagetitle">
    <h1>Generate Bracket</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Tournament</li>
        <li class="breadcrumb-item active">Bracket</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tournament Bracket</h5>

            <!-- Success Alert (hidden initially) -->
            <div id="successAlert" class="alert alert-success alert-dismissible fade show d-none" role="alert">
              <i class="bi bi-check-circle me-1"></i>
              Bracket has been successfully saved!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <!-- Select Active Tournament -->
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Active Tournament</label>
              <div class="col-sm-8">
                <select id="activeTournament" class="form-select">
                  <option value="">-- Select Tournament --</option>
                  <option value="1">Summer Cup 2025</option>
                  <option value="2">Zamba Open</option>
                  <option value="3">Corporate League</option>
                </select>
              </div>
              <div class="col-sm-2">
                <button type="button" id="generateBracket" class="btn btn-primary w-100">
                  Generate
                </button>
              </div>
            </div>

            <!-- Bracket Container -->
            <div id="bracketContainer" class="bracket-container d-none">
              <div class="row">
                <!-- Quarterfinals -->
                <div class="col-md-3">
                  <h6 class="text-center">Quarterfinals</h6>
                  <div id="quarterfinals"></div>
                </div>

                <!-- Semifinals -->
                <div class="col-md-3">
                  <h6 class="text-center">Semifinals</h6>
                  <div id="semifinals"></div>
                </div>

                <!-- Final -->
                <div class="col-md-3">
                  <h6 class="text-center">Final</h6>
                  <div id="finals"></div>
                </div>

                <!-- Champion -->
                <div class="col-md-3">
                  <h6 class="text-center">Champion</h6>
                  <div id="champion"></div>
                </div>
              </div>

              <!-- Save Bracket -->
              <div class="text-end mt-3">
                <button type="button" id="saveBracket" class="btn btn-success">
                  <i class="bi bi-save"></i> Save Bracket
                </button>
              </div>
            </div>
            <!-- End Bracket Container -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->


<script>
document.addEventListener("DOMContentLoaded", function () {
  const generateBtn = document.getElementById("generateBracket");
  const bracketContainer = document.getElementById("bracketContainer");
  const saveBtn = document.getElementById("saveBracket");
  const activeTournament = document.getElementById("activeTournament");
  const successAlert = document.getElementById("successAlert");

  // Example teams (mock data only)
  const tournamentTeams = {
    1: ["Team A", "Team B", "Team C", "Team D", "Team E", "Team F", "Team G", "Team H"],
    2: ["Player 1", "Player 2", "Player 3", "Player 4", "Player 5", "Player 6"],
    3: ["Alpha", "Beta", "Gamma", "Delta"]
  };

  let bracket = {
    quarterfinals: [],
    semifinals: [],
    finals: [],
    champion: ""
  };

  generateBtn.addEventListener("click", function () {
    const tid = activeTournament.value;
    if (tid === "") {
      alert("Please select an active tournament first.");
      return;
    }

    // Reset bracket
    bracket = { quarterfinals: [], semifinals: [], finals: [], champion: "" };

    const teams = tournamentTeams[tid];
    if (!teams || teams.length < 2) {
      alert("Not enough teams for a bracket.");
      return;
    }

    // Build quarterfinals
    for (let i = 0; i < teams.length; i += 2) {
      bracket.quarterfinals.push({ teamA: teams[i], teamB: teams[i+1], winner: "" });
    }

    renderBracket();
    bracketContainer.classList.remove("d-none");
  });

  function renderBracket() {
    document.getElementById("quarterfinals").innerHTML = "";
    document.getElementById("semifinals").innerHTML = "";
    document.getElementById("finals").innerHTML = "";
    document.getElementById("champion").innerHTML = "";

    bracket.quarterfinals.forEach((m, idx) => {
      document.getElementById("quarterfinals").innerHTML += `
        <div class="match p-2 border mb-3">
          <div>${m.teamA} vs ${m.teamB}</div>
          <select class="form-select form-select-sm mt-2"
            onchange="setWinner('quarterfinals', ${idx}, this.value)">
            <option value="">Select Winner</option>
            <option value="${m.teamA}" ${m.winner === m.teamA ? "selected" : ""}>${m.teamA}</option>
            <option value="${m.teamB}" ${m.winner === m.teamB ? "selected" : ""}>${m.teamB}</option>
          </select>
        </div>
      `;
    });

    bracket.semifinals.forEach((m, idx) => {
      document.getElementById("semifinals").innerHTML += `
        <div class="match p-2 border mb-3">
          <div>${m.teamA} vs ${m.teamB}</div>
          <select class="form-select form-select-sm mt-2"
            onchange="setWinner('semifinals', ${idx}, this.value)">
            <option value="">Select Winner</option>
            <option value="${m.teamA}" ${m.winner === m.teamA ? "selected" : ""}>${m.teamA}</option>
            <option value="${m.teamB}" ${m.winner === m.teamB ? "selected" : ""}>${m.teamB}</option>
          </select>
        </div>
      `;
    });

    bracket.finals.forEach((m, idx) => {
      document.getElementById("finals").innerHTML += `
        <div class="match p-2 border mb-3">
          <div>${m.teamA} vs ${m.teamB}</div>
          <select class="form-select form-select-sm mt-2"
            onchange="setWinner('finals', ${idx}, this.value)">
            <option value="">Select Winner</option>
            <option value="${m.teamA}" ${m.winner === m.teamA ? "selected" : ""}>${m.teamA}</option>
            <option value="${m.teamB}" ${m.winner === m.teamB ? "selected" : ""}>${m.teamB}</option>
          </select>
        </div>
      `;
    });

    if (bracket.champion) {
      document.getElementById("champion").innerHTML = `
        <div class="match p-2 border mb-3 bg-success text-white text-center">
          Champion: <strong>${bracket.champion}</strong>
        </div>
      `;
    }
  }

  window.setWinner = function(round, idx, winner) {
    bracket[round][idx].winner = winner;

    if (round === "quarterfinals") {
      const winners = bracket.quarterfinals.map(m => m.winner).filter(Boolean);
      if (winners.length === bracket.quarterfinals.length) {
        bracket.semifinals = [];
        for (let i = 0; i < winners.length; i += 2) {
          bracket.semifinals.push({ teamA: winners[i], teamB: winners[i+1], winner: "" });
        }
      }
    }

    if (round === "semifinals") {
      const winners = bracket.semifinals.map(m => m.winner).filter(Boolean);
      if (winners.length === bracket.semifinals.length) {
        bracket.finals = [{ teamA: winners[0], teamB: winners[1], winner: "" }];
      }
    }

    if (round === "finals") {
      const winners = bracket.finals.map(m => m.winner).filter(Boolean);
      if (winners.length === bracket.finals.length) {
        bracket.champion = winners[0];
      }
    }

    renderBracket();
  };

  saveBtn.addEventListener("click", function () {
    if (!activeTournament.value) {
      alert("Please select a tournament.");
      return;
    }

    // Save mock
    localStorage.setItem("bracket_" + activeTournament.value, JSON.stringify(bracket));

    // Show success alert
    successAlert.classList.remove("d-none");

    // Auto-hide after 3s
    setTimeout(() => {
      successAlert.classList.add("d-none");
    }, 3000);
  });
});
</script>

@endsection
