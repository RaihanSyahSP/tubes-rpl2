<div class="container" style="margin-top: 200px;">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Discovery</h1>
        </div>
        <?php 
        // echo "<pre>";
        //     var_dump($data);
        // echo "</pre>";
        ?>
    </div>
    <div>
    <?php
    if ($data) {
        // $tampilkan = $this->getImage();
        // var_dump($tampilkan);
        ?>
        <p class="mb-3 text-center">Random Resep Makanan</p>
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
                                            foreach ($row["extendedIngredients"] as $ingredient[$recipe_no]) {
                                                echo "<tr><td>" . $ingredient[$recipe_no]["aisle"] . "</td><td>" . $ingredient[$recipe_no]['amount'] . "</td><td>" . " " . $ingredient[$recipe_no]['unit'] . "</td></tr>";
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
                                    </p>
                                    <?php echo "<p>" . $row["summary"] . "</p>"  ?>
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
        }
        ?>
        </div>
        
        <div class="mt-5 mb-5 d-flex justify-content-center">
            <form action="<?= BASEURL; ?>/discovery" method="POST" id="formText">
                    <button type="submit" name="submitRandom" class="btn btn-light">Randomize</button>
            </form>
        </div>
</div>
</div>