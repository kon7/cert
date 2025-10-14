<table class="table table-striped align-middle text-center">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Libellé</th>
            <th>Description</th>
            <th>Groupes associés</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->libelle }}</td>
                <td>{{ $role->description }}</td>
                <td>
                    @forelse($role->groupes as $groupe)
                        <span class="badge bg-info text-dark">{{ $groupe->libelle }}</span>
                    @empty
                        <span class="text-muted">Aucun</span>
                    @endforelse
                </td>
                <td>
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showModal{{ $role->id }}">
                        Voir
                    </button>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $role->id }}">
                        Modifier
                    </button>
                    <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce rôle ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-muted text-center">Aucun rôle trouvé.</td>
            </tr>
        @endforelse
    </tbody>
</table>
