@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Report</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('events.update', $get->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ Carbon\Carbon::parse($get->tanggal)->format('Y-m-d') }}" class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('tanggal', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Narasumber</label>
                        <input type="text" name="narasumber"
                            class="form-control {{ $errors->has('narasumber') ? 'is-invalid' : '' }}" value="{{ $get->narasumber }}" required>
                        {!! $errors->first('narasumber', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Deskripsi</label>
                        <input type="text" name="deskripsi"
                            class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" value="{{ $get->deskripsi }}" required>
                        {!! $errors->first('deskripsi', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Link</label>
                        <input type="text" name="link"
                            class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" value="{{ $get->link }}" required>
                        {!! $errors->first('link', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('events.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
