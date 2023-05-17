<x-mail::message>
# Nouvelle demande de contact

Une nouvelle demande de contact a été faite pour le site <a href="{{ route('site.show', ['slug' => $site->getSlug(), 'site' => $site]) }}">{{ $site->name }}</a>

- Prénom : {{ $data['firstname'] }}
- Nom : {{ $data['lastname'] }}
- Téléphone : {{ $data['phone'] }}
- Email : {{ $data['email'] }}

**Message :**<br>
{{ $data['message'] }}
</x-mail::message>
