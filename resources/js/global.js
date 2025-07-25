import Swal from 'sweetalert2';
import "sweetalert2/dist/sweetalert2.min.css";
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: "btn btn-info",
    cancelButton: "btn btn-secondary ml-2"
  },
  buttonsStyling: false
});
Swal.fire = swalWithBootstrapButtons.fire.bind(swalWithBootstrapButtons);
window.Swal = Swal;

// Notyf (https://www.npmjs.com/package/notyf)
import { Notyf } from 'notyf';
import 'notyf/notyf.min.css';
window.notyf = new Notyf({
    types: [
        {
            type: "warning",
            background: "orange",
            icon: {
                className: "fas fa-exclamation-triangle",
                tagName: "i",
            },
        },
    ],
    position: {
        y: "top",
    },
});
