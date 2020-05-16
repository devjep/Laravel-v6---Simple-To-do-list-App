@extends('layout.layout')

@section('content')
<header >
	<nav class="navbar navbar-expand-sm bg-info navbar-dark" >
	  <!-- Links -->
	  <ul class="navbar-nav ml-auto" >
        <!-- Dropdown -->
        
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
	    </li>
	  </ul>
	</nav>
</header>




<div class="container" id="containertodolist">
    @if(session()->has('notif'))
        <div class="alert alert-success" role="alert">
            <button type="button"  class="close" data-dismiss="alert"
             aria-hidden="true" >&times;</button>
             <strong>Notification: </strong>{{ session()->get('notif')}}
        </div>

    @endif
	<form method="Post" action="{{route('todolists.store')}}">
        @csrf
		<div class="input-group mb-3 input-group-lg">
		    <div class="input-group-prepend">
		      <span class="input-group-text"><i class="fa fa-file-o"></i></span>
		    </div>
           
		    
		    <input type="text" class="form-control" name="task" placeholder="Enter task" >
		    <button class="btn btn-primary"><i class="fa fa-plus-square"></i>Add New Task</button>
         
		</div>
        @error('task')
                <small class="text-danger"> {{ $message }}</small>
            @enderror
	</form>
</div>


<div class="container">
	<table class="table table-bordered text-center">
		<thead>
			<tr class="data-row">
				<th>#</th>
				<th>TASK</th>
				<th>DATE ADDED</th>
				<th colspan="2">ACTION</th>
			</tr>
			
		</thead>
		<tbody>
        <?php $x=1;?>
        @foreach($tasks  as $task)

            <tr class="data-row">
                <td>{{ $x }}</td>
                <td>{{$task->task}}</td>
                <td>{{$task->created_at}}</td>
                <td><button class="btn btn-block btn-info btn-sm" data-toggle="modal" data-target="#modal-update-{{ $task->id }}" ><i class="fa fa-pencil-square-o"></i></button></td>
                <td><button class="btn btn-block btn-info btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $task->id }}"><i class="fa fa-remove"></i></button></td>			  
            </tr>  


              <!-- Update modal -->
            <div class="modal fade" id="modal-update-{{ $task->id }}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-trash"></i> EDIT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="POST" action="{{route('todolists.update', $task) }}">
                        @csrf
                        <label>TASK</label>
                        <textarea name="task" type="text" class="form-control" > {{$task->task}}</textarea>     
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info">Save changes</button>
			       	</form>
                        
                    </div>
                    </div>
                </div>
            </div>

             <!-- Delete modal -->
            <div class="modal fade" id="modal-delete-{{ $task->id }}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-trash"></i> Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Do you want to delete?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('todolists.destroy', $task) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-info">YES</button>
                        </form>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
			</div>	
            <?php $x++; ?>
        @endforeach


		</tbody>
	</table>
</div>

@endsection
	
