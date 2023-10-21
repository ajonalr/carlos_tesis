@extends('layouts.boletin')

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

            <p class="text-center" style="margin-top: 15%; font-weight: 900;">FIRMA DE LOS PADRES DE FAMILIA</p>

            <p class="text-center">
               Después de enterarse de los resultados de cada bimestre <br>
               el Padre o Encargado firmará en los espacios siguientes y <br>
               velará por el cumplimiento de tareas y buena conducta <br>
               de su hijo (a)
            </p>


            <p style="margin-top: 10%;">PRIMER BIMESTRE _________________________</p> <br> <br>
            <p>SEGUNDO BIMESTRE_________________________</p> <br> <br>
            <p>TERCER BIMESTRE__________________________</p> <br> <br>
            <p style="margin-bottom: 20%;">CUARTO BIMESTRE__________________________</p>

         </div>



      </div>
      <div class="col-md-5">

         <div class="p-4" style="border: 1px double #000; outline: 2px solid black; outline-offset: -9px; border-radius: 25px;">
            <p>Clave: {{$estudiante->estudiante->id}}</p>


            <p class="text-center" style="font-size: 22px; font-weight: bold;">
               ESCUELA OFICIAL URBANA MIXTA <br>
               “EL CALVARIO” <br>
               HUEHUETENANGO <br>
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
   </div>


   <div class="w-100"></div>




   <div class="row justify-content-center mt-4">
      <div class="col-md-5">

         <div class="row">
            <div class="col-md-6" style="border: 1px solid black;">C.E.F</div>
            <div class="col-md-6" style="border: 1px solid black;">BIMESTRE</div>
         </div>

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
         <table class="table">
            <thead>
               <tr>
                  <th style="border: 1px solid black;">ASPECTOS FORMATIVOS </th>
                  <th style="border: 1px solid black;">1</th>
                  <th style="border: 1px solid black;">2</th>
                  <th style="border: 1px solid black;">3</th>
                  <th style="border: 1px solid black;">4</th>

               </tr>
            </thead>
            <tbody>
               <tr>
                  <td style="border: 1px solid black;">RESPONSABILIDAD Y PUNTUALIDAD
                     AL ENTREGAR TAREAS</td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
               </tr>

               <tr>
                  <td style="border: 1px solid black;"> ORDEN Y LIMPIEZA DE TAREAS</td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
               </tr>


               <tr>
                  <td style="border: 1px solid black;">PARTICIPA DURANTE EL
                     DESARROLLO DE LAS CLASES</td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
               </tr>




               <tr>
                  <td style="border: 1px solid black;">PARTICIPACIÓN DE PADRES DE
                     FAMILIA A REUNIONES</td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
               </tr>

               <tr>
                  <td style="border: 1px solid black;">INASISTENCIAS</td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
               </tr>

               <tr>
                  <td style="border: 1px solid black;">ES PUNTAL AL INGRESAR Y EGRESAR
                     A CLASES</td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
                  <td style="border: 1px solid black;"></td>
               </tr>

            </tbody>
         </table>

      </div>



      <div class="col-md-5 m-4">
         <div class="p-4" style="border: 1px solid black; border-radius: 50px;">

            <br>
            1)
            <hr class="hr-h">
            <hr class="hr-h">
            <hr class="hr-h">

            2)
            <hr class="hr-h">
            <hr class="hr-h">
            <hr class="hr-h">
            3)
            <hr class="hr-h">
            <hr class="hr-h">
            <hr class="hr-h">
            4)
            <hr class="hr-h">
            <hr class="hr-h">
            <hr class="hr-h">

         </div>
         <div class="text-center mt-5">
            Vo. Bo. __________________________________________________ <br>
            Profesor (a) de Grado
         </div>
      </div>
   </div>
</div>

@endsection