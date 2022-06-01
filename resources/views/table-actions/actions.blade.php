<div class="flex space-x-1 justify-around">
    <a wire:click="$emit('{{ $edit }}', {{ $id }})"
        class="p-1 text-sky-800  hover:text-sky-500 rounded cursor-pointer">
        <i class="fas fa-edit"></i>
    </a>

    <a wire:click="$emit('{{ $delete }}', {{ $id }})"
        class="p-1 text-teal-600  hover:text-white rounded cursor-pointer">
        <i class="fa fa-trash text-danger"></i>
    </a>
</div>