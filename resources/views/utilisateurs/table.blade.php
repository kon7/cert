<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
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
                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showModal{{ $utilisateur->id }}">Voir</button>
                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $utilisateur->id }}">Éditer</button>
                <form action="{{ route('utilisateurs.destroy', $utilisateur->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
