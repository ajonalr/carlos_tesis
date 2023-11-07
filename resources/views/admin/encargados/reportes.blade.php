@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col">
      <p class="text-center">REPORTE DE ENCARGADOS</p>

         <table class="table table-striped table-hover" id="table_id" data-page-length="15">
            <thead class="thead">
               <tr>
                  <th>No</th>
                  <th>NOMBRE</th>
                  <th>DPI</th>
                  <th>TELEFONOS</th>
                 
               </tr>
            </thead>
            <tbody>
               @foreach ($data as $encargado)
               <tr>
                  <td>{{ $encargado->id }}</td>
                  <td>{{ $encargado->nombre1 }}</td>
                  <td>{{ $encargado->dpi1 }}</td>
                  <td>Primario: {{ $encargado->telefono1}} <br> Secundario: {{ $encargado->telefono2 }}</td>

               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>

@endsection