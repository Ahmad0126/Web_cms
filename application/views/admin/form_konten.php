<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded h-100 p-4">
        <h2 class="mb-4"><?= isset($konten)? 'Edit' : 'Tambahkan' ?> Konten</h2>
        <form action="<?= isset($konten)? base_url('admin/konten/update_konten/').$konten['id_konten']: base_url('admin/konten/simpan')?>" method="post" enctype="multipart/form-data">
            <?php if(isset($konten)){ ?>
            <input type="hidden" name="nama_foto" value="<?= $konten['foto'] ?>">
            <?php } ?>
            <div class="form-group mb-3">
                <label for="floatingPassword">Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Judul" id="floatingPassword" value="<?= isset($konten['judul'])? $konten['judul']:''?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="floatingPassword">Kategori</label>
                <select name="kategori" class="form-control" id="">
                    <?php foreach($kategori as $fer){ ?>
                        <option <?= isset($konten) && $fer->id_kategori == $konten['id_kategori'] ? 'selected' : '' ?> value="<?= $fer->id_kategori ?>"><?= $fer->nama_kategori ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="konten">Isi</label>
                <textarea name="keterangan" placeholder="Isi Konten" id="konten" rows="10" class="form-control"><?= isset($konten)? $konten['keterangan'] : '' ?></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="foto"><?= isset($konten)? 'Ganti foto' : 'Foto' ?></label>
                <input type="file" name="foto" class="form-control" id="foto" accept="image/jpeg" <?= isset($konten)? '' : 'required' ?>>
            </div>
            <button type="submit" class="btn btn-primary m-2">Simpan</button>
        </form>
    </div>
</div>
<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/aq37vou6o6fl7r2lfo92721t18z6173r03hevnh6qpu52i0f/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea#konten',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
</script>