@extends('dashboard.layouts.main')
@section('container')
<section class="course-detail section-padding course-bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">
          <div class="img box p-0">
            @if ($training->thumbnail)
                <img loading="lazy" src="{{ asset('storage/' .$training->thumbnail) }}" class="img-fluid w-100"
                alt="{{ $training->thumbnail }}">
            @endif
          </div>
          <div
            class="title-group box d-grid bg-white top-0 d-inline d-md-none"
          >
            <div class="course-title mb-3">
              <h1
                class="display-6"
                style="
                  font-size: 24px;
                  font-weight: 700;
                  color: var(--dark-to-main-color);
                "
              >
                {{ $training->name }}
              </h1>
            </div>
            <div class="course-benefit mb-3">
              <span>Fasilitas Training</span>
              {!! $training->facility !!}
            </div>
            @if( $training->pricelist )
            <hr />
            <div class="price-list mb-2 mt-2">
              <span class="fw-bold">Biaya Training</span>
              <br />
              <span>{!! $training->pricelist !!}</span>
            </div>
            @endif
          </div>
          <div class="schedule-section box">
            <h4 class="course-title text-capitalize text-center">
              Jadwal Training Terdekat
            </h4>
            @if($training->event->count())
            <div class="course-schedules mb-3">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Skema</th>
                    <th scope="col">Jadwal</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($events as $event)
                  <tr>
                    <td>{{ $event->scheme }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                      <a>
                        <form action="/dashboard/events/{{ $event->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger btn-sm m-auto" onclick="return confirm('Apa kamu yakin?')"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @endif
            <div class="course-schedules mb-3">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Skema</th>
                    <th scope="col">Jadwal</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <form
                method="POST"
                action="/dashboard/events"
                class="mb-5"
                enctype="multipart/form-data"
                >
                @csrf
                  <tbody>
                    <tr>
                      <td hidden>
                        <input type="text" class="form-control" id="training_id" name="training_id" required value="{{ $training->id }}" placeholder="{{ $training->id }}">
                      </td>
                      <td>
                        <input type="text" class="form-control @error('scheme') is-invalid @enderror" id="scheme" name="scheme" required value="{{ old('scheme') }}" placeholder="Masukkan Skema">
                          @error('scheme')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                      </td>  
                      <td>
                        <input type="text" class="form-control @error('date') is-invalid @enderror" id="date" name="date" required value="{{ old('date') }}" placeholder="Masukkan Tanggal">
                          @error('date')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                      </td>  
                      <td>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" required value="{{ old('location') }}" placeholder="Masukkan Lokasi">
                          @error('location')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                      </td> 
                      <td>
                        <button type="submit" class="btn btn-success">
                          <i class="fa-solid fa-plus"></i>
                        </button>
                      </td>  
                    </tr>
                  </tbody>
                </form>
              </table>
            </div>
          </div>
          @if($training->description != NULL)
          <div class="description-section box">
            <h4 class="course-title text-capitalize text-center">
              Deskripsi
            </h4>
            <div class="desc-content">
              {!! $training->description !!}
            </div>
          </div>
          @endif
          @if($training->outline != NULL)
          <div class="outline-section box">
            <h4 class="course-title text-capitalize text-center">Materi</h4>
            <div class="outline-content">
                {!! $training->outline !!}
            </div>
          </div>
          @endif
          @if($training->requirement != NULL)
          <div class="participant-section box">
            <h4 class="course-title text-capitalize text-center">
              Persyaratan
            </h4>
            <div class="participant-content">
                {!! $training->requirement !!}
            </div>
          </div>
          @endif
          @if($training->method != NULL)
          <div class="method-section box">
            <h4 class="course-title text-capitalize text-center">Metode</h4>
            <div class="objective-content text-center">
                <b>{{ $training->platform }}</b><br/>
                {!! $training->method !!}
            </div>
          </div>
          @endif
        </div>
        <div class="col-md-5 d-none d-md-inline">
          <div
            class="title-group box d-grid bg-white position-sticky top-0"
          >
            <div class="course-title mb-3">
              <h1
                class="display-6"
                style="
                  font-size: 24px;
                  font-weight: 700;
                  color: var(--dark-to-main-color);
                "
              >
              {{ $training->name }}
              </h1>
            </div>
            @if($training->facility != NULL)
            <div class="course-benefit mb-3">
              <span>Fasilitas Training</span>
              {!! $training->facility !!}
            </div>
            @endif
            @if($training->pricelist != NULL)
            <hr />
            <div class="price-list mb-2 mt-2">
              <span class="fw-bold">Biaya Training</span>
              <br />
              <span>{!! $training->pricelist !!}</span>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
</section>
@endsection

@section('myjsfile')
<script type="text/javascript">
  var i = 0;
  $("#add").click(function(){ 
    ++i;
    $("#dynamicTable").append('<tr><td><input type="text" name="addMore['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="addMore['+i+'][qty]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="addMore['+i+'][price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
  });
  $(document).on('click', '.remove-tr', function(){  
    $(this).parents('tr').remove();
  });  
</script>
@endsection