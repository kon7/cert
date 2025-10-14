<table class="table table-bordered table-striped">
    <thead>
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
            <td>{{ $utilisateur->groupe->nom ?? 'N/A' }}</td>
            <td>
                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showModal" data-user="{{ $utilisateur }}">Voir</button>
                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-user="{{ $utilisateur }}">Editer</button>
                <form action="{{ route('utilisateur.destroy', $utilisateur->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
