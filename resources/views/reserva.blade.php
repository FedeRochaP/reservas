<x-app-layout>
    <div class="calendar__container">
        <div class="calendar">
            <div id='calendar'></div>

            @push('scripts')
                <script src=" https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js "></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const calendarEl = document.getElementById('calendar');
                        const calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'dayGridMonth',
                            events: @json($events)
                        });
                        calendar.render();
                    });
                </script>
            @endpush
            <form action="{{ Route('guardarReserva') }}" method="POST" class="date">
                @csrf
                <div class="date__container">
                    <div class="date__input">
                        <label for="">Fecha de ingreso</label>
                        <x-input type='date' name='start_date' required></x-input>
                    </div>
                    <div class="date__input">
                        <label for="">Fecha de salida</label>
                        <x-input type='date' name='end_date' required></x-input>
                    </div>
                </div>
                <x-input type='hidden' required name='hospedajes_id' value='{{ $id }}'></x-input>
                <x-input type='hidden' required name='user_id' value='{{ auth()->user()->id }}'></x-input>
                <button type='submit' class="btn__reserva">Reservar Fecha</button>
            </form>
            @if (isset($message))
            <script>
                alert('Su registro a sido exitoso');
            </script>
            @endif
        </div>
    </div>
</x-app-layout>
