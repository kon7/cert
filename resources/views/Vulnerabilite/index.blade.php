@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Liste Flux/API Externe</h3>

    {{-- Filtres --}}
    <form method="GET" action="{{ route('vulnerabilities.index') }}" class="row g-3 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Rechercher un titre...">
        </div>
        <div class="col-md-4">
            <select name="source_id" class="form-select">
                <option value="">-- Toutes les sources --</option>
                @foreach($sources as $source)
                    <option value="{{ $source->id }}" {{ request('source_id') == $source->id ? 'selected' : '' }}>
                        {{ $source->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 text-end">
            <button type="submit" class="btn btn-primary">Filtrer</button>
            <a href="{{ route('vulnerabilities.index') }}" class="btn btn-secondary">Réinitialiser</a>
        </div>
    </form>

    {{-- Tableau --}}
    @include('Vulnerabilite.table', ['vulnerabilities' => $vulnerabilities])

    {{-- Modales --}}
    @foreach($vulnerabilities as $vulnerability)
        @include('Vulnerabilite.show', ['vulnerability' => $vulnerability])
    @endforeach
</div>
@endsection

@push('scripts')
<script>
$(function () {
    let t = $('#vulnerability-table').DataTable({
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
        'order': [[1, "desc"]],
        'columnDefs': [
            { 'targets': [0,6], 'orderable': false, 'searchable': false }
        ]
    });

    t.on('order.dt search.dt', function () {
        t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
});
</script>
@endpush
