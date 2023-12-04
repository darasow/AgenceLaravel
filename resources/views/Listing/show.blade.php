@extends('template')
@section('title', $propriete->titre)

@section('content')
 
 <!-- component -->

<h1 class="flex items-center justify-center py-4 bg-blue-500 text-bold text-white">@yield('title')</h1>

      <div class="flex flex-col bg-red-100">
      <div class="sm:-mx-6 lg:-mx-8 bg-blue-200">
        <div class=" py-2 sm:px-6 lg:px-8 bg-yellow-200">
          <div class=" bg-[#fff]/50 overflow-x-auto">
            <table class=" text-left text-sm font-light">
              <thead class="border-b font-medium">
                <tr>
                  <th scope="col" class="px-6 py-4">Titre</th>
                  <th scope="col" class="px-6 py-4">Surface</th>
                  <th scope="col" class="px-6 py-4">Prix</th>
                  <th scope="col" class="px-6 py-4">Nombre de piece</th>
                  <th scope="col" class="px-6 py-4">Nombre de chambre</th>
                  <th scope="col" class="px-6 py-4">Ville</th>
                  <th scope="col" class="px-6 py-4">Code Postale</th>
                  <th scope="col" class="px-6 py-4">Adresse</th>
                  <th scope="col" class="px-6 py-4">Etat</th>
                </tr>
              </thead>
              <tbody>

                <tr class="border-b">
                  <td class="whitespace-nowrap px-6 py-4 font-medium">{{$propriete->titre}}</td>
                  <td class="whitespace-nowrap px-6 py-4 font-medium">{{$propriete->surface}}m²</td>
                  <td class="whitespace-nowrap px-6 py-4 font-medium">{{number_format($propriete->prix, thousands_separator: ' ')}}</td>
                  <td class="whitespace-nowrap px-6 py-4 font-medium">{{$propriete->nombreDePiece}}</td>
                  <td class="whitespace-nowrap px-6 py-4 font-medium">{{$propriete->nombreDeChambre}}</td>
                  <td class="whitespace-nowrap px-6 py-4 font-medium">{{$propriete->ville}}</td>
                  <td class="whitespace-nowrap px-6 py-4 font-medium">{{$propriete->codePostale}}</td>
                  <td class="whitespace-nowrap px-6 py-4 font-medium">{{$propriete->adresse}}</td>
                  <td class="whitespace-nowrap px-6 py-4 font-medium">{{$propriete->getEtatVente()}}</td>
                </tr>

              </tbody>
            </table>
             
          </div>
        </div>
      </div>
    </div>
   <h1 class="flex items-center justify-center py-4 bg-blue-500 text-bold text-white">Les option</h1>
       <div class="flex justify-center justify-bettwen w-[60%] mx-auto bg-yellow-200">
          
          @forelse($propriete->options as $option)
             <div class="text-center">{{$option->nom}}</div>
             @empty
             <div class="text-center">Pas d'option</div>
          @endforelse
            
       </div>
       <hr class="mt-4">
   <h1 class="flex items-center justify-center py-4 bg-blue-500 text-bold text-white">Interesser</h1>

     <form class="w-[80%] mx-auto justify-center flex flex-col mx-center" action="{{route('listing.contact', $propriete)}}" method="post" enctype="multipart/form-data">
              @csrf

                 <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                 
                      @include('composant.input', ['label' => 'Nom', 'name' => 'nom', 'type' => 'text'])
                      @include('composant.input', ['label' => 'Prénom', 'name' => 'prenom', 'type' => 'text'])
                      @include('composant.input', ['label' => 'Telephone', 'name' => 'telephone', 'type' => 'text'])
                      @include('composant.input', ['label' => 'Email', 'name' => 'email', 'type' => 'email'])
                      @include('composant.input', ['class' => 'md:col-span-3', 'label' => 'Message', 'name' => 'message', 'type' => 'textarea'])
                </div>
                 

                <button type='submit' class='bg-blue-500 text-white p-2 rounded text-2xl font-bold'>
                    Commander
                </button>
     
            </form>






@endsection