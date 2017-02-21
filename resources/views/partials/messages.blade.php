@if(\Session::get('message'))
<div class="alert alert-info text-center" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
  <h4 style="margin-bottom: 0"><i class="fa fa-info-circle"></i> {{ \Session::get('message') }}</h4>
</div>
@endif
