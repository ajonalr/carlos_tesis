@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col">

         <table class="table table-striped table-hover" id="table_id" data-page-length="15">
            <thead class="thead">
               <tr>
                  <th>No</th>
                  <th>Nombre</th>
                  <th>CUI</th>
                  <th>GRADO</th>
                  <th>F. INSCRIPCION</th>
                  
               </tr>
            </thead>
            <tbody>
               @foreach ($data as $estu)
               <tr>
                  <td>{{ $estu->id }}</td>
                  <td>{{ $estu->estudiante->nombre }}</td>
                  <td>{{ $estu->estudiante->cui }}</td>
                  <td>{{$estu->grado->nombre}} / SECCION: {{$estu->grado->seccion}}</td>
                  <td>{{$estu->estudiante->created_at}}</td>
                  
               </tr>
               @endforeach
            </tbody>
         </table>

      </div>
   </div>
</div>

@endsection