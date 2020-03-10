@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="row ">
    	<h3>
    		Users
    	</h3>
    	<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Role</th>
		      <th scope="col">Created at</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($users as $key => $user)
			    <tr data-id="{{ $user->id }}">
			      <td>{{ $user->name }}</td>
			      <td>{{ $user->email }}</td>
			      <td>{{ $user->userRole->name }}</td>
			      <td>{{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d') }}</td>
			    </tr>
			@endforeach
		  </tbody>
		</table>

		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add User</button>

		@include('backend.users.includes.add')
		@include('backend.users.includes.update')

    </div>
</div>
@endsection

@push('after-scripts')
	<script type="text/javascript">

		// Toggle Update modal with values
		$(document).on('click', 'tr', function(){
			var users = {!! $users !!};

			// Filter based on ID
			const result = users.filter(user => user.id == $(this).attr('data-id'));
			
			// Restrict Administrator Role
			if (result[0]['role_id'] == 1)
			{
				alert('Administrator cannot be updated.');
			}else{
				$('#update').modal('show');

				$('#name').val(result[0]['name']);
				$('#email').val(result[0]['email']);
				$('#user_id').val(result[0]['id']);
				$('#del_user_id').val(result[0]['id']);
			}
			



		});
	</script>
@endpush