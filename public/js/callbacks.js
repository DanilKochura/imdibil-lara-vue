var my_confirm_callback = function (el, data) {
    if (data.status === 1) {
        $(el).closest('tr').remove()
        $.SOW.core.toast.show('success', 'IMDibil', data.text, 'top-right', 4000, true);
    } else {
        $.SOW.core.toast.show('danger', 'IMDibil', 'Ошибка!', 'top-right', 4000, true);
    }
}

var filmAddCallback = function (el, data) {
    $(el).closest('.modal').modal('hide')
    if (data.status === 1) {
        $(el).closest('tr').remove()
        $.SOW.core.toast.show('success', 'IMDibil', data.text, 'top-right', 4000, true);
    } else {
        $.SOW.core.toast.show('danger', 'IMDibil', 'Ошибка! '+data.text, 'top-right', 4000, true);
    }
}

var modalClose = function (el, data) {
    $(el).closest('.modal').modal('hide')
    window.location.reload()
}
