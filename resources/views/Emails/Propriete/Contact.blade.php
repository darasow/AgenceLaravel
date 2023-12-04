<x-mail::message>
# Nouvelle demande de contact 
Une nouvelle demande de contact a été fait pour le bien <a href="{{route('listing.show', ['slug' => $propriete->getSlug(), 'propriete' => $propriete])}}">{{$propriete->titre}}</a>

-Nom : {{$data['nom']}}
-Prénom : {{$data['prenom']}}
-Téléphone : {{$data['telephone']}}
-Email : {{$data['email']}}

**Message**<br/>
{{$data['message']}}
</x-mail::message>
