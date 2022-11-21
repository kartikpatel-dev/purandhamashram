@if( Session::has('messageType') )
    <div class="row">
    	<div class="col-md-12">
	        <div class="alert @if( Session::get('messageType' ) == 'success') alert-success @elseif( Session::get('messageType' ) == 'info') alert-info @else alert-danger @endif">
	            {{ Session::get('message') }}
	        </div>
    	</div>
    </div>
@endif