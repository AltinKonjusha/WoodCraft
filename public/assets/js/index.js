const slides = document.querySelectorAll('.slide');
const nextBtn = document.querySelector('.next');
const prevBtn = document.querySelector('.prev');
const dots = document.querySelectorAll('.dot');

let currentIndex = 0;

function showSlide(index) {
  if (index >= slides.length) currentIndex = 0;
  else if (index < 0) currentIndex = slides.length - 1;
  else currentIndex = index;

  const offset = -currentIndex * 100;
  document.querySelector('.slides').style.transform = `translateX(${offset}%)`;

  dots.forEach(dot => dot.classList.remove('active'));
  dots[currentIndex].classList.add('active');
}

nextBtn.addEventListener('click', () => showSlide(currentIndex + 1));
prevBtn.addEventListener('click', () => showSlide(currentIndex - 1));

dots.forEach((dot, idx) => {
  dot.addEventListener('click', () => showSlide(idx));
});

setInterval(() => showSlide(currentIndex + 1), 5000);
