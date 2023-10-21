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
               <h4 class="card-title text-uppercase">GRADO: {{$grado->nombre}}</h4>
               <ul class="nav nav-pills mb-3 justify-content-end">
                  <li class="nav-item"><a href="#navpills2-1" class="nav-link active show" data-toggle="tab" aria-expanded="false">DATOS</a>
                  </li>
                  <li class="nav-item"><a href="#navpills2-2" class="nav-link" data-toggle="tab" aria-expanded="false">CURSOS</a>
                  </li>
               </ul>
               <div class="tab-content br-n pn">

                  <div id="navpills2-1" class="tab-pane active show">
                     <div class="row align-items-center">
                        <div class="col-sm-6 col-md-8 col-xl-10">
                           <p class="card-text text-uppercase">SECCION: <b>{{$grado->seccion}}</b> </p>
                           <p class="card-text">ULTIMA FECHA DE ACTULIZACION: <b>{{$grado->updated_at}}</b> </p>
                        </div>
                        <div class="col-sm-6 col-md-4 col-xl-2">
                           <img src="images/big/card-4.png" alt="" class="img-fluid thumbnail m-r-15">
                        </div>
                     </div>

                     <p class="text-center p-4 m-4">
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#UPDATEgrADO" aria-expanded="false" aria-controls="UPDATEgrADO">
                           ACTUALIZAR
                        </button>
                     </p>
                     <div class="collapse" id="UPDATEgrADO">
                        <div class="row align-items-center ">
                           <div class="col">
                              <form action="{{route('grado.update', ['id' => $grado->id])}}" method="post">
                                 @csrf
                                 @method('put')

                                 @include('admin.grados.forms.formupdate')

                                 <button type="submit" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> ACTUALIZAR</button>
                              </form>
                           </div>
                        </div>
                     </div>

                  </div>

                  <div id="navpills2-2" class="tab-pane ">

                     <div class="row">
                        @foreach ($cursos as $c)
                        <div class="col-md-3">
                           <div class="card shadow-lg">
                              <div class="card-body">
                                 <h4 class="card-title">{{$c->nombre}}</h4>
                                 <p class="card-text"><a class="btn btn-primary" href="{{route('cur.show', $c->id)}}"> <i class="fa fa-external-link" aria-hidden="true"></i></a></p>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>

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
         select: '#select',
         placeholder: 'Select Permissions',
         deselectLabel: '<span>&times;</span>',
         hideSelectedOption: true,
      })
   }, 300);
</script>
@endsection