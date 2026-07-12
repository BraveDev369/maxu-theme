document.addEventListener("DOMContentLoaded", () => {
  const toast = document.querySelector(".js-toast");

  if (!toast) return;

  toast.querySelector(".toast-close").addEventListener("click", () => {
    toast.remove();
  });

  setTimeout(() => {
    toast.remove();
  }, 5000);
});
