@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col">


         <table class="table table-striped table-hover" id="table_id" data-page-length="15">
            <thead class="thead">
               <tr>
                  <th>No</th>
                  <th>GRADO</th>
                  <th>SECCION</th>
             
               </tr>
            </thead>
            <tbody>
               @foreach ($data as $cur)
               <tr>
                  <td>{{ $cur->id }}</td>
                  <td>{{ $cur->nombre }}</td>
                  <td>{{ $cur->seccion }}</td>
               </tr>
               @endforeach
            </tbody>
         </table>

      </div>
   </div>
</div>

@endsection