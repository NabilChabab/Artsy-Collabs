let image = document.getElementById("image");
let input = document.getElementById("input-file");

input.onchange = () => {
    image.src = URL.createObjectURL(input.files[0]);
}