@extends('layouts.profileLayout')

@section('profile-content')
<h5 class="text-left">Sekolah</h5>
<h6 class="text-left font-weight-light">{{ $auth->sekolah }}</h6>

<hr>

<h5 class="text-left">Kelas</h5>
<h6 class="text-left font-weight-light">{{ $auth->kelas }}</h6>
@endsection