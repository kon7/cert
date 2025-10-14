<div class="modal fade" id="editModal{{ $alerte->id }}" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('alertes.update', $alerte) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Modifier l'alerte</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <input type="text" name="reference" class="form-control mb-2" value="{{ $alerte->reference }}" required>
            <input type="text" name="intitule" class="form-control mb-2" value="{{ $alerte->intitule }}" required>
            <select name="type_alerte_id" class="form-control mb-2" required>
                @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ $alerte->type_alerte_id == $type->id ? 'selected' : '' }}>
                        {{ $type->libelle }}
                    </option>
                @endforeach
            </select>
            <input type="date" name="date" class="form-control mb-2" value="{{ $alerte->date }}">
            <input type="text" name="severite" class="form-control mb-2" value="{{ $alerte->severite }}">
            
            <label>État :</label><br>
            @php $etat = json_decode($alerte->etat ?? '[]'); @endphp
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="etat[]" value="initial" {{ in_array('initial', $etat) ? 'checked' : '' }}>
                <label class="form-check-label">Initial</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="etat[]" value="traite" {{ in_array('traite', $etat) ? 'checked' : '' }}>
                <label class="form-check-label">Traité</label>
            </div>

            <input type="date" name="date_initial" class="form-control mb-2" value="{{ $alerte->date_initial }}">
            <input type="date" name="date_traite" class="form-control mb-2" value="{{ $alerte->date_traite }}">
            <input type="text" name="concerne" class="form-control mb-2" value="{{ $alerte->concerne }}">
            <input type="text" name="risque" class="form-control mb-2" value="{{ $alerte->risque }}">
            <input type="text" name="systemes_affectes" class="form-control mb-2" value="{{ $alerte->systemes_affectes }}">
            <textarea name="synthese" class="form-control mb-2">{{ $alerte->synthese }}</textarea>
            <textarea name="solution" class="form-control mb-2">{{ $alerte->solution }}</textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-warning">Modifier</button>
        </div>
      </form>
    </div>
  </div>
</div>
