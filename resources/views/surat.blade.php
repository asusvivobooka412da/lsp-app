@extends('template.main')
@section('title','Arsip Surat')
@section('content')



<div class="col-12">
            <div class="card">
<div class="card-header">
<h6>Berikut ini adalah surat-surat yang lebih dan diarsipkan. <br>
                Klik "Lihat" pada kolom aksi untuk menampilkan surat.
                </h6>               
</div>

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
<!-- /.card -->
<div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="basic-datatables" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Nomor Surat</th>
                  <th>Kategori</th>
                  <th>Judul</th>
                  <th>Waktu Pengarsipan</th>
                  <th>Aksi</th>    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($surat as $s)
                  <tr>
                                <td>{{$s->nomer_surat}}</td>              
                                <td>{{$s->kategori}}</td>    
                                <td>{{$s->judul}}</td>
                                <td>{{$s->created_at}}</td>
                                <td>
                                    <a href="/surat/hapus/{{ $s->id }}" id="btnHapus{{$s->id}}"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                                    <script>
                            $('#btnHapus{{$s->id}}').on('click', function(e){
                            e.preventDefault();
                            Swal.fire({
                            title: 'Apa anda yakin ingin menghapus data?',
                            icon: 'warning',
                            showCancelButton: true,
                            cancelButtonText: 'Tidak',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, Hapus data!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.replace('/surat/hapus/{{ $s->id }}');
                                }
                            });
                        })
                                    </script>
                                    <a href="{{asset('doc')}}/{{$s->file}}"  target="_blank" class="btn btn-warning btn-sm"><i class="
                                        far fa-save"></i> Unduh</a>
                                    <a href="/surat/lihat/{{ $s->id }}" class="btn btn-info btn-sm"><i class="
                                        fas fa-eye"></i> Lihat</a>
                    
                                </td>
                            </tr>
                            @endforeach
                  </tbody>


                </table>
                        <br>
                <div class="container" style="margin-left: -15px;">
                        <a href="/surat/tambah" class="btn btn-primary">Arsipkan Surat</a>
                     </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->


      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous"></script>
    {{-- js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
            "columnDefs": [{
                "orderable": false,
                "searchable": true,
                "targets": 1
            }],
            "aLengthMenu": [
                [5, 10, 25, -1],
                [5, 10, 25, "All"]
            ],
            "iDisplayLength": 5
        });
    });
    /* Because i didnt set placeholder values in forms.py they will be set here using vanilla Javascript
    //We start indexing at one because CSRF_token is considered and input field
     */
    
    //Query All input fields
    var select_fields = document.getElementsByTagName('select')
    
    var input_fields = document.getElementsByTagName('input')
    
    
    for (var field in select_fields) {
        select_fields[field].className += ' form-control'
    }
    for (var field in input_fields) {
        input_fields[field].className += ' form-control'
    }
    </script>
{{-- sweet alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>

@if(Session::has('add1'))
    <script>
        swal("Great Job!","{!! Session::get('add1') !!}","success",{
            button:"OK",
        });
    </script>
@endif
@if(Session::has('delsur'))
    <script>
        swal("Great Job!","{!! Session::get('delsur') !!}","success",{
            button:"OK",
        });
    </script>
@endif
@if(Session::has('upd2'))
    <script>
        swal("Great Job!","{!! Session::get('upd2') !!}","success",{
            button:"OK",
        });
    </script>
@endif

@endsection