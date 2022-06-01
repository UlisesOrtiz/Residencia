<div class="flex space-x-1 justify-around">
    <input type="text" wire:change="$set('state.mark{{ $id }}', '$event.target.value')" class="p-1 text-sky-800  hover:text-sky-500 rounded border-teal-400" />

    <a wire:click="updateMark({{ $value }})"
        class="p-1 text-teal-600  hover:text-white rounded cursor-pointer">
        <i class="fa fa-paper-plane text-info"></i>
    </a>
</div>

