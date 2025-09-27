@extends('back.layout.pages-layout')
@section('title') {{'Match Schedules'}} @endsection
@section('content')

<main id="main" class="main">

  @include('back.partials.header')

  <div class="pagetitle">
    <h1>Match Schedules</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Tournament</li>
        <li class="breadcrumb-item active">Matches</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <!-- Success Alert -->
        <div id="successAlert" class="alert alert-success alert-dismissible fade show d-none" role="alert">
           Match successfully saved!
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>

        <!-- Form to Add Match -->
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="card-title">Add Match Schedule</h5>

            <form id="matchForm">
              <div class="row g-3">

                <div class="col-md-4">
                  <label class="form-label">Tournament</label>
                  <select class="form-select" name="tournament" id="tournamentSelect" required>
                    <option selected>-- Select Tournament --</option>
                    <option value="1">Zamba Open</option>
                    <option value="2">Summer Invitational</option>
                    <option value="3">Corporate League</option>
                  </select>
                </div>

                <div class="col-md-4">
                  <label class="form-label">Match</label>
                  <select class="form-select" name="match" id="matchSelect" required>
                    <option value="">-- Select Match --</option>
                  </select>
                </div>

                <div class="col-md-4">
                  <label class="form-label">Category</label>
                  <select class="form-select" name="category" id="categorySelect" required>
                    <option value="">-- Select --</option>
                    <option value="Singles">Singles</option>
                    <option value="Doubles">Doubles</option>
                    <option value="Mixed Doubles">Mixed Doubles</option>
                    <option value="Trios">Trios</option>
                  </select>
                </div>

                <div class="col-md-3">
                  <label class="form-label">Date</label>
                  <input type="date" class="form-control" name="date" required>
                </div>

                <div class="col-md-3">
                  <label class="form-label">Time</label>
                  <input type="time" class="form-control" name="time" required>
                </div>

                <div class="col-md-3">
                  <label class="form-label">Lane</label>
                  <input type="number" class="form-control" name="lane" min="1" required>
                </div>

                <div class="col-md-3">
                  <label class="form-label">Status</label>
                  <select class="form-select" name="status" required>
                    <option value="Upcoming">Upcoming</option>
                    <option value="Completed">Completed</option>
                  </select>
                </div>

              </div>

              <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary">Save Match</button>
              </div>
            </form>
          </div>
        </div>

        <!-- Download Button -->
        <div class="text-end mb-3">
          <button id="downloadPdf" class="btn btn-danger">
            <i class="bi bi-file-earmark-pdf"></i> Download PDF
          </button>
        </div>

        <!-- Matches Output -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Scheduled Matches</h5>

            <table class="table table-borderless datatable" id="matchesTable">
              <thead>
                <tr>
                  <th scope="col">Tournament</th>
                  <th scope="col">Match</th>
                  <th scope="col">Category</th>
                  <th scope="col">Date</th>
                  <th scope="col">Time</th>
                  <th scope="col">Lane</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody id="matchesBody">
                <tr>
                  <td colspan="8" class="text-muted text-center">No matches scheduled yet.</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<!-- jsPDF from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
const bracketMatches = {
  "1": [ // Zamba Cup 2025
    "Player 1 vs Player 2",
    "Player 3 vs Player 4",
    "Player 5 vs Player 6"
  ],
  "2": [
    "Team X vs Team Y",
    "Team Z vs Team W"
  ],
  "3": [
    "Alpha vs Beta",
    "Gamma vs Delta"
  ]
};

document.getElementById("tournamentSelect").addEventListener("change", function() {
  const selectedTournament = this.value;
  const matchSelect = document.getElementById("matchSelect");
  const categorySelect = document.getElementById("categorySelect");

  matchSelect.innerHTML = `<option value="">-- Select Match --</option>`;

  if (bracketMatches[selectedTournament]) {
    bracketMatches[selectedTournament].forEach(match => {
      const option = document.createElement("option");
      option.value = match;
      option.textContent = match;
      matchSelect.appendChild(option);
    });

    // If Zamba Cup, auto-select Singles
    if (selectedTournament === "1") {
      categorySelect.value = "Singles";
    }
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const matchForm = document.getElementById("matchForm");
  const matchesBody = document.getElementById("matchesBody");
  const downloadBtn = document.getElementById("downloadPdf");
  const successAlert = document.getElementById("successAlert");

  let schedules = [];

  matchForm.addEventListener("submit", function (e) {
    e.preventDefault();
    const formData = new FormData(matchForm);
    const match = {
      tournament: formData.get("tournament"),
      match: formData.get("match"),
      category: formData.get("category"),
      date: formData.get("date"),
      time: formData.get("time"),
      lane: formData.get("lane"),
      status: formData.get("status"),
    };

    schedules.push(match);
    renderTable();
    matchForm.reset();

    // Show success alert
    successAlert.classList.remove("d-none");
    setTimeout(() => {
      successAlert.classList.add("d-none");
    }, 2500);
  });

  function renderTable() {
    matchesBody.innerHTML = "";
    if (schedules.length === 0) {
      matchesBody.innerHTML = `<tr><td colspan="8" class="text-muted text-center">No matches scheduled yet.</td></tr>`;
      return;
    }

    schedules.forEach((m, index) => {
      matchesBody.innerHTML += `
        <tr>
          <td>${m.tournament}</td>
          <td>${m.match}</td>
          <td>${m.category}</td>
          <td>${m.date}</td>
          <td>${m.time}</td>
          <td>${m.lane}</td>
          <td>
            <select class="form-select form-select-sm" onchange="updateStatus(${index}, this.value)">
              <option value="Upcoming" ${m.status === "Upcoming" ? "selected" : ""}>Upcoming</option>
              <option value="Completed" ${m.status === "Completed" ? "selected" : ""}>Completed</option>
            </select>
          </td>
          <td>
            <button class="btn btn-sm btn-danger" onclick="deleteMatch(${index})">
              <i class="bi bi-trash"></i>
            </button>
          </td>
        </tr>
      `;
    });
  }

  window.updateStatus = function (index, status) {
    schedules[index].status = status;
  };

  window.deleteMatch = function (index) {
    schedules.splice(index, 1);
    renderTable();
  };

  // Download as PDF
  downloadBtn.addEventListener("click", () => {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    let y = 20;

    doc.setFontSize(16);
    doc.text("Match Schedule", 105, 15, { align: "center" });

    schedules.forEach(m => {
      doc.setFontSize(12);
      doc.text(
        `${m.tournament} | ${m.match} | ${m.category} | ${m.date} ${m.time} | Lane ${m.lane} | ${m.status}`,
        14,
        y
      );
      y += 6;
      if (y > 280) { 
        doc.addPage();
        y = 20;
      }
    });

    doc.save("match-schedule.pdf");
  });
});
</script>

@endsection
