$(function () {
    "use strict"

    $(".rad").click(function () {
        let dis = $(this);
        let sel = dis.parent().parent().find('select');
        let hid = dis.parent().parent().find('.qid');
        sel.removeAttr('disabled');
        hid.removeAttr('disabled');
        dis.parent().parent().parent().find('select').not(sel).attr('disabled', true);
        dis.parent().parent().parent().find('.qid').not(hid).attr('disabled', true);
    });
})