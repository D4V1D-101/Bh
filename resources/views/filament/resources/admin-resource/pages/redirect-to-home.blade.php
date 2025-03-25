{{-- resources/views/filament/pages/redirect-to-home.blade.php --}}
<x-filament::page>
    <script>
        window.location.href = "{{ route('dashboard') }}";
    </script>
</x-filament::page>
