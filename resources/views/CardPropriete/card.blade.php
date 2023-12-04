
  <div class=" flex items-center justify-center">
      
    <div class="max-w-md  p-4 bg-white rounded-lg shadow-lg w-[200px] ">
       <p class="text-start text-xl font-thin">{{$propriete->created_at}}</p>
      <h1 class="text-2xl font-semibold bg-blue-500 text-center text-white mt-8 mb-6"><a href="{{route('listing.show', ['slug' => $propriete->getSlug(), 'propriete' => $propriete->id])}}" class="w-full block">{{$propriete->titre}}</a></h1> 
      <p class="text-sm text-gray-600 text-center my-4">{{$propriete->description}}</p> 
      <h2 class="flex items-center justify-center">{{$propriete->surface}}m²-{{$propriete->ville}}</h2>
      <div class="text-center">
        <p class="text-3xl px-10">{{number_format($propriete->prix, thousands_separator:' ')}}$</p>
      </div>
      <p class="text-xs text-gray-600 text-center flex justify-between mt-8">
      <span>{{$propriete->adresse}}-{{$propriete->codePostale}}</span>
      <span>{{$propriete->getEtatVente()}}</span>
      </p>
    </div>
    
  </div>
