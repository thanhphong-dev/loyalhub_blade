import "./bootstrap";

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
