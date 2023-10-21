@extends('layouts.admin')

@section('content')
<div class="container">
   <div class="row">
      <div class="col">

         <div class="card">
            <div class="card-body">
               <div class="d-md-flex justify-content-around">
                  <div>
                     <h4 class="card-title">NOTAS</h4>
                  </div>

                  <div>
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#NOTAMODAL">
                        NUEVA NOTAS
                     </button>

                     <!-- Modal -->
                     <div class="modal fade" id="NOTAMODAL" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title">NUEVA NOTA</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <form action="{{route('nota.store')}}" method="post">
                                 @csrf
                                 <div class="modal-body">

                                    <div class="form-group">
                                       <label for="">DESCRIPCION</label>
                                       <input type="text" class="form-control" name="description">
                                    </div>
                                    <div class="form-group">
                                       <label for="fecha">FECHA</label>
                                       <input type="date" class="form-control" name="fecha">
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                                    <button type="submit" class="btn btn-success">GUARDAR</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>

               </div>

               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>#ID</th>
                           <th>DESCRCIPION</th>
                           <th>FECHA DE ASIGNACION</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($data as $d)
                        <tr>
                           <td>{{$d->id}}</td>
                           <td>{{$d->description}}</td>
                           <td>{{$d->fecha}}</td>
                           <td>
                              <form action="{{route('nota.delete', $d->id)}}" method="post">
                                 @csrf
                                 @method('DELETE')

                                 <button type="submit" class="btn btn-danger" onclick="return confirm('Esta Seguro de Eliminar?')">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                 </button>
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

@endsection