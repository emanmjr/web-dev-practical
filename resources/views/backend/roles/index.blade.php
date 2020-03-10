@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="row ">
    	<h3>
    		Roles
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
		  	@foreach($roles as $key => $role)
			    <tr data-id="{{ $role->id }}">
			      <td>{{ $role->name }}</td>
			      <td>{{ $role->description }}</td>
			      <td>{{ \Carbon\Carbon::parse($role->created_at)->format('Y-m-d') }}</td>
			    </tr>
			@endforeach
		  </tbody>
		</table>

		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add Role</button>

		@include('backend.roles.includes.add')
		@include('backend.roles.includes.update')

    </div>
</div>
@endsection

@push('after-scripts')
	<script type="text/javascript">

		// Toggle Update modal with values
		$(document).on('click', 'tr', function(){
			var roles = {!! $roles !!};

			// Filter based on ID
			const result = roles.filter(role => role.id == $(this).attr('data-id'));
			
			$('#update').modal('show');

			$('#name').val(result[0]['name']);
			$('#description').val(result[0]['description']);
			$('#role_id').val(result[0]['id']);
			$('#del_role_id').val(result[0]['id']);



		});
	</script>
@endpush