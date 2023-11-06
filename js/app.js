// Variables
const carrito = document.querySelector('#carrito');
const contenedorCarrito = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.querySelector('#vaciar-carrito')
const listaTortas = document.querySelector('#second');
let articulosCarrito = [];

cargarEvenListener();
function cargarEvenListener(){
    //Cuando agregas una torta presionando "Agregar al carrito"
    listaTortas.addEventListener('click', agregarTorta);

    // Elimina tortas del carrito
    carrito.addEventListener('click', eliminarTorta);

    // Muestra las tortas de local Storage
    document.addEventListener('DOMContentLoaded', () => {
        articulosCarrito = JSON.parse( localStorage.getItem('carrito') ) || [];

        carritoHTML();
    })

    // Vaciar carrito
    vaciarCarritoBtn.addEventListener('click', () =>{
        limpiarHTML();
    })
}



//Funciones
function agregarTorta(e){
    e.preventDefault()


    if(e.target.classList.contains('agregar-carrito')){
        const tortaSeleccionada = e.target.parentElement ;
        leerDatosTorta(tortaSeleccionada);
    }
}

// Eliminar una torta del carrito
    function eliminarTorta(e){
        e.preventDefault()
        console.log(e.target.classList)
        if (e.target.classList.contains('borrar-curso')) {
            const tortaId = e.target.getAttribute('data-id');
            console.log(e.target)
            // Elimina del arreglo de articulosCarrito por el data-id
            articulosCarrito = articulosCarrito.filter( torta => torta.id !== tortaId );

            carritoHTML();
        }
    }

// Lee el codigo html al que le dimos click y extrae informacion de la torta
function leerDatosTorta(torta){

    //Crear un objeto con los datos de la torta

    const infoTorta ={
        imagen: torta.querySelector('img').src,
        titulo: torta.querySelector('.nombre-torta').textContent,
        precio: torta.querySelector('.preciaso').textContent,
        id: torta.querySelector('.button-primary').getAttribute('data-id'),
        cantidad: 1
    }

    // Revisa si un elemento ya existe en el carrito
    const existe = articulosCarrito.some( torta => torta.id === infoTorta.id );
    if (existe) {
        // Actualizamos la cantidad
        const tortas = articulosCarrito.map( torta => {
            if (torta.id === infoTorta.id) {
                torta.cantidad++;
                return torta;   // Retorna el objeto actualizado
            } else {
                return torta;   // Retorna los objetos que no son los duplicados
            }
        } ) ;
        articulosCarrito = [...tortas];
    } else {
        // Agrega elementos al arreglo de carrito
        articulosCarrito = [...articulosCarrito, infoTorta];    
    }
    

    
    carritoHTML();
}


// Muestra el carrito en el HTML

function carritoHTML(){
    // Limpiar HTML

    limpiarHTML();

    //Recorre el carrito y genera el HTML  
    articulosCarrito.forEach(torta => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>
                <img src="${torta.imagen}" width = "100">
            </td>
            <td>${torta.titulo}</td>
            <td>${torta.precio}</td>
            <td id="tortaCantidad">${torta.cantidad}</td>
            <td>
                <a href="#" class="borrar-curso" data-id="${torta.id}"> X </a>
            </td>
            
        `;
        // <td>
            
        // </td>
        // Agrega el HTML del carrito en el tbody
        
        contenedorCarrito.appendChild(row)

    })

    // Agregar el carrito de compras al Storage
    sincronizarStorage();
}

function sincronizarStorage(){
    localStorage.setItem('carrito',JSON.stringify(articulosCarrito))
}

// Elimina los cursos del tbody
function limpiarHTML(){
    // Forma lenta
    // contenedorCarrito.innerHTML = '';

    while(contenedorCarrito.firstChild){
        contenedorCarrito.removeChild(contenedorCarrito.firstChild)
    }
}

