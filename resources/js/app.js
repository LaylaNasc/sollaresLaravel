import './bootstrap';

import inputmask from 'inputmask';

document.addEventListener("DOMContentLoaded", () => {
    
    var cpfMask = new Inputmask("999.999.999-99");    
    cpfMask.mask(document.querySelector('#cpf'));
    
    var telMask = new Inputmask("(99) 99999-9999");    
    telMask.mask(document.querySelector('#telefone'));  
});