// Home JS: hero slider, typewriter, testimonials
document.addEventListener('DOMContentLoaded',function(){
  // Hero slider
  const imgs=["/images/hero/1.png","/images/hero/2.png","/images/hero/3.png","/images/hero/4.png","/images/hero/5.png"];
  let idx=0; const el=document.getElementById('heroSlide');
  if(el){
    setInterval(()=>{
      idx=(idx+1)%imgs.length;
      el.style.opacity=0;
      setTimeout(()=>{el.src=imgs[idx];el.style.opacity=1},400);
    },3000);
  }

  // Typewriter
  const words=["Fresh Juice","Healthy Drink","100% Natural","No Preservatives","Segarnya Alami"];
  const tw=document.getElementById('typewriter');
  if(tw){
    let w=0,ch=0,dir=1,del=1000;
    function step(){
      const word=words[w];
      tw.textContent=word.slice(0,ch);
      if(dir===1){
        if(ch<word.length) ch++; else {dir=0; setTimeout(step,del); return}
      } else {
        if(ch>0) ch--; else {dir=1; w=(w+1)%words.length}
      }
      setTimeout(step, dir?100:40);
    }
    step();
  }

  // Testimonials slider
  const testData=[
    {name:'Alya',text:'Jusnya enak dan segar!',avatar:'/images/hero/1.png'},
    {name:'Rico',text:'Harga terjangkau, recomended',avatar:'/images/hero/2.png'},
    {name:'Sari',text:'Pelayanan cepat',avatar:'/images/hero/3.png'},
    {name:'Budi',text:'Rasa asli buahnya terasa',avatar:'/images/hero/4.png'},
    {name:'Nina',text:'Tempatnya bersih',avatar:'/images/hero/5.png'},
    {name:'Dewi',text:'Saya suka menu sehatnya',avatar:'/images/hero/1.png'}
  ];
  const twrap=document.getElementById('testimonials');
  if(twrap){
    testData.forEach(t=>{
      const card=document.createElement('div');
      card.className='card p-3 me-3 t-card rounded-4 shadow-sm';
      card.innerHTML=`<div class="d-flex gap-3 align-items-center"><img src="${t.avatar}" width="56" height="56" class="rounded-circle"><div><div class="fw-bold">${t.name}</div><div class="small text-muted">★★★★★</div></div></div><p class="mt-3 small mb-0">${t.text}</p>`;
      twrap.appendChild(card);
    });

    // auto scroll
    let pos=0;
    setInterval(()=>{
      pos+=280; if(pos>twrap.scrollWidth - twrap.clientWidth) pos=0;
      twrap.scrollTo({left:pos,behavior:'smooth'});
    },4000);
  }
});
