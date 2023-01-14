const sidebarMenu = document.querySelectorAll(".sidebar__content .link");

sidebarMenu.forEach((elem) => {
  if (elem.href === elem.baseURI) {
    elem.classList.add("active");
  }
});
