@extends('admin.master')



@section('content')


<h3>Student List</h3>


    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Role</th>
        <th scope="col">Email</th>
        <th scope="col">Class Name</th>
        <th scope="col">Subject Name</th>
        <th scope="col">Salary</th>
        <th scope="col">Contact</th>
        <th scope="col">Address</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Students as $key=>$studentList)
        <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$studentList->name}}</td>       
        <td>{{$studentList->role}}</td>
        <td>{{$studentList->email}}</td>
        <td>{{$studentList->class_list}}</td>
        <td>{{$studentList->subject_name}}</td>
        <td>{{$studentList->salary}}</td>
        <td>{{$studentList->contact}}</td>
        <td>{{$studentList->address}}</td>
        <td><img class="img" src="{{url('/uploads/'.$studentList->image)}}" alt="img"></td>
        <td>
            <a href="{{route('studentlist.edit',$studentList->id)}}" class="btn btn-success">Edit</a>
            <a href="{{route('studentlist.delete',$studentList->id)}}" class="btn btn-danger">Delete</a>
        </td>
        </tr>
        @endforeach
     
    </tbody>
    </table>

</div>
@endsection