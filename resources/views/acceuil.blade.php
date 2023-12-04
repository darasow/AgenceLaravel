@extends('template')

@section('content')


<h1 class="flex items-center justify-center py-4 bg-blue-500 text-bold text-white">La page d'acceuil</h1>
   <div class="grid grid-cols-1 items-center  md:grid-cols-4 space-y-2 md:space-y-0 md:space-x-2">
        @foreach($proprietes as $propriete)

            @include('CardPropriete.card')
                     
        @endforeach
               
   </div>

@endsection