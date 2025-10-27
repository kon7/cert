<div class="card">
<div class="card-body">
<table class="table table-hover table-bordered table-striped table-responsive-sm" id="feed-table">
    <thead class="table-light">
        <tr>
             <th>#</th>
            <th>Nom</th>
            <th>URL</th>
            <th>Type</th>
            <th>Active</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($feeds as $feed)
        <tr>
            <td></td>
            <td>{{ $feed->name }}</td>
            <td><a href="{{ $feed->url }}" target="_blank">{{ $feed->url }}</a></td>
            <td>{{ strtoupper($feed->type) }}</td>
            <td>
                @if($feed->active)
                    <span class="badge bg-success">Oui</span>
                @else
                    <span class="badge bg-secondary">Non</span>
                @endif
            </td>
         <td class="text-center">
                
    <button class="btn btn-info btn-sm btn-show" data-toggle="modal" data-target="#showModal{{ $feed->id }}">Voir</button>

    <button class="btn btn-secondary btn-sm btn-edit" data-toggle="modal" data-target="#editModal{{ $feed->id }}">Modifier</button>

                <form action="{{ route('feedsources.destroy', $feed) }}" method="POST" class="delete-form" style="display:inline-block;">
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
            var t = $('#feed-table').DataTable({
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