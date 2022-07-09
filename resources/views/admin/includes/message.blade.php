<div class="col-md-5 text-center col-1 offset-3 offset-md-1 mt-6">
@if ($message = Session::get('success'))
<div class="alert alert-sucess alert-block text-Center">
<button type="button" class="close" data-dismiss="alert">x</button>
<strong>{{ $message }}</strong>
</div>
@endif
@if (Session:: has('error'))
<div class="alert alert-sucess alert-block text-Center">
<button type="button" class="close" data-dismiss="alert">x</button>
<strong>{{ Session::get('error') }}</strong>
</div>
@endif
</div>