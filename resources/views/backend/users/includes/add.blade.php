<!-- Modal -->
<div id="add" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
		    <div class="modal-header">
		        <h4 class="modal-title">Add User</h4>
		    </div>
		    <div class="modal-body">
		        <form method="POST" action="{{ route('dashboard.users.store') }}">
		        	@csrf
		        	<div class="form-group">
		        		<input type="text" name="name" value="{{ old('name') }}" class="form-control {{ $errors->first('name') ? 'is-invalid' : ''}}">
		        	</div>
		        	<div class="form-group">
		        		<input type="text" name="email" value="{{ old('email') }}" class="form-control {{ $errors->first('name') ? 'is-invalid' : ''}}">
		        	</div>


		        	<div class="form-group">
		        		<select class="form-control" name="role_id">
		        			@foreach($roles as $key => $role)
		        				<option {{ old("role_id") == $role->id ? 'selected' : '' }} value="{{ $role->id }}"> {{ $role->name }}</option>
		        			@endforeach
		        		</select>
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
				    </div>
		        </form>

		    </div>
	    </div>

	  </div>
</div>

@push('after-scripts')
<script type="text/javascript">
	@if ($errors->any())
		$('#add').modal('show');
	@endif
</script>
@endpush