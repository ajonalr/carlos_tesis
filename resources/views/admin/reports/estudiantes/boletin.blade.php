@extends('layouts.app')

@section('styles')
<style>
   body {
      background-color: white;
      color: black;
   }

   .hr-h {
      border: 1px solid black;
      margin-top: 20px;
      /* border-radius: 5px; */
   }
</style>
@endsection

@section('content')

<div class="container-fluid">


   <div class="row justify-content-center mt-2">
     
      <div class="col-md-5">

         <div class="p-4" style="border: 1px double #000; outline: 2px solid black; outline-offset: -9px; border-radius: 25px;">
            <p>Clave: {{$estudiante->estudiante->id}}</p>


            <p class="text-center" style="font-size: 22px; font-weight: bold;">
              {{config('app.name')}}
            </p>

            <p class="text-center" style="font-size: 17px; font-weight: bold;">
               Informe de Avances del Alumno (a) <br>
               Nivel Primario <br>
            </p>

            <div class="text-center">
               <img src="{{asset('logos/logo.png')}}" style="width: 70%;">
            </div>


            <p class="mt-4">
               ALUMNO: <b>{{$estudiante->estudiante->nombre}}</b>
            </p>


            <p>
               GRADO: <b> {{$estudiante->grado->nombre}}</b>
               SECCIÓN: <b>{{$estudiante->grado->seccion}}</b>
            </p>

            <p>
               PROFESOR DE GRADO: 

            </p>


            CICLO ESCOLAR: <b>{{config('app.cliclo')}}</b>


         </div>

      </div>

      <div class="col-md-5">

         <table class="table">
            <thead>
               <tr>
                  <th style="border: 1px solid black;">No.</th>
                  <th style="border: 1px solid black;">ASIGNATURA</th>
                  <th style="border: 1px solid black;">1</th>
                  <th style="border: 1px solid black;">2</th>
                  <th style="border: 1px solid black;">3</th>
                  <th style="border: 1px solid black;">4</th>
                  <th style="border: 1px solid black;">PROM.FIANL</th>
               </tr>
            </thead>
            <tbody>

               @php
               $prome = 0;
               @endphp

               @foreach ($new_Array as $m)

               <tr>
                  <td style="border: 1px solid black;">{{$no}}</td>
                  <td style="border: 1px solid black;">{{$m[0]}}</td>
                  <td style="border: 1px solid black;">{{$m[1]}}</td>
                  <td style="border: 1px solid black;">{{$m[2]}}</td>
                  <td style="border: 1px solid black;">{{$m[3]}}</td>
                  <td style="border: 1px solid black;">{{$m[4]}}</td>
                  <td style="border: 1px solid black;">
                     @php
                     $prome += ($m[1] + $m[2] + $m[3] + $m[4]) / 4;
                     @endphp
                     {{number_format($prome, 2)}}
                  </td>
               </tr>
               <?php $no++;
               $prome = 0 ?>
               @endforeach

            </tbody>
         </table>
         <br>
      </div>



   </div>
</div>

@endsection