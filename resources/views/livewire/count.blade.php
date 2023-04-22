<div>
    <input type="text" wire:model="search">
    {{$search}}
    <div>Compteur : {{$count}}</div>
    <button wire:click="increment">Incrémenter</button>
</div>
