@php

    $row = $data['row'];
@endphp
<form action="{{ route('admin.subcategory.update',$row->id) }}" method="post" enctype="multipart/form-data">
    @csrf


    <div class="form-group">
        <label for="category_id" class="form-label">Select Category </label>
        <select type="text" name="category_id" id="category_id" class="form-control select2"  required style="width: 100%">
            @if(isset($data['categories']) && count($data['categories'])>0)
            @foreach($data['categories'] as $key => $category)
            <option value="{{ $category->id }}" {{ $category->id == $row->category_id ? 'selected' : '' }} >{{ $category->name }}</option>
            @endforeach
            @endif
        </select>
    </div>

    <div class="form-group">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" name="name" id="name" value="{{ $row->name }}" class="form-control" placeholder="Category name"
            required>
    </div>
    <div class="form-group">
        <label for="order_number" class="form-label">Order Number</label>
        <input type="number" name="order_number" id="order_number" value="{{ $row->order_number }}" class="form-control" placeholder="Order Number"
            required>
    </div>
    <div class="form-group">
        <label for="status" class="form-label">Published Status</label>
        <select name="status" id="status" class="form-control">
            <option value="1" {{ $row->status == 1? "selected" : "" }}>Published</option>
            <option value="0" {{ $row->status == 0? "selected" : "" }}>Unpublished</option>
        </select>
    </div>
    <div class="form-group float-right">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
