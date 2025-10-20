<table class="table table-hover table-bordered table-striped" id="vulnerability-table">
    <thead class="table-light">
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>CVE</th>
            <th>Source</th>
            <th>Date de publication</th>
            <th>Lien</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($vulnerabilities as $vuln)
            <tr>
                <td></td>
                <td>{{ Str::limit($vuln->title,50) }}</td>
                <td>{{ $vuln->cve_id ?? '—' }}</td>
                <td>{{ $vuln->feedSource->name ?? 'Inconnu' }}</td>
                <td>{{ optional($vuln->published_at)->format('d/m/Y H:i') }}</td>
                <td>
                    @if($vuln->link)
                        <a href="{{ $vuln->link }}" target="_blank" class="text-primary text-decoration-none">
                            Voir
                        </a>
                    @else
                        <span class="text-muted">N/A</span>
                    @endif
                </td>
                <td class="text-center">
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#showModal{{ $vuln->id }}">
                        Détails
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center text-muted">Aucune vulnérabilité trouvée.</td>
            </tr>
        @endforelse
    </tbody>
</table>
