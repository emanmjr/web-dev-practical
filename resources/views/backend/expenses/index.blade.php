@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="row ">
    	<h3>
    		Expenses
    	</h3>

    	<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Expense Category</th>
		      <th scope="col">Amount</th>
		      <th scope="col">Entry Date</th>
		      <th scope="col">Created at</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($expenses as $key => $expense)
			    <tr data-id="{{ $expense->id }}">
			      <td>{{ $expense->expenseCat->name }}</td>
			      <td>$ {{ $expense->amount }}</td>
			      <td>{{ $expense->entry_date }}</td>
			      <td>{{ \Carbon\Carbon::parse($expense->created_at)->format('Y-m-d') }}</td>
			    </tr>
			@endforeach
		  </tbody>
		</table>

		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add Expense</button>

		@include('backend.expenses.includes.add')
		@include('backend.expenses.includes.update')

    </div>
</div>
@endsection

@push('after-scripts')
	<script type="text/javascript">

		// Toggle Update modal with values
		$(document).on('click', 'tr', function(){
			var expenses = {!! $expenses !!};

			// Filter based on ID
			const result = expenses.filter(expense => expense.id == $(this).attr('data-id'));
			
			console.log(result);
			$('#update').modal('show');

			$('#amount').val(result[0]['amount']);
			$('#entry_date').val(result[0]['entry_date']);
			$('#expense_id').val(result[0]['id']);
			$('#del_expense_id').val(result[0]['id']);
			$("#expenseCat").val(result[0]['expense_category_id']);

		});
	</script>
@endpush