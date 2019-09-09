document.getElementById('input-imagem').onchange = function() {
    let img1 = document.createElement('img');
    img1.src = URL.createObjectURL(event.target.files[0]);
    document.getElementById('div-imagens-veiculo').appendChild(img1);
}