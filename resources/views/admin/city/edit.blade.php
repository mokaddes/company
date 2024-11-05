<form action="{{ route('admin.city.update', $city->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="country_id" class="form-label">Country</label><br />
        <select name="country_id" id="country_id" class="form-control select2" required>
            <option value="" class="d-none">--Select Country--</option>
            @if (isset($country) && count($country) > 0)
                @foreach ($country as $key => $item)
                    <option value="{{ $item->id }}" {{ $item->id == $city->country_id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="region_id" class="form-label">Region</label><br />
        <select name="region_id" id="region_id" class="form-control" required>
            <option value="" class="d-none">--Select Region--</option>
            @foreach ($region as $row)
                <option value="{{ $row->id }}" {{ $row->id == $city->region_id ? 'selected' : '' }}>
                    {{ $row->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="name" class="form-label">City Name</label><br />
        <input type="text" name="name" id="name" class="form-control" value="{{ $city->name }}" required>
    </div>
    <div class="form-group float-right">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>

{{-- show region --}}
<script type="text/javascript">
    $("document").ready(function() {
        $('select[name="country_id"]').on('change', function() {
            var countryId = $(this).val();
            if (countryId) {
                $.ajax({
                    url: "{{ route('admin.city.countrywise.region') }}/" + countryId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="region_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="region_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .name + '</option>');
                        })
                    }
                })
            } else {
                $('select[name="region_id"]').empty();
            }
        });
    });
</script>
