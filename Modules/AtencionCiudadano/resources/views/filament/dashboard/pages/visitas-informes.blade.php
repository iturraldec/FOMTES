{{-- filepath: /var/www/html/aplicaciones/fomtes/Modules/AtencionCiudadano/resources/views/index.blade.php --}}
<x-atencionciudadano::layouts.master>
    <h1>Generar Reporte</h1>

    <x-filament::form
        method="POST"
        action="#"
        class="space-y-6"
    >
        @csrf

        <x-filament::select
            name="tipo_reporte"
            label="Tipo de reporte"
            required
        >
            <option value="estadisticas">Estadísticas</option>
            <option value="listado">Listado</option>
        </x-filament::select>

        <x-filament::input
            name="desde"
            label="Desde"
            type="date"
            required
        />

        <x-filament::input
            name="hasta"
            label="Hasta"
            type="date"
            required
        />

        <x-filament::button type="submit" color="primary">
            Generar
        </x-filament::button>
    </x-filament::form>
</x-atencionciudadano::layouts.master>