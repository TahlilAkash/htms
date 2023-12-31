
@extends('frontend.master')
@section('content')
<div class="site-section-cover overlay h-25" style="background-color:#303030; height:50%">
    
    <div class="container">
        
        <form action="{{route('subject.search')}}" method="get">
            <input type="text" class="form-control mt-1"  style="width: 200px; display: inline-block;"  placeholder="Search by subject.." name="search">
            <button type="submit" class="btn btn-success" style="border: 2px solid green; background-color: green; color: white ";>Search</button>
        </form>
        
        <div class="row align-items-center justify-content-center" >
            <div class="col-lg-10 text-center">
                
                <h1>Home <strong>Tutor</strong> Management<strong> System</strong></h1>
            </div>
           
        </div>
    </div>
</div>

<div class="container">
        <!-- welcome tittle -->
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center mb-5">
                <div class="heading">
                    <span class="caption">Welcome To Tuition Management Site</span>

                    <h4>Search result for : {{ request()->search }} found {{$relatedposts->count()}} Post .</h4>
                
                </div>
            </div>
        </div>
        <!-- end welcome tittle -->

        <!-- breif  section -->
        
        <!-- end breif  section -->

        <!-- cart for post -->
        
        
        {{-- Teacher Post --}}
        
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center mb-5">
                
                    <h4>Related Post</h4>

                    
                </div>
            </div>
        <div class="row ">

            @if($relatedposts->count()>0)

            @foreach ($relatedposts as $post)
                {{-- <a href="{{route('s_t.post.singleview',$tpost->id)}}"> --}}
                    <div class="col-lg-4 mb-4 mb-lg-0 " >
                        <div class="testimonial-2 mb-4">
                            
                            {{-- <h3 class="h5">Tuition!</h3> --}}
                            @if($post->role=='student')
                            <h3 class="h5">Need tuitor !</h3>
                            @else 

                            <h3 class="h5">Need Tuition</h3>
                            @endif

                            <div class="d-flex v-card align-items-center">
                                <img src="{{url('/uploads/'.$post->image)}}" alt="Image" class="img-fluid mr-3" > 
                                {{-- class="img-fluid mr-3" style="height:60px; width:25px";    to style the images    --}} 
                            </div>
                            <h6>Name: {{$post->name}}</h6>                       
                            <h6>Role: {{$post->role}}</h6>
                            <h6>Email Address: {{$post->email}}</h6>
                            
                            <h6>Class: {{$post->class_list}}</h6>
                            <h6>Subject: {{$post->subject_name}}</h6>
                            <h6>Salary: {{$post->salary}} .BDT</h6>
                            <h6>Contact: {{$post->contact}}</h6>
                            <a class="btn btn-primary" href="{{route('s_t.post.singleview',$post->id)}}" role="button">See More</a>
                            
                            {{-- <blockquote class="mb-4">
                            <p>Class: {{$tpost->class_lits}}</p>
                            </blockquote> --}}
                            

                            
                        </div>
                    </div>
                {{-- </a> --}}
            @endforeach   
     @else
            <h3>No post found.</h3>
     @endif 
        </div>
        

            
        
           

        <!-- end cart -->
    </div>
@endsection