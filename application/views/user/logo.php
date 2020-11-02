<div style="margin-top:5%;background-color:#eeeeee;">

    <!-- HEADER -->
    <div style="padding-left:15%;padding-right:15%;">
    
        <div>
            <div class="row" style="margin-bottom:-2%;">
                <div class="col">
                    <p>List /<a href="#"> Design </a>/<a href="#"> Logo </a></p>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col">
                    <h2>Logo</h2>
                </div>
            </div>
        </div>
    
    </div>
    <!-- HEADER -->



    <!-- CONTENT -->
    <div>
    
        <div class="container-fluid" style="padding:2% 15% 2% 15%;">
        
        <div class="row row-cols-1 row-cols-md-3">
        <?php foreach($artikel as $art): ?>
        <?php if($art->Nama === 'Logo'): ?>
        <div class="col mb-4">
            <!-- Card -->
            <div class="card">

            <!--Card image-->
            <div class="view overlay">
                <img class="img-fluid card-img-top" src="<?= base_url('assets/thumbnail/'.$art->gambar) ?>"
                alt="Card image cap">
                <a href="#!">
                <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!--Card content-->
            <div class="card-body">

                <!--Title-->
                <h4 class="card-title"><?= $art->judul ?></h4>

            </div>

            </div>
            <!-- Card -->
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
        
        </div>
        
        </div>
    
    </div>
    <!-- CONTENT -->

</div>