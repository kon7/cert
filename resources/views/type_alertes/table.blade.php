<div class="card">
<div class="card-body">
<table class="table table-hover table-bordered table-striped table-responsive-sm" id="type-alertes-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Libelle</th>
            <th>Description</th>
            {{-- <th>Créé par</th>
            <th>Modifié par</th> --}}
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($type_alertes as $typeAlerte)
        <tr>
             <td></td>
            <td>{{ $typeAlerte->libelle }}</td>
            <td>{{ $typeAlerte->description }}</td>
            {{-- <td>{{ $typeAlerte->created_by }}</td>
            <td>{{ $typeAlerte->updated_by }}</td> --}}
            <td>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#showModal{{ $typeAlerte->id }}">Voir</button>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $typeAlerte->id }}">Modifier</button>
                
               <form action="{{ route('type_alertes.destroy', $typeAlerte) }}" 
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
                    'targets': [0, 3],
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