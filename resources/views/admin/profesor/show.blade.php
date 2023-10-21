@extends('layouts.admin')

@section('content')

<div class="container-fluid">
   <div class="row">
      <div class="col-md-3">
         <div class="card">
            <div class="card-body text-center">

               <img width="150" src="https://ui-avatars.com/api/?name={{ $profe->name }}" class="img-fluid rounded-circle" alt="{{config('app.name')}}" srcset="">

               <h4 class="card-title">{{$profe->name}}</h4>
               <p class="card-text">{{$profe->email}}</p>

               <p class="card-text">DIRECCCION: <b>{{$profe->perfil->direccion}}</b></p>
               <p class="card-text">TELEFONO: <b>{{$profe->perfil->telefono}}</b></p>
               <p class="card-text">EDAD: <b>{{$profe->perfil->edad}}</b></p>

            </div>
         </div>
      </div>

      <div class="col-md-9">
         <div class="card">
            <div class="card-body">
               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                     <button class="nav-link btn btn-info active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">GRADOS</button>
                  </li>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link btn btn-info" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">ACTUALIZAR</button>
                  </li>

               </ul>
               <div class="tab-content" id="pills-tabContent">

                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                     Grados que imparte:
                     @foreach ($grados as $g)
                     <p>
                        <span class="badge badge-info">{{$g->grado->nombre}}</span>
                        SEECCION: {{$g->grado->seccion}}
                     </p>
                     @endforeach
                  </div>

                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                     <form action="{{route('profe.update', $profe->id)}}" method="POST">
                        @method('PUT')
                        @csrf()


                        <div class="form-group row">
                           <label for="name" class="required col-md-4 col-form-label text-md-right">{{ __('NOMBRE') }}</label>

                           <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $profe->name }}" required autocomplete="name">

                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="email" class="required col-md-4 col-form-label text-md-right">{{ __('E-Mail ') }}</label>

                           <div class="col-md-6">
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $profe->email }}" required autocomplete="email">

                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>

                        <div class="form-group row">
                           <label class="required col-md-4 col-form-label text-md-right" for="">TELEFONO</label>
                           <div class="col-md-6">
                              <input type="text" class="form-control  " value="{{$profe->perfil->telefono}}" name="telefono">
                           </div>
                        </div>

                        <div class="form-group row">
                           <label class="required col-md-4 col-form-label text-md-right" for="">EDAD</label>
                           <div class="col-md-6">
                              <input type="text" class="form-control  " value="{{$profe->perfil->edad}}" name="edad">
                           </div>
                        </div>

                        <div class="form-group row">
                           <label class="required col-md-4 col-form-label text-md-right" for="">DIRECCION</label>
                           <div class="col-md-6">
                              <input type="text" class="form-control  " value="{{$profe->perfil->direccion}}" name="direccion">
                           </div>
                        </div>


                        <div class="text-center">

                           <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> GUARDAR</button>
                        </div>


                     </form>


                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection