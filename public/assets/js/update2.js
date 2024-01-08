const realFileBtn = document.getElementById("real-file12");
const customBtn = document.getElementById("custom-button12");
const customTxt = document.getElementById("custom-text12");

customBtn.addEventListener("click", function() {
  realFileBtn.click();
});

realFileBtn.addEventListener("change", function() {
  if (realFileBtn.value) {
    customTxt.innerHTML = realFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt.innerHTML = "No file chosen, yet.";
  }
});


const realFileBtn1 = document.getElementById("real-file13");
const customBtn1 = document.getElementById("custom-button13");
const customTxt1 = document.getElementById("custom-text13");

customBtn1.addEventListener("click", function() {
  realFileBtn1.click();
});

realFileBtn1.addEventListener("change", function() {
  if (realFileBtn1.value) {
    customTxt1.innerHTML = realFileBtn1.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt1.innerHTML = "No file chosen, yet.";
  }
});

const realFileBtn2 = document.getElementById("real-file2");
const customBtn2 = document.getElementById("custom-button2");
const customTxt2 = document.getElementById("custom-text2");

customBtn2.addEventListener("click", function() {
  realFileBtn2.click();
});

realFileBtn2.addEventListener("change", function() {
  if (realFileBtn2.value) {
    customTxt2.innerHTML = realFileBtn2.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt2.innerHTML = "No file chosen, yet.";
  }
});
