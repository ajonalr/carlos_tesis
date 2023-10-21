@if(session('info'))
<div class="alert alert-{{session('color')}} alert-dismissible text-uppercase text-center" role="alert">

   {{session('info')}}.
   <button type="button" class="close btn btn-{{session('color')}}" data-dismiss="alert" aria-label="Close">
      <span class="sr-only">Close</span>
      <span aria-hidden="true">&times;</span>
   </button>
</div>

@endif