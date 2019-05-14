@if($message = Session::get('success'))
    <div class="alert bg-success text-white alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">{{ $message }}</span>
    </div>
@endif