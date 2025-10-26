<div class="card">
<div class="card-body">
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
            <td>{{ Str::limit($alerte->intitule,10 )}}</td>
            <td>{{ $alerte->typeAlerte->libelle ?? '' }}</td>
            <td>{{ $alerte->date }}</td>
            <td>{{$alerte->etat}}</td>
            <td>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#showModal{{ $alerte->id }}">Voir</button>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $alerte->id }}">Modifier</button>
                <a href="{{ route('alertes.imprimer', $alerte->id) }}" target="_blank" class="btn btn-primary btn-sm">
                        Imprimer
                    </a>
                    <form action="{{ route('alertes.destroy', $alerte) }}" method="POST" class="delete-form" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
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

document.addEventListener('DOMContentLoaded', function () {
    // Sélectionne tous les formulaires de suppression
    document.querySelectorAll('.delete-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // empêche la soumission immédiate

            Swal.fire({
                title: 'Êtes-vous sûr de vouloir supprimer ?',
                text: "Cette action est irréversible.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // soumet seulement si confirmé
                }
            });
        });
    });
});

 </script>