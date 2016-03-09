//Vorschau der Profilbearbeitung
$('#vorschau').click(function() {
    $('#vornameview').html($('#vorname').val());
    $('#nachnameview').html($('#nachname').val());
    $('#emailview').html($('#email').val());
    $('#telefonview').html($('#telefon').val());
    $('#strasseview').html($('#strasse').val());
    $('#nummerview').html($('#nummer').val());
    $('#plzview').html($('#plz').val());
    $('#ortview').html($('#ort').val());
    $('#beschreibung1view').html($('#beschreibung1').val());
    $('#textfoto1view').html($('#textfoto1').val());
    $('#beschreibung2view').html($('#beschreibung2').val());
    $('#textfoto2view').html($('#textfoto2').val());
});

$('#vorschauPinnwand').click(function() {

    $('#postingview').html($('#posting').val());
    $('#titelview').html($('#titel').val());
    $('#katview').html($('#sel1').val());


});


$('#submit').click(function(){
    alert('submitting');
    $('#formfield').submit();
});

