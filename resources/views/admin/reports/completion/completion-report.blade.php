@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Completion of Leads Status</h4>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label>Filter Type</label><br>
                        <input type="radio" name="filterType" value="Closed Successfully" id="closedSuccessfullyRadio"> Closed Successfully<br>
                        <input type="radio" name="filterType" value="Closed with Failure" id="closedWithFailureRadio"> Closed with Failure
                    </div>

                    <div class="table-responsive mt-4" id="resultsTableContainer" style="display:none;">
                        <table class="table table-striped table-hover" style="width:100%;" id="resultsTable">
                            <thead>
                                <tr>
                                    <th>Lead Number</th>
                                    <th>Description</th>
                                    <th>Budget</th>
                                    <th>Expiry</th>
                                    <th>Contact Name</th>
                                    <th>Contact Phone</th>
                                    <th>Assigned to</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const closedSuccessfullyRadio = document.getElementById('closedSuccessfullyRadio');
            const closedWithFailureRadio = document.getElementById('closedWithFailureRadio');
            const resultsTableContainer = document.getElementById('resultsTableContainer');
            const resultsTableBody = document.querySelector('#resultsTable tbody');

            closedSuccessfullyRadio.addEventListener('change', fetchClosedSuccessfullyLeads);
            closedWithFailureRadio.addEventListener('change', fetchClosedWithFailureLeads);

            function fetchClosedSuccessfullyLeads() {
                fetch(`/leads/closed-successfully`)
                    .then(response => response.json())
                    .then(leads => {
                        resultsTableBody.innerHTML = '';
                        leads.forEach(lead => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${lead.lead_num}</td>
                                <td>${lead.description}</td>
                                <td>${lead.min_budget} - ${lead.max_budget}</td>
                                <td>${lead.expiry}</td>
                                <td>${lead.contact.name}</td>
                                <td>${lead.contact.phone}</td>
                                <td>${(lead.assigned_to ? lead.assigned_to.first_name + ' ' +
                                    lead.assigned_to.last_name : 'N/A')} </td>
                                <td>${lead.status}</td>
                            `;
                            resultsTableBody.appendChild(row);
                        });
                        resultsTableContainer.style.display = 'block';
                    })
                    .catch(error => console.error('Error fetching leads:', error));
            }

            function fetchClosedWithFailureLeads() {
                fetch(`/leads/closed-with-failure`)
                    .then(response => response.json())
                    .then(leads => {
                        resultsTableBody.innerHTML = '';
                        leads.forEach(lead => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${lead.lead_num}</td>
                                <td>${lead.description}</td>
                                <td>${lead.min_budget} - ${lead.max_budget}</td>
                                <td>${lead.expiry}</td>
                                <td>${lead.contact.name}</td>
                                <td>${lead.contact.phone}</td>
                                <td>${lead.assigned_to ? lead.assigned_to.first_name + ' ' +
                                    lead.assigned_to.last_name : 'N/A'} </td>
                                <td>${lead.status}</td>
                            `;
                            resultsTableBody.appendChild(row);
                        });
                        resultsTableContainer.style.display = 'block';
                    })
                    .catch(error => console.error('Error fetching leads:', error));
            }
        });
    </script>
@endsection
