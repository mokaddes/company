
@php
$user = $data['user'];
$plans = $data['plans'];
@endphp
<form action="{{route('admin.customer.plan.change')}}" method="post">
@csrf
<input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
<div class="form-group">
    <label for="plan_id" class="form-label">{{__('messages.common.plan')}}</label>
    <select name="plan_id" id="plan_id" class="form-control" required>
        @foreach ($plans as $row)
        <option value="{{ $row->id }}" {{$row->id == $user->current_pan_id ? 'selected' : ''}}>{{ $row->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group float-right">
    <button type="button" class="btn btn-danger"
        data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
    <button type="submit" class="btn btn-success">{{ __('messages.common.update') }}</button>
</div>
</form>