@extends('layouts.main-admin')
@section('container-admin')
    <div>
        <livewire:major>
    </div>
@endsection
@section('script')
<script>
    function focusInput() {
        var inputElement = document.getElementById('input-group-search');
        inputElement.focus();
    }
</script>
@endsection
