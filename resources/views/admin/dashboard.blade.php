<!DOCTYPE html>
@extends('admin.layouts.app')

@section('title', 'Absensi')

@section('header')
    Absensi
@endsection

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <p class="card-text">
                        Selamat datang di dashboard Admin <b>{{ auth()->user()->name }}</b>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
      