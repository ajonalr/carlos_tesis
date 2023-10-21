@extends('layouts.admin')

@section('content')

<div class="container-fluid">
   <div class="row">
      <div class="col-md-3">
         <div class="card">
            <div class="card-body text-center">

               <img width="150" src="https://ui-avatars.com/api/?name={{ $estu->estudiante->nombre }}" class="img-fluid rounded-circle" alt="{{config('app.name')}}" srcset="">

               <h4 class="card-title">{{$estu->estudiante->nombre}}</h4>
               <p class="card-text">{{$estu->grado->nombre}} <br> Seccion: {{$estu->grado->seccion}}</p>
            </div>
         </div>
      </div>

      <div class="col-md-9">
         <div class="card">
            <div class="card-body">
               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                     <button class="nav-link btn btn-info active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                  </li>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link btn btn-info" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">ACTUALIZAR</button>
                  </li>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link btn btn-info" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">PADRE</button>
                  </li>
               </ul>
               <div class="tab-content" id="pills-tabContent">

                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  </div>

                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                     ..actualizar
                  </div>

                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                  <div class="card">
                    <div class="card-body">
                      <blockquote class="blockquote">
                        <p>{{$padre->nombre1}}</p>
                        <p>{{$padre->dpi1}}</p>
                        <p>{{$padre->direccion1}}</p>
                        <p>{{$padre->telefono1}}</p>

                        <footer class="card-blockquote">PERFIL <a  class="btn btn-primary btn-sm btn-rounded" href="{{route('encargado.show', $padre->id)}}" role="button"><i class="fa fa-eye" aria-hidden="true"></i></a></footer>
                      </blockquote>
                    </div>
                  </div>
                  
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection