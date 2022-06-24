@extends('layouts.app')

@section('content')
<main style="max-width:800px; margin:10px auto;">
    <div class="card" style="background-color:#334756; margin:20px;">
         <div class="card-header" style="background-color:#2C394B; font-weight:bold;">
              Table Pelanggan
         </div>
         <div class="card-body">

              <!-- BUTTON ADD DATA -->

              <div class="mb-3 row">
                   <button type="button" class="btn btn-primary col-sm-2" style="background-color: #FF4C29; border: 1px solid #FF4C29; margin-left:12px;" data-bs-toggle="modal" data-bs-target="#modalCreate">
                        Add Data
                   </button>
              </div>

              <!-- POPUP MODAL CREATE DATA -->

              <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog">
                        <div class="modal-content" style="background-color:#2C394B;">
                             <form action="pelanggan/store" method="POST">
                                   @csrf
                                  <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Create Data</h5>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body" style="background-color:#334756;">
                                       <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nomor</label>
                                            <input type="text" class="form-control" id="pel_no" name="pel_no" aria-describedby="emailHelp">
                                       </div>
                                       <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="pel_nama" name="pel_nama" aria-describedby="emailHelp">
                                       </div>
                                       <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" id="pel_alamat" name="pel_alamat" aria-describedby="emailHelp">
                                       </div>
                                       <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">No Hp</label>
                                        <input type="text" class="form-control" id="pel_hp" name="pel_hp" aria-describedby="emailHelp">
                                   </div>
                                  </div>
                                  <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                       <button type="submit" name="submit" class="btn btn-primary" style="background-color: #FF4C29; border: 1px solid #FF4C29;">Save changes</button>
                                  </div>
                             </form>
                        </div>
                   </div>
              </div>

              <!-- SEARCH -->

              <form action="pelanggan/cari" method="POST">
                   <div class="mb-3 row">
                        <div class="col-sm-6">
                             <input type="text" class="form-control" name="keyword" autofocus>
                        </div>
                        <div class="col-sm-1">
                             <button type="submit" name="btnSearch" class="btn btn-light">Search</button>
                        </div>
                   </div>
              </form>

              <!-- TABLE  -->

              <table class="table table-hover text-white">
                   <thead>
                        <tr>
                             <th scope="col">Nomor</th>
                             <th scope="col">Nama</th>
                             <th scope="col">Alamat</th>
                             <th scope="col">No Hp</th>
                             <th colspan="2" scope="col">Action</th>
                        </tr>
                   </thead>
                   <tbody>
                    @foreach($pelanggan as $pel)
                            <tr>
                                  <td>{{ $pel->pel_no }}</td>
                                  <td>{{ $pel->pel_nama }}</td>
                                  <td>{{ $pel->pel_alamat }}</td>
                                  <td>{{ $pel->pel_hp }}</td>
                                  <td scope="row">

                                       <!-- BUTTON EDIT DATA-->

                                       <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $pel->pel_id }}">
                                            Edit
                                       </button>

                                       <!-- POPUP MODAL EDIT DATA  -->

                                       <div class="modal fade" id="modalEdit{{ $pel->pel_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                 <div class="modal-content" style="background-color:#2C394B; color:white;">
                                                      <form action="pelanggan/{{ $pel->pel_id }}" method="POST">
                                                            @method("PATCH")
                                                            @csrf
                                                           <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                           </div>
                                                           <div class="modal-body" style="background-color:#334756;">
                                                                <div class="mb-3">
                                                                     <label for="exampleInputEmail1" class="form-label">Nomor</label>
                                                                     <input type="text" class="form-control" id="pel_kode" name="pel_no" value="{{ $pel->pel_no }}" aria-describedby="emailHelp">
                                                                </div>
                                                                <div class="mb-3">
                                                                     <label for="exampleInputEmail1" class="form-label">Nama</label>
                                                                     <input type="text" class="form-control" id="pel_nama" name="pel_nama" value="{{ $pel->pel_nama }}" aria-describedby="emailHelp">
                                                                </div>
                                                                <div class="mb-3">
                                                                     <label for="exampleInputEmail1" class="form-label">Id User</label>
                                                                     <input type="text" class="form-control" id="pel_alamat" name="pel_alamat" value="{{ $pel->pel_alamat }}" aria-describedby="emailHelp">
                                                                </div>
                                                                <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Id User</label>
                                                                      <input type="text" class="form-control" id="pel_hp" name="pel_hp" value="{{ $pel->pel_hp }}" aria-describedby="emailHelp">
                                                                 </div>
                                                           </div>
                                                           <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="submit" class="btn btn-primary" style="background-color: #FF4C29; border: 1px solid #FF4C29;">Save changes</button>
                                                           </div>
                                                      </form>
                                                 </div>
                                            </div>
                                       </div>

                                       <!-- BUTTON DELETE DATA  -->

                                       <a href="pelanggan/{{ $pel->pel_id }}" onclick="return confirm('yakin ingin menghapus data?')">
                                            <button type="button" class="btn btn-danger">Delete</button>
                                       </a>
                                  </td>
                             </tr>
                        @endforeach
                   </tbody>
              </table>
         </div>
    </div>
</main>
@endsection
