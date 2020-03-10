@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="row ">
    	<h3>
    		Categories
    	</h3>

    	<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Display Name</th>
		      <th scope="col">Description</th>
		      <th scope="col">Created at</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($categories as $key => $category)
			    <tr data-id="{{ $category->id }}">
			      <td>{{ $category->name }}</td>
			      <td>{{ $category->description }}</td>
			      <td>{{ \Carbon\Carbon::parse($category->created_at)->format('Y-m-d') }}</td>
			    </tr>
			@endforeach
		  </tbody>
		</table>

		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add Category</button>

		@include('backend.expense-categories.includes.add')
		@include('backend.expense-categories.includes.update')

    </div>
</div>
@endsection

@push('after-scripts')
	<script type="text/javascript">

		// Toggle Update modal with values
		$(document).on('click', 'tr', function(){
			var categories = {!! $categories !!};

			// Filter based on ID
			const result = categories.filter(category => category.id == $(this).attr('data-id'));
			
			$('#update').modal('show');

			$('#name').val(result[0]['name']);
			$('#description').val(result[0]['description']);
			$('#expense_cat_id').val(result[0]['id']);
			$('#del_expense_cat_id').val(result[0]['id']);



		});
	</script>
@endpush