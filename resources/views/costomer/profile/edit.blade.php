@extends('layouts.home')
@section('title', 'Thông tin cá nhân')
@section('content')
 <section style="background-color: #eee;">
        <div class="container py-5">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ asset('uploads/'.Auth::user()->image) }}"
                                alt="avatar" class="rounded-circle img-fluid m-3" style="width: 150px;">
                           
                            
                @include('costomer.profile.form', ['isEdit' => true])
                    
                </div>
            </div>
        </div>
    </section>
@endsection