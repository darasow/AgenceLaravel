@extends('admin.admin')
@section("titre", 'Tous les Biens')
@section('content')

      <div class="flex items-center justify-between">
         <h1 class="text-3xl font-bold">@yield('titre')</h1>
         <a href="{{route('admin.option.create')}}" class="text-white bg-blue-700 px-4 py-2">Ajouter une Option</a>
      </div>

     <!-- component -->
    <div class="flex flex-col bg-red-100">
      <div class="sm:-mx-6 lg:-mx-8 bg-blue-200">
        <div class=" py-2 sm:px-6 lg:px-8 bg-yellow-200">
          <div class=" bg-[#fff]/50 overflow-x-auto">
            <table class=" text-left text-sm font-light">
              <thead class="border-b font-medium">
                <tr>
                  <th scope="col" class="px-6 py-4">#</th>
                  <th scope="col" class="px-6 py-4">Nom</th>
                  <th scope="col" class="px-6 py-4">Action</th>
                </tr>
              </thead>
              <tbody>

               @foreach($options as $option)

              
                <tr class="border-b">
                  <td class="whitespace-nowrap px-6 py-4 font-medium">{{$option->id}}</td>
                  <td class="whitespace-nowrap px-6 py-4 font-medium">{{$option->nom}}</td>
                  <td class="whitespace-nowrap px-6 py-4 font-medium">
                     <div class="flex items-center justify-between space-x-2">
                           <a class="p-2 bg-blue-600 text-white" href="{{route('admin.option.edit', $option)}}">Editer</a>
                           <form method="post" action="{{route('admin.option.destroy', $option)}}">
                              @csrf
                              @method('delete')

                              <button class="bg-red-500 p-2 text-white">Supprimer</button>

                           </form>
                     </div>
                  </td>
                </tr>

              @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
                
<div class="my-4">
      <nav class="relative z-0 inline-flex shadow-sm">
          {{-- Styles pour les liens de pagination --}}

          <a href="{{ $options->previousPageUrl() }}" class="px-3 py-2 text-gray-700 bg-white border rounded-l-md hover:text-gray-500 hover:bg-gray-200 {{ $options->onFirstPage() ? 'pointer-events-none' : '' }}" aria-label="Précédent">
              Précédent
          </a>

          <a href="{{ $options->nextPageUrl() }}" class="px-3 py-2 text-gray-700 bg-white border rounded-r-md hover:text-gray-500 hover:bg-gray-200 {{ !$options->hasMorePages() ? 'pointer-events-none' : '' }}" aria-label="Suivant">
              Suivant
          </a>
      </nav>
</div>

@endSection