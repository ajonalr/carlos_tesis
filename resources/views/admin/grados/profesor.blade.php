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
               <h4 class="card-title">ASIGNAR PROFESOR A GRADO/S</h4>

               <form action="" method="get">

                  <select name="user_id" id="profesor" class="my-4">
                     @foreach ($users as $p)
                     <option value="{{$p->id}}">{{$p->name}}</option>
                     @endforeach
                  </select>

                  <select name="grado_id" id="grado" class="my-4">
                     @foreach ($grados as $p)
                     <option value="{{$p->id}}">{{$p->nombre}} , Seccion: {{$p->seccion}}</option>
                     @endforeach
                  </select>

                  <button type="submit" class="btn btn-primary">GURADAR</button>

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
   new SlimSelect({
      select: '#profesor',
      placeholder: 'SELECCIONES PROFESOR',
      deselectLabel: '<span>&times;</span>',
      hideSelectedOption: true,
   });

   new SlimSelect({
      select: '#grado',
      placeholder: 'SELECCIONE GRADO',
      deselectLabel: '<span>&times;</span>',
      hideSelectedOption: true,
   });
</script>
@endsection