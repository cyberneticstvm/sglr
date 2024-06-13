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
        dis.parent().parent().parent().find('.slct').not(sel).val('No');
    });

    $(".slct").change(function () {
        let dis = $(this);
        let qid = dis.data('qid');
        if ((qid == 10 || qid == 11) && dis.val() == 'Yes') {
            $('#slct_8').val('No')
            $('#slct_9').val('No')
            $('#slct_7').val('No')
            //$('#slct_8, #slct_9, #slct_7').attr('disabled', true);
        }
        if (qid == 7 && dis.val() == 'Yes') {
            $('#slct_8').val('No')
            $('#slct_9').val('No')
            $('#slct_10').val('No')
            $('#slct_11').val('No')
            //$('#slct_8, #slct_9, #slct_10, #slct_11').attr('disabled', true);
        }
        if ((qid == 8 || qid == 9) && dis.val() == 'Yes') {
            $('#slct_7').val('No')
            $('#slct_10').val('No')
            $('#slct_11').val('No')
            //$('#slct_7, #slct_10, #slct_11').attr('disabled', true);
        }
        if (qid == 8 && dis.val() != 'Yes') {
            $('#slct_9').val('No')
        }
        if (qid == 9 && $('#slct_8').val() != 'Yes') {
            $('#slct_9').val('No')
        }
    });

    $("#btnPrint").click(function () {
        let divContents = $("#printView").html();
        let printWindow = window.open('', '', 'height=800,width=800');
        printWindow.document.write('<html><head><title>Document</title>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    });
})