<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center fw-bold">Teams</h2>
        </div>
    </div>    
</div>

<?php
    $urltubes = URLTUBES;
    $data = file_get_contents($urltubes . '/teams.json');
    $array = json_decode($data, true);
?>

<div class="container">
    <div class="row text-center">
        <div class="d-flex justify-content-between flex-wrap">
            <!-- Team item -->
            <?php foreach($array["data"] as $item) : ?>
                    <div class="col-xl-3 col-sm-6 mb-5 mx-3">
                    <!-- https://bootstrapious.com/i/snippets/sn-team/teacher-2.jpg -->
                        <div class="bg-white rounded shadow-sm py-5 px-4">
                            <img src="<?= $item["img"]  ?>" alt=""  class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" style="width: 100px; height: 100px; object-fit: cover;"> 
                            <h5 class="mb-0 text-black"><?php echo $item['name'] ?></h5><span class="small text-uppercase text-muted"><?php echo $item['nim'] ?></span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="<?= $item["facebook"]  ?>" class="social-link" target="_blank" noopener noreferrer><i class="fa-brands fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="<?= $item["twitter"]  ?>" class="social-link" target="_blank" noopener noreferrer><i class="fa-brands fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="<?= $item["instagram"]  ?>" class="social-link" target="_blank" noopener noreferrer><i class="fa-brands fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="<?= $item["linkedin"]  ?>" class="social-link" target="_blank" noopener noreferrer><i class="fa-brands fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- End -->
            <?php endforeach; ?>
        </div>
    </div>
</div>