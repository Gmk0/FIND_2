@props(['image' => null])

<img src="{{ Storage::disk('local')->url('profiles-photos/'.$image) }}" alt="Photo de profil">