// katalog interactions: render products, filter, search, sort
document.addEventListener('DOMContentLoaded',()=>{
	const products = [
		// Jus Buah (Rp10000)
		{name:'Jus Alpukat',slug:'alpukat',category:'jusbuah',price:10000,img:'/images/produk/alpukat.png',musiman:false},
		{name:'Jus Jambu',slug:'jambu',category:'jusbuah',price:10000,img:'/images/produk/jambu.png',musiman:false},
		{name:'Jus Nanas',slug:'nanas',category:'jusbuah',price:10000,img:'/images/produk/nanas.png',musiman:false},
		{name:'Jus Nangka',slug:'nangka',category:'jusbuah',price:10000,img:'/images/produk/nangka.png',musiman:false},
		{name:'Jus Semangka',slug:'semangka',category:'jusbuah',price:10000,img:'/images/produk/semangka.png',musiman:false},
		{name:'Jus Jeruk',slug:'jeruk',category:'jusbuah',price:10000,img:'/images/produk/jeruk.png',musiman:false},
		{name:'Jus Belimbing',slug:'belimbing',category:'jusbuah',price:10000,img:'/images/produk/belimbing.png',musiman:false},
		{name:'Jus Melon',slug:'melon',category:'jusbuah',price:10000,img:'/images/produk/melon.png',musiman:false},
		{name:'Jus Strawberry',slug:'strawberry',category:'jusbuah',price:10000,img:'/images/produk/strawberry.png',musiman:false},
		{name:'Jus Sirsak',slug:'sirsak',category:'jusbuah',price:10000,img:'/images/produk/sirsak.png',musiman:false},
		{name:'Jus Mangga',slug:'mangga',category:'jusbuah',price:10000,img:'/images/produk/mangga.png',musiman:true},
		{name:'Jus Durian',slug:'durian',category:'jusbuah',price:10000,img:'/images/produk/durian.png',musiman:true},

		// Healthy Juice (Rp10000)
		{name:'Jus Wortel',slug:'wortel',category:'healthy',price:10000,img:'/images/produk/wortel.png',musiman:false},
		{name:'Jus Tomat',slug:'tomat',category:'healthy',price:10000,img:'/images/produk/tomat.png',musiman:false},
		{name:'Jus Mentimun',slug:'mentimun',category:'healthy',price:10000,img:'/images/produk/mentimun.png',musiman:false},

		// Special Menu
		{name:'Es Campur',slug:'escampur',category:'special',price:13000,img:'/images/produk/escampur.png',musiman:false},
		{name:'Es Teler',slug:'esteler',category:'special',price:16000,img:'/images/produk/esteler.png',musiman:false},
		{name:'Sop Buah',slug:'sopbuah',category:'special',price:16000,img:'/images/produk/sopbuah.png',musiman:false},

		// Sachet (Rp5000)
		{name:'Kopi Sachet',slug:'kopi',category:'sachet',price:5000,img:'/images/produk/kopi.png',musiman:false},
		{name:'Milo Sachet',slug:'milo',category:'sachet',price:5000,img:'/images/produk/milo.png',musiman:false},
		{name:'Chocolatos',slug:'chocolatos',category:'sachet',price:5000,img:'/images/produk/chocolatos.png',musiman:false},
		{name:'Matcha',slug:'matcha',category:'sachet',price:5000,img:'/images/produk/matcha.png',musiman:false},
		{name:'Good Day Cappuccino',slug:'goodday',category:'sachet',price:5000,img:'/images/produk/goodday.png',musiman:false},
		{name:'White Coffee',slug:'whitecoffee',category:'sachet',price:5000,img:'/images/produk/whitecoffee.png',musiman:false},
		{name:'Luwak White Coffee',slug:'luwak',category:'sachet',price:5000,img:'/images/produk/luwak.png',musiman:false},
		{name:'ABC Susu',slug:'abcsusu',category:'sachet',price:5000,img:'/images/produk/abcsusu.png',musiman:false}
	];

	const grid = document.getElementById('productGrid');
	const filterButtons = document.querySelectorAll('#filterButtons button');
	const searchInput = document.getElementById('searchInput');
	const sortSelect = document.getElementById('sortSelect');

	let state = {filter:'all',query:'',sort:'all'};

	function formatPrice(v){ return 'Rp'+v.toString().replace(/(\d)(?=(\d{3})+$)/g,'$1.'); }

	function renderProducts(){
		let out = products.slice();
		// filter
		if(state.filter !== 'all') out = out.filter(p=>p.category===state.filter);
		// search
		if(state.query) out = out.filter(p=>p.name.toLowerCase().includes(state.query.toLowerCase()));
		// sort
		if(state.sort === 'price-asc') out.sort((a,b)=>a.price-b.price);
		if(state.sort === 'price-desc') out.sort((a,b)=>b.price-a.price);
		if(state.sort === 'name-asc') out.sort((a,b)=>a.name.localeCompare(b.name));
		if(state.sort === 'name-desc') out.sort((a,b)=>b.name.localeCompare(a.name));

		grid.innerHTML = '';
		out.forEach(p=>{
			const col = document.createElement('div');
			col.className = 'col-12 col-md-6 col-lg-3';
			const badge = p.musiman?`<span class="badge bg-success badge-musiman">Musiman</span>`:'';
			col.innerHTML = `
				<div class="card product-card position-relative" data-aos="zoom-in" data-aos-duration="600">
					${badge}
					<img src="${p.img}" class="card-img-top" alt="${p.name}">
					<div class="card-body text-center">
						<h6 class="fw-bold">${p.name}</h6>
						<div class="small text-muted text-capitalize">${p.category.replace(/([a-z])([A-Z])/g,'$1 $2')}</div>
						<div class="fw-semibold text-success mt-2">${formatPrice(p.price)}</div>
						<a class="btn btn-success btn-sm rounded-pill mt-3" href="https://wa.me/6283892606102?text=${encodeURIComponent('Halo Wardah Juice, saya ingin memesan '+p.name)}" target="_blank">Pesan Sekarang</a>
					</div>
				</div>
			`;
			grid.appendChild(col);
		});

		// animate items
		const items = grid.querySelectorAll('.product-card');
		items.forEach((it,i)=>{ it.classList.add('fade-in'); it.style.animationDelay=(i*40)+'ms'; });
		// refresh AOS so animations apply
		if(window.AOS) window.AOS.refresh();
	}

	// init
	renderProducts();

	// filter buttons
	filterButtons.forEach(btn=>{
		btn.addEventListener('click',()=>{
			filterButtons.forEach(b=>b.classList.remove('active'));
			btn.classList.add('active');
			state.filter = btn.getAttribute('data-filter');
			renderProducts();
		});
	});

	// search
	let typing=null;
	searchInput.addEventListener('input',e=>{
		clearTimeout(typing);
		typing=setTimeout(()=>{ state.query = e.target.value.trim(); renderProducts(); },250);
	});

	// sort
	sortSelect.addEventListener('change',e=>{ state.sort = e.target.value; renderProducts(); });
});

