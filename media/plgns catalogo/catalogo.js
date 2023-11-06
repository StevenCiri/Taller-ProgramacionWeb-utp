//Cambiar pag
const paginas = document.querySelectorAll('.pagina');
const paginaAnterior = document.getElementById('pagina-anterior');
const paginaSiguiente = document.getElementById('pagina-siguiente');

let paginaActual = 1;

paginaAnterior.addEventListener('click', () => cambiarPagina(-1));
paginaSiguiente.addEventListener('click', () => cambiarPagina(1));

function cambiarPagina(direccion) {
    paginas.forEach((pagina) => {
        pagina.style.display = 'none';
    });

    paginaActual += direccion;

    if (paginaActual < 1) {
        paginaActual = 1;
    }
    if (paginaActual > paginas.length) {
        paginaActual = paginas.length;
    }

    const paginaVisible = document.getElementById(`pagina${paginaActual}`);
    paginaVisible.style.display = 'block';
}
//Busqueda
const campoBusqueda = document.getElementById('buscador');
const contenedorProductos = document.querySelector('.content');
const productos = contenedorProductos.querySelectorAll('.producto');

document.addEventListener('DOMContentLoaded', function () {
    const categorias = document.querySelectorAll('.categorias li');
    const productos = document.querySelectorAll('.producto');
    const campoBusqueda = document.getElementById('buscador');

    function filtrarProductos() {
        const categoriaSeleccionada = document.querySelector('.categorias li.active').getAttribute('data-categoria');
        const terminoBusqueda = campoBusqueda.value.toLowerCase();
        let productosCoincidentes = 0; // Contador de productos coincidentes
    
        productos.forEach((producto) => {
            const productoCategoria = producto.getAttribute('data-categoria');
            const titulo = producto.querySelector('h2').textContent.toLowerCase();
    
            const categoriaCoincide = categoriaSeleccionada === 'todos' || categoriaSeleccionada === productoCategoria;
            const busquedaCoincide = titulo.includes(terminoBusqueda);
    
            if (categoriaCoincide && busquedaCoincide) {
                producto.style.display = 'block';
                productosCoincidentes++; // Incrementa el contador
            } else {
                producto.style.display = 'none';
            }
        });
    
        // Muestra u oculta el mensaje según la cantidad de productos coincidentes
        const mensajeNoEncontrado = document.getElementById('mensajeNoEncontrado');
        if (productosCoincidentes === 0) {
            mensajeNoEncontrado.style.display = 'block';
        } else {
            mensajeNoEncontrado.style.display = 'none';
        }
    }

    categorias.forEach((categoria) => {
        categoria.addEventListener('click', () => {
            // Cambia la clase "active" para resaltar la categoría seleccionada
            categorias.forEach((c) => c.classList.remove('active'));
            categoria.classList.add('active');

            // Filtra los productos según la categoría seleccionada
            filtrarProductos();
        });
    });

    document.getElementById('botonFiltrar').addEventListener('click', filtrarProductos);
});

const botonBorrarFiltro = document.getElementById('botonBorrarFiltro');

function borrarFiltro() {
    campoBusqueda.value = ''; // Limpia el campo de búsqueda
    categorias.forEach((categoria) => categoria.classList.remove('active')); // Quita la clase "active" de las categorías
    productos.forEach((producto) => producto.style.display = 'block'); // Muestra todos los productos
}

botonBorrarFiltro.addEventListener('click', borrarFiltro);

//
