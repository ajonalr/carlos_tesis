@extends('layouts.admin')

@section('content')
<div class="container-fluid">
   <div class="row justify-content-center">
      <div class="col-md-6">
         <div class="card">

            <div class="card-body">
               <h4 class="card-title">REGISTRO DE PROFESOR</h4>

               <form action="{{route('profe.store')}}" method="post">
                  @csrf

                  <div class="form-group row">
                     <label for="name" class="required col-md-4 col-form-label text-md-right">{{ __('NOMBRE') }}</label>

                     <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

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
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>

                  <div class="form-group row">
                     <label for="password" class="required col-md-4 col-form-label text-md-right">{{ __('CONTRASEÑA') }}</label>

                     <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>

                  <div class="form-group row">
                     <label class="required col-md-4 col-form-label text-md-right" for="">TELEFONO</label>
                     <div class="col-md-6">
                        <input type="text" class="form-control  " name="telefono">
                     </div>
                  </div>

                  <div class="form-group row">
                     <label class="required col-md-4 col-form-label text-md-right" for="">EDAD</label>
                     <div class="col-md-6">
                        <input type="text" class="form-control  " name="edad">
                     </div>
                  </div>

                  <div class="form-group row">
                     <label class="required col-md-4 col-form-label text-md-right" for="">DIRECCION</label>
                     <div class="col-md-6">
                        <input type="text" class="form-control  " name="direccion">
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
@endsection