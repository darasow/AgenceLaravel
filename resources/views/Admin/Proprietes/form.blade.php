@extends('admin.admin')

@section('titre', $propriete->exists ? 'Editer le Bien' : "Ajouter un Bien")
@section('content')

          <h1 class="text-3xl font-bold flex items-center justify-center">@yield('titre')</h1>
            
            <form class="w-[80%] justify-center flex flex-col mx-center" action="{{ route($propriete->exists ? 'admin.propriete.update' : 'admin.propriete.store', $propriete)}}" method="post" enctype="multipart/form-data">
              @csrf
                @method($propriete->exists ? 'put' : 'post')

                 <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                 
                      @include('composant.input', ['label' => 'Titre', 'name' => 'titre', 'type' => 'text', 'value' => $propriete->titre])
                      @include('composant.input', ['label' => 'Prix', 'name' => 'prix', 'type' => 'number', 'value' => $propriete->prix])
                      @include('composant.input', ['label' => 'Surface', 'name' => 'surface', 'type' => 'number', 'value' => $propriete->surface])
                      @include('composant.input', ['class' => 'md:col-span-3', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'value' => $propriete->description])
                      @include('composant.input', ['label' => 'Nombre de pièces', 'name' => 'nombreDePiece', 'type' => 'number', 'value' => $propriete->nombreDePiece])
                      @include('composant.input', ['label' => 'Nombre de chambre', 'name' => 'nombreDeChambre', 'type' => 'number', 'value' => $propriete->nombreDeChambre])
                      @include('composant.input', ['label' => 'Etage', 'name' => 'etage', 'type' => 'number', 'value' => $propriete->etage])
                      @include('composant.input', ['label' => 'Ville', 'name' => 'ville', 'type' => 'text', 'value' => $propriete->ville])
                      @include('composant.input', ['label' => 'Adresse', 'name' => 'adresse', 'type' => 'text', 'value' => $propriete->adresse])
                      @include('composant.input', ['label' => 'Code postale', 'name' => 'codePostale', 'type' => 'text', 'value' => $propriete->codePostale])
                      @include('checkbox.input', ['label' => 'Vendu', 'name' => 'vendu', 'type' => 'checkbox', 'value' => $propriete->vendu])
                      @include('composant.select', ['label' => 'Option', 'name' => 'options', 'type' => 'select', 'value' => $propriete->options()->pluck('id'), 'multiple' => true, 'options' => $options])
                 </div>
                 

                <button type='submit' class='bg-blue-500 text-white p-2 rounded text-2xl font-bold'>
                      @if($propriete->exists)
                       Modifer
                       @else
                       Ajouter
                       @endif

                </button>
            
            
            </form>
@endSection