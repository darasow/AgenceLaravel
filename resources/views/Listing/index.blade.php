@extends('template')
@section('title', 'Liste des biens')

@section('content')
 
 <!-- component -->
<form method="get" class="bg-white shadow-md rounded px-8 pt-6 pb-4 mb-4 flex flex-col my-2">
  <div class="-mx-3 md:flex mb-6 grid grid-cols-1 md:grid-cols-4 gap-2">
    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
        Prix max
      </label>
      <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" name="prix" type="number" placeholder="Supérieur ou egale à ?" value="{{$input['prix'] ?? ''}}">
    </div>
    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
        Surface max
      </label>
      <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Supérieur ou egale à ?" name="surface" value="{{$input['surface'] ?? ''}}">
      
    </div>
    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
        Titre
      </label>
      <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Titre" name="titre" value="{{$input['titre'] ?? ''}}">
    </div>
    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
        Ville
      </label>
      <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Ville" name="ville" value="{{$input['ville'] ?? ''}}">
      <p class="md:col-span-4"><button class="block w-full px-2 bg-green-500 py-4">Chercher</button></p>
    </div>
  </div>
</form>

<h1 class="flex items-center justify-center py-4 bg-blue-500 text-bold text-white">@yield('title')</h1>
   <div class="grid grid-cols-1 items-center  md:grid-cols-4 space-y-2 md:space-y-0 md:space-x-2">
        @forelse($proprietes as $propriete)

            @include('CardPropriete.card')
         @empty
          
            <h1 class="flex mt-4 items-center justify-center py-4 bg-blue-500 text-bold text-white">Aucun bien ne correspond a la recherche</h1>

        @endforelse
                        

               
   </div>
             <div class="my-4">
                <nav class="relative z-0 inline-flex shadow-sm">
                    {{-- Styles pour les liens de pagination --}}

                    <a href="{{ $proprietes->previousPageUrl() }}" class="px-3 py-2 text-gray-700 bg-white border rounded-l-md hover:text-gray-500 hover:bg-gray-200 {{ $proprietes->onFirstPage() ? 'pointer-events-none' : '' }}" aria-label="Précédent">
                        Précédent
                    </a>

                    <a href="{{ $proprietes->nextPageUrl() }}" class="px-3 py-2 text-gray-700 bg-white border rounded-r-md hover:text-gray-500 hover:bg-gray-200 {{ !$proprietes->hasMorePages() ? 'pointer-events-none' : '' }}" aria-label="Suivant">
                        Suivant
                    </a>
                </nav>
            </div>

@endsection