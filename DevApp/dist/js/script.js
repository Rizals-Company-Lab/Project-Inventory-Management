const tombolMenu = document.querySelector("#tombolMenu");
const hilang = document.querySelector("#hilang");

tombolMenu.addEventListener("click", function () {
	tombolMenu.classList.toggle("tombol-active");
	hilang.classList.toggle("hidden");
});
