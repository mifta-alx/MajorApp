@extends('layouts.main-admin')
@section('container-admin')
    <div>
        <livewire:student>
    </div>
@endsection

@section('script')
    <script>
        Livewire.on('closeModal', (id) => {
            id = '#' + id;
            const modal = document.querySelector(id);
            modal.classList.add('hidden');
            const backdrop = document.querySelector('[modal-backdrop]');
            backdrop.classList.add('hidden');
        })
        Livewire.on('hideToast', event => {
            const toast = document.querySelector(".toast");
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 2000);
        })
    </script>
@endsection
