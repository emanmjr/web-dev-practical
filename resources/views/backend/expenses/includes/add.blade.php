<!-- Modal -->
<div id="add" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
		    <div class="modal-header">
		        <h4 class="modal-title">Add Expenses</h4>
		    </div>
		    <div class="modal-body">
		        <form method="POST" action="{{ route('dashboard.expense.store') }}">
		        	@csrf
		        	<div class="form-group">
		        		<label>Expense Category</label>
		        		<select type="text" name="expense_category_id" value="{{ old('expense_category_id') }}" class="form-control {{ $errors->first('expense_category_id') ? 'is-invalid' : ''}}">
		        			@foreach($expenseCategory as $key => $category)
		        				<option value="{{ $category->id }}">{{ $category->name }}</option>
		        			@endforeach
		        		</select>
		        	</div>
		        	<div class="form-group">
		        		<label>Amount</label>
		        		<input type="text" name="amount" value="{{ old('amount') }}" class="form-control {{ $errors->first('amount') ? 'is-invalid' : ''}}">
		        	</div>
		        	<div class="form-group">
		        		<label>Entry Date</label>
		        		<input type="date" name="entry_date" value="{{ old('entry_date') }}" class="form-control {{ $errors->first('entry_date') ? 'is-invalid' : ''}}">
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