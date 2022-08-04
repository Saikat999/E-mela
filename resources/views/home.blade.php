@extends('layouts.app')

@section('content')


   <div class="contact_form">
       <div class="container">
           <div class="row">
               <div class="col-8 card">
                   <table class="table table-reponse">
                       <thead>
                           <tr>
                               <th scope="col">#</th>
                               <th scope="col">First</th>
                               <th scope="col">Last</th>
                               <th scope="col">Body</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td scope="col">1</td>
                               <td scope="col">Mark 1</td>
                               <td scope="col">Mark 2</td>
                               <td scope="col">Mark 3</td>
                           </tr>
                           <tr>
                               <td scope="col">1</td>
                               <td scope="col">Mark 1</td>
                               <td scope="col">Mark 2</td>
                               <td scope="col">Mark 3</td>
                           </tr>
                           <tr>
                               <td scope="col">1</td>
                               <td scope="col">Mark 1</td>
                               <td scope="col">Mark 2</td>
                               <td scope="col">Mark 3</td>
                           </tr>
                       </tbody>
                   </table>
               </div>

               <div class="col-4">
                   <div class="card">
                       <img src="{{asset('../frontend/images/IMG_900.jpg')}}" alt="" class="card-img-top" style="height: 90px; width:90px; margin-left:38%; border-radius: 50%;">
                       <div class="card-body">
                           <h5 class="card-title text-center">{{Auth::user()->name}}</h5>
                       </div>
                       <ul class="list-group list-group-flush">
                           <li class="list-group-item"><a href="{{route('password.change')}}">Change Password</a> </li>
                           <li class="list-group-item">List one</li>
                           <li class="list-group-item">List one</li>
                       </ul>
                       <div class="card-body">
                           <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                       </div>
                   </div>
               </div>

           </div>
       </div>
   </div>

@endsection
