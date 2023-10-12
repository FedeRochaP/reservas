<div class="hospedajes">
    <div class="search">
        <x-input placeholder="Buscar por tipo de alojamiento. Ej: Casa, Hotel, etc" type="text"
            wire:model.live='search' />
    </div>
    <div class="cards">
        @foreach ($hospedajes as $item)
            <div class="card">

                <img src="{{ Storage::url($item->image) }}" alt="">
                <div>
                    <h2>{{ $item->title }}</h2>
                    <p>${{ $item->price }}</p>
                </div>

                <x-button class="btn__info" wire:click='showModal({{ $item }})'>Mas información</x-button>
            </div>
        @endforeach
        @if ($hospedaje != null)
            <x-dialog-modal wire:model.live="open">

                <x-slot name="title">
                    <div class="modal__title">
                        <h2>{{ $hospedaje->title }}</h2>
                        <i class='bx bx-x' wire:click="closeModal"></i>
                    </div>
                </x-slot>
                <x-slot name="content">
                    <div class="modal__content">
                        <img src="{{ Storage::url($hospedaje->image) }}" alt="">
                        <p>{{ $hospedaje->description }}</p>
                        <p>
                            Categoria:
                            <span>{{ $hospedaje->category }}</span>
                        </p>
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <a class="btn__reserva" href="{{route('reserva',$hospedaje->id)}}">Reservar</a>
                </x-slot>
            </x-dialog-modal>
        @endif
    </div>
    <div class="pagination">
        {{ $hospedajes->links() }}
    </div>
</div>
