@extends('dashboard.layouts.main')

@section('container')

<!-- message Start -->
<div class="message-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboard" class="text-primary"
                ><i class="fa-solid fa-house-user"></i
              ></a>
            </li>
            <li class="breadcrumb-item">
              <a href="/dashboard/messages" class="text-primary">
                <i class="fa-solid fa-envelope"></i
              ></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              <i class="fa-solid fa-eye me-1"></i> Lihat Pesan
            </li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="message-data border-0 mb-0 pb-0">
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Nama</label>
            <p>
              <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $message->name }}
            </p>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label mb-0">Email</label>
            <p class="ms-2">
              <i class="fa-solid fa-caret-right me-2"></i
              >{{ $message->email }}
            </p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Pesan</label>
            <p class="ms-2">
              <i class="fa-solid fa-caret-right me-2"></i>{{ $message->message }}
            </p>
          </div>
          <div class="mb-3">
            <label for="progress" class="form-label mb-0"
              >Status Follow Up</label
            >
            <p class="ms-2">
              <i class="fa-solid fa-caret-right me-2"></i>{{ $message->progress }}
            </p>
          </div>
          <div class="mb-3">
            <label for="staff-name" class="form-label mb-0"
              >Nama CS</label
            >
            <p class="ms-2">
              <i class="fa-solid fa-caret-right me-2"></i>
                @if ($message->staff)
                    {{ $message->staff->name }}
                @else
                    <span>Belum Ditindaklanjuti CS</span>
                @endif
            </p>
          </div>
          {{-- <div class="mb-0">
            <button type="submit" class="btn btn-success me-1">
              <i class="fa-solid fa-arrow-left me-1"></i>Kembali
            </button>
            <a
              href="/dashboard/messages/{{ $message->slug }}/edit"
              class="btn btn-secondary m-auto"
            >
              <i class="fa-solid fa-pencil me-1"></i> Edit
            </a>
          </div> --}}
          <div class="mb-0">
            <a href="/dashboard/messages" class="btn btn-success me-1">
              <i class="fa-solid fa-arrow-left me-1"></i>Kembali
            </a>
            <a href="{{ route('messages.edit', $message->id) }}" class="btn btn-secondary m-auto">
              <i class="fa-solid fa-pencil me-1"></i> Edit
            </a>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- message end -->

@endsection