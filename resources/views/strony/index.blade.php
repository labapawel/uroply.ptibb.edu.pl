@extends('strony.main')

@section('title', 'Strona główna')
@section('header', 'Witamy na naszej stronie!')
@section('content')

@auth
    <p>Witaj, {{ Auth::user()->isSuperAdmin()? "SuperAdmin":"" }}!</p>
@endauth

    {{\App\Models\User::find(3)->name}}

    <p>To jest przykładowa strona główna. Możesz dodać tutaj więcej treści.</p>
    <p>Witamy na naszej stronie! To jest przykładowa strona główna. Możesz dodać tutaj więcej treści.</p>
    <p>Witamy na naszej stronie! To jest przykładowa strona główna. Możesz dodać tutaj więcej treści.</p>
    <p>Witamy na naszej stronie! To jest przykładowa strona główna. Możesz dodać tutaj więcej treści.</p>
@endsection