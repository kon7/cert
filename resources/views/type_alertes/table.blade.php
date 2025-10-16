<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
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
            <td>{{ $typeAlerte->libelle }}</td>
            <td>{{ $typeAlerte->description }}</td>
            <td>{{ $typeAlerte->created_by }}</td>
            <td>{{ $typeAlerte->updated_by }}</td>
            <td>
                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showModal{{ $typeAlerte->id }}">Voir</button>
                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $typeAlerte->id }}">Modifier</button>
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
