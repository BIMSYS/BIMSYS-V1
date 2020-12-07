@extends('layouts.profileLayout')

@section('profile-content')
<h5 class="text-left">Sekolah</h5>
<h6 class="text-left font-weight-light">{{ $student->sekolah }}</h6>

<hr>

<h5 class="text-left">Kelas</h5>
<h6 class="text-left font-weight-light">{{ $student->kelas }}</h6>
@endsection