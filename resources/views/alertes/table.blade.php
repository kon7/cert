<table class="table table-bordered table-striped">
    <thead>
        <tr>
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
            <td>{{ $alerte->reference }}</td>
            <td>{{ $alerte->intitule }}</td>
            <td>{{ $alerte->typeAlerte->libelle ?? '' }}</td>
            <td>{{ $alerte->date }}</td>
            <td>
                @php $etat = json_decode($alerte->etat ?? '[]'); @endphp
                {{ implode(', ', $etat) }}
            </td>
            <td>
                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showModal{{ $alerte->id }}">Voir</button>
                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $alerte->id }}">Modifier</button>
                <form action="{{ route('alertes.destroy', $alerte) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette alerte ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
