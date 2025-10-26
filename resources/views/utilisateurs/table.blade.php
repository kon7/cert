<div class="card">
<div class="card-body">
<table class="table table-hover table-bordered table-striped table-responsive-sm" id="utilisateur-table">
    <thead>
        <tr>
             <th>#</th>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Groupe</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($utilisateurs as $utilisateur)
        <tr>
            <td></td>
            <td>{{ $utilisateur->matricule }}</td>
            <td>{{ $utilisateur->nom }}</td>
            <td>{{ $utilisateur->prenom }}</td>
            <td>{{ $utilisateur->email }}</td>
            <td>

                 @forelse($utilisateur->groupes as $groupe)
                        <span class="badge bg-info text-dark">{{ $groupe->libelle }}</span>
                    @empty
                        <span class="text-muted">Aucun</span>
                    @endforelse
            </td>
            <td>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#showModal{{ $utilisateur->id }}">Voir</button>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $utilisateur->id }}">Éditer</button>
                <form action="{{ route('utilisateurs.destroy', $utilisateur->id) }}" 
                    method="POST" 
                    class="delete-form d-inline">
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
            var t = $('#utilisateur-table').DataTable({
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