@extends('layouts.app')

@section('content')

<!-- MAIN -->

<main style="max-width:800px; margin:10px auto;">

     <!-- CARD TABLE -->

     <div class="card" style="background-color:#334756; margin:20px;">
          <div class="card-header" style="background-color:#2C394B; font-weight:bold;">
               Table Golongan
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
                              <form action="golongan/store" method="POST">
                                    @csrf
                                   <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Create Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body" style="background-color:#334756;">
                                        <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Kode</label>
                                             <input type="text" class="form-control" id="gol_kode" name="gol_kode" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Nama</label>
                                             <input type="text" class="form-control" id="gol_nama" name="gol_nama" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Created_at</label>
                                             <input type="datetime-local" class="form-control" id="created_at" name="created_at" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Updated_at</label>
                                             <input type="datetime-local" class="form-control" id="updated_at" name="updated_at" aria-describedby="emailHelp">
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

               <form action="golongan/search" method="GET">
                    <div class="mb-3 row">
                         <div class="col-sm-6">
                              <input type="text" class="form-control" id="search" name="search" autofocus value="{{ old('cari') }}">
                         </div>
                         <div class="col-sm-1">
                              <button type="submit" class="btn btn-light">Search</button>
                         </div>
                    </div>
               </form>

               <!-- TABLE  -->

               <table class="table table-hover text-white">
                    <thead>
                         <tr>
                              <th scope="col">Kode</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Created_at</th>
                              <th scope="col">Updated_at</th>
                              <th colspan="2" scope="col">Action</th>
                         </tr>
                    </thead>
                    <tbody>
                        @foreach($golongan as $gol)
                              <tr>
                                   <td>{{ $gol->gol_kode }} </td>
                                   <td>{{ $gol->gol_nama }} </td>
                                   <td>{{ $gol->created_at }} </td>
                                   <td>{{ $gol->updated_at}} </td>
                                   <td scope="row">

                                        <!-- BUTTON EDIT DATA-->

                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $gol->gol_id }}">
                                             Edit
                                        </button>

                                        <!-- POPUP MODAL EDIT DATA  -->

                                        <div class="modal fade" id="modalEdit{{ $gol->gol_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                  <div class="modal-content" style="background-color:#2C394B; color:white;">
                                                       <form action="golongan/{{ $gol->gol_id }}" method="POST">
                                                        @method('PATCH')
                                                        @csrf
                                                        <div class="modal-header">
                                                                 <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body" style="background-color:#334756;">
                                                                <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Kode</label>
                                                                      <input type="text" class="form-control" id="gol_kode" name="gol_kode" value="{{ $gol->gol_kode }}" aria-describedby="emailHelp">
                                                                 </div>
                                                                 <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Nama</label>
                                                                      <input type="text" class="form-control" id="gol_nama" name="gol_nama" value="{{ $gol->gol_nama }}" aria-describedby="emailHelp">
                                                                 </div>
                                                                 <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Created_at</label>
                                                                      <input type="datetime-local" class="form-control" id="created_at" name="created_at" value="{{  date('Y-m-d\TH:i:s', strtotime($gol->created_at)) }}" aria-describedby="emailHelp">
                                                                 </div>
                                                                 <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Updated_at</label>
                                                                      <input type="datetime-local" class="form-control" id="updated_at" name="updated_at" value="{{ date('Y-m-d\TH:i:s', strtotime($gol->updated_at)) }}" aria-describedby="emailHelp">
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

                                        <a href="golongan/{{$gol->gol_id}}" onclick="return confirm('yakin ingin menghapus data?')">
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
