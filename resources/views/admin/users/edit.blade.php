@extends('layouts.app')
@section('users', 'active')
@section('content')
    @include('admin.users.form', ['action' => route('admin.users.update', $user), 'isEdit' => true])
@endsection