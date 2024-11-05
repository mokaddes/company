<form action="{{ route('admin.country.update',$country->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name" class="form-label">Country Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Country name"
            required value="{{ $country->name }}">
    </div>

    <div class="form-group">
        <label for="code" class="form-label">Country Code</label>
        <input type="text" name="code" id="code" class="form-control" placeholder="Country code"
            required value="{{ $country->code }}">
    </div>

    <div class="form-group float-right">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
