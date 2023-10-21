@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{asset('plugins/datatable/css/dataTables.bootstrap4.min.css')}}">
@endsection

@section('content')
<div class="container-fluid">


   <div class="row justify-content-center">
      <div class="col-md-6">
         <div class="card">
            <div class="card-body">
               <form action="" method="get">
                  <div class="form-group">
                     <label for="">GRADOS</label>
                     <select class="form-control form-control-sm" name="grado_id" id="">
                        @foreach ($grados as $g)
                        <option value="{{$g->id}}">{{$g->nombre}}</option>
                        @endforeach
                     </select>
                  </div>
                  <button type="submit" class="btn btn-primary float-right"><i class="fa fa-search" aria-hidden="true"></i></button>
               </form>
            </div>
         </div>
      </div>
   </div>


   @if ($vis)
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <div style="display: flex; justify-content: space-between; align-items: center;">

                  <span id="card_title" style="font-size: 172%;">
                     {{ __('ESTUDIANTES') }}
                  </span>


               </div>

               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-hover" id="table_id" data-page-length="15">
                        <thead class="thead">
                           <tr>
                              <th>No</th>
                              <th>Nombre</th>
                              <th>CUI</th>
                              <th>GRADO</th>
                              <th>PADRE</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($inscripcion as $estu)
                           <tr>
                              <td>{{ $estu->id }}</td>
                              <td>{{ $estu->estudiante->nombre }}</td>
                              <td>{{ $estu->estudiante->cui }}</td>
                              <td>{{$estu->grado->nombre}} / SECCION: {{$estu->grado->seccion}}</td>
                              <td>{{$estu->padre->nombre1}}</td>
                              <td>
                                 <a class="btn btn-primary" href="{{route('estu.show', $estu->id)}}" role="button"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                 <a class="btn btn-info" href="{{route('estu.boletin', $estu->id)}}" role="button"><i class="fa fa-book" aria-hidden="true"></i></a>

                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   @endif


</div>
@endsection

@section('scripts')
<script src="{{asset('plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatable/js/dataTables.bootstrap4.min.js')}}"></script>

<script>
   $(document).ready(function() {
      $('#table_id').DataTable({
         "language": {
            'info': '_TOTAL_ REGISTROS',
            'search': 'BUSCAR',
            'paginate': {
               'next': 'SIGUIENTE',
               'previous': 'ATRAS'
            },
            'loadingRecords': 'CARGANDO',
            'emptyTable': 'NO EXISTEN DATOS',
            'zeroRecords': 'NO EXISTEN DATOS IGUALES'
         }
      });
   });
</script>
@endsection