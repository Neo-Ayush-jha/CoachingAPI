@extends('homepages/base')
@section('ayush')
   <div class="content">
       <div class="container mt-3">
           <div class="row">
               <div class="col-6 offset-3">
                   <div class="card">
                       <div class="card-body">
                           <h5 class="text-center">Apply here</h5>
                           <hr>
                           <form action="/apply" method="post">
                               @csrf
                                <div class="mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                    @error('name')
                                        <p class="text-danger small">{{$message}}</p>
                                    @enderror
                                </div>
                                
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="">contact</label>
                                        <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" value="{{old('contact')}}">
                                        @error('contact')
                                            <p class="text-danger small">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="">email</label>
                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                                        @error('email')
                                            <p class="text-danger small">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="">DOB</label>
                                        <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{old('dob')}}">
                                        @error('dob')
                                            <p class="text-danger small">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="">gender</label>
                                        <input type="text" name="gender" class="form-control @error('gender') is-invalid @enderror" value="{{old('gender')}}">
                                        @error('gender')
                                            <p class="text-danger small">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label for="">address</label>
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}">
                                    @error('address')
                                        <p class="text-danger small">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <label for="">Password</label>
                                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
                                    @error('password')
                                        <p class="text-danger small">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="submit" name="submit" class="btn btn-success w-100">
                                </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection