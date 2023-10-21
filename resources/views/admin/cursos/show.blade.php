@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{asset('plugins/slim-select/slimselect.min.css') }}">
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col">
         <div class="card">
            <div class="card-body">


               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                     <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">ACTUALIZAR / NUEVAS TAREAS</button>
                  </li>

                  <li class="nav-item" role="presentation">
                     <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">TAREAS ASIGNADAS</button>
                  </li>
               </ul>
               <div class="tab-content" id="pills-tabContent">

                  <h4 class="card-title">{{$curso->nombre}}</h4>


                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">


                     <div class="col-sm-6 col-md-8 col-xl-10">
                        <form action="{{route('cur.update',$curso->id)}}" method="post">
                           @csrf
                           @method('PUT')
                           <div class="modal-body">

                              <div class="form-group">
                                 <label for="">NOMBRE DE CURSO</label>
                                 <input type="text" class="form-control" name="nombre" value="{{$curso->nombre}}">
                              </div>

                              <select name="grado_id" id="grado">
                                 <option value="{{$curso->grado_id}}">{{$curso->grado->nombre}}</option>
                                 @foreach ($grado as $g)
                                 <option value="{{$g->id}}">{{$g->nombre}}, Seccion: {{$g->seccion}}</option>
                                 @endforeach
                              </select>

                           </div>
                           <div class="modal-footer">
                              <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> GUARDAR</button>
                           </div>
                        </form>
                     </div>


                     <form action="{{route('cur.save_tarea')}}" method="POST">
                        @csrf
                        @include('admin.cursos.tarea.form')

                        <input type="hidden" name="curso_id" value="{{$curso->id}}">
                        <input type="hidden" name="grado_id" value="{{$curso->grado_id}}">

                        <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> GARDAR</button>
                     </form>

                     <!--  -->

                  </div>

                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                     <hr>

                     @include('admin.cursos.tarea.tareas')

                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>
</div>
@endsection



@section('scripts')

<script src="{{asset('plugins/slim-select/slimselect.min.js') }}">
</script>

<script>
   setTimeout(function() {
      new SlimSelect({
         select: '#grado',
         placeholder: 'Select Permissions',
         deselectLabel: '<span>&times;</span>',
         hideSelectedOption: true,
      })
   }, 300);
</script>
@endsection