@extends('back.layout.pages-layout')
@section('title') {{'Organizing'}} @endsection
@section('content')

<main id="main" class="main">

  @include('back.partials.header')

  <div class="pagetitle">
    <h1>Organizing</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Tournament</li>
        <li class="breadcrumb-item active">Organizing</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section organizing">

    <!-- Tournament List -->
    <div class="card mb-4">
      <div class="card-body">
        <h5 class="card-title"><i class="bi bi-trophy-fill"></i> Tournaments</h5>
        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th>Name</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Zamba Open</td>
              <td>2025-09-26</td>
              <td>2025-10-10</td>
              <td><span class="badge bg-success">Active</span></td>
              <td>
                <button class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
              </td>
            </tr>
             <tr>
              <td>Summer Invitation</td>
              <td>2025-09-26</td>
              <td>2025-10-10</td>
              <td><span class="badge bg-warning">Upcoming</span></td>
              <td>
                <button class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
              </td>
            </tr>
            <tr>
              <td>Corporate League</td>
              <td>2025-09-26</td>
              <td>2025-10-10</td>
              <td><span class="badge bg-secondary">Completed</span></td>
              <td>
                <button class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Player / Team List -->
    <div class="card mb-4">
      <div class="card-body">
        <h5 class="card-title"><i class="bi bi-people-fill"></i> Players / Teams</h5>
        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th>Name</th>
              <th>Category</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Team Alpha</td>
              <td>Team</td>
              <td><span class="badge bg-success">Confirmed</span></td>
              <td>
                <button class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
              </td>
            </tr>
            <tr>
              <td>Jane Smith</td>
              <td>Single - Women</td>
              <td><span class="badge bg-warning text-dark">Pending</span></td>
              <td>
                <button class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Officials & Assignments -->
    <div class="card mb-4">
      <div class="card-body">
        <h5 class="card-title"><i class="bi bi-person-badge"></i> Officials & Assignments</h5>

        <!-- Assignment Form -->
        <form id="officialForm" class="row g-3 mb-4">
          <div class="col-md-3">
            <label class="form-label">Role</label>
            <select class="form-select" id="role">
              <option selected disabled>-- Choose Role --</option>
              <option value="Head Referee">Head Referee</option>
              <option value="Referee">Referee</option>
              <option value="Scorekeeper">Scorekeeper</option>
              <option value="Lane Manager">Lane Manager</option>
              <option value="Tournament Director">Tournament Director</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Name</label>
            <input type="text" id="officialName" class="form-control" placeholder="Enter name">
          </div>
          <div class="col-md-2">
            <label class="form-label">Status</label>
            <select class="form-select" id="status">
              <option value="Confirmed">Confirmed</option>
              <option value="Pending">Pending</option>
              <option value="Unassigned">Unassigned</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Assigned To</label>
            <input type="text" id="assignedTo" class="form-control" placeholder="Ex: Lane 1-5 / All Matches">
          </div>
          <div class="col-md-1 d-flex align-items-end">
            <button type="button" id="addOfficial" class="btn btn-primary w-100">
              <i class="bi bi-plus-circle"></i>
            </button>
          </div>
        </form>

        <!-- Officials Table -->
        <table class="table table-borderless datatable" id="officialsTable">
          <thead>
            <tr>
              <th>Role</th>
              <th>Name</th>
              <th>Status</th>
              <th>Assigned To</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Head Referee</td>
              <td>Mark Santos</td>
              <td><span class="badge bg-success">Confirmed</span></td>
              <td>All Matches</td>
              <td>
                <button class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </section>
</main>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("officialForm");
  const table = document.getElementById("officialsTable").querySelector("tbody");

  document.getElementById("addOfficial").addEventListener("click", () => {
    const role = document.getElementById("role").value;
    const name = document.getElementById("officialName").value;
    const status = document.getElementById("status").value;
    const assignedTo = document.getElementById("assignedTo").value;

    if (!role || !name) {
      alert("Please fill in role and name.");
      return;
    }

    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${role}</td>
      <td>${name}</td>
      <td><span class="badge bg-${status === 'Confirmed' ? 'success' : status === 'Pending' ? 'warning text-dark' : 'danger'}">${status}</span></td>
      <td>${assignedTo || '-'}</td>
      <td>
        <button class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></button>
        <button class="btn btn-sm btn-danger removeOfficial"><i class="bi bi-trash"></i></button>
      </td>
    `;
    table.appendChild(tr);

    form.reset();

    tr.querySelector(".removeOfficial").addEventListener("click", () => {
      tr.remove();
    });
  });
});
</script>

@endsection
