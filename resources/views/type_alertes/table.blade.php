<table class="table table-hover table-bordered table-striped table-responsive-sm" id="type-alertes-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Libelle</th>
            <th>Description</th>
            <th>Créé par</th>
            <th>Modifié par</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($type_alertes as $typeAlerte)
        <tr>
             <td></td>
            <td>{{ $typeAlerte->libelle }}</td>
            <td>{{ $typeAlerte->description }}</td>
            <td>{{ $typeAlerte->created_by }}</td>
            <td>{{ $typeAlerte->updated_by }}</td>
            <td>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#showModal{{ $typeAlerte->id }}">Voir</button>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $typeAlerte->id }}">Modifier</button>
                
                <form action="{{ route('type_alertes.destroy', $typeAlerte) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce type d\'alerte ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>

        $(function () {
            // Datatable parameters
            var t = $('#type-alertes-table').DataTable({
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
                    'targets': [0, 5],
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