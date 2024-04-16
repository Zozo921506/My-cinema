let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-slide');
const intervalTime = 5000;

function showSlide(index) 
{
  slides.forEach((slide, i) => 
  {
    slide.style.display = i === index ? 'block' : 'none';
  });
}

function nextSlide() 
{
  currentSlide = (currentSlide + 1) % slides.length;
  showSlide(currentSlide);
}

function prevSlide() 
{
  currentSlide = (currentSlide - 1 + slides.length) % slides.length;
  showSlide(currentSlide);
}

function autoSlide() 
{
  nextSlide();
}

setInterval(autoSlide, intervalTime);
showSlide(currentSlide);
document.getElementById('previous').addEventListener('click', prevSlide);
document.getElementById('next').addEventListener('click', nextSlide);