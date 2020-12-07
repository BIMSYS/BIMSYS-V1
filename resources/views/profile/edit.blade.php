@extends('layouts.profileLayout')

@section('profile-content')
<form method="post" action="/profile/{{ $student->id }}/edit">
    @method('PATCH')
    @csrf

    <fieldset disable>
        <label for="email" class="d-flex align-items-start">Email</label>
        <div class="input-group mb-3">
            <input type="email" class="form-control-plaintext pl-2" id="email" value="{{ Auth::user()->email }}"
                readonly>

            <div class="input-group-append">
                <div class="input-group-text border-0">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
    </fieldset>

    <label for="name" class="d-flex align-items-start">Nama</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control border-primary" name="name" id="name"
            value="{{ $student->nama_lengkap }}" required autocomplete="name">

        <div class="input-group-append">
            <div class="input-group-text border-primary">
                <span class="fas fa-user"></span>
            </div>
        </div>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <label for="sekolah" class="d-flex align-items-start">Sekolah</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control border-primary" name="sekolah" id="sekolah"
            value="{{ $student->sekolah }}" required autocomplete="sekolah">

        <div class="input-group-append">
            <div class="input-group-text border-primary">
                <span class="fas fa-school"></span>
            </div>
        </div>

        @error('sekolah')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <label for="kelas" class="d-flex align-items-start">Kelas</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control border-primary" name="kelas" id="kelas" value="{{ $student->kelas }}"
            required autocomplete="kelas">

        <div class="input-group-append">
            <div class="input-group-text border-primary">
                <span class="fas fa-chalkboard-teacher"></span>
            </div>
        </div>

        @error('kelas')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-block">Update</button>
</form>
@endsection