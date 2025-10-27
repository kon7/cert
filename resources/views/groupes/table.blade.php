<div class="card">
<div class="card-body">
<table class="table table-hover table-bordered table-striped table-responsive-sm" id="groupe-table">
    <thead >
        <tr>
            <th>#</th>
            <th>Libellé</th>
            <th>Description</th>
            <th>Rôles associés</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($groupes as $groupe)
            <tr>
                <td></td>
                <td>{{ $groupe->libelle }}</td>
                <td>{{ $groupe->description }}</td>
                <td>
                    @forelse($groupe->roles as $role)
                        <span class="badge bg-info text-dark">{{ $role->libelle }}</span>
                    @empty
                        <span class="text-muted">Aucun</span>
                    @endforelse
                </td>
                <td>
                    <button class="btn btn-info btn-sm" data-toggle="modal" 
                            data-target="#showModal{{ $groupe->id }}">
                        Voir
                    </button>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" 
                            data-target="#editModal{{ $groupe->id }}">
                        Modifier
                    </button>
                    <form action="{{ route('groupes.destroy', $groupe) }}" method="POST" class="delete-form" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-muted text-center">Aucun groupe trouvé.</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
</div>
<script>

        $(function () {
            // Datatable parameters
            var t = $('#groupe-table').DataTable({
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
