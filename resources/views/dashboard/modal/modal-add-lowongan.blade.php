<div class="modal fade" id="lowongan" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data Lowongan Kerjaa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ Route('lowongan.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                      <label for="inputName5" class="form-label">Lowongan</label>
                      <input type="text" name="informasi" class="form-control @error('informasi') is-invalid @enderror" id="inputName5" value="{{old('informasi')}}">
                      <input type="hidden" name="pemberi_id" class="form-control @error('pemberi_id') is-invalid @enderror" id="inputName5" value="{{Auth::user()->id_user}}">
                      {{-- <input type="hidden" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="inputName5" value="-"> --}}
                      @error('informasi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="inputAddress5" class="form-label">Nama Perusahaan</label>
                        <input type="text" name="perusahaan" class="form-control @error('perusahaan') is-invalid @enderror" id="inputAddres5s" value="{{old('perusahaan')}}">
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
                    <div class="col-12 select2-container mt-2">
                        <label for="inputAddress5" class="form-label">Bidang Lowogan</label>
                        <select name="bidang" class="selectpicker select2-selection" id="mySelect" data-live-search="true">
                          <option>Pilih Bidang Lowongan</option>
                          <option value="Pembangkit Tenaga Listrik">Pembangkit Tenaga Listrik</option>
                          <option value="Instalasi Pemanfaatan Tenaga Listrik">Instalasi Pemanfaatan Tenaga Listrik</option>
                          <option value="Transmisi Tenaga Listrik">Transmisi Tenaga Listrik</option>
                          <option value="Distribusi Tenaga Listrik">Distribusi Tenaga Listrik</option>
                          <option value="Fotografi">Fotografi</option>
                          <option value="Perposan">Perposan</option>
                          <option value="Animasi">Animasi</option>
                          <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                          <option value="Multimedia">Multimedia</option>
                          <option value="Penyiaran Radio">Penyiaran Radio</option>
                          <option value="Penyiaran TV">Penyiaran TV</option>
                          <option value="Periklanan">Periklanan</option>
                          <option value="Kehumasan">Kehumasan</option>
                          <option value="Penerbitan">Penerbitan</option>
                          <option value="Telekomunikasi">Telekomunikasi</option>
                          <option value="Otomotif">Otomotif</option>
                          <option value="Budidaya Tanaman">Budidaya Tanaman</option>
                          <option value="Kesehatan Hewan">Kesehatan Hewan</option>
                          <option value="Peternakan">Peternakan</option>
                          <option value="Teknologi Pertanian">Teknologi Pertanian</option>
                          <option value="Manajemen dan Agribisnis">Manajemen dan Agribisnis</option>
                          <option value="Penyuluhan Pertanian">Penyuluhan Pertanian</option>
                          <option value="Data Management System">Data Management System</option>
                          <option value="Programming and Software Development">Programming and Software Development</option>
                          <option value="Hardware and Digital Peripherals">Hardware and Digital Peripherals</option>
                          <option value="Network and Infrastructure">Network and Infrastructure</option>
                          <option value="Operation and System Tools">Operation and System Tools</option>
                          <option value="Information System and Technology Development">Information System and Technology Development</option>
                          <option value="IT Governance and Management">IT Governance and Management</option>
                          <option value="IT Project Management">IT Project Management</option>
                          <option value="IT Enterprise Architecture">IT Enterprise Architecture</option>
                          <option value="IT Security and Compliance">IT Security and Compliance</option>
                          <option value="IT Services Management System">IT Services Management System</option>
                          <option value="IT and Computing Facilities Management">IT and Computing Facilities Management</option>
                          <option value="IT Multimedia">IT Multimedia</option>
                          <option value="IT Mobility and Internet of Things">IT Mobility and Internet of Things</option>
                          <option value="Integration Application System">Integration Application System</option>
                          <option value="IT Consultancy and Advisory">IT Consultancy and Advisory</option>
                          <option value="Lainnya">Lainnya</option>
                        </select>
                      </div>
                      <div class="col-12">
                        <label for="inputAddress5" class="form-label">Jurusan yang dibutuhkan</label>
                        <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" id="inputAddres5s" value="{{old('jurusan')}}">
                        @error('jurusan')
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
                    <div class="col-12">
                      <label for="exampleFormControlSelect2">Kebutuhan Jenis Kelamin</label>
                      <select name="jenis_kelamin" class="form-control">
                          <option>Pilih Jenis Kelamin</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                          <option value="Laki-laki/Perempuan">Laki-laki/Perempuan</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Tanggal Dibuka</label>
                        <input type="date" name="tgl_buka" class="form-control @error('tgl_buka') is-invalid @enderror" id="inputAddress2" value="{{old('tgl_buka')}}">
                        @error('tgl_buka')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                      </div>
                      <div class="col-12">
                        <label for="inputAddress2" class="form-label">Tanggal Tutup</label>
                        <input type="date" name="tgl_tutup" class="form-control @error('tgl_tutup') is-invalid @enderror" id="inputAddress2" value="{{old('tgl_tutup')}}">
                        @error('tgl_tutup')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                      </div>
                      <div class="col-md-12">
                        <label for="inputCity" class="form-label">Lokasi</label>
                        <input name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" id="inputCity" value="{{old('lokasi')}}">
                        @error('lokasi')
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

                    <div class="col-md-12">
                      <label for="inputCity" class="form-label">Deskripsi Informasi Lowongan</label>
                      <textarea name="deskripsi" class="editor" id="editor" cols="30" rows="10"></textarea>
                      @error('lokasi')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
            </div>
            <div class="modal-footer">
              <div class="col-12">
                <small id="emailHelp" class="form-text text-muted mb-2">Updata data dapat dilakukan di halaman data lowongan tombol lengkapi data</small>
                  <button  type="submit" class="btn btn-primary w-100">Simpan</button>
              </div>
          </div>
        </form>
        </div>
    </div>
</div>

<script>
  $(document).ready(function(){
    $('#mySelect').select2();
  });
</script>