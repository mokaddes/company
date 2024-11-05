<form action="{{ route('admin.settings.language.update', $language->id) }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name" class="form-label">Language Name</label>
        <input type="text" name="name" id="name" value="{{ $language->name }}" class="form-control"
            placeholder="Language name" required>
    </div>
    <div class="form-group">
        <label for="code" class="form-label">Language Code</label>
        <input type="text" name="code" id="code" value="{{ $language->code }}" class="form-control"
            placeholder="Language Code" required>
    </div>
    <div class="form-group">
        <label for="direction" class="form-label">Direction</label>
        <select name="direction" id="direction" class="form-control">
            <option value="" class="d-none">--Select Direction--</option>
            <option value="ltr" {{ $language->direction == 'ltr' ? 'selected' : '' }}>ltr</option>
            <option value="rtl" {{ $language->direction == 'rtl' ? 'selected' : '' }}>rtl</option>
        </select>
    </div>
    <div class="form-group float-right">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
