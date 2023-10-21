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