function validateEstatusAdd(id_cat_estatus, arraJS) {
    let bool = false;
    let array = arraJS;
    for (let i = 0; i < array.length; i++) {
        if (array[i] == id_cat_estatus) {
            bool = true;
        }
    }
    return bool;
}

function validateEstatusEdi(id_cat_estatus, id_ctrl, arraJS) {
    let bool = false;
    let array = arraJS;
    for (let i = 0; i < array.length; i++) {
        if (array[i] == id_cat_estatus && array[i + 1] != id_ctrl) {
            bool = true;
        }
    }
    return bool;
}