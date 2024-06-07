(function ($) {
    "use strict";

    $(document).ready(function() {

        // Certificate background image field js
        $('.certificate_img_input').on('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.certificate-img').attr('src', e.target.result).show();
            };
            reader.readAsDataURL(file);
        });

        // Set default value
        // $('.certificateNumberPositionX').val('300');
        // $('.certificateNumberPositionY').val('65');

        // $('.certificateTitlePositionX').val('250');
        // $('.certificateTitlePositionY').val('100');

        // $('.certificateDatePositionX').val('300');
        // $('.certificateDatePositionY').val('170');

        // $('.studentNamePositionX').val('280');
        // $('.studentNamePositionY').val('200');

        // $('.certificateBodyPositionX').val('0');
        // $('.certificateBodyPositionY').val('250');

        // $('.instructorSignaturePositionX').val('135');
        // $('.instructorSignaturePositionY').val('360');
        // $('.instructorSignaturePositionWidth').val('10');

        // $('.adminSignaturePositionX').val('480');
        // $('.adminSignaturePositionY').val('360');
        // $('.adminSignaturePositionWidth').val('10');

        // $('.certificateLogoPositionX').val('308');
        // $('.certificateLogoPositionY').val('355');
        // $('.certificateLogoPositionWidth').val('10');

        // $('.signatureTitle1PositionX').val('135');
        // $('.signatureTitle1PositionY').val('384');

        // $('.signatureTitle2PositionX').val('470');
        // $('.signatureTitle2PositionY').val('384');


        // Certificate number field js
        $('.certificateNumberInput').on('click', function() {
            var isChecked = $(this).is(':checked');
            if (isChecked) {
                $('.certificate-num').show();
            } else {
                $('.certificate-num').hide();
            }
        });

        $('.certificateNumberPositionX').on('input', function() {
            $(".certificate-num").css({"left": ($(this).val()) + 'px'});
        });
        $(".certificate-num").css({"left": $('.certificateNumberPositionX').val() + 'px'});

        $('.certificateNumberPositionY').on('input', function() {
            $(".certificate-num").css({"top": $(this).val() + 'px'});
        });
        $(".certificate-num").css({"top": $('.certificateNumberPositionY').val() + 'px'});

        $('.certificateNumberColor').on('input', function() {
            $(".certificate-num").css({"color": '#' + $(this).val()});
        });
        $(".certificate-num").css({"color": '#' + $('.certificateNumberColor').val()});

        $('.certificateNumberFontSize').on('input', function() {
            $(".certificate-num").css({"font-size": $(this).val() + 'px'});
        });
        $(".certificate-num").css({"font-size": $('.certificateNumberFontSize').val() + 'px'});


        // Certificate title field js
        $('.certificateTitleInput').on('input', function() {
            $('.certificate-title').text($(this).val());
        });
        $('.certificate-title').text($('.certificateTitleInput').val());

        $('.certificateTitlePositionX').on('input', function() {
            $(".certificate-title").css({"left": $(this).val() + 'px'});
        });
         $(".certificate-title").css({"left": $('.certificateTitlePositionX').val() + 'px'});

        $('.certificateTitlePositionY').on('input', function() {
            $(".certificate-title").css({"top": $(this).val() + 'px'});
        });
        $(".certificate-title").css({"top": $('.certificateTitlePositionY').val() + 'px'});

        $('.certificateTitleColor').on('input', function() {
            $(".certificate-title").css({"color": '#' + $(this).val()});
        });
        $(".certificate-title").css({"color": '#' + $('.certificateTitleColor').val()});

        $('.certificateTitleFontSize').on('input', function() {
            $(".certificate-title").css({"font-size": $(this).val() + 'px'});
        });
        $(".certificate-title").css({"font-size": $('.certificateTitleFontSize').val() + 'px'});


        // Certificate date field js
        $('.certificateDateInput').on('input', function() {
            var inputDate = $(this).val();
            var date = new Date(inputDate);
            var formattedDate = $.datepicker.formatDate("dd M yy", date);
            $('.certificate-date').text(formattedDate);
        });
        $('.certificateDatePositionX').on('input', function() {
            $(".certificate-date").css({"left": $(this).val() + 'px'});
        });
        $(".certificate-date").css({"left": $('.certificateDatePositionX').val() + 'px'});

        $('.certificateDatePositionY').on('input', function() {
            $(".certificate-date").css({"top": $(this).val() + 'px'});
        });
        $(".certificate-date").css({"top": $('.certificateDatePositionY').val() + 'px'});

        $('.certificateDateColor').on('input', function() {
            $(".certificate-date").css({"color": '#' + $(this).val()});
        });
        $(".certificate-date").css({"color": '#' + $('.certificateDateColor').val()});

        $('.certificateDateFontSize').on('input', function() {
            $(".certificate-date").css({"font-size": $(this).val() + 'px'});
        });
        $(".certificate-date").css({"font-size": $('.certificateDateFontSize').val() + 'px'});


        // Certificate student name field js
        $(document).on('change', '.studentNameInput', function() {
            var selectedVal = $(this).find(':selected').html();
            $('.student-name').text(selectedVal);
        });
        $('.studentNamePositionX').on('input', function() {
            $(".student-name").css({"left": $(this).val() + 'px'});
        });
        $(".student-name").css({"left": $('.studentNamePositionX').val() + 'px'});

        $('.studentNamePositionY').on('input', function() {
            $(".student-name").css({"top": $(this).val() + 'px'});
        });
        $(".student-name").css({"top": $('.studentNamePositionY').val() + 'px'});

        $('.studentNameColor').on('input', function() {
            $(".student-name").css({"color": '#' + $(this).val()});
        });
        $(".student-name").css({"color": '#' + $('.studentNameColor').val()});

        $('.studentNameFontSize').on('input', function() {
            $(".student-name").css({"font-size": $(this).val() + 'px'});
        });
        $(".student-name").css({"font-size": $('.studentNameFontSize').val() + 'px'});

        // Certificate Body field js
        $('.certificateBodyInput').on('input', function() {
            $('.certificate-body-text').text($(this).val());
        });
        $('.certificate-body-text').text($('.certificateBodyInput').val());

        $('.certificateBodyPositionX').on('input', function() {
            $(".certificate-body").css({"left": $(this).val() + 'px'});
          });
          $(".certificate-body").css({"left": $('.certificateBodyPositionX').val() + 'px'});

        $('.certificateBodyPositionY').on('input', function() {
            $(".certificate-body").css({"top": $(this).val() + 'px'});
          });
          $(".certificate-body").css({"top": $('.certificateBodyPositionY').val() + 'px'});

        $('.certificateBodyColor').on('input', function() {
            $(".certificate-body").css({"color": '#' + $(this).val()});
          });
          $(".certificate-body").css({"color": '#' + $('.certificateBodyColor').val()});

        $('.certificateBodyFontSize').on('input', function() {
            $(".certificate-body").css({"font-size": $(this).val() + 'px'});
        });
        $(".certificate-body").css({"font-size": $('.certificateBodyFontSize').val() + 'px'});


        // Certificate instructor-signature field js
        $('.instructor_signature_input').on('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.instructor-signature').attr('src', e.target.result).show();
            };
            reader.readAsDataURL(file);
        });
        $('.instructorSignaturePositionX').on('input', function() {
            $(".instructor-signature").css({"left": $(this).val() + 'px'});
        });
        $(".instructor-signature").css({"left": $('.instructorSignaturePositionX').val() + 'px'});

        $('.instructorSignaturePositionY').on('input', function() {
            $(".instructor-signature").css({"top": $(this).val() + 'px'});
        });
        $(".instructor-signature").css({"top": $('.instructorSignaturePositionY').val() + 'px'});

        $('.instructorSignaturePositionWidth').on('input', function() {
            $(".instructor-signature").css({"width": $(this).val() + '%'});
        });
        $(".instructor-signature").css({"width": $('.instructorSignaturePositionWidth').val() + '%'});


        // Certificate Admin-signature field js
        $('.admin_signature_input').on('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.admin-signature').attr('src', e.target.result).show();
            };
            reader.readAsDataURL(file);
        });
        $('.adminSignaturePositionX').on('input', function() {
            $(".admin-signature").css({"left": $(this).val() + 'px'});
        });
        $(".admin-signature").css({"left": $('.adminSignaturePositionX').val() + 'px'});

        $('.adminSignaturePositionY').on('input', function() {
            $(".admin-signature").css({"top": $(this).val() + 'px'});
        });
        $(".admin-signature").css({"top": $('.adminSignaturePositionY').val() + 'px'});

        $('.adminSignaturePositionWidth').on('input', function() {
            $(".admin-signature").css({"width": $(this).val() + '%'});
        });
        $(".admin-signature").css({"width": $('.adminSignaturePositionWidth').val() + '%'});

        // Certificate Logo field js
        $('.certificate_logo_input').on('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.certificate-logo').attr('src', e.target.result).show();
            };
            reader.readAsDataURL(file);
        });
        $('.certificateLogoPositionX').on('input', function() {
            $(".certificate-logo").css({"left": $(this).val() + 'px'});
        });
        $(".certificate-logo").css({"left": $('.certificateLogoPositionX').val() + 'px'});

        $('.certificateLogoPositionY').on('input', function() {
            $(".certificate-logo").css({"top": $(this).val() + 'px'});
        });
        $(".certificate-logo").css({"top": $('.certificateLogoPositionY').val() + 'px'});

        $('.certificateLogoPositionWidth').on('input', function() {
            $(".certificate-logo").css({"width": $(this).val() + '%'});
        });
        $(".certificate-logo").css({"width": $('.certificateLogoPositionWidth').val() + '%'});


        // Certificate signature-title-1 field js
        $('.signatureTitle1Input').on('input', function() {
            $('.signature-title-1').text($(this).val());
        });
        $('.signature-title-1').text($('.signatureTitle1Input').val());

        $('.signatureTitle1PositionX').on('input', function() {
            $(".signature-title-1").css({"left": $(this).val() + 'px'});
          });
          $(".signature-title-1").css({"left": $('.signatureTitle1PositionX').val() + 'px'});

        $('.signatureTitle1PositionY').on('input', function() {
            $(".signature-title-1").css({"top": $(this).val() + 'px'});
          });
          $(".signature-title-1").css({"top": $('.signatureTitle1PositionY').val() + 'px'});

        $('.signatureTitle1Color').on('input', function() {
            $(".signature-title-1").css({"color": '#' + $(this).val()});
          });
          $(".signature-title-1").css({"color": '#' + $('.signatureTitle1Color').val()});

        $('.signatureTitle1FontSize').on('input', function() {
            $(".signature-title-1").css({"font-size": $(this).val() + 'px'});
        });
        $(".signature-title-1").css({"font-size": $('.signatureTitle1FontSize').val() + 'px'});


        // Certificate signature-title-2 field js
        $('.signatureTitle2Input').on('input', function() {
            $('.signature-title-2').text($(this).val());
        });
        $('.signature-title-2').text($('.signatureTitle2Input').val());

        $('.signatureTitle2PositionX').on('input', function() {
            $(".signature-title-2").css({"left": $(this).val() + 'px'});
          });
          $(".signature-title-2").css({"left": $('.signatureTitle2PositionX').val() + 'px'});

        $('.signatureTitle2PositionY').on('input', function() {
            $(".signature-title-2").css({"top": $(this).val() + 'px'});
          });
          $(".signature-title-2").css({"top": $('.signatureTitle2PositionY').val() + 'px'});

        $('.signatureTitle2Color').on('input', function() {
            $(".signature-title-2").css({"color": '#' + $(this).val()});
          });
          $(".signature-title-2").css({"color": '#' + $('.signatureTitle2Color').val()});

        $('.signatureTitle2FontSize').on('input', function() {
            $(".signature-title-2").css({"font-size": $(this).val() + 'px'});
        });
        $(".signature-title-2").css({"font-size": $('.signatureTitle2FontSize').val() + 'px'});

    });



    // print js
    $(window).on('load', function () {
        printDiv();
        // printTest();
    });

    window.printDiv = function () {
        var printContents = document.getElementById('printableArea').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    };


    let font = ""

    function printTest() {
        // var printContents = document.getElementById('printableArea').innerHTML;
        // document.body.innerHTML = printContents;
        printJS({
            printable: 'print-element',
            type: 'html',
            style: '@page { size: Letter landscape; }'
        })
    }



    // window.printDiv = function () {
    //     var printContents = document.getElementById('printableArea').innerHTML;

    //     var printWindow = window.open('', '_blank');
    //     printWindow.document.write('<html><head><title>Print</title>');

    //     printWindow.document.write(`
    //         <style>
    //             @page {
    //                 size: landscape;
    //                 margin: 1cm; /* Adjust margins as needed */
    //             }
    //             body {
    //                 -webkit-print-color-adjust: exact; /* Ensures colors are printed accurately */
    //                 margin: 0;
    //                 padding: 0;
    //                 box-sizing: border-box;
    //                 width: 100%;
    //                 height: 100%;
    //                 transform: scale(1);
    //                 transform-origin: top left;
    //             }
    //             #printableArea {
    //                 width: 100%;
    //                 height: auto;
    //                 overflow: hidden;
    //                 page-break-inside: avoid;
    //             }
    //         </style>
    //     `);
    //     printWindow.document.write('</head><body>');
    //     printWindow.document.write(printContents);
    //     printWindow.document.write('</body></html>');
    //     printWindow.document.close();
    //     printWindow.focus();
    //     printWindow.print();
    //     printWindow.close();
    // };




})(jQuery)
