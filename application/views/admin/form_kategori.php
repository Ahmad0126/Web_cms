<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Tambahkan Kategori</h6>
        <form action="<?= isset($kategori)? base_url('admin/kategori/update_kategori/').$kategori['id_kategori']: base_url('admin/kategori/simpan')?>" method="post">
            <div class="form-group mb-3">
                <label for="floatingPassword">Nama Kategori</label>
                <input type="text" name="kategori" class="form-control" placeholder="Nama Kategori" id="floatingPassword" value="<?= isset($kategori['nama_kategori'])? $kategori['nama_kategori']:''?>">
            </div>
            <button type="submit" class="btn btn-primary m-2">Simpan</button>
        </form>
    </div>
</div>