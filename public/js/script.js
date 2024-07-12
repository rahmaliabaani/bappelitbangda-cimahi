    // const progressCircle = document.querySelector(".autoplay-progress svg");
    // const progressContent = document.querySelector(".autoplay-progress span");

    // const swiperEl = document.querySelector("swiper-container");
    // swiperEl.addEventListener(".autoplaytimeleft", (e) => {
    //   const [swiper, time, progress] = e.detail;
    //   progressCircle.style.setProperty("--progress", 1 - progress);
    //   progressContent.textContent = `${Math.ceil(time / 1000)}s`;
    // });

    document.addEventListener('DOMContentLoaded', () => {
      const progressCircle = document.querySelector(".autoplay-progress svg");
      const progressContent = document.querySelector(".autoplay-progress span");
  
      // Perbaiki selector untuk .swiper-container
      const swiperEl = document.querySelector(".swiper-container");
  
      // Pastikan swiperEl tidak null sebelum menambahkan event listener
      if (swiperEl) {
          swiperEl.addEventListener("autoplaytimeleft", (e) => {
              const [swiper, time, progress] = e.detail;
              progressCircle.style.setProperty("--progress", 1 - progress);
              progressContent.textContent = `${Math.ceil(time / 1000)}s`;
          });
      } else {
          console.error('Element with class "swiper-container" not found.');
      }
  });

    

  //Modal
  const exampleModal = document.getElementById('exampleModal')
  exampleModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    const modalTitle = exampleModal.querySelector('.modal-title')
    const modalBodyInput = exampleModal.querySelector('.modal-body input')

    modalTitle.textContent = `New message to ${recipient}`
    modalBodyInput.value = recipient
  })