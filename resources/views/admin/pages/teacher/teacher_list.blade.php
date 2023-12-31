{{-- <style>
    .img {
        width: 80px; 
        height: 100px; 
        border: 2px solid #ddd; 
        border-radius: 8px; 
        margin: 5px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    }
</style> --}}
@extends('admin.master')

@section('content')


<h3>Teacher List</h3>


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
        @foreach($TeacherList as $key=>$TList)
        <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$TList->name}}</td>       
        <td>{{$TList->role}}</td>
        <td>{{$TList->email}}</td>
        <td>{{$TList->class_list}}</td>
        <td>{{$TList->subject_name}}</td>
        <td>{{$TList->salary}}</td>
        <td>{{$TList->contact}}</td>
        <td>{{$TList->address}}</td>
        <td><img class="img" src="{{url('/uploads/'.$TList->image)}}" alt="img"></td>
        <td>
            <a href="{{route('teacherlist.edit',$TList->id)}}" class="btn btn-success mb-1">Edit</a>

            <a href="{{route('teacherlist.delete',$TList->id)}}" class="btn btn-danger">Delete</a>
        </td>
        </tr>
        @endforeach
     
    </tbody>
    </table>

</div>
@endsection

