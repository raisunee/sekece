<br>
<div class="container-fluid" style="margin:3% 0% 2% 0%;">
	<?php if($this->session->flashdata('pesan') !== null ): ?>

			<div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
				<?= $this->session->flashdata('pesan'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				</button>
			</div>

	<?php endif; ?>
	<div>

        <div class="container-fluid">
        
        <div class="row justify-content-center mt-5">
            
            <div class="col-md-4">
                
                <div class="card">
                    
                    <div class="card-header text-center text-white" style="background-color:#303841;font-family: 'Poppins', sans-serif;font-weight:bold;font-size:30px;">
                        
                        Register Freelancer

                    </div>
                    <div class="card-body" style="background-color:#eeeeee;">
                        
                        <?= form_open('tambah/freelancer'); ?>
                        <?php if($this->session->flashdata('pesan') !== null) :  ?>
                            <div class="alert alert-info">
                                <?= $this->session->flashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>

                            <div class="form-group">
                                
                                <label style="font-family: 'Rubik', sans-serif;">User</label>
                                <select name="user" class="form-control disabled" required>
                                    <option value="<?= $this->session->userdata('user_id') ?>"><?= $this->session->userdata('username') ?></option>
                                </select>

                            </div>

                            <div class="form-group">
                                <label>Nama Freelancer</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Freelancer" required>
                            </div>

                            <div class="form-group">
                                
                                <label style="font-family: 'Rubik', sans-serif;">Deskripsi</label>
                                <textarea name="deskripsi" rows="3" class="form-control" placeholder="Deskripsi Singkat"></textarea>

                            </div>

                            <div class="form-group">
                                <label>Foto Freelancer</label>
                                <input type="file" class="form-control" name="foto" required>
                            </div>

                            <button class="btn btn-block" style="fbackground-color: #303841;font-family: 'Poppins', sans-serif;font-weight:bold;">Register</button>

                        <?= form_close(); ?>

                <hr>

                <p class="text-center" style="font-family: 'Rubik', sans-serif;">Sudah punya akun?</p>
                <p class="text-center">
                <a href="<?= base_url('login_admin') ?>" style="font-family: 'Rubik', sans-serif;">Login</a>
                </p>

                    </div>

                </div>

            </div>

        </div>

    </div>
		
	</div>
</div>