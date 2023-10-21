@extends('layouts.admin')



@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col">
         <div class="card">
            <div class="card-body">
               
               <form action="{{route('inscripcion.inscribir')}}" method="post">
                  @csrf
                  <div class="">DATOS DE ESTUDIANTE</div>
                  <div class="w-100"></div>

                  <div class="form-group">
                     <label for="">NOMBRE</label>
                     <input type="text" class="form-control" name="nombre" required>
                  </div>


                  <div class="form-group">
                     <label for="">FECHA DE NACIMIENTO</label>
                     <input type="date" class="form-control" name="fecha_nacimiento" required>
                  </div>


                  <div class="form-group">
                     <label for="">CUI</label>
                     <input type="text" class="form-control" name="cui" required>
                  </div>


                  <div class="form-group">
                     <label for="">TELEFONO</label>
                     <input type="text" class="form-control" name="telefono" required>
                  </div>

                  <p class="">DATOS DE ENCARGADO</p>



                  <div class="form-group">
                     <label for="">NOMBRE</label>
                     <input type="text" class="form-control" name="nombre1" value="">
                  </div>



                  <div class="form-group">
                     <label for="">DPI</label>
                     <input type="text" class="form-control" name="dpi1" required value="">
                  </div>

                  <div class="form-group">
                     <label for="">DIRECCION</label>
                     <input type="text" class="form-control" name="direccion1" required value="">
                  </div>



                  <div class="form-group">
                     <label for="">EDAD</label>
                     <input type="number" class="form-control" name="edad1" required value="">
                  </div>



                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="">TELEFONO PRIMARIO</label>
                        <input type="text" class="form-control" name="telefono1" required value="">
                     </div>
                  </div>



                  <div class="form-group">
                     <label for="">SELECCIONE GRADO A INSCRIBIR</label>
                     <select id="grado_id" name="grado_id" onchange="cambiar()" class="form-control" required>
                        <option value="">SELECCIONE UN GRADO</option>
                        @foreach ($grados as $grado)
                        <option value="{{$grado->id}}">{{$grado->nombre}} - Seccion: {{$grado->seccion}} </option>
                        @endforeach
                     </select>
                  </div>



                  <div class="row justify-content-center">
                     <div class="">

                        <div class="step-footer">
                           <button type="submit" class="btn btn-info"> <i class="fa fa-save "></i> GUARDAR </button>
                        </div>

                     </div>
                  </div>

               </form>



            </div>
         </div>
      </div>
   </div>
</div>
@endsection




@section('scripts')

<script src="{{asset('plugins/common/common.min.js')}}"></script>
<script src="{{asset('js/custom.min.js')}}"></script>
<script src="{{asset('js/settings.js')}}"></script>
<script src="{{asset('js/gleek.js')}}"></script>
<script src="{{asset('js/styleSwitcher.js')}}"></script>

<script>
   function cambiar() {
      grado = document.getElementById('grado_id').value.split('___');
      let colegiatura = document.getElementById('colegiatura');
      let inscripcion = document.getElementById('inscripcion');
      colegiatura.value = grado[1]
      inscripcion.value = grado[2]
   }
</script>
@endsection