<div class="container" style="margin-top: 200px;">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Home</h1>
        </div>
        <div class="col-12">
            <h4>Silahkan pilih disini :</h4>
            <i id="img" class="fas fa-image"></i>
            <i id="txt" class="fa-solid fa-keyboard"></i>
        </div>
        <div id="fImg" class="col-6" style="display: none;">
            <form action="<?= BASEURL; ?>/home" method="POST" id="formFile" enctype="multipart/form-data">
                <label for="formFile" class="form-label">Masukkan gambar disini</label>
                <br>
                <input class="form-control" type="file" id="formFile" name="uploadImage">
                <br>
                <button type="submit" name="submitImg" class="btn btn-light">Submit</button>
            </form>
        </div>
        <div id="fTxt" class="col-6" style="display: none;">
            <form action="<?= BASEURL; ?>/home" method="POST" id="formText">
                <label for="formText" class="form-label">Masukkan text disini</label>
                <br>
                <input class="form-control" type="text" id="formText" name="inputText">
                <br>
                <button type="submit" name="submitTxt" class="btn btn-light">Submit</button>
            </form>
        </div>
    </div>
    <div>
        <?php
        // echo "Quota yang berkurang: " . $quota_request;
        // echo "Total pemakaian Quota: " . $quota_used;
        ?>
    </div>
    <h1 class="mb-3">Rekomendasi Resep</h1>
    <div class="d-flex justify-content-evenly flex-wrap gap-lg-5">
        <?php
        $recipe_no = 0;
        $recipe_name = [];

        foreach ($data as $row) {
            $recipe_name[] = $row['title'];
        ?>
            <div class="card text-black" style="width: 18rem;">
                <img class="card-img-top" src="<?= $row["image"]; ?>" alt="Card image cap">
                <div class="d-flex flex-column card-body">
                    <h6 class="card-title mb-auto"><?= $row["title"] ?></h6>
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#myModal<?= $recipe_no ?>">
                        Lihat Info
                    </button>
                </div>

                <!-- The Modal -->
                <div class="modal" id="myModal<?= $recipe_no ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title"><?= $recipe_name[$recipe_no] ?></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <p>
                                    <strong>Bahan</strong>
                                    <br>
                                <table class="text-black w-100">
                                    <?php
                                    foreach ($row["nutrition"]["ingredients"] as $ingredient[$recipe_no]) {
                                        echo "<tr><td>" . $ingredient[$recipe_no]["name"] . "</td><td>" . $ingredient[$recipe_no]['amount'] . "</td><td>" . " " . $ingredient[$recipe_no]['unit'] . "</td></tr>";
                                    }
                                    ?>
                                </table>
                                </p>
                                <p>
                                    <strong>Cara Penyajian</strong>
                                    <br>
                                    <?php foreach ($row['analyzedInstructions'] as $step) {
                                        foreach ($step["steps"] as $value[$recipe_no]) {
                                            echo $value[$recipe_no]['number'] . ". " . $value[$recipe_no]['step'];
                                            echo "<br>";
                                        }
                                    } ?>
                                </p>
                                <p>
                                    <strong>Nutrisi</strong>
                                    <br>
                                <table class="text-black w-100">
                                    <?php foreach ($row['nutrition']['nutrients'] as $nutrient[$recipe_no]) {
                                        echo "<tr>";
                                        echo "<td>" . $nutrient[$recipe_no]['name'] . "</td>";
                                        echo "<td>" . $nutrient[$recipe_no]['amount'] . "</td>";
                                        echo "<td>" . $nutrient[$recipe_no]['unit'] . "</td>";
                                        echo "</tr>";
                                    } ?>
                                </table>
                                </p>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        <?php
            $recipe_no++;
        }
        ?>
    </div>
</div>