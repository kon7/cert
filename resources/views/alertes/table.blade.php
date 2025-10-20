<table class="table table-hover table-bordered table-striped table-responsive-sm" id="alertes-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Référence</th>
            <th>Intitulé</th>
            <th>Type</th>
            <th>Date</th>
            <th>État</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alertes as $alerte)
        <tr>
            <td></td>
            <td>{{ $alerte->reference }}</td>
            <td>{{ $alerte->intitule }}</td>
            <td>{{ $alerte->typeAlerte->libelle ?? '' }}</td>
            <td>{{ $alerte->date }}</td>
            <td>{{$alerte->etat}}</td>
            <td>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#showModal{{ $alerte->id }}">Voir</button>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $alerte->id }}">Modifier</button>
                <form action="{{ route('alertes.destroy', $alerte) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette alerte ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>

        $(function () {
            // Datatable parameters
            var t = $('#alertes-table').DataTable({
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
                    'targets': [0, 6],
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