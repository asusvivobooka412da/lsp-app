@extends('template.main')
@section('title','tambahsurat')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title"> <b>
                Arsip Surat >> Unggah</div>
            </b> 
            <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan <br>
            Catatan: <br>
            &nbsp; 
           <b> *Gunakan file berformat PDF </b> </p>
        </div>
        </div>
        </div>
        

        <form action="/surat/store" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nomor Surat</label>
                        <input type="text" name="nomer_surat" class="form-control" placeholder="Masukkan Nomor Surat...">
                    </div>
                    @if($errors->has('nomer_surat'))
                    <div class="text-danger">
                        {{ $errors->first('nomer_surat')}}
                    </div>
            @endif
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="id_kategori">
                        @foreach ($kategori as $item)
                        <option value="{{$item->id}}">{{$item->kategori}}</option>
                        @endforeach
                        </select>
                    </div>
                    @if($errors->has('id_kategori'))
                    <div class="text-danger">
                        {{ $errors->first('id_kategori')}}
                    </div>
            @endif
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" placeholder="Masukkan Judul" name="judul" >
                    </div>
                    @if($errors->has('judul'))
                    <div class="text-danger">
                        {{ $errors->first('judul')}}
                    </div>
            @endif
                    <div class="form-group">
                        <label>File Surat (PDF)</label>
                        <input type="file" accept="application/pdf" class="form-control" name="file">
                    </div>
                    @if($errors->has('file'))
                    <div class="text-danger">
                        {{ $errors->first('file')}}
                    </div>
            @endif
                </div>
            </div>

            <div class="form-group">
                <a href="{{ URL::previous() }}" class="btn btn-success"><i class="
                    fas fa-angle-double-left"></i> &nbsp; Kembali</a>
                <button class="btn btn-primary" type="submit" onclik="return confirm('Apakah data anda sudah benar?')"><i class="fas fa-check"></i> &nbsp;Simpan</button>
                </div>
        </div>
</form>

@endsection