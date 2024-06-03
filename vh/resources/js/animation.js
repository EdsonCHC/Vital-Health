const observer = new IntersectionObserver((entries) =>{
    entries.forEach((entry)=>{
        if(entry.isIntersecting){
            entry.target.classList.add('show');
        }else{
            // entry.target.classList.remove('show');
        }
    });
});

const animation = document.querySelectorAll(".animation");
const animation_two = document.querySelectorAll(".animation2");
const animation_three = document.querySelectorAll(".animation3");
animation.forEach((el) => observer.observe(el));
animation_two.forEach((el) => observer.observe(el));
animation_three.forEach((el) => observer.observe(el));