import Swal from 'sweetalert2';
import Alpine from 'alpinejs';
import '../css/app.css';
window.Alpine = Alpine;


window.Swal = Swal;
Alpine.start();

Livewire.on('openModal',(vacante)=>{
    Swal.fire({
        title: 'Estas Seguro?',
        text: "No podras recuperar esta vacante!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                console.log('confirmado');
                Livewire.emit('eliminarVacante',vacante);
                Swal.fire(
                    'Eliminada!',
                    'Su vacante fue eliminada con exito.',
                    'success'
                )
            }
        })
})
