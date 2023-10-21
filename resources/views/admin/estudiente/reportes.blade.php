@extends('layouts.admin')



@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <div style="display: flex; justify-content: space-between; align-items: center;">
                  <span id="card_title" style="font-size: 172%;">
                     {{ __('REPORTES') }}
                  </span>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-md-4">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">ESTUDIANTES</h4>
               <p class="card-text">RETORNA EL REPORTES DE TODOS LOS ESTUDIANTES REGISTRADOS</p>
               <a class="btn btn-primary" href="{{route('estu.estudianteAllReport')}}" role="button"><i class="fa fa-print" aria-hidden="true"></i></a>
            </div>
         </div>
      </div>

      <div class="col-md-4">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">GRADOS</h4>
               <p class="card-text">RETORNA EL REPORTES DE TODOS LOS ESTUDIANTES INSCRITOS POR GRADOS</p>

               <form action="{{route('estu.estudianteAllReportToGrado')}}" method="get">
                  <select id="nombre" name="grado_id" class="my-3 form-control" required>

                  @foreach ($grados as $g )   
                  <option value="{{$g->id}}">{{$g->nombre}} / {{$g->seccion}}</option>
                  @endforeach
                  
                  </select>
                  <button type="submit" class="btn btn-primary">BUSCAR</button>
               </form>

            </div>
         </div>
      </div>

   </div>

</div>
@endsection