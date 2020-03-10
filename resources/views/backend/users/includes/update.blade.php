<!-- Modal -->
<div id="update" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
		    <div class="modal-header">
		        <h4 class="modal-title">Update User</h4>
		    </div>
		    <div class="modal-body">
		        <form method="POST" action="{{ route('dashboard.users.update') }}">
		        	@csrf
		        	{{ method_field('PATCH') }}
		        	<input type="hidden" name="user_id" id="user_id">
		        	<div class="form-group">
		        		<input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control {{ $errors->first('name') ? 'is-invalid' : ''}}">
		        	</div>
		        	<div class="form-group">
		        		<input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control {{ $errors->first('name') ? 'is-invalid' : ''}}">
		        	</div>
		        	@if ($errors->any())
					      <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					              <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					      </div><br />
					@endif
		        	<div class="modal-footer">

				    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    	<button type="submit" class="btn btn-primary" >Save</button>
				    	<button type="button" class="btn btn-danger btn-del-role">Delete</button>
				    </div>
		        </form>
		         <form method="POST" id="formDelUser" action="{{ route('dashboard.users.destroy') }}">
		        	@csrf
		        	@method('delete')
        			<input type="hidden" id="del_user_id" name="del_user_id">
		    		
        		</form>

		    </div>
	    </div>

	  </div>
</div>

@push('after-scripts')
<script type="text/javascript">
	$(document).on('click', '.btn-del-role', function(){
		$('#formDelUser').submit();
	});
</script>
@endpush