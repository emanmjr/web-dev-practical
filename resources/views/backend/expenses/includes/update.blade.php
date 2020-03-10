<!-- Modal -->
<div id="update" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
		    <div class="modal-header">
		        <h4 class="modal-title">Update Expense</h4>
		    </div>
		    <div class="modal-body">
		        <form method="POST" action="{{ route('dashboard.expense.update') }}">
		        	@csrf
		        	{{ method_field('PATCH') }}
		        	<input type="hidden" name="expense_id" id="expense_id">
		        	<div class="form-group">
		        		<label>Expense Category</label>
		        		<select type="text" name="expense_category_id" id="expenseCat" value="{{ old('expense_category_id') }}" class="form-control {{ $errors->first('expense_category_id') ? 'is-invalid' : ''}}">
		        			@foreach($expenseCategory as $key => $category)
		        				<option value="{{ $category->id }}">{{ $category->name }}</option>
		        			@endforeach
		        		</select>
		        	</div>
		        	<div class="form-group">
		        		<label>Amount</label>
		        		<input type="text" name="amount" id="amount" value="{{ old('amount') }}" class="form-control {{ $errors->first('amount') ? 'is-invalid' : ''}}">
		        	</div>
		        	<div class="form-group">
		        		<label>Entry Date</label>
		        		<input type="date" name="entry_date" id="entry_date" value="{{ old('entry_date') }}" class="form-control {{ $errors->first('entry_date') ? 'is-invalid' : ''}}">
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
		        <form method="POST" id="formDelExpense" action="{{ route('dashboard.expense.destroy') }}">
		        	@csrf
		        	@method('delete')
        			<input type="hidden" id="del_expense_id" name="del_expense_id">
		    		
        		</form>

		    </div>
	    </div>

	  </div>
</div>

@push('after-scripts')
<script type="text/javascript">
	$(document).on('click', '.btn-del-role', function(){
		$('#formDelExpense').submit();
	});
</script>
@endpush