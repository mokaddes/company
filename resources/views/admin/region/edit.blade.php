<form action="{{ route('admin.region.update',$region->id) }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="country_id" class="form-label">Country</label><br/>
        <select name="country_id" id="country_id" class="form-control select2">
            @if (isset($country) && count($country) > 0)
                @foreach ($country as $key => $item)
                    <option value="{{ $item->id }}" {{ $item->id == $region->country_id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="name" class="form-label">Region Name</label>
        <input type="text" name="name" id="name" value="{{ $region->name }}" class="form-control"
            placeholder="Region name">
    </div>
    <div class="form-group">
        <label for="code" class="form-label">Code</label>
        <input type="text" name="code" id="code" value="{{ $region->code }}" class="form-control"
            placeholder="Code">
    </div>
    <div class="form-group float-right">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
