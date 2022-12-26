 
     <fieldset class="p-5">
         {{-- <input type="text" name="id" id="id" hidden value="{{ old('id', $data->id) }}"> --}}
         <div class="mb-3 row">
             <label for="name" class="col-sm-4 col-form-label">Name</label>
             <div class="col-sm-6">
                 <input type="text" class="form-control" id="name" name="name"
                     value="{{ old('name', $data->name) }}" autocomplete="off" required>
             </div>
         </div>
         <div class="mb-3 row">
             <label for="email" class="col-sm-4 col-form-label">Email</label>
             <div class="col-sm-6">
                 <input type="email" class="form-control" id="email" name="email"
                     value="{{ old('email', $data->email) }}" autocomplete="off" required>
             </div>
         </div>
         <div class="mb-3 row">
             <label for="password" class="col-sm-4 col-form-label">Password</label>
             <div class="col-sm-6">
                 <input type="password" class="form-control" id="password" name="password"
                     value="{{ old('password', $data->password) }}" required autocomplete="off">
             </div>
         </div>
         <div class="mb-3 row">
             <label for="password" class="col-sm-4 col-form-label">Comfirm Password</label>
             <div class="col-sm-6">
                 <input type="password" class="form-control" id="password" name="password"
                     value="{{ old('password', $data->password) }}" required autocomplete="off">
             </div>
         </div>
         {{-- <div class="mb-3 row">
             <label for="no_hp" class="col-sm-4 col-form-label">No Hp</label>
             <div class="col-sm-6">
                 <input type="text" class="form-control" id="no_hp" name="no_hp"
                     value="{{ old('no_hp', $data->no_hp) }}" autocomplete="off">
             </div>
         </div> --}}
         {{-- <div class="mb-3 row">
             <label for="kd_wilayah" class="col-sm-4 col-form-label">Kabupaten/Kota</label>
             <div class="col-sm-6">
                 <select name="kd_wilayah" id="kd_wilayah" class="form-select">
                     <option value="00">PROVINSI SUMATERA SELATAN</option>
                     @foreach ($kabs as $kab)
                         <option value="{{ $kab->id_kab }}">{{ $kab->nama_kab }}</option>
                     @endforeach
                 </select>
             </div>
         </div> --}}

         {{-- <div class="mb-3 row">
             <label for="roles" class="col-sm-4 col-form-label">Role</label>
             <div class="col-sm-6">
                 <select name="roles" id="roles" class="form-select">
                     @foreach ($data_roles as $role)
                         <option value="{{ $role->name }}">{{ $role->name }}</option>
                     @endforeach
                 </select>
             </div>
         </div> --}}

         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
             <button class="btn btn-primary" type="submit" id="simpanbtn">simpan</button>
         </div>
     </fieldset>
