<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center fw-bold">Home</h2>
        </div>
        <div class="card mt-5 text-black text-center">
            <div class="card-header">
                <h4>Terms and Conditions</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5 class="card-title">Image Upload Formats</h5>
                        <p class="card-text">Supported file extension are jpg, jpeg, png, jfif, etc.</p>
                        <p class="card-text">Image size must be smaller than 5 MB </p>
                    </div>
                    <div class="col-6">
                        <h5 class="card-title">Text Input Formats</h5>
                        <p class="card-text">Separate ingredients by <span class="fw-bolder">' , ' (comma)</span> without <span class="fw-bolder">'&nbsp;&nbsp;' (space)</span>.</p>
                        <p class="card-text">Example: <span class="fw-bolder">Chicken,Fish,Mango,Spinach</span></p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                © 2023 Copyright by Y-Team
            </div>
        </div>
        <div class="col-12">
            <h4>Select input type:</h4>
            <span id="img">
                <i class="fas fa-image"></i> Image
            </span>
            <span id="txt">
                <i class="fa-solid fa-keyboard"></i>Text
            </span>
        </div>
        <div id="fImg" class="col-6" style="display: none;">
            <form action="<?= BASEURL; ?>/home" method="POST" id="formImg" enctype="multipart/form-data">
                <label for="inputImage" class="form-label">Upload the image below</label>
                <br>
                <input class="form-control" type="file" id="inputImage" name="uploadImage">
                <br>
                <button type="submit" name="submitImg" class="btn btn-light">Submit</button>
            </form>
        </div>
        <div id="fTxt" class="col-6" style="display: none;">
            <form action="<?= BASEURL; ?>/home" method="POST" id="formText">
                <label for="inputText" class="form-label">Input the text below</label>
                <br>
                <input class="form-control" type="text" id="inputText" name="inputText">
                <br>
                <button type="submit" name="submitTxt" class="btn btn-light">Submit</button>
            </form>
        </div>
        <div class="col-12">
            <?= Flasher::getFlash(); ?>
        </div>
    </div>
    <?php if ((count($data) > 0) && (Flasher::$check == false)) {
        ?>
        <h3 class="mb-3">Recipes Recommendation</h3>
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
                            See Details
                        </button>
                    </div>

                    <!-- The Modal -->
                    <div class="modal" id="myModal<?= $recipe_no ?>">
                        <div class="modal-dialog">
                            <div class="modal-content px-1">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title"><?= $recipe_name[$recipe_no] ?></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <p>
                                        <strong>Ingredients</strong>
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
                                        <strong>Instruction Recipe</strong>
                                        <br>
                                        <?php foreach ($row['analyzedInstructions'] as $step) {
                                            foreach ($step["steps"] as $value[$recipe_no]) {
                                                echo $value[$recipe_no]['number'] . ". " . $value[$recipe_no]['step'];
                                                echo "<br>";
                                            }
                                        } ?>
                                    </p>
                                    <p>
                                        <strong>Nutrition</strong>
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
    <?php
    }
    ?>

</div>