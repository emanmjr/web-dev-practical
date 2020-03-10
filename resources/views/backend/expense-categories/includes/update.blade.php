<!-- Modal -->
<div id="update" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
		    <div class="modal-header">
		        <h4 class="modal-title">Update Category</h4>
		    </div>
		    <div class="modal-body">
		        <form method="POST" action="{{ route('dashboard.expense.category.update') }}">
		        	@csrf
		        	{{ method_field('PATCH') }}
		        	<input type="hidden" name="expense_cat_id" id="expense_cat_id">
		        	<div class="form-group">
		        		<label>Display Name</label>
		        		<input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control {{ $errors->first('name') ? 'is-invalid' : ''}}">
		        	</div>
		        	<div class="form-group">
		        		<label>Description</label>
		        		<input type="text" id="description" name="description" value="{{ old('description') }}" class="form-control {{ $errors->first('name') ? 'is-invalid' : ''}}">
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
		        <form method="POST" id="formDelExpenseCat" action="{{ route('dashboard.expense.category.destroy') }}">
		        	@csrf
		        	@method('delete')
        			<input type="hidden" id="del_expense_cat_id" name="del_expense_cat_id">
		    		
        		</form>

		    </div>
	    </div>

	  </div>
</div>

@push('after-scripts')
<script type="text/javascript">
	$(document).on('click', '.btn-del-role', function(){
		$('#formDelExpenseCat').submit();
	});
</script>
@endpush