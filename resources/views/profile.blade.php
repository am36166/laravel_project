@extends('etudiantpage')
@section('title','Espace etudiant')
@section('style')
.card1 {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body1 {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
@endsection
@section('studentcontent')
<div class="row gutters-sm">
  <div class="col-md-6 mb-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center">
          <img src="{{ asset('storage/'.$etudiant->urlimg) }}" class="rounded-circle" width="150">
          <div class="mt-3">
            <h4>{{ $etudiant->prenom_e }}</h4>
            <p class="text-secondary mb-1">Full Stack Developer</p>
            <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
            <button class="btn btn-primary">Follow</button>
            <button class="btn btn-outline-primary">Message</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 mb-3">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $etudiant->nom_e }} {{ $etudiant->prenom_e }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $etudiant->telephone }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Date de naissance</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $etudiant->date_naissance }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Address</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $etudiant->adresse }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection