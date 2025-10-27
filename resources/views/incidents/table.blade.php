<div class="card">
<div class="card-body">
<table class="table table-hover table-bordered table-striped table-responsive-sm" id="incident-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Numéro de suivi</th>
            <th>Dénomination de organisation</th>
            <th>Date de déclaration</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($incidents as $incident)
            <tr>
                <td></td>
                <td>{{ $incident->numero_suivie }}</td>
                <td>{{ $incident->denomination_org }}</td>
                <td>{{ \Carbon\Carbon::parse($incident->date_declaration)->format('d/m/Y') }}</td>
                <td>
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#showModal{{ $incident->id }}">
                        Voir
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center text-muted">Aucun incident enregistré</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
</div>
<script>

        $(function () {
            // Datatable parameters
            var t = $('#incident-table').DataTable({
                "oLanguage": {
                    "sUrl": "{{ url('datatables_french.json') }}"
                },
                'destroy': true,
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false,
                'pageLength': 10,
                'order': [
                    [1, "asc"]
                ],
                'columnDefs': [{
                    'targets': [0, 4],
                    'searchable': false,
                    'orderable': false
                }]
            });

            t.on('order.dt search.dt', function () {
                t.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

        });

 </script>