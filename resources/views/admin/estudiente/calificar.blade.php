@extends('layouts.admin')


@section('styles')
<link rel="stylesheet" href="{{asset('plugins/slim-select/slimselect.min.css') }}">
@endsection


@section('content')

<div class="container-fluid">
   @if ($v_grado )
   <div class="row">
      <div class="col">
         <div class="card">
            <div class="card-body">
               <form action="" method="get">
                  <div class="form-group">
                     <label for="">GRADO</label>
                     <select class="form-control" name="grado_id" id="tarea" required>
                        @foreach ($grados as $g)
                        <option value="{{$g->id}}">{{$g->nombre}}, SECCION: {{$g->seccion}}</option>
                        @endforeach
                     </select>
                  </div>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
               </form>
            </div>
         </div>
      </div>
   </div>
   @endif



   @if ($v_cursos)
   <div class="row">
      <div class="col">
         <div class="card">
            <div class="card-body">
               <form action="">
                  <p>CURSOS</p>
                  <select name="curso_id" id="tarea">
                     @foreach ($cursos as $c)
                     <option value="{{$c->id}}">{{$c->nombre}}</option>
                     @endforeach
                  </select>
                  <button type="submit" class="btn btn-success"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
               </form>
            </div>
         </div>
      </div>
   </div>
   @endif

   @if ($v_tareas)
   <div class="row">
      <div class="col">
         <div class="card">
            <div class="card-body">
               <form action="">
                  <p>TAREAS</p>
                  <select name="tarea_id" id="tarea">
                     @foreach ($tareas as $t)
                     <option value="{{$t->id}}">TAREA: {{$t->nombre}}. VALOR: {{$t->valor}}. FECHA ENTREGA: {{$t->fecha_de_entrega}}. BIMESTRE: {{$t->bimestre}}</option>
                     @endforeach
                  </select>
                  <button type="submit" class="btn btn-success"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
               </form>
            </div>
         </div>
      </div>
   </div>

   @endif


   @if ($v_esu)
   <div class="row">
      <div class="col">
         <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
               <h4 class="card-title">CALIFICAR</h4>
               <table class="table">
                  <thead>
                     <tr>
                        <th>ESTUDIANTE</th>
                        <th>CALIFICACION</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($estu as $e)
                     <tr>
                        <td>{{$e->estudiante->nombre}}</td>
                        <td>{{$e->calificacion}} PT. / {{$e->tarea->valor}} PT.</td>
                        <td>
                           <form action="{{route('estu.save_calificacion')}}" class="form-inline" method="post">
                              @csrf
                              <input type="hidden" name="tarea_estudiente_id" value="{{$e->id}}">
                              <input type="hidden" name="tarea_id" value="{{$e->id}}">
                              <div class="form-group">
                                 <label for="">CALIFICACION</label>
                                 <input type="number" id="calificacion<?php echo $e->id; ?>" step="any" class="form-control" name="calificacion" value="{{$e->calificacion}}">
                              </div>
                              <button type="submit" onclick="calificar(<?php echo $e->estudiante_id ?>, <?php echo $e->id ?>, <?php echo 'calificacion' . $e->id; ?>)" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                           </form>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   @endif
</div>

@endsection


@section('scripts')


<script src="{{asset('plugins/slim-select/slimselect.min.js') }}"></script>


<script>
   new SlimSelect({
      select: '#tarea',
      placeholder: 'SELECCIONES PROFESOR',
      deselectLabel: '<span>&times;</span>',
      hideSelectedOption: true,
   });
</script>
<!-- <script src="{{asset('plugins/bootstrap/jquery.min.js')}}"></script> -->
@endsection