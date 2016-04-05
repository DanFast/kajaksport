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

//Vorschau für Pinnwandeintrag
$('#vorschauPinnwand').click(function() {

    $('#pwtextview').html($('#pwtext').val());
    $('#pwtitelview').html($('#pwtitel').val());
    $('#pwkategorieview').html($('#pwkategorie').val());


});

//Vorschau für Berichteintrag
$('#vorschauBericht').click(function() {

    $('#berichttitelview').html($('#berichttitel').val());
    $('#berichttext1view').html($('#berichttext1').val());
    $('#berichttext2view').html($('#berichttext2').val());


});


$('#submit').click(function(){
    alert('submitting');
    $('#formfield').submit();
});


//Pinwand Nav-Tabs Vorschau
$(document).ready(function(){
    $("#myTab a").click(function(e){
        e.preventDefault();
        $(this).tab('show');
    });
});

//Bericht Textfeld und Fotofeld hinzufügen
$(document).ready(function() {
    var max_fields      = 4; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    var wrapper2        = $(".input_fields_wrap2"); //Fields wrapper
    var berichttext     = "berichttext[]";
    var textbild        = "textbild[]";
    var bildview        = "bildview";
    var bildviewsm      = "textbildviewsm";
    var id              = 1;

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x <= max_fields) { //max input box allowed
            var rowID = "rowID";
            rowID = rowID + id;
            //Erzeugt dynamisch die Vorschau im Vorschaumodal
            if((id == 2) || (id == 4)){
                $(wrapper).append('<div class="row" id="'+ rowID +'">' +
                    '                <div class="col-md-8">' +
                    '                   <h4><b>Text '+ x +': </b></h4>' +
                    '                   <h4 id="berichttext'+ id +'view"></h4><br>' +
                    '                </div>' +
                    '                <div class="col-md-4">' +
                    '                   <h4><b>Bild '+ id +': </b></h4>' +
                    '                   <img id="bildview'+ id +'" style="padding-top: 5px; max-height: 200px; width: auto" class="featurette-image img-responsive" alt="Kein Foto">' +
                    '                </div>' +
                    '               </div>'
                );
            }else{
                $(wrapper).append('<div class="row" id="'+ rowID +'">' +
                    '                <div class="col-md-4">' +
                    '                   <h4><b>Bild '+ id +': </b></h4>' +
                    '                   <img id="bildview'+ id +'" style="padding-top: 5px; max-height: 200px; width: auto" class="featurette-image img-responsive" alt="Kein Foto">' +
                    '                </div>' +
                    '                <div class="col-md-8">' +
                    '                   <h4><b>Text '+ x +': </b></h4>' +
                    '                   <h4 id="berichttext'+ id +'view"></h4><br>' +
                    '                </div>' +
                    '               </div>'
                );
            }

            //Erzeugt dynamisch Inputfelder für Bericht
            $(wrapper2).append('<div><div class="row">' +
                '                       <div class="col-md-8 col-md-offset-2">' +
                '                       <div class="row">' +
                '                           <div class="col-md-7">' +
                '                                <div class="col-md-12">' +
                '                                       <div class="form-group">' +
                    '                                       <label for="berichttext2" class="control-label">Text ' + id +'</label>' +
                    '                                       <textarea name="' + berichttext + '" id="berichttext' + id +'" class="form-control" cols="20" rows="10" placeholder="Schreibe hier etwas" oninput="loadText()" required></textarea>' +
                '                                           <script>' +
                '                                               function loadText() {' +
                '                                                   var x = document.getElementById("berichttext'+ x +'").value;' +
            '                                                       document.getElementById("berichttext'+ x +'view").innerHTML = x;' +
                '                                               }' +
                '                                           </script>' +
                '                                       </div>' +
                '                                    </div>' +
                '                                </div>' +
                '                                <div class="col-md-4">' +
                '                                       <div class="col-md-12">' +
                '                                        <div class="form-group">' +
                '                                           <label for="bild">Foto zu Text ' + x +'</label>' +
                '                                            <input type="file" name="' + textbild + '" id="textbild' + id +'" accept="image/*" onchange="loadFoto'+ id +'(event)" required>' +
                '                                            <div class="media">' +
                '                                               <div class="media-left">' +
                '                                                   <img id="textbildviewsm' + id +'" style="max-height: 180px; max-width: 200px" class="media-object">' +
                '                                                </div>' +
                '                                                    </div>' +
                '                                            <script>' +
                                                    '            var loadFoto'+ id +' = function(event) {' +
                                                    '                var output = document.getElementById("' + bildview + id +'");' +
                                                    '                output.src = URL.createObjectURL(event.target.files[0]);' +
                                                    '                var outputsm = document.getElementById("'+ bildviewsm + id +'");' +
                                                    '                outputsm.src = URL.createObjectURL(event.target.files[0]);' +
                                                    '            };' +
                                                    '        </script>' +
                '                                          </div>' +
                '                                         </div>' +
                '                               </div>' +
                '                               <button type="button" class="remove_field btn btn-danger btn-sm" style="margin-left: 25px" onclick="removeDiv(\''+ rowID +'\')">' +
                '                               <span class="glyphicon glyphicon-minus" aria-hidden="true" ></span></button><br><br>' +
                '                               </div>' +
                '                               </div>' +
                '                       </div>');
            x++; //text box increment
            id++;
        }
        });


    $(wrapper2).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); --x;
    })
});

//Funktion um ein spezielles DIV zu löschen
function removeDiv(divId) {

    $("#"+divId).remove();

}

