<div>
    <input wire:model="name" type="text">
    <input wire:model="checkbox" type="checkbox">
    <select wire:model="select">
        <option>Hello</option>
        <option>Goodbye</option>
        <option>See You</option>
    </select>
    {{ $select }} {{ $name }} @if ($checkbox) salah @endif
</div>
