</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
<script>
    const img = document.getElementById('img');
    const txt = document.getElementById('txt');
    const fImg = document.getElementById('fImg');
    const fTxt = document.getElementById('fTxt');
    const formImg = document.getElementById('inputImage'); 
    const formText = document.getElementById('inputText'); 

    img.addEventListener('click', function() {
        fImg.style.display = 'inline';
        fTxt.style.display = 'none';
        formImg.setAttribute('required', '');
        formText.removeAttribute('required');
    });

    txt.addEventListener('click', function() {
        let fTxt = document.getElementById('fTxt');
        fTxt.style.display = 'inline';
        fImg.style.display = 'none';
        formImg.removeAttribute('required');
        formText.setAttribute('required', '');
    });
</script>
</html>