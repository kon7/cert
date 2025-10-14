<table class="table table-striped align-middle text-center">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Libellé</th>
            <th>Description</th>
            <th>Rôles associés</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($groupes as $groupe)
            <tr>
                <td>{{ $groupe->id }}</td>
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
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#showModal{{ $groupe->id }}">
                        Voir
                    </button>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#editModal{{ $groupe->id }}">
                        Modifier
                    </button>
                    <form action="{{ route('groupes.destroy', $groupe) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce groupe ?')">
                            Supprimer
                        </button>
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
