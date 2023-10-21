@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col">
         <table class="table">
            <thead>
               <tr>
                  <th>#</th>
                  <th>NOMBRE</th>
                  <th>EMAIL</th>
               
               </tr>
            </thead>
            <tbody>
               @foreach ($data as $p)

               <tr>
                  <td>{{$p->id}}</td>
                  <td>{{$p->name}}</td>
                  <td>{{$p->email}}</td>
                  <
               </tr>
               @endforeach

            </tbody>
         </table>
      </div>
   </div>
</div>

@endsection