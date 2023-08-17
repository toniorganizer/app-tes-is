<div class="modal fade" id="edit-tk{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" role="document">
                <h5 class="modal-title" id="exampleModalLabel">Edit data tenaga kerja </h5><p class="font-weight-bold"> {{$data->nama_lengkap}}</p>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="edit-tenaga-kerja" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                      <label for="inputName5" class="form-label">Username</label>
                      <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" id="inputName5" value="{{$data->username}}" readonly>
                      @error('username')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="inputAddress5" class="form-label">E-mail</label>
                        <input type="text" name="email_pk" id="email_pk" class="form-control @error('email') is-invalid @enderror" id="inputAddres5s" value="{{$data->email_pk}}" readonly>
                        @error('email')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                      </div>
                    <div class="col-md-12">
                      <label for="inputName5" class="form-label">Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control @error('nama') is-invalid @enderror" id="inputName5" value="{{$data->nama_lengkap}}">
                      @error('nama')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="col-12">
                      <label for="inputAddress2" class="form-label">Alamat</label>
                      <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" id="inputAddress2" value="{{$data->alamat}}">
                      @error('alamat')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="col-12">
                      <label for="inputAddress2" class="form-label">Pendidikan</label>
                      <input type="text" name="pendidikan" id="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" id="inputAddress2" value="{{$data->pendidikan}}">
                      @error('pendidikan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="col-md-12">
                      <label for="inputCity" class="form-label">Keterampilan</label>
                      <input type="text" name="keterampilan" id="keterampilan" class="form-control @error('keterampilan') is-invalid @enderror" id="inputCity" value="{{$data->keterampilan}}">
                      @error('keterampilan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="inputCity" class="form-label">No. Handphone</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="inputCity" value="{{$data->no_hp}}">
                        @error('no_hp')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                      </div>
                    <div class="col-md-12">
                        <label for="inputCity" class="form-label">Tentang</label>
                        <textarea name="tentang" id="tentang" class="form-control @error('tentang') is-invalid @enderror" id="inputCity">{{$data->tentang}}</textarea>
                        @error('tentang')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                      </div>
                    <div class="col-md-12">
                      <label for="inputCity" class="form-label">Foto</label><br>
                      <img src="{{ Storage::url('public/tenaga-kerja/').$data->foto}}" width="100" height="40" class="img-thumbnail mb-2" alt="">
                      <input class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto"type="file" id="formFile">
                      @error('foto')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                      <small id="emailHelp" class="form-text text-muted">File max. 150 KB</small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>
