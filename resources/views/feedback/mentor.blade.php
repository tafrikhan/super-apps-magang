@extends('mentor.layouts.app') <!-- Pastikan menggunakan layout yang sesuai -->

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Umpan Balik</h1>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mt-4">
        @foreach ($feedbacks as $feedback)
            <div class="col-12 col-sm-6 col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $feedback->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $feedback->email }}</h6>
                        <p class="card-text">{{ $feedback->message }}</p>
                        <p class="card-text">
                            <small class="text-muted">Dikirim pada {{ $feedback->created_at }}</small>
                        </p>
                        <!-- Hanya menampilkan informasi tanpa tombol hapus -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

<style>
.card {
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
}

.card-body {
    word-wrap: break-word; /* Memastikan teks panjang ter-wrap dengan baik */
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
}

.card-subtitle {
    font-size: 0.875rem;
    color: #6c757d;
}

.card-text {
    margin: 0.5rem 0;
}

.alert {
    border-radius: 0.5rem;
}
</style>
