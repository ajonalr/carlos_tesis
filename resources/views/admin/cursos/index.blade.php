@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{asset('plugins/datatable/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/slim-select/slimselect.min.css') }}">
@endsection
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <div style="display: flex; justify-content: space-between; align-items: center;">

                  <span id="card_title" style="font-size: 172%; color: white;">
                     {{ __('GRADOS') }}
                  </span>

                  <div class="float-right">
                     <!-- Button trigger modal -->
                     @can('profesor')
                     <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                        NUEVO CURSO
                     </button>
                     @endcan
                  </div>
               </div>

               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-hover" id="table_id" data-page-length="15">
                        <thead class="thead">
                           <tr>
                              <th>No</th>
                              <th>Nombre</th>
                              <th>GRADO</th>
                              <th>SECCION</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($cursos as $cur)
                           <tr>
                              <td>{{ $cur->id }}</td>
                              <td>{{ $cur->nombre }}</td>
                              <td>{{ $cur->grado->nombre }}</td>
                              <td>{{$cur->grado->seccion}}</td>
                              <td>
                                 <form action="{{route('cur.delete', ['id' => $cur->id])}}" method="POST">
                                    @csrf
                                    @can('profesor')
                                    <a href="{{route('cur.show', ['id' => $cur->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    @endcan
                                    @can('administrados')
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Estas Seguro?')"><i class="fa fa-fw fa-trash"></i> </button>
                                    @endcan
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
      </div>
   </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">NUEVO CURSO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{route('cur.store')}}" method="post">
            @csrf
            <div class="modal-body">

               <div class="form-group">
                  <label for="">NOMBRE DE CURSO</label>
                  <input type="text" class="form-control" name="nombre">
               </div>

               <select name="grado_id" id="grado">
                  @foreach ($grado as $g)
                  <option value="{{$g->id}}">{{$g->nombre}}, Seccion: {{$g->seccion}}</option>
                  @endforeach
               </select>

            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> GUARDAR</button>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection



@section('scripts')
<script src="{{asset('plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/slim-select/slimselect.min.js') }}"></script>

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

   new SlimSelect({
      select: '#grado',
      placeholder: 'Select Permissions',
      deselectLabel: '<span>&times;</span>',
      hideSelectedOption: true,
   });
</script>
@endsection