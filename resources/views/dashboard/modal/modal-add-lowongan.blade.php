<div class="modal fade" id="Lowongan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data Lowongan Kerja</h5>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ route('lowongan.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                      <label for="inputName5" class="form-label">Lowongan</label>
                      <input type="text" name="informasi" class="form-control @error('informasi') is-invalid @enderror" id="inputName5" value="{{old('informasi')}}">
                      <input type="hidden" name="pemberi_id" class="form-control" id="inputName5" value="{{auth()->user()->id}}">
                      @error('informasi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                      <label for="inputName5" class="form-label">Perusahaan</label>
                      <input type="text" name="perusahaan" class="form-control @error('perusahaan') is-invalid @enderror" id="inputName5" value="{{old('perusahaan')}}">
                      @error('perusahaan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="col-12">
                      <label for="inputAddress5" class="form-label">Salary</label>
                      <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror" id="inputAddres5s" value="{{old('salary')}}">
                      @error('salary')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="col-12">
                        <label for="inputAddress5" class="form-label">Kategori Lowogan</label>
                        <input type="text" name="kategori_lowongan" class="form-control @error('kategori_lowongan') is-invalid @enderror" id="inputAddres5s" value="{{old('kategori_lowongan')}}">
                        @error('kategori_lowongan')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                      </div>
                      <div class="col-12">
                        <label for="exampleFormControlSelect2">Jenis Lowongan</label>
                        <select name="jenis_lowongan" class="form-control">
                            <option>Pilih Jenis Lowongan</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                          </select>
                      </div>
                    <div class="col-12">
                      <label for="inputAddress2" class="form-label">Pendidikan</label>
                      <input type="text" name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" id="inputAddress2" value="{{old('pendidikan')}}">
                      @error('pendidikan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Pengalaman</label>
                        <input type="text" name="pengalaman" class="form-control @error('pengalaman') is-invalid @enderror" id="inputAddress2" value="{{old('pengalaman')}}">
                        @error('pengalaman')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                      </div>
                    <div class="col-12">
                      <label for="inputAddress2" class="form-label">keterampilan</label>
                      <input type="text" name="keterampilan" class="form-control @error('keterampilan') is-invalid @enderror" id="inputAddress2" value="{{old('keterampilan')}}">
                      @error('keterampilan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="inputCity" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="inputCity">{{old('deskripsi')}}</textarea>
                        @error('deskripsi')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                      </div>
                    <div class="col-md-12">
                      <label for="inputCity" class="form-label">Foto</label>
                      <input class="form-control @error('foto') is-invalid @enderror" name="foto" type="file" id="formFile">
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
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>