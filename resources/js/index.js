tippy("[data-tippy-content]", {
  animation: "scale",
  theme: "main",
});

document.querySelectorAll(".checkbox").forEach(function (checkbox) {
  const inputCheckbox = document.querySelector(`#${checkbox.id} input`);

  checkbox.addEventListener("click", function () {
    if (checkbox.classList.contains("active")) {
      checkbox.classList.remove("active");
      inputCheckbox.checked = false;
    } else {
      checkbox.classList.add("active");
      inputCheckbox.checked = true;
    }
  });
});
