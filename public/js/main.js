// languageMobile
const currentLanguage = document.querySelector(".current-language");
const languageDropdown = document.querySelector(".language-dropdown");
const preaHeader = document.querySelector(".pre-header");

currentLanguage.addEventListener("click", () => {
  languageDropdown.classList.toggle("show");
});

languageDropdown.addEventListener("click", (e) => {
  if (e.target.tagName === "LI") {
    const selectedLanguage = e.target.textContent;
    currentLanguage.innerHTML = e.target.innerHTML;
    languageDropdown.classList.remove("show");
  }
});

//postavlja footer na svim stranicama
