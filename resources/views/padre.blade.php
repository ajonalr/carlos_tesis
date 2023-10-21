@extends('layouts.app')

@section('content')

<div class="container-fluid text-center">

   <img src="{{asset('logos/logo.png')}}" style="width: 22%;" alt="" srcset="">

   <p class="text-center h4">CONSULTA DE CALIFICACIONES DE ESTUDIANTES</p>
   <div class="row justify-content-center">
      <div class="col-md-6">
         <form action="">


            <div class="form-group">
               <label for="">GRADO</label>
               <select class="form-control" name="grado_id">
                  @foreach ($grados as $g)
                  <option value="{{$g->id}}">{{$g->nombre}}</option>
                  @endforeach
               </select>
            </div>

            <div class="form-group">
               <label for="">CUI DE ESTUDIANTE</label>
               <input type="text" class="form-control" name="cui">
            </div>

            <button type="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></button>

         </form>
      </div>
   </div>




   @if ($vis)

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
      </div>
      <div class="col-md-5">

         <div class="p-4" style="border: 1px double #000; outline: 2px solid black; outline-offset: -9px; border-radius: 25px;">
            <p>Clave: {{$estudiante->id}}</p>


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
               ALUMNO: <b>{{$estudiante->nombre}}</b>
            </p>


            <p>
               GRADO: <b> {{$grado->nombre}}</b>
               SECCIÓN: <b>{{$grado->seccion}}</b>
            </p>

            <p>
               PROFESOR DE GRADO: {{$grado->user->name}}

            </p>


            CICLO ESCOLAR: <b>{{config('app.cliclo')}}</b>


         </div>

      </div>
   </div>

   @endif



</div>




@endsection