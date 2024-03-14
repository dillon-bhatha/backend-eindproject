const hiddenElements = document.querySelectorAll(".card");

let index = 0;

let id1 = setInterval(() => {
  console.log(window.scrollY);
  if (window.scrollY > 900) {
    clearInterval(id1);
    const id = setInterval(() => {
      console.log(hiddenElements[index]);
      hiddenElements[index].classList.remove("none");
      hiddenElements[index].classList.add("show");
      index++;
      if (index >= hiddenElements.length) {
        clearInterval(id);
      }
    }, 500);
  }
}, 50);