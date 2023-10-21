@extends('layouts.admin')

@section('content')
<div class="container-fluid">
   <div class="row">

      <div class="col-md-4">
         <a href="{{route('grados.allgrados')}}" target="_blank">
            <div class="card text-center">
               <!-- <img class="card-img-top" style="width: 30%; margin-left: auto; margin-right: auto;" src="{{asset('images/lista1.png')}}" alt="{{config('app.name')}}"> -->
               <div class="card-body">
                  <h4 class="card-title">REPORTE DE GRADOS</h4>
                  <p class="card-text">RETORNA EL LISTADO DE TODOS LOS GRADOS REGISTRADOS</p>

                  <a class="btn btn-primary" href="{{route('grados.allgrados')}}" role="button"><i class="fa fa-print" aria-hidden="true"></i></a>
               </div>
            </div>
         </a>
      </div>

      <div class="col-md-4">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">TAREAS</h4>
               <p class="card-text">RETORNA TODAS LAS TAREAS ASIGNADAS A UN GRADO, POR BIMESTRE</p>

               <form action="" method="post">

                  <div class="form-group">
                     <label for="">GRADO</label>
                     <select class="form-control" name="grado_id">
                        @foreach ($grado as $g)
                        <option value="{{$g->id}}">{{$g->nombre}}</option>
                        @endforeach
                     </select>
                  </div>

                  <div class="form-group">
                    <label for="">BIMESTRE</label>
                    <select class="form-control" name="bimestre" id="">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </div>

                  <button type="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></button>

               </form>
            </div>
         </div>
      </div>

   </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('plugins/slim-select/slimselect.min.js') }}"></script>
<script>
   setTimeout(function() {
      new SlimSelect({
         select: '#grado_id',
         placeholder: 'Select Permissions',
         deselectLabel: '<span>&times;</span>',
         hideSelectedOption: true,
      })
   }, 300);
   setTimeout(function() {
      new SlimSelect({
         select: '#grado_deu_id',
         placeholder: 'Select Permissions',
         deselectLabel: '<span>&times;</span>',
         hideSelectedOption: true,
      })
   }, 300);
</script>
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('plugins/slim-select/slimselect.min.css') }}">
@endsection