<div class="container" style="margin-top: 200px;">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Home</h1>
        </div>
        <div class="col-6">
            <form action="<?= BASEURL; ?>/home" method="POST" id="formFile" enctype="multipart/form-data">
                <label for="formFile" class="form-label">Masukkan gambar disini</label>
                <input class="form-control" type="file" id="formFile" name="uploadImage">
                <input type="submit" value="Submit" name="submit">
            </form>
        </div>
        <div class="row">
            <div class="col-6">
                <h1>rekomendasi resep</h1>

                <p><?php
                    if (isset($data)) {
                        // foreach ($data['bahan']['responses'][0]['labelAnnotations'] as $label) {
                        //     echo $label['description'] . '<br>';
                        // }
                        echo '<pre>';
                        // var_dump($data['data_resep']);
                        var_dump($data);
                        // var_dump($recipe);
                        echo '</pre>';
                    }
                    ?></p>
            </div>

        </div>
    </div>