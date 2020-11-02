<div style="margin:4% 0% 0% 0%;">

    <!-- PROFILES -->
    <div class="container-fluid">
        <div class="row" style="padding:2% 3% 2% 3%;">
            <!-- Photo -->
            <div class="col-5" style="background-color:#f6c90e;padding:2% 0% 2% 13%;">
                <div class="avatar mx-auto">
                    <img style="width:50%;" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(27).jpg" alt="avatar mx-auto white" class="rounded-circle img-fluid">
                </div>
            </div>

            <!-- Bio -->
            <div class="col-7">
                <div style="padding:4% 0% 4% 0%;">
                    <div>
                        <h2><?=$this->session->userdata('username')?></h2>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- SERVICES -->
    <div>

        <!-- Header -->
        <div style="background-color:#3a4750;padding:3% 3% 3% 3%;">
            <div class="text-white">
                <h2>Your Services</h2>
            </div>
        </div>

        <!-- Content -->
        <div>

            <div class="container-fluid" style="padding:3% 4% 3% 4%;">
                <div class="row">
                    <div class="col-12">
                    <div class=" mr-auto">
                        <a href="<?= base_url($this->session->userdata('level').'/tambah_artikel') ?>" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Tambah Artikel</a>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-bordered datatable">
                            
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th  width="20%">Services</th>
                                    <th>Tanggal</th>
                                    <th>Kategori</th>
                                    <th>Dilihat</th>
                                    <th>
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i> /
                                        <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                                    </th>
                                    <th>Status</th>
                                    <th>Setting</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no=1; foreach($artikel as $art): ?>
                                <tr>
                                    <td><?= $no++ ?></td>

                                    <td>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <img src="<?= base_url('assets/thumbnail/'.$art->gambar) ?>" class="img-fluid">
                                            </div>
                                            <div class="col-md-7">
                                                <?= word_limiter($art->judul, '4') ?>
                                            </div>
                                        </div>										
                                            
                                    </td>
                                    
                                    <td>

                                        <?php $date = date_create($art->tanggal); echo date_format($date, 'd F Y') ?>
                                            
                                    </td>
                                    <td><?= $art->Nama ?></td>
                                    <td><?= $art->dilihat ?></td>
                                    <td><?= $art->suka.' / '.$art->tdk_suka ?></td>
                                    <?php if($art->Status == 1): $status = 'Publish'; else: $status = 'Draft'; endif; ?>
                                    <td><?= $status ?></td>
                                    <td>
                                        <center>
                                            <a onclick='return confirm("Yakin untuk menghapus artikel?")' class="btn btn-danger btn-sm" href="<?= base_url('hapus/artikel/'.$art->ID) ?>">Hapus</a>
                                            <a class="btn btn-info btn-sm" href="<?= base_url('ke_edit/artikel/'.$art->ID) ?>">Edit</a>
                                            <?php if($art->Status === '0'): ?>
                                            <a class="btn btn-success btn-sm" href="<?= base_url('publishkan/'.$art->ID) ?>">Publikasikan</a>
                                            <?php else: ?>
                                                <a class="btn btn-warning btn-sm" href="<?= base_url('draftkan/'.$art->ID) ?>">Draftkan</a>
                                            <?php endif; ?>
                                        </center>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                        </div>
                    </div>

                </div>
            </div>
        
        </div>
    
    </div>

</div>

<!-- Modal -->
<div class="modal fade left" id="add-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-full-height modal-left" role="document" style="background-color:#eeeeee;">
    <div class="modal-content">
      <div class="modal-header text-white" style="background-color:#f6c90e;">
        <h2 class="modal-title" id="exampleModalPreviewLabel">Add Services</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding:4% 4% 4% 4%;">
        <form action="">
            <input type="text" class="form-control mb-4" placeholder="Judul">

            <div class="form-group">
                <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Deskripsi"></textarea>
            </div>

            <label>Kategori</label>
            <select class="browser-default custom-select mb-4">
                <option value="" disabled>Choose option</option>
                <option value="1" selected>Feedback</option>
                <option value="2">Report a bug</option>
                <option value="3">Feature request</option>
                <option value="4">Feature request</option>
            </select>

            <input type="text" class="form-control mb-4 disabled" placeholder="<?= $this->session->userdata('username') ?>">

            <div class="file-upload-wrapper">
                <input type="file" id="input-file-now" class="file-upload" />
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
