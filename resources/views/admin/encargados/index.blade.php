@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{asset('plugins/datatable/css/dataTables.bootstrap4.min.css')}}">
@endsection
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <div style="display: flex; justify-content: space-between; align-items: center;">

                  <span id="card_title" style="font-size: 172%; color: white;">
                     {{ __('ENCARGADOS') }}
                  </span>

               </div>
            </div>


            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-striped table-hover" id="table_id" data-page-length="15">
                     <thead class="thead">
                        <tr>
                           <th>No</th>
                           <th>NOMBRE</th>
                           <th>DPI</th>
                           <th>TELEFONOS</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($data as $encargado)
                        <tr>
                           <td>{{ $encargado->id }}</td>
                           <td>{{ $encargado->nombre1 }}</td>
                           <td>{{ $encargado->dpi1 }}</td>
                           <td>Primario: {{ $encargado->telefono1}} <br> Secundario:  {{ $encargado->telefono2 }}</td>

                           <td>
                              <a href="{{route('encargado.show', ['id' => $encargado->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
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