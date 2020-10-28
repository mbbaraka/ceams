<div class="container">
	<div class="row">
	    <div class="col">
	        @if(Session::has('message'))
	            <div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                {{Session('message')}}
	            </div>
	        @endif

	        @if(Session::has('error'))
	            <div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                {{Session('delete-message')}}
	            </div>
	        @endif
	    </div>
	</div>
</div>