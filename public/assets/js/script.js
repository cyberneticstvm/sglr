$(function () {
    "use strict"

    $(".rad").click(function () {
        let dis = $(this);
        let sel = dis.parent().parent().find('.slct');
        let hid = dis.parent().parent().find('.qid');
        sel.removeAttr('disabled');
        hid.removeAttr('disabled');
        dis.parent().parent().parent().find('.slct').not(sel).attr('disabled', true);
        dis.parent().parent().parent().find('.qid').not(hid).attr('disabled', true);
    });

    $(".slct").change(function () {
        let dis = $(this);
        let qid = dis.data('qid');
        if ((qid == 7 || qid == 10 || qid == 11) && dis.val() == 'Yes') {
            $('#slct_8').val('No')
            $('#slct_9').val('No')
        }
        if ((qid == 8 || qid == 9) && dis.val() == 'Yes') {
            $('#slct_7').val('No')
            $('#slct_10').val('No')
            $('#slct_11').val('No')
        }
    });
})