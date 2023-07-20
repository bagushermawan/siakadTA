"use strict";

// Fungsi untuk menerapkan warna layout yang dipilih
function applyLayoutColor(layoutColor) {
  var layoutPrefixClass = "layout-skin skin-";
  var $targetLayoutEl = $("body");
  $targetLayoutEl.removeClass(function (index, className) {
    return (className.match(/(^|\s)layout-skin skin-\S+/g) || []).join(" ");
  });
  $targetLayoutEl.addClass(`${layoutPrefixClass}${layoutColor}`);
}

$(document).ready(function () {
  var $layoutSkinChangerId = $("#layout-skins-changer");
  var $layoutSkinChangerContainer = $layoutSkinChangerId.find(
    ".skin-btn[data-value]"
  );
  var selectedSkinIconClass = "fas fa-check";
  var defaultLayoutColor = "default";

  $layoutSkinChangerContainer.on("click", function (eve) {
    eve.preventDefault();

    var $thisSkinBtn = $(this);
    var targetData = "value";
    var newSelectedLayoutColor = $thisSkinBtn.data(targetData);

    // Hapus icon centang dari semua tombol
    $layoutSkinChangerContainer.find("i").removeClass(selectedSkinIconClass);

    // Terapkan warna layout yang baru dipilih
    applyLayoutColor(newSelectedLayoutColor);
    localStorage.setItem("layoutColor", newSelectedLayoutColor);

    // Tandai tombol yang dipilih dengan icon centang
    $thisSkinBtn.find("i").addClass(selectedSkinIconClass);
  });

  // Ambil warna layout yang disimpan di local storage saat halaman dimuat
  var selectedLayoutColor =
    localStorage.getItem("layoutColor") || defaultLayoutColor;

  // Terapkan warna layout yang dipilih dari local storage saat halaman dimuat
  applyLayoutColor(selectedLayoutColor);

  // Hapus icon centang dari semua tombol saat halaman dimuat
  $layoutSkinChangerContainer.find("i").removeClass(selectedSkinIconClass);

  // Tandai tombol yang dipilih dengan icon centang saat halaman dimuat
  $layoutSkinChangerContainer
    .filter(`[data-value="${selectedLayoutColor}"]`)
    .find("i")
    .addClass(selectedSkinIconClass);
});
