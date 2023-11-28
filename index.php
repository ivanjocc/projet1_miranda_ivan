<?php
include './public/header.php';
include './includes/data.inc.php';
include './styles.php';
?>

<main>

    <section>
        <h1>LE CHAT</h1>

        <div>
            <div>
                <a href="">
                    <img src=<?php echo $cat0['image']; ?> alt="">
                </a>
                <p class="legende">
                    <?php echo $cat0['titre'] . ' - ' . $cat0['prix'] ; ?>

            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/angora.jpg" alt="">
                </a>
                <p class="legende">Angora - $ 2000</p>
            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/british.jpeg" alt="">
                </a>
                <p class="legende">British - $ 500</p>
            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/burmilla.jpg" alt="">
                </a>
                <p class="legende">Burmilla - $ 500</p>
            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/korat.jpeg" alt="">
                </a>
                <p class="legende">Korat  - $ 4000</p>
            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/maine.jpeg" alt="">
                </a>
                <p class="legende">Maine Coon - $ 2000</p>
            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/munchkin.webp" alt="">
                </a>
                <p class="legende">Munchkin - $ 1000</p>
            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/scotish.jpg" alt="">
                </a>
                <p class="legende">Scotish Fold - $ 1000</p>
            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/siamese.jpeg" alt="">
                </a>
                <p class="legende">Scotish Fold - $ 600</p>
            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/siberian.jpg" alt="">
                </a>
                <p class="legende">Siberian - $ 1500</p>
            </div>
            <div>
                <a href="">
                    <img src="./medias/affiches/sphynx.webp" alt="">
                </a>
                <p class="legende">Sphynx- $ 1500</p>
            </div>
        </div>
    </section>


</main>
</body>

</html>