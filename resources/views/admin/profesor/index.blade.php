@extends('layouts.admin')

@section('content')

<div class="container-fluid">
   <div class="row">
      <div class="col">

         <div class="card">
            <div class="card-body">
               <h4 class="card-title"> PROFESORES REGISTRADOS</h4>

               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>NOMBRE</th>
                           <th>EMAIL</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($profe as $p)

                        <tr>
                           <td>{{$p->id}}</td>
                           <td>{{$p->name}}</td>
                           <td>{{$p->email}}</td>
                           <td>
                              @can('administrados')
                              <form action="{{route('profe.delete', $p->id)}}" method="post">
                                 @csrf
                                 <a class="btn btn-primary" href="{{route('profe.show', $p->id)}}" role="button"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                 <button type="submit" class="btn btn-danger" onclick="return confirm('Estas Seguro De Eliminar?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                              </form>
                              @endcan
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

@section('styles')
<link rel="stylesheet" href="{{asset('plugins/datatable/css/dataTables.bootstrap4.min.css')}}">

@endsection

@section('scripts')
<script src="{{asset('plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
<script>
   $(document).ready(function() {
      $('#tabla').DataTable({
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