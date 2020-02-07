$(document).ready(function() {

    $(".nav-item").on("click", function(e) {
        // window.location.href = $("#url").val() + $(this).attr("href");
    });

    $('#patientBirthday').datetimepicker({
    	format: 'L'
    });

    $('#admissionDate').datetimepicker({
    	format: 'L'
    });

    $('#checkDate').datetimepicker({
    	format: 'L'
    });

    $('#outAdmissionDate').datetimepicker({
    	format: 'L'
    });

    $('#ccTime').datetimepicker({
    	format: 'L'
    });

    $('#digestiveSymptom1').on("click", function(e) {
        if ($('#digestiveSymptom1').hasClass("active")) {
            $("#vomitExpand").addClass("d-none");
            $("#matureOfVomit").val("");
            $("#frequencyOfVomit").val("");
        } else {
            $("#vomitExpand").removeClass("d-none");
        }
    });

    $('#digestiveSymptom2').on("click", function(e) {
        if ($('#digestiveSymptom2').hasClass("active")) {
            $("#abdominalPainExpand").addClass("d-none");
            $(".abdominal-pain-location").removeClass("active");
            $(".abdominal-pain-type").removeClass("active");
        } else {
            $("#abdominalPainExpand").removeClass("d-none");
        }
    });

    $('#digestiveSymptom3').on("click", function(e) {
        if ($('#digestiveSymptom3').hasClass("active")) {
            $("#stoolExpand").addClass("d-none");
            $(".stool-type").removeClass("active");
            $("#stoolFrequency").val("");
        } else {
            $("#stoolExpand").removeClass("d-none");
        }
    });

    $('#skinSoftTissue0').on("click", function(e) {
        if ($('#skinSoftTissue0').hasClass("active")) {
            $("#erythraExpand").addClass("d-none");
            $(".erythra-type").removeClass("active");
        } else {
            $("#erythraExpand").removeClass("d-none");
        }
    });

    $('#nervousSystem0').on("click", function(e) {  
        if ($('#nervousSystem0').hasClass("active")) {
            $("#headacheExpand").addClass("d-none");
            $(".headache-type").removeClass("active");
            $("#headacheLocation").val("");
        } else {
            $("#headacheExpand").removeClass("d-none");
        }
    });
});