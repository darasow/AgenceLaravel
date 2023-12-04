@extends('admin.admin')

@section('titre', $option->exists ? 'Editer le Bien' : "Ajouter une option")
@section('content')

          <h1 class="text-3xl font-bold flex items-center justify-center">@yield('titre')</h1>
            
            <form class="w-[80%] justify-center flex flex-col mx-center" action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option)}}" method="post" enctype="multipart/form-data">
              @csrf
                @method($option->exists ? 'put' : 'post')

                 <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                      @include('composant.input', ['label' => 'Nom', 'name' => 'nom', 'type' => 'text', 'value' => $option->nom])
                 </div>
                 

                <button type='submit' class='bg-blue-500 text-white p-2 rounded text-2xl font-bold'>
                      @if($option->exists)
                       Modifer
                       @else
                       Ajouter
                       @endif

                </button>
            
            
            </form>
@endSection