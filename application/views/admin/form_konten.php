<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded h-100 p-4">
        <h2 class="mb-4">Tambahkan Konten</h2>
        <form action="<?= isset($konten)? base_url('admin/konten/update_konten/').$konten['id_konten']: base_url('admin/konten/simpan')?>" method="post">
            <div class="form-group mb-3">
                <label for="floatingPassword">Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Judul" id="floatingPassword" value="<?= isset($konten['judul'])? $konten['judul']:''?>">
            </div>
            <div class="form-group mb-3">
                <label for="floatingPassword">Kategori</label>
                <select name="kategori" class="form-control" id="">
                    <?php foreach($kategori as $fer){ ?>
                        <option <?= isset($konten) && $fer->id_kategori == $konten->id_kategori ? 'selected' : '' ?> value="<?= $fer->id_kategori ?>"><?= $fer->nama_kategori ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="floatingPassword">Isi</label>
                <textarea name="keterangan" placeholder="Isi Konten" id="keterangan" rows="10" class="form-control"><?= isset($konten)? $konten->keterangan : '' ?></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="foto">Foto</label>
                <input type="file" name="foto" class="form-control" id="foto">
            </div>
            <button type="submit" class="btn btn-primary m-2">Simpan</button>
        </form>
    </div>
</div>